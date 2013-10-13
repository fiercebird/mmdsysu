<?php
/* @var $this DailyChkController */
/* @var $model DailyChk */

$this->breadcrumbs=array(
	'Daily Chks'=>array('index'),
	$model->did=>array('view','id'=>$model->did),
	'Update',
);

$this->menu=array(
	array('label'=>'List DailyChk', 'url'=>array('index')),
	array('label'=>'Create DailyChk', 'url'=>array('create')),
	array('label'=>'View DailyChk', 'url'=>array('view', 'id'=>$model->did)),
	array('label'=>'Manage DailyChk', 'url'=>array('admin')),
);
?>

<h1>Update DailyChk <?php echo $model->did; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>