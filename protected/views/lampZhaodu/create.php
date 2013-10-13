<?php
/* @var $this LampZhaoduController */
/* @var $model LampZhaodu */

$this->breadcrumbs=array(
	'投影机灯泡'=>array('lamp/admin'),
	$lamp->class->b->c->cname . '-' . $lamp->class->b->bname . '-' . $lamp->class->className => array('admin', 'lid'=>$lamp->lid),
	'新增照度值',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'lid' => $lid)); ?>