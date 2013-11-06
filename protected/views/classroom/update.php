<?php
/* @var $this ClassroomController */
/* @var $model Classroom */

$this->breadcrumbs=array(
	'课室基本信息'=>array('admin'),
	$model->className=>array('view','id'=>$model->classId),
	'修改',
);

$this->menu=array(
	array('label'=>'新建课室', 'url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'cid'=>$cid)); ?>