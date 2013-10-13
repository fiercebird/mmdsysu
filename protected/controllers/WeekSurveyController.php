<?php

class WeekSurveyController extends Controller
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
				'actions'=>array('create','view', 'Chart', 'excel'),
				'expression' => 'Users::model()->IsOne(19)',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionExcel($week, $year) {
		$itemArray = WeekSurvey::getExcelItemArray();
		$typeArray = WeekSurvey::getExcelTypeArray();
		$model=new WeekSurvey();
		$model->unsetAttributes();
		$e_model = $s_model = $n_model = $z_model = null;
		$e_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 1));
		$e_model = @$e_model[count($e_model) - 1];
		$s_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 2));
		$s_model = @$s_model[count($s_model) - 1];
		$n_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 3));
		$n_model = @$n_model[count($n_model) - 1];
		$z_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 4));
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
				$objExcel = new PHPExcel();
				$objSheet = $objExcel->setActiveSheetIndex(0);
				$title = date('Y').'年'.'四校区多媒体课室教学设备与服务情况周检汇总表';
				$objExcel->getActiveSheet()->setTitle($title);
				$objSheet->setCellValue('A1',$title);
				$objSheet->getStyle('A1')->getFont()->setSize('30');
				$objSheet->mergeCells('A1:AW1');
				$objSheet->getRowDimension('1')->setRowHeight(50);
				$objSheet->getRowDimension('2')->setRowHeight(25);
				$objSheet->getColumnDimension('A')->setWidth(25);
				$objSheet->getColumnDimension('B')->setWidth(10);
	
				$objSheet->mergeCells('C2:E2');
				$objSheet->mergeCells('F2:H2');
				$objSheet->mergeCells('I2:K2');
				$objSheet->mergeCells('L2:N2');
				$objSheet->mergeCells('O2:Q2');
				$objSheet->mergeCells('R2:T2');
				$objSheet->mergeCells('U2:W2');
				$objSheet->mergeCells('X2:Z2');
	
				$objSheet->setCellValue('A2', '项目');
				$objSheet->setCellValue('B2', '课室样本量');
				
				$col = 2;
				for($i = 0; $i < count($itemArray); $i++) {
					$objSheet->setCellValueByColumnAndRow($col, 2, $itemArray[$i]);
					$col += 3;
				}
	
				for($i = 2; $i <= count($itemArray) * 3; $i += 3) {
					$objSheet->setCellValueByColumnAndRow($i, 3, '正常');
					$objSheet->setCellValueByColumnAndRow($i + 1, 3, '不正常');
					$objSheet->setCellValueByColumnAndRow($i + 2, 3, '已处理');
				}
				$objSheet->setCellValue('A4', '东校区');
				$objSheet->setCellValue('A5', '上课过程中遇到问题及处理');
				$objSheet->getRowDimension('5')->setRowHeight(20);
				$objSheet->mergeCells('B5:R5');
				$objSheet->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objSheet->setCellValue('A6', '南校区');
				$objSheet->setCellValue('A7', '上课过程中遇到问题及处理');
				$objSheet->getRowDimension('7')->setRowHeight(20);
				$objSheet->mergeCells('B7:R7');
				$objSheet->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objSheet->setCellValue('A8', '北校区');
				$objSheet->setCellValue('A9', '上课过程中遇到问题及处理');
				$objSheet->getRowDimension('9')->setRowHeight(20);
				$objSheet->mergeCells('B9:R9');
				$objSheet->getStyle('B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objSheet->setCellValue('A10', '珠海校区');
				$objSheet->setCellValue('A11', '上课过程中遇到问题及处理');
				$objSheet->getRowDimension('11')->setRowHeight(20);
				$objSheet->mergeCells('B11:Z11');
				$objSheet->getStyle('B11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				//east
				if(is_object($e_model)) {
					$objSheet->setCellValue('B4', $e_model->survey_sample);
					$index = 0;
					for($i = 2; $i <= (count($itemArray)) * 3; $i += 3) {
						$objSheet = WeekSurvey::fill(4, $i, $objSheet, $e_model, $typeArray[$index++]);
					}
					$objSheet->setCellValue('B5', $e_model->class_status);
				}
				//south
				if(is_object($s_model)) {
					$objSheet->setCellValue('B6', $s_model->survey_sample);
					$index = 0;
					for($i = 2; $i <= (count($itemArray)) * 3; $i += 3) {
						$objSheet = WeekSurvey::fill(6, $i, $objSheet, $s_model, $typeArray[$index++]);
					}
					$objSheet->setCellValue('B7', $s_model->class_status);
				}
				//north
				if(is_object($n_model)) {
					$objSheet->setCellValue('B8', $n_model->survey_sample);
					$index = 0;
					for($i = 2; $i <= (count($itemArray)) * 3; $i += 3) {
						$objSheet = WeekSurvey::fill(8, $i, $objSheet, $n_model, $typeArray[$index++]);
					}
					$objSheet->setCellValue('B9', $n_model->class_status);
				}
				//zhuhai
				if(is_object($z_model)) {
					$objSheet->setCellValue('B10', $z_model->survey_sample);
					$index = 0;
					for($i = 2; $i <= (count($itemArray)) * 3; $i += 3) {
						$objSheet = WeekSurvey::fill(10, $i, $objSheet, $z_model, $typeArray[$index++]);
					}
					$objSheet->setCellValue('B11', $z_model->class_status);
				}
				for($i = 1; $i <= 8; $i++) {
					$objDrawing = new PHPExcel_Worksheet_Drawing();
					//$objDrawing->setName("Logo");
					//$objDrawing->setDescription("Logo");
					$objDrawing->setPath("./pChart/render/imgtmp/w$i.png");
					$objDrawing->setResizeProportional(false);
					$objDrawing->setWidth(400);
					$objDrawing->setHeight(255);
					$objDrawing->getShadow()->setVisible(true);
					$row = intval(($i - 1) / 4);
					$loc = 13 + 14 * $row;
					switch($i - (4 * $row)) {
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
						case 4:
							$objDrawing->setCoordinates('S'.$loc);
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
	
	//create the bar chart
	public function actionChart($week, $year, $attr)
	{
		//load the data model
		$model=new WeekSurvey();
		$model->unsetAttributes();
		$header = $model->getAttributeLabel($attr.'gd');
		$e_model = $s_model = $n_model = $z_model = null;
		$e_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 1));
		$e_model = @$e_model[count($e_model) - 1];
		$s_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 2));
		$s_model = @$s_model[count($s_model) - 1];
		$n_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 3));
		$n_model = @$n_model[count($n_model) - 1];
		$z_model = $model->findAllByAttributes(array('survey_week' => $week, 'survey_year' => $year, 'cid' => 4));
		$z_model = @$z_model[count($z_model) - 1];
		//generate the params of chart
		$parm1 = WeekSurvey::getChartParams($e_model, $attr);
		$parm2 = WeekSurvey::getChartParams($s_model, $attr);
		$parm3 = WeekSurvey::getChartParams($n_model, $attr);
		$parm4 = WeekSurvey::getChartParams($z_model, $attr);
		$url = Yii::app()->request->hostInfo . "/pChart/render/weekchart.php?east=$parm1&south=$parm2&north=$parm3&zhuhai=$parm4&header=$header";//本机地址比较特殊。
		header("Location:$url");
		exit(0);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$model=new WeekSurvey();
		$model->unsetAttributes();
		$e_model = $s_model = $n_model = $z_model = null;
		$isfound = true;
		$ischart = false;
		if (isset($_GET['WeekSurvey'])) {
			$e_model = @$model->findAllByAttributes(array('survey_week' => $_GET['WeekSurvey']['survey_week'], 'survey_year' => $_GET['WeekSurvey']['survey_year'], 'cid' => 1));
			$e_model = @$e_model[count($e_model) - 1];
			$s_model = @$model->findAllByAttributes(array('survey_week' => $_GET['WeekSurvey']['survey_week'], 'survey_year' => $_GET['WeekSurvey']['survey_year'], 'cid' => 2));
			$s_model = @$s_model[count($s_model) - 1];
			$n_model = @$model->findAllByAttributes(array('survey_week' => $_GET['WeekSurvey']['survey_week'], 'survey_year' => $_GET['WeekSurvey']['survey_year'], 'cid' => 3));
			$n_model = @$n_model[count($n_model) - 1];
			$z_model = @$model->findAllByAttributes(array('survey_week' => $_GET['WeekSurvey']['survey_week'], 'survey_year' => $_GET['WeekSurvey']['survey_year'], 'cid' => 4));
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
				'week' => @$_GET['WeekSurvey']['survey_week'],
				'year' => @$_GET['WeekSurvey']['survey_year'],
				'ischart' => $ischart,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new WeekSurvey;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WeekSurvey']))
		{
			$model->attributes=$_POST['WeekSurvey'];
			if($model->save())
				echo "<script>alert('录入成功');window.location.href='?r=weekSurvey/create'</script>";
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

		if(isset($_POST['WeekSurvey']))
		{
			$model->attributes=$_POST['WeekSurvey'];
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
		$dataProvider=new CActiveDataProvider('WeekSurvey');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WeekSurvey('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WeekSurvey']))
			$model->attributes=$_GET['WeekSurvey'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WeekSurvey the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WeekSurvey::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WeekSurvey $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='week-survey-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
