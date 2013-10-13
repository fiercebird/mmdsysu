<?php
/* @var $this ComputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'电脑'=>array('admin'),
	$model->deviceNum=>array('view','id'=>$model->comid),
	'更新',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>