<?php
/* @var $this ComputerController */
/* @var $model Computer */

$this->breadcrumbs=array(
	'电脑'=>array('admin'),
	$model->deviceNum,
);

$this->menu=array(
	array('label'=>'添加记录', 'url'=>array('create')),
	array('label'=>'*更新此记录', 'url'=>array('update', 'id'=>$model->comid)),
	array('label'=>'*删除此记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->comid),'confirm'=>'确定删除此电脑记录?')),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deviceNum',
		'type',
		'buyTime',
		'guarentee',
		'supplyCompany',
		'price',
		'displayer',
		'cpu',
		'brand',
		'memory',
		'hardDisk',
		'isUsing',
		'mac',
		'ip',
	),
));
echo '<br />';
echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
 ?>
