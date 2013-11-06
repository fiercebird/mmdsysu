<?php
/* @var $this WeeklyErrorController */
/* @var $model WeeklyError */

$this->breadcrumbs=array(
	'Weekly Errors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List WeeklyError', 'url'=>array('index')),
	array('label'=>'Create WeeklyError', 'url'=>array('create')),
	array('label'=>'Update WeeklyError', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WeeklyError', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeeklyError', 'url'=>array('admin')),
);
?>

<h1>View WeeklyError #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cid',
		'bid',
		'classId',
		'handler',
		'wid',
		'device',
		'state',
	),
)); ?>
