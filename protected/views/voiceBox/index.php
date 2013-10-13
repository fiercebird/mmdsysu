<?php
/* @var $this VoiceBoxController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Voice Boxes',
);

$this->menu=array(
	array('label'=>'Create VoiceBox', 'url'=>array('create')),
	array('label'=>'Manage VoiceBox', 'url'=>array('admin')),
);
?>

<h1>Voice Boxes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
