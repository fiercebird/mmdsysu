<?php
/* @var $this DailyChkController */
/* @var $data DailyChk */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('did')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->did), array('view', 'id'=>$data->did)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classId')); ?>:</b>
	<?php echo CHtml::encode($data->classId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('register')); ?>:</b>
	<?php echo CHtml::encode($data->register); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('week')); ?>:</b>
	<?php echo CHtml::encode($data->week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chkTime')); ?>:</b>
	<?php echo CHtml::encode($data->chkTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chkDate')); ?>:</b>
	<?php echo CHtml::encode($data->chkDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discRom')); ?>:</b>
	<?php echo CHtml::encode($data->discRom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usb')); ?>:</b>
	<?php echo CHtml::encode($data->usb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patch')); ?>:</b>
	<?php echo CHtml::encode($data->patch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voice')); ?>:</b>
	<?php echo CHtml::encode($data->voice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('net')); ?>:</b>
	<?php echo CHtml::encode($data->net); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('virus')); ?>:</b>
	<?php echo CHtml::encode($data->virus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noteBook')); ?>:</b>
	<?php echo CHtml::encode($data->noteBook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mid')); ?>:</b>
	<?php echo CHtml::encode($data->mid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maiHasLine')); ?>:</b>
	<?php echo CHtml::encode($data->maiHasLine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maiNoLine')); ?>:</b>
	<?php echo CHtml::encode($data->maiNoLine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proScreen')); ?>:</b>
	<?php echo CHtml::encode($data->proScreen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projector')); ?>:</b>
	<?php echo CHtml::encode($data->projector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amplifier')); ?>:</b>
	<?php echo CHtml::encode($data->amplifier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stage')); ?>:</b>
	<?php echo CHtml::encode($data->stage); ?>
	<br />

	*/ ?>

</div>