<?php

class LampController extends Controller
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
                'actions' => array('create', 'update', 'view', 'admin', 'cover', 'delete', 'getRepairDetails', 'excel', 'line'),
                'expression' => 'Users::model()->IsOne(17)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionCover()
    {
        if (!isset($sum))
            $this->render('cover');

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
                //赋值给model，把model覆盖数据库
                $model = Lamp::model()->findByPk($data->val($i, 16));
                if ($model == null)
                    array_push($error, $i);
                else
                {
                    $model->updateTime = $data->val($i, 4);
                    $model->displayerType = $data->val($i, 5);
                    $model->type = $data->val($i, 6);
                    $model->price = $data->val($i, 7);
                    $model->liuming = $data->val($i, 8);
                    $model->isUsing = $data->val($i, 9);
                    $model->onZhaodu = $data->val($i, 10);
                    $model->offZhaodu = $data->val($i, 11);
                    $model->zhaodu = $data->val($i, 12);
                    $model->usedTime = $data->val($i, 13);
                    $model->supplyCompany = $data->val($i, 14);
                    $model->guarentee = $data->val($i, 15);
                    if (!$model->update())
                        array_push($error, $i);
                    else
                    {
                        //在照度记录中添加一行
                        $lampZhaodu = new LampZhaodu;
                        $lampZhaodu->lid = $data->val($i, 16);
                        $lampZhaodu->zhaodu = $data->val($i, 12);
                        $lampZhaodu->time = date('Y-m-d H:i:s');
                        $lampZhaodu->save();
                        $num++;
                    }
                }
            }
            //删除文件
            if (file_exists($filename))
                unlink($filename);
            //呈现结果
            $this->render('result', array(
                'sum' => $sum,
                'num' => $num,
                'error' => $error
            ));
        }
    }

    //获取照度曲线
    public function actionLine($lid)
    {
        //获取最近24周的照度
        $res = LampZhaodu::model()->findAll("lid=:lid order by time desc limit 24", array("lid" => $lid,));
        if ($res == null) {
        	$url = Yii::app()->request->hostInfo . "/mmdsysu/pChart/render/zhaodu.php?times=-&zhaodus=";
	}
        //生成两个get参数，传给曲线生成PHP
	else {
        $times = '';
        $zhaodus = '';
        $num = count($res);
        for ($i = 0; $i < $num - 1; $i++)
        {
            //$times .= substr($value['time'], 0, 10) . ',';
            //$zhaodus .= $value['zhaodu'] . ',';
            $times .= substr($res[$i]['time'], 5, 5) . ',';
            $zhaodus .= $res[$i]['zhaodu'] . ',';
        }
        $times .= substr($res[$num - 1]['time'], 5, 5);
        $zhaodus .= $res[$num - 1]['zhaodu'];
        $url = Yii::app()->request->hostInfo . "/pChart/render/zhaodu.php?times=$times&zhaodus=$zhaodus";
	}
        header("Location:$url");
        exit(0);
    }

    //导出Excel
    public function actionExcel()
    {
        $data = array();
        //header
        $data[1] = array('校区', '教学楼', '课室', '更换时间', '投影机类型', '型号', '价格', '流明', '是否在用', '开机照度', '未开机照度', '照度', '使用时间', '供应商', '保修情况', 'ID（批量覆盖用，请勿修改）');


        //从session中读取查询条件
        $criteria = $_SESSION['cc'];
        $lamp = Lamp::model()->findAll($criteria);
        foreach ($lamp as $value)
        {
            $tmp = array();
            array_push($tmp, $value->class->b->c->cname);
            array_push($tmp, $value->class->b->bname);
            array_push($tmp, $value->class->className);
            array_push($tmp, $value->updateTime);
            array_push($tmp, $value->displayerType);
            array_push($tmp, $value->type);
            array_push($tmp, $value->price);
            array_push($tmp, $value->liuming);
            array_push($tmp, $value->isUsing);
            array_push($tmp, $value->onZhaodu);
            array_push($tmp, $value->offZhaodu);
            array_push($tmp, $value->zhaodu);
            array_push($tmp, $value->usedTime);
            array_push($tmp, $value->supplyCompany);
            array_push($tmp, $value->guarentee);
            array_push($tmp, $value->lid);
            array_push($data, $tmp);
        }
        Yii::import('application.extensions.phpexcel.JPhpExcel');
        $xls = new JPhpExcel('UTF-8', false, '投影机灯泡');
        $xls->addArray($data);
        $xls->generateXML('投影机灯泡', false);
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
        $model = new Lamp;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Lamp']))
        {
            $model->attributes = $_POST['Lamp'];
            if ($model->save())
            {
                //在照度记录中添加一行
                $lampZhaodu = new LampZhaodu;
                $lampZhaodu->lid = $model->lid;
                $lampZhaodu->zhaodu = $model->zhaodu;
                $lampZhaodu->time = date('Y-m-d H:i:s');
                $lampZhaodu->save();
                $this->redirect(array('view', 'id' => $model->lid));
            }
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
                $model = new Lamp;
                //开始给model赋值
                //获取所在课室的ID
                $classroom = Classroom::model()->getClassId($data->val($i, 1), $data->val($i, 2), $data->val($i, 3));
                if ($classroom == null)
                //课室信息错误，找不到课室
                    array_push($error, $i);
                else
                {
                    //找到课室了，插入！
                    $model->classId = $classroom->classId;
                    $model->updateTime = $data->val($i, 4);
                    $model->displayerType = $data->val($i, 5);
                    $model->type = $data->val($i, 6);
                    $model->price = $data->val($i, 7);
                    $model->supplyCompany = $data->val($i, 8);
                    $model->guarentee = $data->val($i, 9);
                    $model->liuming = $data->val($i, 10);
                    $model->onZhaodu = $data->val($i, 11);
                    $model->offZhaodu = $data->val($i, 12);
                    $model->zhaodu = $data->val($i, 13);
                    $model->usedTime = $data->val($i, 14);
                    $model->isUsing = $data->val($i, 15);
                    if($model->save())
                    {
                        //在照度记录中添加一行
                        $lampZhaodu = new LampZhaodu;
                        $lampZhaodu->lid = $model->lid;
                        $lampZhaodu->zhaodu = $model->zhaodu;
                        $lampZhaodu->time = date('Y-m-d H:i:s');
                        $lampZhaodu->save();
                        $num++;
                    }  
                }
            }
            //删除文件
            if (file_exists($filename))
                unlink($filename);
            //呈现结果
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

        if (isset($_POST['Lamp']))
        {
            $model->attributes = $_POST['Lamp'];
            if ($model->save())
            {
                //在照度记录中添加一行
                $lampZhaodu = new LampZhaodu;
                $lampZhaodu->lid = $model->lid;
                $lampZhaodu->zhaodu = $model->zhaodu;
                $lampZhaodu->time = date('Y-m-d H:i:s');
                $lampZhaodu->save();
                //$num++;
                $this->redirect(array('view', 'id' => $model->lid));				 
            }
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
        $dataProvider = new CActiveDataProvider('Lamp');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Lamp('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lamp'])) {
            $model->attributes = $_GET['Lamp'];
            $_SESSION['prevAttr'] = $_GET['Lamp'];
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
     * @return Lamp the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Lamp::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Lamp $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lamp-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
