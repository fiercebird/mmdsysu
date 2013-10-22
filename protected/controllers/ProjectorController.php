<?php

class ProjectorController extends Controller
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view', 'admin', 'delete', 'getRepairDetails', 'excel'),
                'expression' => 'Users::model()->IsOne(17)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    //导出Excel
    public function actionExcel()
    {
        $data = array();
        //header
        $data[1] = array('校区', '教学楼', '课室', '设备号', '数字/液晶', '品牌', '型号', '价格', '照度', '流明', '购买时间', '供应商', '灯泡时长','在用/备用');
        
        
        //从session中读取查询条件
        $criteria = $_SESSION['cc'];
        $lamp = Projector::model()->findAll($criteria);
        foreach($lamp as $value)
        {
            $tmp = array();
            array_push($tmp, $value->class->b->c->cname);
            array_push($tmp, $value->class->b->bname);
            array_push($tmp, $value->class->className);
            array_push($tmp, $value->deviceNum);
            array_push($tmp, $value->displayerType);
            array_push($tmp, $value->brand);
            array_push($tmp, $value->type);
            array_push($tmp, $value->price);
            array_push($tmp, $value->zhaodu);
            array_push($tmp, $value->liuming);
            array_push($tmp, $value->buyTime);
            array_push($tmp, $value->supplyCompany);
            array_push($tmp, $value->usedTime);
            array_push($tmp, $value->isUsing);
            array_push($data, $tmp);
        }
        Yii::import('application.extensions.phpexcel.JPhpExcel');
        $xls = new JPhpExcel('UTF-8', false, '投影机');
        $xls->addArray($data);
        $xls->generateXML('投影机', false);
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
        $model = new Projector;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Projector']))
        {
            $model->attributes = $_POST['Projector'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->pid));
        }

        //Excel导入
        if (isset($_FILES['batchFile']) && $_FILES['batchFile']['error'] == 0)
        {
            //先保存文件到临时文件夹
            $filename = 'file_tmp/' . $_FILES['batchFile']['name'];
            move_uploaded_file($_FILES['batchFile']['tmp_name'], $filename);
            //把超时时间和允许的最大内存改大，否则可能无法读取大文件
            set_time_limit(20000);
            ini_set("memory_limit", "400M");
            //读取excel
            Yii::import('ext.phpexcelreader.JPhpExcelReader');
            $data = new JPhpExcelReader('file_tmp/' . $_FILES['batchFile']['name']);
            $data->setOutputEncoding("utf-8");
            //循环遍历excel读取内容。从第二行开始。
            //echo $data->sheets[0]['numRows'] . '  ' .  $data->sheets[0]['numCols']. '<br />';
            $sum = $data->sheets[0]['numRows'] - 1; //总共的行数
            $num = 0; //成功插入条数
            $error = array(); //插入失败的条目
            for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
            {
                //赋值给model，把model插入数据库
                $model =  new Projector;
                //开始给model赋值
                //获取所在课室的ID
                $classroom = Classroom::model()->getClassId($data->val($i, 1), $data->val($i, 2), $data->val($i, 3));
                if($classroom == null)
                    //课室信息错误，找不到课室
                    array_push($error,$i);
                else
                {
                    //找到课室了，插入！
                    $model->classId = $classroom->classId;
                    $model->deviceNum = $data->val($i, 4);
                    $model->displayerType = $data->val($i, 5);
                    $model->brand = $data->val($i, 6);
                    $model->type = $data->val($i, 7);
                    $model->price = $data->val($i, 8);
                    $model->supplyCompany = $data->val($i, 9);
                    $model->buyTime = $data->val($i, 10);
                    $model->liuming = $data->val($i, 11);
                    $model->zhaodu = $data->val($i, 12);
                    $model->usedTime = $data->val($i, 13);
                    $model->isUsing = $data->val($i, 14);
                    $model->save();
                    $num++;
                }
            }
            if (file_exists($filename))
                unlink($filename);
            $this->render('result', array(
                'sum' => $sum,
                'num' => $num,
                'error' => $error
            ));
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

        if (isset($_POST['Projector']))
        {
            $model->attributes = $_POST['Projector'];
            if ($model->save())
                 $this->redirect(array('view', 'id' => $model->pid));
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
        $dataProvider = new CActiveDataProvider('Projector');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Projector('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Projector'])) {
            $model->attributes = $_GET['Projector'];
            $_SESSION['prevAttr'] = $_GET['Projector'];
        }
        if (isset($_GET['Campus']))
            $_SESSION['prevCname'] = $_GET['Campus']['cname'];
        if (isset($_GET['Building']))
            $_SESSION['prevBid'] = $_GET['Building']['bid'];
        if (Yii::app()->request->isAjaxRequest && isset($_GET['back']) && isset($_SESSION['prevAttr'])) {
            $model->attributes = $_SESSION['prevAttr'];
            if (isset($_SESSION['prevCname']))
                $_GET['Campus']['cname'] = $_SESSION['prevCname'];
            if (isset($_SESSION['prevBid']))
                $_GET['Building']['bid'] = $_SESSION['prevBid'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Projector the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Projector::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Projector $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'projector-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    //获取维修的详情
    public function actionGetRepairDetails($pid)
    {
        $res = ProRepair::model()->findAllByAttributes(array('pid' => $pid));
        $output['res'] = array();
        foreach ($res as $value)
            array_push($output['res'], array("id" => $value['id'], "details" => $value['details'], "man" => $value['man'], "cost" => $value['cost'], "time" => $value['time']));
        echo json_encode($output);
    }
}
