<?php
/* @var $this MixerController */
/* @var $data Mixer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mid), array('view', 'id'=>$data->mid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classId')); ?>:</b>
	<?php echo CHtml::encode($data->classId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deviceNum')); ?>:</b>
	<?php echo CHtml::encode($data->deviceNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand')); ?>:</b>
	<?php echo CHtml::encode($data->brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power')); ?>:</b>
	<?php echo CHtml::encode($data->power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyTime')); ?>:</b>
	<?php echo CHtml::encode($data->buyTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplyCompany')); ?>:</b>
	<?php echo CHtml::encode($data->supplyCompany); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isUsing')); ?>:</b>
	<?php echo CHtml::encode($data->isUsing); ?>
	<br />

	*/ ?>

</div>