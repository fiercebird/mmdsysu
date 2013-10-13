<?php
/* @var $this AlertRuleController */
/* @var $model AlertRule */

$this->breadcrumbs=array(
	'Alert Rules'=>array('index'),
	$model->arid=>array('view','id'=>$model->arid),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlertRule', 'url'=>array('index')),
	array('label'=>'Create AlertRule', 'url'=>array('create')),
	array('label'=>'View AlertRule', 'url'=>array('view', 'id'=>$model->arid)),
	array('label'=>'Manage AlertRule', 'url'=>array('admin')),
);
?>

<h1>Update AlertRule <?php echo $model->arid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>