<?php
/* @var $this WeeklyChkController */
/* @var $model WeeklyChk */

$this->breadcrumbs=array(
		'周检登记'=>array('create'),
);

$this->menu=array(
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>