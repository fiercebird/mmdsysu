<?php
/* @var $this MonthSurveyController */
/* @var $model MonthSurvey */
/* @var $form CActiveForm */
?>

<style>
table{
      text-align:center;
	  margin:0 auto;
	  border-collapse:collapse;
	  border-color:black;
}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'month-survey-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<table width="90%"  border="1px" cellpadding="1" cellspacing="1"> 
	<tr>
	<td width="15%">校区</td>
	<td width="15%">灯泡照度样本总量</td>
	<td width="15%">调查课室样本总量</td>
	<td width="10%">记录年份</td>
	<td width="10%">记录月份</td>
	<td width="10%">记录人</td>
	<td></td>
	</tr>
	
	<tr>
	<td width="15%">
	<select name="MonthSurvey[cid]" id="MonthSurvey_cid" style="width: 80%;">
	<option value="1">东校区</option>
	<option value="2">南校区</option>
	<option value="3">北校区</option>
	<option value="4">珠海校区</option>
	</select>
	</td>
	<td width="15%"><?php echo $form->textField($model,'zhaodu_sample',array('size'=>10,'maxlength'=>10, 'style' => 'border-width:1px; border-style:solid;width: 90%;"',)); ?></td>
	<td width="15%"><?php echo $form->textField($model,'survey_sample',array('size'=>10,'maxlength'=>10, 'style' => 'border-width:1px;border-style:solid;width: 90%;"',)); ?></td>
	<td width="10%"><?php echo $form->dropDownList($model, 'survey_year', MonthSurvey::getYearOptions(), array('options' => array( date('Y') => array('selected' => 'selected')))); ?></td>
	<td width="10%"><?php echo $form->dropDownList($model, 'survey_month', MonthSurvey::getMonthOptions(), array('options'=>array( date("n") => array('selected' => 'selected')))); ?></td>
	<td width="10%"><?php echo $form->textField($model,'record_man',array('size'=>20,'maxlength'=>20, 'value' => Yii::app()->user->getState('name'),  'style' => 'border-width:1px;border-style:solid;width: 90%;"',)); ?></td>
	<td></td>
	</tr>
	</table>
	
	<p>&nbsp;</p>
	
	<table width="90%" border="1" cellpadding="1" cellspacing="1">
	<tr>
	<td colspan="4">投影机照度</td>
	<td colspan="4">桌面控制系统</td>
	<td colspan="4">投影机</td>
	<td colspan="4">投影幕</td>
	<td colspan="4">台式电脑(含上网、视音频)</td>
	</tr>
	
	<tr>
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	</tr>
	
	<tr>
    <td width="5%"><?php echo $form->textField($model,'pg_zhaodu_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'pg_zhaodu_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'pg_zhaodu_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'pg_zhaodu_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'desksystem_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'desksystem_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'desksystem_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'desksystem_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'projector_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'projector_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'projector_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'projector_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'screen_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'screen_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'screen_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'screen_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'computer_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'computer_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'computer_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'computer_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    </tr>
   
	<tr>
	<td colspan="4">读U盘、移动硬盘</td>
	<td colspan="4">笔记本电脑切换方便性</td>
	<td colspan="4">有线话筒</td>
	<td colspan="4">电话报障受理</td>
	<td colspan="4">服务质量</td>
	</tr>
	
	<tr>
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	</tr>
	
	<tr>
    <td width="5%"><?php echo $form->textField($model,'rom_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'rom_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'rom_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'rom_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'notebook_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'notebook_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'notebook_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'notebook_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'hasline_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'hasline_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'hasline_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'hasline_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'phone_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'phone_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'phone_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'phone_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
   
    <td width="5%"><?php echo $form->textField($model,'service_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'service_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'service_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'service_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    </tr>
    
	<tr>
	<td colspan="4">排障速度是否满意</td>
	<td colspan="4">无线话筒</td>
	<td colspan="4">&nbsp;</td>
	<td colspan="4">&nbsp;</td>
	<td colspan="4">&nbsp;</td>
	</tr>
	
	<tr>
	<td colspan="2">满意</td>
	<td colspan="2">不满意</td>
	
	<td width="5%">很好</td>
	<td width="5%">好</td>
	<td width="5%">中</td>
	<td width="5%">差</td>
	
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	</tr>
	
    <tr>
    <td colspan="2"><?php echo $form->textField($model,'repair_y',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td colspan="2"><?php echo $form->textField($model,'repair_n',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td width="5%"><?php echo $form->textField($model,'noline_vgd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'noline_gd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'noline_md',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    <td width="5%"><?php echo $form->textField($model,'noline_bd',array('size'=>10,'maxlength'=>10, 'style' => 'border:none;height:100%;width:100%;',)); ?></td>
    
    <td colspan="4">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    </tr>
    
    <tr>
    <td colspan="20">说明：录入数据为调查问卷的数目，为整数（例：投影机”好“项下填写所有问卷中认为投影机好的问卷数）其中投影机照度&gt;300时为很好，250-300为好，200-250为中，&lt;200为差</td>
    </tr>
    </table>
	
	<p>&nbsp;</p>
	
	<table width="90%" cellpadding="1" cellspacing="1">
	<tr>
	<td width="12%"><?php echo $form->label($model, 'status');?></td>
	<td align="left"><?php echo $form->textArea($model, 'status', array('style' => 'border-width:1px;border-style:solid;height:100px;width:80%;',));?></td>
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