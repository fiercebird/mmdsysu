<?php

class ClassroomController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('getAjaxClassroom'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','view','admin','delete','excel'),
				'expression' => 'Users::model()->IsOne(17)',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
        //ajax获取课室列表
	public function actiongetAjaxClassroom()
	{
		if($_POST['classroom'] === '0' || $_POST['classroom'] === '') {
			Yii::app()->end();
		}
		
		$data = CHtml::listData(Classroom::model()->findAllByAttributes(array('bid' => $_POST['classroom'])), 'classId', 'className');
		asort($data);
        echo CHtml::tag('option',array('disabled' => 'disabled', 'selected' => 'selected', 'value' => ''), "请选择课室",true);
		foreach ($data as $value => $name)
		{
			echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
		}
	}
        
        //excel导出功能
        public function actionExcel()
        {
            $data = array();
            //header
            $data[1] = array('校区','教学楼','课室','座位数','考位数','备注');
            
            //从session中读取查询条件
            $criteria = $_SESSION['cc'];
            //查询数据库
            $classroom = Classroom::model()->findAll($criteria);
            foreach($classroom as $value)
            {
                $tmp = array();
                array_push($tmp, $value->b->c->cname);
                array_push($tmp, $value->b->bname);
                array_push($tmp, $value->className);
                array_push($tmp, $value->seatNum);
                array_push($tmp, $value->examNum);
                array_push($tmp, $value->more);
                array_push($data, $tmp);
            }
            //生成excel
            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, '课室基本信息');
            $xls->addArray($data);
            $xls->generateXML('课室基本信息', false);
        }

                /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Classroom;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classroom']))
		{
			$model->attributes=$_POST['Classroom'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->classId));
		}
		
		//Excel导入
		if(isset($_FILES['batchFile']) && $_FILES['batchFile']['error']==0)
		{
			//先保存文件到临时文件夹
			$filename = 'file_tmp/' . $_FILES['batchFile']['name'];
			move_uploaded_file($_FILES['batchFile']['tmp_name'], $filename);
			//把超时时间和允许的最大内存改大，否则可能无法读取大文件
			set_time_limit(20000);
			ini_set("memory_limit","400M");
			//读取excel
			Yii::import('ext.phpexcelreader.JPhpExcelReader');
			$data=new JPhpExcelReader('file_tmp/' . $_FILES['batchFile']['name']);
			$data->setOutputEncoding("utf-8");
			//循环遍历excel读取内容。从第二行开始。
			//echo $data->sheets[0]['numRows'] . '  ' .  $data->sheets[0]['numCols']. '<br />';
			$sum = $data->sheets[0]['numRows']-1;//总共的行数
			$num = 0;//成功插入条数
			$error = array();//插入失败的条目
			for($i = 2; $i <= $data->sheets[0]['numRows'];$i++) {
				//赋值给model，把model插入数据库
				$model = new Classroom;
				//开始给model赋值
				//获取所在教学楼的ID
				$buliding = Building::model()->getBuildingId($data->val($i, 2));
				if($buliding == null)
					//信息错误，找不到教学楼
					array_push($error,$i);
				else
				{
					//找到教学楼了，插入！
					$model->bid = $buliding->bid;
					$model->className = $data->val($i, 3);
					$model->seatNum = $data->val($i, 4);
					$model->examNum = $data->val($i, 5);
					$model->more = $data->val($i, 6);
					$model->save();
					$num++;
				}
				}
				//删除文件
				if(file_exists($filename))
					unlink($filename);
				//呈现结果
				$this->render('result',array(
						'sum'=>$sum,
						'num'=>$num,
						'error'=>$error
				));		
		}
		
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classroom']))
		{
			$model->attributes=$_POST['Classroom'];
			if($model->save())				
                            $this->redirect(array('view','id'=>$model->classId));
		}
                $building = Building::model()->findByPk($model->bid);
		$this->render('update',array(
			'model'=>$model,
                        'cid'=>$building->cid,
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Classroom');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $model = new Classroom('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Classroom'])) {
            $model->attributes = $_GET['Classroom'];
            $_SESSION['prevAttr'] = $_GET['Classroom'];
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
	 * @return Classroom the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Classroom::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Classroom $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='classroom-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
