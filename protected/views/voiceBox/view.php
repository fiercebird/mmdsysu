<?php
/* @var $this VoiceBoxController */
/* @var $model VoiceBox */

$this->breadcrumbs=array(
	'音箱'=>array('admin'),
	$model->deviceNum,
);

$this->menu=array(
	array('label'=>'添加记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->vid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vid),'confirm'=>'确定删除此记录?')),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deviceNum',
		'brand',
		'type',
		'size',
		'price',
		'isUsing',
		'buyTime',
		'supplyCompany',
		'guarentee',
	),
)); 
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
