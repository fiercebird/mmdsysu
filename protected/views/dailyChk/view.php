<?php
/* @var $this DailyChkController */
/* @var $model DailyChk */

$this->breadcrumbs=array(
	'Daily Chks'=>array('index'),
	$model->did,
);

$this->menu=array(
	array('label'=>'List DailyChk', 'url'=>array('index')),
	array('label'=>'Create DailyChk', 'url'=>array('create')),
	array('label'=>'Update DailyChk', 'url'=>array('update', 'id'=>$model->did)),
	array('label'=>'Delete DailyChk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->did),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DailyChk', 'url'=>array('admin')),
);
?>

<h1>View DailyChk #<?php echo $model->did; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'did',
		'classId',
		'register',
		'week',
		'chkTime',
		'chkDate',
		'state',
		'details',
		'discRom',
		'usb',
		'patch',
		'voice',
		'net',
		'virus',
		'noteBook',
		'mid',
		'maiHasLine',
		'maiNoLine',
		'proScreen',
		'projector',
		'amplifier',
		'stage',
	),
)); ?>
