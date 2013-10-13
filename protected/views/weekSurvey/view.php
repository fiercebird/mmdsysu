<?php
/* @var $this WeekSurveyController */
/* @var $model WeekSurvey */
$this->breadcrumbs=array(
		'周_调查统计结果查询'
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
		<td><?php echo '选择周份';?></td>
		<td><?php echo $form->textField($model,'survey_week',array('size'=>8,'maxlength'=>10, 'value' => Schooltime::getCurWeek()));	?></td>
		<td><?php echo CHtml::submitButton('查询'); ?></td>
		<td><?php if(isset($isfound) && !$isfound) {;?><em>该周次没有相应的数据!</em><?php }?></td>
	</tr>
	</table>
	
	<div style="float:right; width:200px;margin-right:50px;">
	<table width="100%">
	<tr>
	<td width="5%">
	<a href="<?php if($ischart) { ?>?r=weekSurvey/Excel&week=<?php echo $week;?>&year=<?php echo $year; }else echo "?r=weekSurvey/view";?>"><?php echo CHtml::image("images/excel.png", 'excel', array("width" => '23', 'height' => '23',"border"=>"0px")) ?></a>
	</td>
	<td width="50%">
	Excel文件导出
	</td>
	</tr>
	<tr>
	<td colspan="2" style="font-size:10;">
	(使用WPS可能会有图片重叠问题，请使用office 2003以上版本查看）
	</td>
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
    <td width="10%"><?php if(is_object($east))echo CHtml::textField('', $east->record_man, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($south))echo CHtml::textField('', $south->record_man, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($north))echo CHtml::textField('', $north->record_man, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="10%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->record_man, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td></td>
    </tr>
    </table>
	
	<p>&nbsp;</p>
	
	<table width="90%" style="text-align:center;" align="center" border="1px">
    <tr>
    <td width="10%">调查项目</td>   
    <td width="6%">样本量</td>   
    <td colspan="3">桌面控制系统</td>
    <td colspan="3">投影机</td>
    <td colspan="3">投影幕</td>
    <td colspan="3">台式电脑(含上网、视音频)</td>
    </tr>
	
    <tr>
    <td width="10%">选项</td>
    <td width="6%"></td>   
   
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>	
    
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>	
   
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>		
    
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>	
    </tr>
   
    <tr>
    <td width="10%">东校区</td>
    <td width="6%"><?php if(is_object($east))echo CHtml::textField('', $east->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'desksystem_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'desksystem_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'desksystem_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'projector_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'projector_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'projector_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'screen_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'screen_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'screen_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'computer_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'computer_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'computer_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
   
    <tr>
    <td width="10%">南校区</td>
    <td width="6%"><?php if(is_object($south))echo CHtml::textField('', $south->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'desksystem_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'desksystem_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'desksystem_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'projector_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'projector_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'projector_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'screen_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'screen_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'screen_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'computer_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'computer_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'computer_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
   
    <tr>
    <td width="10%">北校区</td>
    <td width="6%"><?php if(is_object($north))echo CHtml::textField('', $north->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'desksystem_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'desksystem_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'desksystem_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'projector_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'projector_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'projector_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'screen_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'screen_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'screen_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'computer_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'computer_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'computer_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
   
    <tr>
    <td width="10%">珠海校区</td>
    <td width="6%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'desksystem_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'desksystem_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'desksystem_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'projector_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'projector_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'projector_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'screen_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'screen_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'screen_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'computer_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'computer_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'computer_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    </table>
    
	<p>&nbsp;</p>
	
    <table width="90%" style="text-align:center;" align="center" border="1px">
    <tr>
    <td width="10%">调查项目</td>   
    <td width="6%">样本量</td>   
    <td colspan="3">读U盘、移动硬盘</td>
    <td colspan="3">笔记本电脑切换方便性</td>
    <td colspan="3">有线话筒</td>
    <td colspan="3">无线话筒</td>
    </tr>
	
    <tr>
    <td width="10%">选项</td>
    <td width="6%"></td>   
   
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>
   
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>
    
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>
   
    <td width="7%">正常</td>
    <td width="7%">不正常</td>
    <td width="7%">已处理</td>
    </tr>
	
    <tr>
    <td width="10%">东校区</td>
    <td width="6%"><?php if(is_object($east))echo CHtml::textField('', $east->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'rom_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'rom_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'rom_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'notebook_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'notebook_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'notebook_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'hasline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'hasline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'hasline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'noline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'noline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($east))echo CHtml::textField('', WeekSurvey::getPercentage($east, 'noline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    
    <tr>
    <td width="10%">南校区</td>
    <td width="6%"><?php if(is_object($south))echo CHtml::textField('', $south->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'rom_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'rom_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'rom_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'notebook_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'notebook_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'notebook_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'hasline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'hasline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'hasline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'noline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'noline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($south))echo CHtml::textField('', WeekSurvey::getPercentage($south, 'noline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    
    <tr>
    <td width="10%">北校区</td>
    <td width="6%"><?php if(is_object($north))echo CHtml::textField('', $north->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'rom_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'rom_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'rom_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'notebook_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'notebook_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'notebook_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'hasline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'hasline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'hasline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'noline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'noline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($north))echo CHtml::textField('', WeekSurvey::getPercentage($north, 'noline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
	
    <tr>
    <td width="10%">珠海校区</td>
    <td width="6%"><?php if(is_object($zhuhai))echo CHtml::textField('', $zhuhai->survey_sample, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'rom_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'rom_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'rom_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'notebook_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'notebook_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'notebook_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
   
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'hasline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'hasline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'hasline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
  
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'noline_gd'), array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'noline_bd'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    <td width="7%"><?php if(is_object($zhuhai))echo CHtml::textField('', WeekSurvey::getPercentage($zhuhai, 'noline_fix'),array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    </table>
	
	<p>&nbsp;</p>
	
	<table width="90%" style="text-align:center;" align="center" border="1px">
    <tr><td colspan="2">问题处理及反馈情况汇总</td></tr>
    <tr>
    <td width="10%">东校区</td> 
    <td><?php if(is_object($east))echo CHtml::textArea('', $east->class_status, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    <tr>
    <td width="10%">南校区</td>
    <td><?php if(is_object($south))echo CHtml::textArea('', $south->class_status, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    <tr>
    <td width="10%">北校区</td>
    <td><?php if(is_object($north))echo CHtml::textArea('', $north->class_status, array('style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
    </tr>
    <tr>
    <td width="10%">珠海校区</td>
    <td><?php if(is_object($zhuhai))echo CHtml::textArea('', $zhuhai->class_status, array('readonly' => 'readonly', 'style' => "border-width:1px;border-style:solid;height:100%;width:100%"));?></td>
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
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=desksystem_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=projector_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=screen_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=computer_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=rom_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=notebook_'.'">';?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=hasline_'.'">';?>
</td>
<td width="45%">
<?php echo '<img class="chart" src="?r=weekSurvey/chart&week='.$week.'&year='.$year.'&attr=noline_'.'">';?>
</td>
</tr>
</table>






