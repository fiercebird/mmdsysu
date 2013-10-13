<?php
/* @var $this ProjectorController */
/* @var $model Projector */

$this->breadcrumbs=array(
	'投影机'=>array('admin'),
	$model->deviceNum,
);

$this->menu=array(
	array('label'=>'添加记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'确定删除此记录?')),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deviceNum',
		'displayerType',
		'brand',
		'type',
		'price',
		'zhaodu',
		'liuming',
		'buyTime',
		'supplyCompany',
		'usedTime',
		'isUsing',
	),
));
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
 ?>
