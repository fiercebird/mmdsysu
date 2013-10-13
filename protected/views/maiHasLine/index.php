<?php
/* @var $this MaiHasLineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mai Has Lines',
);

$this->menu=array(
	array('label'=>'Create MaiHasLine', 'url'=>array('create')),
	array('label'=>'Manage MaiHasLine', 'url'=>array('admin')),
);
?>

<h1>Mai Has Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
