<?php
/* @var $this WeeklyErrorController */
/* @var $model WeeklyError */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weekly-error-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->textField($model,'cid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bid'); ?>
		<?php echo $form->textField($model,'bid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'bid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classId'); ?>
		<?php echo $form->textField($model,'classId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'classId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'handler'); ?>
		<?php echo $form->textField($model,'handler',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'handler'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wid'); ?>
		<?php echo $form->textField($model,'wid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wid'); ?>
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