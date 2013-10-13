<?php
/* @var $this WeeklyChkController */
/* @var $model WeeklyChk */

$this->breadcrumbs=array(
	'Weekly Chks'=>array('index'),
	$model->wid=>array('view','id'=>$model->wid),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeeklyChk', 'url'=>array('index')),
	array('label'=>'Create WeeklyChk', 'url'=>array('create')),
	array('label'=>'View WeeklyChk', 'url'=>array('view', 'id'=>$model->wid)),
	array('label'=>'Manage WeeklyChk', 'url'=>array('admin')),
);
?>

<h1>Update WeeklyChk <?php echo $model->wid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>