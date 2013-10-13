<?php
/* @var $this WeekSurveyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Week Surveys',
);

$this->menu=array(
	array('label'=>'Create WeekSurvey', 'url'=>array('create')),
	array('label'=>'Manage WeekSurvey', 'url'=>array('admin')),
);
?>

<h1>Week Surveys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
