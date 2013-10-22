<?php
/* @var $this ProScreenController */
/* @var $model ProScreen */

$this->breadcrumbs=array(
	'Pro Screens'=>array('index'),
	$model->pid=>array('view','id'=>$model->pid),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProScreen', 'url'=>array('index')),
	array('label'=>'Create ProScreen', 'url'=>array('create')),
	array('label'=>'View ProScreen', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'Manage ProScreen', 'url'=>array('admin')),
);
?>

<h1>Update ProScreen <?php echo $model->pid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>