<?php
/* @var $this ProScreenController */
/* @var $model ProScreen */

$this->breadcrumbs=array(
	'Pro Screens'=>array('index'),
	$model->pid,
);

$this->menu=array(
	array('label'=>'List ProScreen', 'url'=>array('index')),
	array('label'=>'Create ProScreen', 'url'=>array('create')),
	array('label'=>'Update ProScreen', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'Delete ProScreen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProScreen', 'url'=>array('admin')),
);
?>

<h1>View ProScreen #<?php echo $model->pid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pid',
		'classId',
		'deviceNum',
		'brand',
		'type',
		'size',
		'price',
		'supplyCompany',
		'buyTime',
		'isUsing',
		'isAuto',
		'what',
		'guarentee',
	),
)); 
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
