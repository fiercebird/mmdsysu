<?php
/* @var $this AmplifierController */
/* @var $model Amplifier */

$this->breadcrumbs=array(
	'功放'=>array('admin'),
	$model->deviceNum,
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'确定删删除此记录?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'classId',
		'deviceNum',
		'brand',
		'type',
		'power',
		'price',
		'isUsing',
		'buyTime',
		'supplyCompany',
	),
)); 
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
