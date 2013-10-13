<?php
/* @var $this SchooltimeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Schooltimes',
);

$this->menu=array(
	array('label'=>'Create Schooltime', 'url'=>array('create')),
	array('label'=>'Manage Schooltime', 'url'=>array('admin')),
);
?>

<h1>Schooltimes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
