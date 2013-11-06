<?php
/* @var $this LampController */
/* @var $model Lamp */

$this->breadcrumbs=array(
	'投影机灯泡'=>array('admin'),
	'详情',
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->lid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->lid),'confirm'=>'确定删除此记录?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'updateTime',
		'displayerType',
		'type',
		'price',
		'liuming',
		'isUsing',
		'onZhaodu',
		'offZhaodu',
		'usedTime',
		'supplyCompany',
	),
));
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>

