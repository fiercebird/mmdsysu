<?php
/* @var $this MidControlController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mid Controls',
);

$this->menu=array(
	array('label'=>'Create MidControl', 'url'=>array('create')),
	array('label'=>'Manage MidControl', 'url'=>array('admin')),
);
?>

<h1>Mid Controls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
