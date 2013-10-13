<?php
/* @var $this AlertRuleController */
/* @var $model AlertRule */

$this->breadcrumbs=array(
	'待换设备提醒规则管理'=>array('admin'),
	'新建规则',
);

?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>