<?php
/* @var $this MaiNoLineController */
/* @var $model MaiNoLine */

$this->breadcrumbs=array(
	'无线麦'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>