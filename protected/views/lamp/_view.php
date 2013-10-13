<?php
/* @var $this LampController */
/* @var $data Lamp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lid), array('view', 'id'=>$data->lid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classId')); ?>:</b>
	<?php echo CHtml::encode($data->classId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayerType')); ?>:</b>
	<?php echo CHtml::encode($data->displayerType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('liuming')); ?>:</b>
	<?php echo CHtml::encode($data->liuming); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('isUsing')); ?>:</b>
	<?php echo CHtml::encode($data->isUsing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onZhaodu')); ?>:</b>
	<?php echo CHtml::encode($data->onZhaodu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offZhaodu')); ?>:</b>
	<?php echo CHtml::encode($data->offZhaodu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usedTime')); ?>:</b>
	<?php echo CHtml::encode($data->usedTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplyCompany')); ?>:</b>
	<?php echo CHtml::encode($data->supplyCompany); ?>
	<br />

	*/ ?>

</div>