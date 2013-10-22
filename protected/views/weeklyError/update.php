<?php
/* @var $this WeeklyErrorController */
/* @var $model WeeklyError */

$this->breadcrumbs=array(
	'Weekly Errors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeeklyError', 'url'=>array('index')),
	array('label'=>'Create WeeklyError', 'url'=>array('create')),
	array('label'=>'View WeeklyError', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WeeklyError', 'url'=>array('admin')),
);
?>

<h1>Update WeeklyError <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>