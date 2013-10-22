<?php
/* @var $this LampController */
/* @var $model Lamp */

$this->breadcrumbs=array(
	'投影机灯泡'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>