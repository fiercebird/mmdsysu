<?php
/* @var $this DailyErrorController */
/* @var $model DailyError */

$this->breadcrumbs=array(
	'Daily Errors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DailyError', 'url'=>array('index')),
	array('label'=>'Create DailyError', 'url'=>array('create')),
	array('label'=>'Update DailyError', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DailyError', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DailyError', 'url'=>array('admin')),
);
?>

<h1>View DailyError #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'handler',
		'did',
		'device',
		'state',
	),
)); ?>
