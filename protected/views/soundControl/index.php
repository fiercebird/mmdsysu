<?php
/* @var $this SoundControlController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sound Controls',
);

$this->menu=array(
	array('label'=>'Create SoundControl', 'url'=>array('create')),
	array('label'=>'Manage SoundControl', 'url'=>array('admin')),
);
?>

<h1>Sound Controls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
