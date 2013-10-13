<?php
/* @var $this WeeklyErrorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Weekly Errors',
);

$this->menu=array(
	array('label'=>'Create WeeklyError', 'url'=>array('create')),
	array('label'=>'Manage WeeklyError', 'url'=>array('admin')),
);
?>

<h1>Weekly Errors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
