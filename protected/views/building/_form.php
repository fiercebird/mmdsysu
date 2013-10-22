<?php
/* @var $this BuildingController */
/* @var $model Building */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'building-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bname'); ?>
		<?php echo $form->textField($model,'bname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->textField($model,'cid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->