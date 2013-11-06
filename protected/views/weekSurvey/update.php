<?php
/* @var $this WeekSurveyController */
/* @var $model WeekSurvey */

$this->breadcrumbs=array(
	'Week Surveys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeekSurvey', 'url'=>array('index')),
	array('label'=>'Create WeekSurvey', 'url'=>array('create')),
	array('label'=>'View WeekSurvey', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WeekSurvey', 'url'=>array('admin')),
);
?>

<h1>Update WeekSurvey <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>