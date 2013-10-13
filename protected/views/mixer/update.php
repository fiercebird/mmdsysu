<?php
/* @var $this MixerController */
/* @var $model Mixer */

$this->breadcrumbs=array(
	'混音器'=>array('admin'),
	'更新记录',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>