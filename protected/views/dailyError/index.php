<?php
/* @var $this DailyErrorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Daily Errors',
);

$this->menu=array(
	array('label'=>'Create DailyError', 'url'=>array('create')),
	array('label'=>'Manage DailyError', 'url'=>array('admin')),
);
?>

<h1>Daily Errors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
