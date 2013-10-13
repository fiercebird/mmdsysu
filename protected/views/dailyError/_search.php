<?php
/* @var $this DailyErrorController */
/* @var $model DailyError */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<table id="schTbl_1">
	<tr>
		<td>
		<?php echo $form->label($model,'bid'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model, 'bid',  Building::model()->getBuildingOptions())?>
		</td>
		<td>	
		<?php echo $form->label($model,'cid'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model, 'cid',  Campus::model()->getCampusOptions())?>
		</td>
		<td>
		<?php echo $form->label($model,'search_week'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model, 'week', DailyChk::getWeekOptions()); ?>
		</td>
		<td>
		<?php echo $form->label($model,'state'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model, 'state', DailyError::getStateOptions());?>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $form->label($model,'search_classroom'); ?>
		</td>
		<td>
		<?php echo $form->textField($model,'search_classroom',array('size'=>5,'maxlength'=>10)); ?>
		</td>
		<td>
		<?php echo $form->label($model,'search_date'); ?>
		</td>
		<td>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'attribute' => 'chkDate',
				'language'=>'zh_cn',
				'options' => array(
						'showAnim' => 'fold',
						'dateFormat' => 'yy-mm-dd',
				),
			    'htmlOptions' => array(
			        'size' => '10',         // textField size
			        'maxlength' => '10',    // textField maxlength
			    ),
			));
		?>
		</td>
		<td>
		<?php echo $form->label($model,'search_register'); ?>
		</td>
		<td>
		<?php echo $form->textField($model,'register',array('size'=>10,'maxlength'=>50)); ?>
		</td>
		<td>
		<?php echo $form->label($model,'handler'); ?>
		</td>
		<td>
		<?php echo $form->textField($model,'handler',array('size'=>10,'maxlength'=>50)); ?>
		</td>
		</tr>
	<tr>
	<td>
	<?php echo $form->label($model,'device'); ?>
	</td>
	<td>
	<?php echo $form->textField($model,'device',array('size'=>10,'maxlength'=>50)); ?>
	</td>
	<td>
	&nbsp;
	</td>
		<td>
			<div id="schSub">
			<?php echo CHtml::submitButton('Search', array('value' => '筛选')); ?>
			</div>
		</td>
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
