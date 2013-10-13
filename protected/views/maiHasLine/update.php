<?php
/* @var $this MaiHasLineController */
/* @var $model MaiHasLine */

$this->breadcrumbs=array(
	'有线麦'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	array('label'=>'添加记录', 'url'=>array('create')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>