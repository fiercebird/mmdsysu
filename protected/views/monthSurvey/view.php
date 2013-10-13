<?php
/* @var $this MonthSurveyController */
/* @var $model MonthSurvey */
$this->breadcrumbs=array(
		'月_调查统计结果',
);

$this->menu=array(
);
?>
<style>
table{
	  border-collapse:collapse;
	  border-color:black;
}
</style>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
)); ?>
	<table style="float:left;">
	<tr>
		<td><?php echo '选择年份';?></td>
		<td><?php echo $form->dropDownList($model, 'survey_year', MonthSurvey::getYearOptions(), array('options' => array( date('Y') => array('selected' => 'selected')))); ?></td>
		<td><?php echo '选择月份';?></td>
		<td><?php echo $form->dropDownList($model, 'survey_month', MonthSurvey::getMonthOptions());	?></td>
		<td><?php echo CHtml::submitButton('查询'); ?></td>
		<td><?php if(!$isfound) {?><em>该月份没有相应的数据!</em><?php }?></td>
	</tr>
	</table>
	
	<div style="float:right; width:200px;margin-right:50px;">
	<table width="100%">
	<tr>
	<td width="5%">
	<a href="<?php if($ischart) { ?>?r=monthSurvey/Excel&month=<?php echo $month;?>&year=<?php echo $year; }else echo "?r=monthSurvey/view";?>"><?php echo CHtml::image("images/excel.png", 'excel', array("width" => '23', 'height' => '23',"border"=>"0px")) ?></a>
	</td>
	<td width="50%">
	Excel文件导出
	</td>
