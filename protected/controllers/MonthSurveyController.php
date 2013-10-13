<?php

class MonthSurveyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

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
				'actions'=>array('create','view', 'chart', 'excel'),
				'expression' => 'Users::model()->IsOne(19)',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionExcel($month, $year) {
		$itemArray = MonthSurvey::getExcelItemArray();
		$typeArray = MonthSurvey::getExcelTypeArray();
		$model=new MonthSurvey();
		$e_model = @$model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 1));
		$e_model = @$e_model[count($e_model) - 1];
		$s_model = @$model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 2));
		$s_model = @$s_model[count($s_model) - 1];
		$n_model = @$model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 3));
		$n_model = @$n_model[count($n_model) - 1];
		$z_model = @$model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 4));
		$z_model = @$z_model[count($z_model) - 1];
		//Yii::import('application.extensions.Classes.PHPExcel');
		$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel');
		
		// Turn off our amazing library autoload
		spl_autoload_unregister(array('YiiBase','autoload'));
		
		//
		// making use of our reference, include the main class
		// when we do this, phpExcel has its own autoload registration
		// procedure (PHPExcel_Autoloader::Register();)
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		/*
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Hello')
		->setCellValue('B2', 'world!')
		->setCellValue('C1', 'Hello')
		->setCellValue('D2', 'world!')
		->mergeCells('A1:B1');
		;
		
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		ob_end_clean();
		ob_start();
		*/
		$objExcel = new PHPExcel();
		$objSheet = $objExcel->setActiveSheetIndex(0);
		$title = date('Y').'年'.'四校区多媒体课室教学设备与服务情况'.date('n').'月月检汇总表';
		$objExcel->getActiveSheet()->setTitle($title);
		$objSheet->setCellValue('A1',$title);
		$objSheet->getStyle('A1')->getFont()->setSize('30');
		$objSheet->mergeCells('A1:AW1');
		$objSheet->getRowDimension('1')->setRowHeight(50);
		$objSheet->getRowDimension('2')->setRowHeight(25);
		$objSheet->getColumnDimension('A')->setWidth(20);
		$objSheet->getColumnDimension('B')->setWidth(10);
		$objSheet->getColumnDimension('C')->setWidth(10);
		
		$objSheet->mergeCells('D2:G2');
		$objSheet->mergeCells('H2:K2');
		$objSheet->mergeCells('L2:O2');
		$objSheet->mergeCells('P2:S2');
		$objSheet->mergeCells('T2:W2');
		$objSheet->mergeCells('X2:AA2');
		$objSheet->mergeCells('AB2:AE2');
		$objSheet->mergeCells('AF2:AI2');
		$objSheet->mergeCells('AJ2:AM2');
		$objSheet->mergeCells('AN2:AQ2');
		$objSheet->mergeCells('AR2:AU2');
		$objSheet->mergeCells('AV2:AW2');
		
		$objSheet->setCellValue('A2', '项目');
		$objSheet->setCellValue('B2', '课室样本量');
		$objSheet->setCellValue('C2', '灯泡样本量');
		$col = 3;
		for($i = 0; $i < count($itemArray); $i++) {
			$objSheet->setCellValueByColumnAndRow($col, 2, $itemArray[$i]);
			$col += 4;
		}
	
		for($i = 3; $i <= (count($itemArray) - 1) * 4; $i += 4) {
			$objSheet->setCellValueByColumnAndRow($i, 3, '很好');
			$objSheet->setCellValueByColumnAndRow($i + 1, 3, '好');
			$objSheet->setCellValueByColumnAndRow($i + 2, 3, '中');
			$objSheet->setCellValueByColumnAndRow($i + 3, 3,'差');
		}		
		$objSheet->setCellValue('AV3', '满意');
		$objSheet->setCellValue('AW3', '不满意');
		$objSheet->setCellValue('A4', '东校区');
		$objSheet->setCellValue('A5', '问题处理及反馈情况');
		$objSheet->getRowDimension('5')->setRowHeight(20);
		$objSheet->mergeCells('B5:AW5');
		$objSheet->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->setCellValue('A6', '南校区');
		$objSheet->setCellValue('A7', '问题处理及反馈情况');
		$objSheet->getRowDimension('7')->setRowHeight(20);
		$objSheet->mergeCells('B7:AW7');
		$objSheet->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->setCellValue('A8', '北校区');
		$objSheet->setCellValue('A9', '问题处理及反馈情况');
		$objSheet->getRowDimension('9')->setRowHeight(20);
		$objSheet->mergeCells('B9:AW9');
		$objSheet->getStyle('B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objSheet->setCellValue('A10', '珠海校区');
		$objSheet->setCellValue('A11', '问题处理及反馈情况');
		$objSheet->getRowDimension('11')->setRowHeight(20);
		$objSheet->mergeCells('B11:AW11');
		$objSheet->getStyle('B11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		//east
		if(is_object($e_model)) {
		$objSheet->setCellValue('B4', $e_model->survey_sample);
		$objSheet->setCellValue('C4', $e_model->zhaodu_sample);
		$objSheet = MonthSurvey::fill(4, 3, $objSheet, $e_model, 'pg_zhaodu', 1);
		$index = 0;
		for($i = 7; $i <= (count($itemArray) - 1) * 4; $i += 4) {
			$objSheet = MonthSurvey::fill(4, $i, $objSheet, $e_model, $typeArray[$index++]);
		}
		$objSheet->setCellValue('AV4', MonthSurvey::getPercentage($e_model, 'repair_y'));
		$objSheet->setCellValue('AW4', MonthSurvey::getPercentage($e_model, 'repair_n'));
		$objSheet->setCellValue('B5', $e_model->status);
		
		}
		//south
		if(is_object($s_model)) {
		$objSheet->setCellValue('B6', $s_model->survey_sample);
		$objSheet->setCellValue('C6', $s_model->zhaodu_sample);
		$objSheet = MonthSurvey::fill(6, 3, $objSheet, $s_model, 'pg_zhaodu', 1);
		$index = 0;
		for($i = 7; $i <= (count($itemArray) - 1) * 4; $i += 4) {
			$objSheet = MonthSurvey::fill(6, $i, $objSheet, $s_model, $typeArray[$index++]);
		}
		$objSheet->setCellValue('AV6', MonthSurvey::getPercentage($s_model, 'repair_y'));
		$objSheet->setCellValue('AW6', MonthSurvey::getPercentage($s_model, 'repair_n'));
		$objSheet->setCellValue('B7', $s_model->status);
		}
		//north
		if(is_object($n_model)) {
		$objSheet->setCellValue('B8', $n_model->survey_sample);
		$objSheet->setCellValue('C8', $n_model->zhaodu_sample);
		$objSheet = MonthSurvey::fill(8, 3, $objSheet, $n_model, 'pg_zhaodu', 1);
		$index = 0;
		for($i = 7; $i <= (count($itemArray) - 1) * 4; $i += 4) {
			$objSheet = MonthSurvey::fill(8, $i, $objSheet, $n_model, $typeArray[$index++]);
		}
		$objSheet->setCellValue('AV8', MonthSurvey::getPercentage($n_model, 'repair_y'));
		$objSheet->setCellValue('AW8', MonthSurvey::getPercentage($n_model, 'repair_n'));
		$objSheet->setCellValue('B9', $n_model->status);
		}
		//zhuhai
		if(is_object($z_model)) {
		$objSheet->setCellValue('B10', $z_model->survey_sample);
		$objSheet->setCellValue('C10', $z_model->zhaodu_sample);
		$objSheet = MonthSurvey::fill(10, 3, $objSheet, $z_model, 'pg_zhaodu', 1);
		$index = 0;
		for($i = 7; $i <= (count($itemArray) - 1) * 4; $i += 4) {
			$objSheet = MonthSurvey::fill(10, $i, $objSheet, $z_model, $typeArray[$index++]);
		}
		$objSheet->setCellValue('AV10', MonthSurvey::getPercentage($z_model, 'repair_y'));
		$objSheet->setCellValue('AW10', MonthSurvey::getPercentage($z_model, 'repair_n'));
		$objSheet->setCellValue('B11', $z_model->status);
		}
		for($i = 1; $i <= 12; $i++) {
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		//$objDrawing->setName("Logo");
		//$objDrawing->setDescription("Logo");
		$objDrawing->setPath("./pChart/render/imgtmp/m$i.png");
		$objDrawing->setResizeProportional(false);
		$objDrawing->setWidth(400);
		$objDrawing->setHeight(255);
		$objDrawing->getShadow()->setVisible(true);
		$row = intval(($i - 1) / 3);
		$loc = 13 + 14 * $row;
		switch($i - (3 * $row)) {
			case 1:
				$objDrawing->setCoordinates('A'.$loc);
				break;
			case 2:
				$objDrawing->setCoordinates('F'.$loc);
				break;
			case 3:
				$objDrawing->setCoordinates('L'.$loc);
				$objDrawing->setOffsetX(27);
				break;
			default:
				$objDrawing->setCoordinates('A'.$loc);
				break;
		}
		$objDrawing->setWorksheet($objExcel->getActiveSheet());
		}
		
		
		$objExcel->setActiveSheetIndex(0);
		ob_end_clean();
		ob_start();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$title.'.xls";charset=utf-8');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
		spl_autoload_register(array('YiiBase','autoload'));
		
	
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$model=new MonthSurvey();
		$model->unsetAttributes();
		$e_model = $s_model = $n_model = $z_model = null;
		$isfound = true;
		$ischart = false;
		if (isset($_GET['MonthSurvey'])) {
			$e_model = @$model->findAllByAttributes(array('survey_month' => $_GET['MonthSurvey']['survey_month'], 'survey_year' => $_GET['MonthSurvey']['survey_year'], 'cid' => 1));
			$e_model = @$e_model[count($e_model) - 1];
			$s_model = @$model->findAllByAttributes(array('survey_month' => $_GET['MonthSurvey']['survey_month'], 'survey_year' => $_GET['MonthSurvey']['survey_year'], 'cid' => 2));
			$s_model = @$s_model[count($s_model) - 1];
			$n_model = @$model->findAllByAttributes(array('survey_month' => $_GET['MonthSurvey']['survey_month'], 'survey_year' => $_GET['MonthSurvey']['survey_year'], 'cid' => 3));
			$n_model = @$n_model[count($n_model) - 1];
			$z_model = @$model->findAllByAttributes(array('survey_month' => $_GET['MonthSurvey']['survey_month'], 'survey_year' => $_GET['MonthSurvey']['survey_year'], 'cid' => 4));
			$z_model = @$z_model[count($z_model) - 1];
			if (!is_object($e_model) && !is_object($s_model) && !is_object($n_model) && !is_object($z_model)) {
				$isfound = false;
			}
			else {
				$ischart = true;
			}
		}
		$this->render('view',array(
				'model'=>$model,
				'east' => $e_model,
				'south' => $s_model,
				'north' => $n_model,
				'zhuhai' => $z_model,
				'isfound' => $isfound,
				'month' => @$_GET['MonthSurvey']['survey_month'],
				'year' => @$_GET['MonthSurvey']['survey_year'],
				'ischart' => $ischart,
		));
	}
	
	//create the bar chart
	public function actionChart($month, $year, $attr)
	{
		//load the data model
		$model=new MonthSurvey();
		$model->unsetAttributes();
		if($attr == 'repair_')
			$header = $model->getAttributeLabel($attr.'y');
		else
			$header = $model->getAttributeLabel($attr.'gd');
		$e_model = $s_model = $n_model = $z_model = null;
		$e_model = $model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 1));
		$e_model = @$e_model[count($e_model) - 1];
		$s_model = $model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 2));
		$s_model = @$s_model[count($s_model) - 1];
		$n_model = $model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 3));
		$n_model = @$n_model[count($n_model) - 1];
		$z_model = $model->findAllByAttributes(array('survey_month' => $month, 'survey_year' => $year, 'cid' => 4));
		$z_model = @$z_model[count($z_model) - 1];
		//generate the params of chart
		$parm1 = MonthSurvey::getChartParams($e_model, $attr);
		$parm2 = MonthSurvey::getChartParams($s_model, $attr);
		$parm3 = MonthSurvey::getChartParams($n_model, $attr);
		$parm4 = MonthSurvey::getChartParams($z_model, $attr);
		$url = Yii::app()->request->hostInfo . "/pChart/render/monthchart.php?east=$parm1&south=$parm2&north=$parm3&zhuhai=$parm4&header=$header";//本机地址比较特殊。
		header("Location:$url");
		exit(0);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MonthSurvey;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MonthSurvey']))
		{
			$model->attributes=$_POST['MonthSurvey'];
			if($model->save()) {
				echo "<script>alert('录入成功');window.location.href='?r=monthSurvey/create'</script>";
			}
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

		if(isset($_POST['MonthSurvey']))
		{
			$model->attributes=$_POST['MonthSurvey'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('MonthSurvey');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MonthSurvey('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MonthSurvey']))
			$model->attributes=$_GET['MonthSurvey'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MonthSurvey the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MonthSurvey::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MonthSurvey $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='month-survey-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
