<?php
/* @var $this DailyErrorController */
/* @var $model DailyError */

$this->breadcrumbs=array(
	'Daily Errors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DailyError', 'url'=>array('index')),
	array('label'=>'Create DailyError', 'url'=>array('create')),
	array('label'=>'View DailyError', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DailyError', 'url'=>array('admin')),
);
?>

<h1>Update DailyError <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>