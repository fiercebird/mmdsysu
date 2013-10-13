<?php
/* @var $this SchooltimeController */
/* @var $model Schooltime */

$this->breadcrumbs=array(
	'Schooltimes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Schooltime', 'url'=>array('index')),
	array('label'=>'Create Schooltime', 'url'=>array('create')),
	array('label'=>'Update Schooltime', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Schooltime', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Schooltime', 'url'=>array('admin')),
);
?>

<h1>View Schooltime #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'opendate',
	),
)); ?>
