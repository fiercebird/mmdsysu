<?php
/* @var $this DailyErrorController */
/* @var $model DailyError */

$this->breadcrumbs=array(
	'Daily Errors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DailyError', 'url'=>array('index')),
	array('label'=>'Manage DailyError', 'url'=>array('admin')),
);
?>

<h1>Create DailyError</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>