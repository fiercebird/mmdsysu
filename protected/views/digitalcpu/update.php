<?php
/* @var $this DigitalcpuController */
/* @var $model Digitalcpu */

$this->breadcrumbs=array(
	'数字处理器'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>