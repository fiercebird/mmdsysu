<?php
/* @var $this ProjectorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projectors',
);

$this->menu=array(
	array('label'=>'Create Projector', 'url'=>array('create')),
	array('label'=>'Manage Projector', 'url'=>array('admin')),
);
?>

<h1>Projectors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
