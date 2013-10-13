<?php
/* @var $this MaiNoLineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mai No Lines',
);

$this->menu=array(
	array('label'=>'Create MaiNoLine', 'url'=>array('create')),
	array('label'=>'Manage MaiNoLine', 'url'=>array('admin')),
);
?>

<h1>Mai No Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
