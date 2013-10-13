<?php
/* @var $this DailyChkController */
/* @var $model DailyChk */

$this->breadcrumbs=array(
	'日检登记'=>array('create'),
);

$this->menu=array(
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>