<?php
/* @var $this ClassroomController */
/* @var $data Classroom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('classId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->classId), array('view', 'id'=>$data->classId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('className')); ?>:</b>
	<?php echo CHtml::encode($data->className); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seatNum')); ?>:</b>
	<?php echo CHtml::encode($data->seatNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examNum')); ?>:</b>
	<?php echo CHtml::encode($data->examNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bid')); ?>:</b>
	<?php echo CHtml::encode($data->bid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('more')); ?>:</b>
	<?php echo CHtml::encode($data->more); ?>
	<br />


</div>