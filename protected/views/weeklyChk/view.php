<?php
/* @var $this WeeklyChkController */
/* @var $model WeeklyChk */

$this->breadcrumbs=array(
	'Weekly Chks'=>array('index'),
	$model->wid,
);

$this->menu=array(
	array('label'=>'List WeeklyChk', 'url'=>array('index')),
	array('label'=>'Create WeeklyChk', 'url'=>array('create')),
	array('label'=>'Update WeeklyChk', 'url'=>array('update', 'id'=>$model->wid)),
	array('label'=>'Delete WeeklyChk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->wid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeeklyChk', 'url'=>array('admin')),
);
?>

<h1>View WeeklyChk #<?php echo $model->wid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wid',
		'cid',
		'bid',
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
		'lampBrightness',
		'lampTime',
	),
)); ?>
