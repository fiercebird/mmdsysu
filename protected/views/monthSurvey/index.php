<?php
/* @var $this MonthSurveyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Month Surveys',
);

$this->menu=array(
	array('label'=>'Create MonthSurvey', 'url'=>array('create')),
	array('label'=>'Manage MonthSurvey', 'url'=>array('admin')),
);
?>

<h1>Month Surveys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
