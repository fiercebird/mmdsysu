<?php
/* @var $this MixerController */
/* @var $model Mixer */

$this->breadcrumbs=array(
	'混音器'=>array('admin'),
	$model->deviceNum,
);

$this->menu=array(
	array('label'=>'新建记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->mid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mid),'confirm'=>'确定删除此记录?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deviceNum',
		'brand',
		'power',
		'buyTime',
		'supplyCompany',
		'type',
		'price',
		'isUsing',
                'guarentee'
	),
)); 
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
