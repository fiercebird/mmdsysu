<?php
/* @var $this WeekSurveyController */
/* @var $data WeekSurvey */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::encode($data->cid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_sample')); ?>:</b>
	<?php echo CHtml::encode($data->survey_sample); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_year')); ?>:</b>
	<?php echo CHtml::encode($data->survey_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_week')); ?>:</b>
	<?php echo CHtml::encode($data->survey_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_man')); ?>:</b>
	<?php echo CHtml::encode($data->record_man); ?>
	<br />


</div>