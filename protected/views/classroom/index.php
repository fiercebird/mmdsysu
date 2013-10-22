<?php
/* @var $this ClassroomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classrooms',
);

$this->menu=array(
	array('label'=>'Create Classroom', 'url'=>array('create')),
	array('label'=>'Manage Classroom', 'url'=>array('admin')),
);
?>

<h1>Classrooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
