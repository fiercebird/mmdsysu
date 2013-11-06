<?php
/* @var $this DailyChkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Daily Chks',
);

$this->menu=array(
	array('label'=>'Create DailyChk', 'url'=>array('create')),
	array('label'=>'Manage DailyChk', 'url'=>array('admin')),
);
?>

<h1>Daily Chks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
