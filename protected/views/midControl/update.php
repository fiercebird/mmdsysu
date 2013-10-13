<?php
/* @var $this MidControlController */
/* @var $model MidControl */

$this->breadcrumbs=array(
	'中控'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>