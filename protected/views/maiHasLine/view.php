<?php
/* @var $this MaiHasLineController */
/* @var $model MaiHasLine */

$this->breadcrumbs=array(
	'有线麦'=>array('admin'),
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
		//'mid',
		//'classId',
		'brand',
		'deviceNum',
		'type',
		'price',
		'supplyCompany',
		'buyTime',
		'isUsing',
	),
)); 
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
