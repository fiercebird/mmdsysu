<?php
/* @var $this DigitalcpuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Digitalcpus',
);

$this->menu=array(
	array('label'=>'Create Digitalcpu', 'url'=>array('create')),
	array('label'=>'Manage Digitalcpu', 'url'=>array('admin')),
);
?>

<h1>Digitalcpus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
