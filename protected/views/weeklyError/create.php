<?php
/* @var $this WeeklyErrorController */
/* @var $model WeeklyError */

$this->breadcrumbs=array(
	'Weekly Errors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WeeklyError', 'url'=>array('index')),
	array('label'=>'Manage WeeklyError', 'url'=>array('admin')),
);
?>

<h1>Create WeeklyError</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>