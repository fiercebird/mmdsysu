<?php
/* @var $this MixerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mixers',
);

$this->menu=array(
	array('label'=>'Create Mixer', 'url'=>array('create')),
	array('label'=>'Manage Mixer', 'url'=>array('admin')),
);
?>

<h1>Mixers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
