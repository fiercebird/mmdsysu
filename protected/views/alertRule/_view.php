<?php
/* @var $this AlertRuleController */
/* @var $data AlertRule */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('arid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->arid), array('view', 'id'=>$data->arid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tittle')); ?>:</b>
	<?php echo CHtml::encode($data->tittle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device')); ?>:</b>
	<?php echo CHtml::encode($data->device); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field')); ?>:</b>
	<?php echo CHtml::encode($data->field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isBig')); ?>:</b>
	<?php echo CHtml::encode($data->isBig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rule')); ?>:</b>
	<?php echo CHtml::encode($data->rule); ?>
	<br />


</div>