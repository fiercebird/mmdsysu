<?php

class AlertRuleController extends Controller
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
                'actions' => array('admin', 'create', 'update','getDeviceAlertField'),
                'expression' => 'Users::model()->IsOne(16)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    //获取设备表格的下拉菜单
    public function getDeviceDropList()
    {
        return array(
            '0' => '请选择设备',
            'computer' => '电脑',
            'projector' => '投影机',
            'amplifier' => '功放',
            'soundControl' => '调音台',
            'mixer' => '混音器',
            'maiHasLine' => '有线麦',
            'maiNoLine' => '无线麦',
            'midControl' => '中控',
            'proScreen' => '投影幕',
            'voiceBox' => '音箱',
            'lamp' => '灯泡',
        );
    }

    //获取设备可供提醒设置的字段
    public function ActionGetDeviceAlertField()
    {
        if(isset($_POST['deviceName']))
        {
            $table = $_POST['deviceName'];
            $data = array();
            switch($table)
            {
                case 'computer':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'projector':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'amplifier':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'soundControl':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'mixer':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'maiHasLine':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'maiNoLine':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'midControl':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'proScreen':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'voiceBox':
                    $data = array('useYear'=>'使用年限');
                    break;
                case 'lamp':
                    $data = array('useYear'=>'使用年限','zhaodu'=>'照度','useHour'=>'使用小时');
                    break;
                default:
                    return;
            }
            foreach ($data as $value => $name)
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new AlertRule;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AlertRule']))
        {
            $model->attributes = $_POST['AlertRule'];
            if ($model->save())
                $this->redirect(array('admin'));
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

        if (isset($_POST['AlertRule']))
        {
            $model->attributes = $_POST['AlertRule'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->arid));
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
        $dataProvider = new CActiveDataProvider('AlertRule');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new AlertRule('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AlertRule']))
            $model->attributes = $_GET['AlertRule'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AlertRule the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = AlertRule::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AlertRule $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'alert-rule-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
