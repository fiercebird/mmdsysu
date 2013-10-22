<?php
/* @var $this LampZhaoduController */
/* @var $model LampZhaodu */

$this->breadcrumbs=array(
	'Lamp Zhaodus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LampZhaodu', 'url'=>array('index')),
	array('label'=>'Create LampZhaodu', 'url'=>array('create')),
	array('label'=>'Update LampZhaodu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LampZhaodu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LampZhaodu', 'url'=>array('admin')),
);
?>

<h1>View LampZhaodu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lid',
		'zhaodu',
		'time',
	),
)); ?>
