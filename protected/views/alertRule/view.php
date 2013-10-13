<?php
/* @var $this AlertRuleController */
/* @var $model AlertRule */

$this->breadcrumbs=array(
	'Alert Rules'=>array('index'),
	$model->arid,
);

$this->menu=array(
	array('label'=>'List AlertRule', 'url'=>array('index')),
	array('label'=>'Create AlertRule', 'url'=>array('create')),
	array('label'=>'Update AlertRule', 'url'=>array('update', 'id'=>$model->arid)),
	array('label'=>'Delete AlertRule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->arid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlertRule', 'url'=>array('admin')),
);
?>

<h1>View AlertRule #<?php echo $model->arid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'arid',
		'tittle',
		'device',
		'field',
		'isBig',
		'rule',
	),
)); ?>
