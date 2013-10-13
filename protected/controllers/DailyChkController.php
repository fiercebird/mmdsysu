<?php

class DailyChkController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('create', 'admin', 'Excel'),
                'expression' => 'Users::model()->IsOne(16)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionExcel()
    {

        $d = $_SESSION['daily-excel'];

        $data = array();

        $data[] = array_keys($d->data[0]->attributes); //headers: cols name
        for ($i = 0; $i < count($data[0]); $i++)
        {
            $data[0][$i] = DailyChk::model()->getAttributeLabel($data[0][$i]);
        }
        foreach ($d->data as $item)
        {
            $data[] = $item->attributes;
        }

        for ($i = 1; $i < count($data); $i++)
        {
            $data[$i]['cid'] = Campus::model()->findByAttributes(array('cid' => $data[$i]['cid']))->cname;
            $data[$i]['bid'] = Building::model()->findByAttributes(array('bid' => $data[$i]['bid']))->bname;
            $data[$i]['classId'] = Classroom::model()->findByAttributes(array('classId' => $data[$i]['classId']))->className;
        }

        Yii::import('application.extensions.phpexcel.JPhpExcel');
        $xls = new JPhpExcel('UTF-8', false, '日检记录');
        $xls->addArray($data);
        $xls->generateXML('日检所有记录', false); //export into a .xls file
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function afterSave($model)
    {
            foreach ($model->attributes as $key => $val)
            {
                if (isset($key) && $val === '不正常')
                {
                    $modelError = new DailyError;
                    $modelError->chkDate = $model->chkDate;
                    $modelError->chkTime = $model->chkTime;
                    $modelError->register = $model->register;
                    $modelError->details = $model->details;
                    $modelError->week = $model->week;
                    $modelError->cid = $model->cid;
                    $modelError->bid = $model->bid;
                    $modelError->classId = $model->classId;
                    if ($model->state == "已解决故障" || $model->state == '所有设备正常')
                    {
                        $modelError->state = '已处理';
                        $modelError->handler = $model->register;
                    } else
                    {
                        $modelError->state = '未解决';
                    }
                    $modelError->device = $model->getAttributeLabel($key);
                    $modelError->save(false);
                }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new DailyChk;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DailyChk']))
        {
            $model->attributes = $_POST['DailyChk'];
            $campus = Building::model()->getCampusId($model->bid);
            $model->cid = $campus->cid;
            if($model->save())
            	Yii::app()->clientScript->registerScript('done', "alert('登记成功!');location.href='?r=dailyChk/create';");
            $this->afterSave($model);
        }
		
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DailyChk']))
        {
            $model->attributes = $_POST['DailyChk'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->did));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('DailyChk');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new DailyChk('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['DailyChk']))
        {
            $model->attributes = $_GET['DailyChk'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DailyChk the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = DailyChk::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DailyChk $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'daily-chk-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
