<?php
/* @var $this LampController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lamps',
);

$this->menu=array(
	array('label'=>'Create Lamp', 'url'=>array('create')),
	array('label'=>'Manage Lamp', 'url'=>array('admin')),
);
?>

<h1>Lamps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
