<?php
/* @var $this WeekSurveyController */
/* @var $model WeekSurvey */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cid'); ?>
		<?php echo $form->textField($model,'cid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'survey_sample'); ?>
		<?php echo $form->textField($model,'survey_sample',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'survey_year'); ?>
		<?php echo $form->textField($model,'survey_year',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'survey_week'); ?>
		<?php echo $form->textField($model,'survey_week',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'record_man'); ?>
		<?php echo $form->textField($model,'record_man',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projector_gd'); ?>
		<?php echo $form->textField($model,'projector_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projector_bd'); ?>
		<?php echo $form->textField($model,'projector_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'screen_gd'); ?>
		<?php echo $form->textField($model,'screen_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'screen_bd'); ?>
		<?php echo $form->textField($model,'screen_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desksystem_gd'); ?>
		<?php echo $form->textField($model,'desksystem_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desksystem_bd'); ?>
		<?php echo $form->textField($model,'desksystem_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'computer_gd'); ?>
		<?php echo $form->textField($model,'computer_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'computer_bd'); ?>
		<?php echo $form->textField($model,'computer_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rom_gd'); ?>
		<?php echo $form->textField($model,'rom_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'rom_bd'); ?>
		<?php echo $form->textField($model,'rom_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notebook_gd'); ?>
		<?php echo $form->textField($model,'notebook_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notebook_bd'); ?>
		<?php echo $form->textField($model,'notebook_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hasline_gd'); ?>
		<?php echo $form->textField($model,'hasline_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'hasline_bd'); ?>
		<?php echo $form->textField($model,'hasline_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noline_gd'); ?>
		<?php echo $form->textField($model,'noline_gd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noline_bd'); ?>
		<?php echo $form->textField($model,'noline_bd',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->