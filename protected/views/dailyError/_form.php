<?php
/* @var $this DailyErrorController */
/* @var $model DailyError */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'daily-error-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'handler'); ?>
		<?php echo $form->textField($model,'handler',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'handler'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'did'); ?>
		<?php echo $form->textField($model,'did',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'did'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'device'); ?>
		<?php echo $form->textField($model,'device',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'device'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->