<?php
/* @var $this ProScreenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pro Screens',
);

$this->menu=array(
	array('label'=>'Create ProScreen', 'url'=>array('create')),
	array('label'=>'Manage ProScreen', 'url'=>array('admin')),
);
?>

<h1>Pro Screens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
