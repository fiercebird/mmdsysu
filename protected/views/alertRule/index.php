<?php
/* @var $this AlertRuleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alert Rules',
);

$this->menu=array(
	array('label'=>'Create AlertRule', 'url'=>array('create')),
	array('label'=>'Manage AlertRule', 'url'=>array('admin')),
);
?>

<h1>Alert Rules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
