<?php
/* @var $this WeeklyChkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Weekly Chks',
);

$this->menu=array(
	array('label'=>'Create WeeklyChk', 'url'=>array('create')),
	array('label'=>'Manage WeeklyChk', 'url'=>array('admin')),
);
?>

<h1>Weekly Chks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
