<?php
/* @var $this WeekSurveyController */
/* @var $model WeekSurvey */
/* @var $form CActiveForm */
?>
<style>
table {
	text-align: center;
	margin: 0 auto;
	border-collapse:collapse;
	border-color:black;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'week-survey-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<table width="90%" border="1" cellpadding="1" cellspacing="1"> 
	<tr>
	<td width="15%">校区</td>
	<td width="15%">调查课室样本总量</td>
	<td width="10%">记录年份</td>
	<td width="10%">记录周期</td>
	<td width="10%">记录人</td>
	<td></td>
	</tr>
	<tr>
	<td width="15%">
	<select name="WeekSurvey[cid]" id="WeekSurvey_cid" style="width:80%;">
	<option value="1">东校区</option>
	<option value="2">南校区</option>
	<option value="3">北校区</option>
	<option value="4">珠海校区</option>
	</select>
	</td>
	<td width="15%"><?php echo $form->textField($model,'survey_sample',array('size'=>10,'maxlength'=>10, 'style' => 'border-width:1px;border-style:solid;width:90%;',)); ?></td>
	<td width="10%"><?php echo $form->dropDownList($model, 'survey_year', MonthSurvey::getYearOptions(), array('options' => array( date('Y') => array('selected' => 'selected')))); ?></td>
	<td width="10%"><?php echo $form->textField($model,'survey_week',array('size'=>10,'maxlength'=>10, 'value' => Schooltime::getCurWeek(), 'style' => 'border-width:1px;border-style:solid;width:90%;',)); ?></td>
	<td width="10%"><?php echo $form->textField($model,'record_man',array('size'=>20,'maxlength'=>20, 'value' => Yii::app()->user->getState('name'),  'style' => 'border-width:1px;border-style:solid;width:90%;',)); ?></td>
	<td></td>
	</tr>
	</table>
	
	<p>&nbsp;</p>
	
	<table width="90%" border="1" cellpadding="1" cellspacing="1">
	<tr>
	<td colspan="3">投影机</td>
	<td colspan="3">投影幕</td>
	<td colspan="3">桌面控制系统</td>
	<td colspan="3">台式电脑</td>
	<td colspan="3">读U盘、移动硬盘</td>
	</tr>
	
	<tr>
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>	
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>	
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>
	</tr>
	
	<tr>
    <td ><?php echo $form->textField($model,'projector_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'projector_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'projector_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    
    <td ><?php echo $form->textField($model,'screen_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'screen_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'screen_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    
    <td ><?php echo $form->textField($model,'desksystem_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'desksystem_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'desksystem_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    
    <td ><?php echo $form->textField($model,'computer_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'computer_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'computer_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
   
    <td ><?php echo $form->textField($model,'rom_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'rom_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'rom_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    </tr>
    
	<tr>
	<td colspan="3">笔记本电脑切换方便性</td>
	<td colspan="3">有线话筒</td>
	<td colspan="3">无线话筒</td>
	<td colspan="3">&nbsp;</td>
	<td colspan="3">&nbsp;</td>
	</tr>
	
	<tr>
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>	
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>
	
	<td >正常</td>
	<td >不正常</td>
	<td >已处理</td>	
	
	<td colspan="3">&nbsp;</td>
	<td colspan="3">&nbsp;</td>	
	</tr>
	
    <tr>
    <td ><?php echo $form->textField($model,'notebook_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'notebook_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'notebook_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
   
    <td ><?php echo $form->textField($model,'hasline_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'hasline_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'hasline_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
   
    <td ><?php echo $form->textField($model,'noline_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'noline_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
    <td ><?php echo $form->textField($model,'noline_fix',array('size'=>10,'maxlength'=>10, 'style' => 'border-style:none;height:100%;width:100%;',)); ?></td>
   
    <td colspan="3">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
	</tr>
	
    <tr>
    <td colspan="15">说明：录入数据为调查问卷的数目，为整数（例：投影机”好“项下填写所有问卷中认为投影机好的问卷数）</td>
    </tr>
    </table>
	
	<p>&nbsp;</p>
	
	<table cellpadding="5" width="90%" border="1">
	<tr>
	<td align="left"><?php echo $form->label($model, 'class_status', array('style' => 'border-style:none;height:30px;width:100%;padding-top:3%;padding-bottom:3%;',));?> </td>
	<td align="left"><?php echo $form->label($model, 'daily_status', array('style' => 'border-style:none;height:30px;width:100%;padding-top:3%;padding-bottom:3%;',));?> </td>
	</tr>
	<tr>
	<td width="50%"><?php echo $form->textArea($model, 'class_status', array('style' => 'border-style:none;height:120px;width:100%;',));?></td>
	<td width="50%"><?php echo $form->textArea($model, 'daily_status', array('style' => 'border-style:none;height:120px;width:100%;',));?></td>
	</tr>
	</table>
	
	<table width="90%" align="center">
    <tr>
    <td width="100px">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('value' => '录入数据')); ?>
	</td>
	<td></td>
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->