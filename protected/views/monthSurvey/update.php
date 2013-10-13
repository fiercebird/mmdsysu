<?php
/* @var $this MonthSurveyController */
/* @var $model MonthSurvey */

$this->breadcrumbs=array(
	'Month Surveys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MonthSurvey', 'url'=>array('index')),
	array('label'=>'Create MonthSurvey', 'url'=>array('create')),
	array('label'=>'View MonthSurvey', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MonthSurvey', 'url'=>array('admin')),
);
?>

<h1>Update MonthSurvey <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>