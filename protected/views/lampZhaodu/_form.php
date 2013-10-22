<?php
/* @var $this LampZhaoduController */
/* @var $model LampZhaodu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lamp-zhaodu-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'zhaodu'); ?>
		<?php echo $form->textField($model,'zhaodu',array('size'=>10,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '保存'); ?>
                <?php echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1', 'lid' => $lid)).'"')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->