<?php
/* @var $this SchooltimeController */
/* @var $model Schooltime */

$this->breadcrumbs=array(
	'Schooltimes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Schooltime', 'url'=>array('index')),
	array('label'=>'Create Schooltime', 'url'=>array('create')),
	array('label'=>'View Schooltime', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Schooltime', 'url'=>array('admin')),
);
?>

<h1>Update Schooltime <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>