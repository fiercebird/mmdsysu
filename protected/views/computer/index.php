<?php
/* @var $this ComputerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Computers',
);

$this->menu=array(
	array('label'=>'Create Computer', 'url'=>array('create')),
	array('label'=>'Manage Computer', 'url'=>array('admin')),
);
?>

<h1>Computers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
