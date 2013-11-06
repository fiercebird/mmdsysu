<?php
/* @var $this WeeklyChkController */
/* @var $data WeeklyChk */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('wid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->wid), array('view', 'id'=>$data->wid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::encode($data->cid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bid')); ?>:</b>
	<?php echo CHtml::encode($data->bid); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('chkDate')); ?>:</b>
	<?php echo CHtml::encode($data->chkDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

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

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampBrightness')); ?>:</b>
	<?php echo CHtml::encode($data->lampBrightness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampTime')); ?>:</b>
	<?php echo CHtml::encode($data->lampTime); ?>
	<br />

	*/ ?>

</div>