<?php
/* @var $this ProjectorController */
/* @var $model Projector */

$this->breadcrumbs=array(
	'投影机'=>array('admin'),
	$model->deviceNum=>array('view','id'=>$model->pid),
	'更新',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>