<?php
/* @var $this SchooltimeController */
/* @var $model Schooltime */

$this->breadcrumbs=array(
	'修改开学时间',
);

/*$this->menu=array(
	array('label'=>'List Schooltime', 'url'=>array('index')),
	array('label'=>'Manage Schooltime', 'url'=>array('admin')),
);*/
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>