</tr><tr><td colspan="2" style="font-size:10;">(使用WPS可能会有图片重叠问题，请使用office 2003以上版本查看）
	</td>	</tr>
	</table>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- search-form -->
<div>
    <table width="90%" style="text-align:center;" align="center" border="1px">
    <tr>
    <td width="10%">东校区记录人</td>
    <td width="10%">南校区记录人</td>
    <td width="10%">北校区记录人</td>
    <td width="10%">珠海校区记录人</td>
    <td></td>
    </tr>
	
    <tr>
    <td width="10%"><?php if(is_object($east))echo CHtml::textField('', $east->record_man, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($south))echo CHtml::textField('', $south->record_man, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($north))echo CHtml::textField('', $north->record_man, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->record_man, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td></td>
    </tr>
    </table>
	
	<p>&nbsp;</p>
	
    <table width="90%" style="text-align:center;" align="center" border="1px">
    <tr>
    <td width="10%">调查项目</td>  
    <td width="9%">课室样本量</td>
    <td width="9%">灯泡样本量</td> 
    <td colspan="4">投影机照度</td>
    <td colspan="4">桌面控制系统</td>
    <td colspan="4">投影机</td>
    <td colspan="4">投影幕</td>
    <td colspan="4">台式电脑(含上网、视音频)</td>
    <td colspan="2">排障速度是否满意</td>
    </tr>
	
    <tr>
    <td width="10%">选项</td>
    <td width="9%"></td>
    <td width="9%"></td>      
    
    <td width="3%">很好</td>
    <td width="3%">好</td>
    <td width="3%">中</td>
    <td width="3%">差</td>
   
    <td width="3%">很好</td>
    <td width="3%">好</td>
    <td width="3%">中</td>
    <td width="3%">差</td>
    
    <td width="3%">很好</td>
    <td width="3%">好</td>
    <td width="3%">中</td>
    <td width="3%">差</td>
    
    <td width="3%">很好</td>
    <td width="3%">好</td>
    <td width="3%">中</td>
    <td width="3%">差</td>
    
    <td width="3%">很好</td>
    <td width="3%">好</td>
    <td width="3%">中</td>
    <td width="3%">差</td>
   
    <td width="6%">满意</td>
    <td width="6%">不满意</td>
    </tr>
    
    <tr>
    <td width="10%">东校区</td>
    <td width="9%"><?php if(is_object($east))echo CHtml::textField('', $east->survey_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="9%"><?php if(is_object($east))echo CHtml::textField('', $east->zhaodu_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($east, 'pg_zhaodu_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($east, 'pg_zhaodu_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($east, 'pg_zhaodu_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($east, 'pg_zhaodu_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'desksystem_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'desksystem_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'desksystem_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'desksystem_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'projector_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'projector_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'projector_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'projector_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'screen_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'screen_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'screen_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'screen_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'computer_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'computer_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'computer_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'computer_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="6%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'repair_y'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="6%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'repair_n'),array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    
    <tr>
    <td width="10%">南校区</td>
    <td width="9%"><?php if(is_object($south))echo CHtml::textField('', $south->survey_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="9%"><?php if(is_object($south))echo CHtml::textField('', $south->zhaodu_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>   
    
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($south, 'pg_zhaodu_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($south,'pg_zhaodu_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($south,'pg_zhaodu_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($south,'pg_zhaodu_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'desksystem_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'desksystem_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'desksystem_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'desksystem_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'projector_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'projector_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'projector_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'projector_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'screen_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'screen_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'screen_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'screen_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'computer_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'computer_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'computer_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'computer_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="6%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'repair_y'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="6%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'repair_n'),array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    
    <tr>
    <td width="10%">北校区</td>
    <td width="9%"><?php if(is_object($north))echo CHtml::textField('', $north->survey_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="9%"><?php if(is_object($north))echo CHtml::textField('', $north->zhaodu_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>   
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($north, 'pg_zhaodu_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($north,'pg_zhaodu_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($north,'pg_zhaodu_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($north,'pg_zhaodu_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'desksystem_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'desksystem_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'desksystem_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'desksystem_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'projector_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'projector_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'projector_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'projector_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'screen_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'screen_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'screen_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'screen_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'computer_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'computer_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'computer_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'computer_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="6%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'repair_y'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="6%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'repair_n'),array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
	
    <tr>
    <td width="10%">珠海校区</td>
    <td width="9%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->survey_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="9%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->zhaodu_sample, array('style' => "border-style:none;height:100%;width:100%"));?></td>   
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($zhuhai, 'pg_zhaodu_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($zhuhai,'pg_zhaodu_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($zhuhai,'pg_zhaodu_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getZhaoduPercentage($zhuhai,'pg_zhaodu_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'desksystem_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'desksystem_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'desksystem_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'desksystem_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'projector_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'projector_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'projector_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'projector_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'screen_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'screen_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'screen_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'screen_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'computer_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'computer_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'computer_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'computer_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="6%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'repair_y'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="6%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'repair_n'),array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    </table>
    
	<p>&nbsp;</p>
	
	<table width="90%" style="text-align:center;" align="center" border="1px">
    <tr>
    <td width="10%">调查项目</td>
    <td colspan="4">读U盘、移动硬盘</td>
    <td colspan="4">笔记本电脑切换方便性</td>
    <td colspan="4">有线话筒</td>
    <td colspan="4">电话报障受理</td>
    <td colspan="4">服务质量</td>
    <td colspan="4">无线话筒</td>
    </tr>
	
    <tr>
	<td width="10%">选项</td>
	
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
    
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
   
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
    
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
    
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
    
    <td width="3%">很好</td>
    <td width="4%">好</td>
    <td width="4%">中</td>
    <td width="4%">差</td>
    </tr>
   
    <tr>
    <td width="10%">东校区</td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'rom_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'rom_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'rom_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'rom_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'notebook_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'notebook_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'notebook_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'notebook_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'hasline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'hasline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'hasline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'hasline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'phone_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'phone_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'phone_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'phone_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'service_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'service_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'service_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'service_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'noline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'noline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'noline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($east))echo CHtml::textField('', MonthSurvey::getPercentage($east, 'noline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    
    <tr>
	<td width="10%">南校区</td>
    <td width="3%"><?php if(is_object($south))if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'rom_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'rom_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'rom_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'rom_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'notebook_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'notebook_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'notebook_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'notebook_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'hasline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'hasline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'hasline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'hasline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'phone_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'phone_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'phone_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'phone_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'service_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'service_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'service_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'service_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'noline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'noline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'noline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($south))echo CHtml::textField('', MonthSurvey::getPercentage($south, 'noline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
	
	<tr>
    <td width="10%">北校区</td>
   
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'rom_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'rom_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'rom_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'rom_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'notebook_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'notebook_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'notebook_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'notebook_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'hasline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'hasline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'hasline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'hasline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'phone_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'phone_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'phone_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'phone_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'service_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'service_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'service_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'service_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'noline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'noline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'noline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($north))echo CHtml::textField('', MonthSurvey::getPercentage($north, 'noline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    
	<tr>
    <td width="10%">珠海校区</td>
    
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'rom_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'rom_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'rom_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'rom_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'notebook_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'notebook_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'notebook_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'notebook_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'hasline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'hasline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'hasline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'hasline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'phone_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'phone_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'phone_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'phone_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'service_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'service_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'service_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'service_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
   
    <td width="3%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'noline_vgd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'noline_gd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'noline_md'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    <td width="4%"><?php if(is_object($zhuhai))echo CHtml::textField('', MonthSurvey::getPercentage($zhuhai, 'noline_bd'), array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    </table>
    
	<p>&nbsp;</p>
	
    <table width="90%" style="text-align:center;" align="center" border="1px">
    <tr><td colspan="2">问题处理及反馈情况汇总</td></tr>
	
    <tr>
    <td width="10%">东校区</td> 
    <td width="90%"><?php if(is_object($east))echo CHtml::textArea('', $east->status, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
	
    <tr>
    <td width="10%">南校区</td>
    <td width="90%"><?php if(is_object($south))echo CHtml::textArea('', $south->status, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
	
    <tr>
    <td width="10%">北校区</td>
    <td width="90%"><?php if(is_object($north))echo CHtml::textArea('', $north->status, array('style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
	
    <tr>
    <td width="10%">珠海校区</td>
    <td width="90%"><?php if(is_object($zhuhai))echo CHtml::textArea('', $zhuhai->status, array('readonly' => 'readonly', 'style' => "border-style:none;height:100%;width:100%"));?></td>
    </tr>
    </table>
</div>    
<style>
.chart
{
	border-width:1px;
	border-style:solid;
	height:100%;
	width:100%;	
}
</style>

<span>&nbsp;</span>
<table width="90%" style="border: medium double #666666; text-align:center" align="center">
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=pg_zhaodu_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=desksystem_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=projector_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=screen_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=computer_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=repair_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=rom_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=notebook_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=hasline_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=phone_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=service_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=monthSurvey/chart&month='.$month.'&year='.$year.'&attr=noline_'.'">';?>
</td>
</tr>
</table>

