<?php
/* @var $this VoiceBoxController */
/* @var $model VoiceBox */

$this->breadcrumbs=array(
	'Voice Boxes'=>array('index'),
	$model->vid=>array('view','id'=>$model->vid),
	'Update',
);

$this->menu=array(
	array('label'=>'List VoiceBox', 'url'=>array('index')),
	array('label'=>'Create VoiceBox', 'url'=>array('create')),
	array('label'=>'View VoiceBox', 'url'=>array('view', 'id'=>$model->vid)),
	array('label'=>'Manage VoiceBox', 'url'=>array('admin')),
);
?>

<h1>Update VoiceBox <?php echo $model->vid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>