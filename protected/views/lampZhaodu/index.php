<?php
/* @var $this LampZhaoduController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lamp Zhaodus',
);

$this->menu=array(
	array('label'=>'Create LampZhaodu', 'url'=>array('create')),
	array('label'=>'Manage LampZhaodu', 'url'=>array('admin')),
);
?>

<h1>Lamp Zhaodus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
