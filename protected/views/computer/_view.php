<?php
/* @var $this ComputerController */
/* @var $data Computer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('comid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->comid), array('view', 'id'=>$data->comid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classId')); ?>:</b>
	<?php echo CHtml::encode($data->classId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deviceNum')); ?>:</b>
	<?php echo CHtml::encode($data->deviceNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyTime')); ?>:</b>
	<?php echo CHtml::encode($data->buyTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guarentee')); ?>:</b>
	<?php echo CHtml::encode($data->guarentee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplyCompany')); ?>:</b>
	<?php echo CHtml::encode($data->supplyCompany); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayer')); ?>:</b>
	<?php echo CHtml::encode($data->displayer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpu')); ?>:</b>
	<?php echo CHtml::encode($data->cpu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand')); ?>:</b>
	<?php echo CHtml::encode($data->brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memory')); ?>:</b>
	<?php echo CHtml::encode($data->memory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hardDisk')); ?>:</b>
	<?php echo CHtml::encode($data->hardDisk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isUsing')); ?>:</b>
	<?php echo CHtml::encode($data->isUsing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mac')); ?>:</b>
	<?php echo CHtml::encode($data->mac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	*/ ?>

</div>