<?php
/* @var $this BuildingController */
/* @var $data Building */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bid), array('view', 'id'=>$data->bid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bname')); ?>:</b>
	<?php echo CHtml::encode($data->bname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::encode($data->cid); ?>
	<br />


</div>