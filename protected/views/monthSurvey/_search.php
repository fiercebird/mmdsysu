<?php
/* @var $this MonthSurveyController */
/* @var $model MonthSurvey */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<table>
	<tr>
		<td><?php echo "选择年份";?></td>
		<td><?php echo $form->textField($model,'survey_year',array('size'=>10,'maxlength'=>10)); ?></td>
		<td><?php echo "选择月份";?></td>
		<td><?php echo $form->dropDownList($model, 'survey_month', MonthSurvey::getMonthOptions())?></td>
		<td><?php echo CHtml::submitButton('查询'); ?></td>
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->