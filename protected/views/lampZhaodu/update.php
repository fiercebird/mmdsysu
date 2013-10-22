<?php
/* @var $this LampZhaoduController */
/* @var $model LampZhaodu */

$this->breadcrumbs=array(
	'投影机灯泡'=>array('lamp/admin'),
	$model->l->class->b->c->cname . '-' . $model->l->class->b->bname . '-' . $model->l->class->className => array('admin', 'lid'=>$model->lid),
	'修改照度值',
);
?>
<h3><?php echo '修改' . $model->time . '照度值'; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'lid' => $lid)); ?>