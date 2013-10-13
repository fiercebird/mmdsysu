<?php
/* @var $this SchooltimeController */
/* @var $model Schooltime */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schooltime-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'opendate'); ?>
		<?php //echo $form->textField($model,'opendate',array('size'=>20,'maxlength'=>50)); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'attribute' => 'opendate',
				'language'=>'zh_cn',
				'options' => array(
						'showAnim' => 'fold',
						'dateFormat' => 'yy-mm-dd',
				),
			    'htmlOptions' => array(
			        'size' => '20',         // textField size
			        'maxlength' => '50',    // textField maxlength
					'value' => $model->opendate,
			    ),
			));
		?>
		&nbsp; <em>(例如: 1970-01-01) </em>
		<?php echo $form->error($model,'opendate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '修改' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->