<?php
/* @var $this ProScreenController */
/* @var $data ProScreen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pid), array('view', 'id'=>$data->pid)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('supplyCompany')); ?>:</b>
	<?php echo CHtml::encode($data->supplyCompany); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyTime')); ?>:</b>
	<?php echo CHtml::encode($data->buyTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isUsing')); ?>:</b>
	<?php echo CHtml::encode($data->isUsing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isAuto')); ?>:</b>
	<?php echo CHtml::encode($data->isAuto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('what')); ?>:</b>
	<?php echo CHtml::encode($data->what); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guarentee')); ?>:</b>
	<?php echo CHtml::encode($data->guarentee); ?>
	<br />

	*/ ?>

</div>