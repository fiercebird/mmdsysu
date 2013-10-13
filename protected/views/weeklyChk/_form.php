<?php
/* @var $this WeeklyChkController */
/* @var $model WeeklyChk */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weekly-chk-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div style="width:400px;">
    <?php echo $form->errorSummary($model); ?>
	</div>
<style>
	.chkTbl {
		float:left;
		width:38%;
	}
	.ps {
		text-align: right;
	}
	span {
		position: relative;
		text-align: left;
	}
</style>
 <table cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;width:100%;">
	<tr>
	<!-- 
	<td width="5%">校区</td> 
	<td width="10%"><?php /*echo $form->dropDownList($model, 'cid', Campus::model()->getCampusList(),
			array(
					'ajax'=>array(
							'type'=>'POST',
							'url'=>Yii::app()->createUrl('building/getAjaxBuilding'),
							'update'=>'#WeeklyChk_bid',
							
							'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'campus'=>'js:$("#WeeklyChk_cid").val()'),
							'success' => 'function(data){$("#WeeklyChk_bid").html(data); $("#WeeklyChk_classId").html("");}',
					),
					
			)
			);*/?></td> -->
	<td width="5%">校区</td><td width="10%"><?php echo $form->dropDownList($model, 'bid', Building::model()->getBuildingList(),
			array(
					'ajax' => array(
							'type' => 'POST',
							'url' => Yii::app()->createUrl('classroom/getAjaxClassroom'),
							'update' => '#WeeklyChk_classId',
							'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'classroom'=>'js:$("#WeeklyChk_bid").val()')
						),
					'empty' => '请选择校区',
					)
			);?></td>
	<td width="6%">记录课室</td>
	<td width="10%"><?php echo $form->dropDownList($model, 'classId', array());?>
	</td>
	<td width="6%">记录周次</td>
	<td width="10%"><?php echo $form->textField($model, 'week', array('size' => '5', 'value' => Schooltime::getCurWeek())); ?>
	</td>
	<td>
	</td>
	</tr> 
	</table>
	<fieldset>
	<legend>电脑</legend>
	 <table class="chkTbl" style="table-layout:fixed;width:40%;">
	<tr>
		<td width="15%">光驱</td>
        <td width="20%">
		<?php echo $form->dropDownList($model, 'discRom', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'discRom'); ?></td>
		<td width="10%">USB</td>
        <td width="20%"><?php echo $form->dropDownList($model, 'usb', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'usb'); ?></td>
		 <td width="15%">补丁</td>
        <td width="20%">
		<?php echo $form->dropDownList($model, 'patch', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'patch'); ?></td>
	</tr>
		<tr>
		<td width="15%">声音</td>
         <td width="20%">
		<?php echo $form->dropDownList($model, 'voice', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'voice'); ?></td>
		 <td width="10%">网络</td>
         <td width="20%">
		<?php echo $form->dropDownList($model, 'net', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'net'); ?></td>
		<td width="15%">病毒库</td>
                <td width="20%">
		<?php echo $form->dropDownList($model, 'virus', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'virus'); ?></td>
	</tr>
		<tr>
		  <td width="15%">笔记本</td>
                <td width="20%">
		<?php echo $form->dropDownList($model, 'noteBook', DailyChk::getDevOptions()) ?>
		<?php echo $form->error($model,'noteBook'); ?></td>
	</tr>
	</table>
	
	<div class="ps">
	<table>
	<tr>
	<td>注意事项:</td>
	<td>
	<textarea rows="10" cols="60" disabled="disabled">1.电脑光驱能否正常打开，能否正常读碟；电脑播放视频是否正常，是否有声音
2.电脑USB接口连接U盘时是否能正常读取。USB延长线能否正常使用
3.电脑能否正常上网，能否正常打开网页
4.开电脑时杀毒软件是否能正常启动，病毒库有无更新
5.系统有无更新，可用360安全卫士检测。并扫描下有无恶意插件，清理系统垃圾、使用痕迹等</textarea></td>
</tr>
</table>
</div>
	
	</fieldset>
	
	
	<fieldset>
	<legend>其它</legend>
	 <table class="chkTbl" style="table-layout: fixed;width:40%;">
	<tr>
		<td width="15%">中控</td>
                <td>
		<?php echo $form->dropDownList($model, 'mid', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'mid'); ?></td>
		 <td width="15%">有线麦</td>
		<td><?php echo $form->dropDownList($model, 'maiHasLine', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'maiHasLine'); ?></td>
		 <td width="15%">无线麦</td>
         <td>
		<?php echo $form->dropDownList($model, 'maiNoLine', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'maiNoLine'); ?></td>
	</tr>
		<tr>
		 <td width="15%">投影幕</td>
                <td>
		<?php echo $form->dropDownList($model, 'proScreen', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'proScreen'); ?></td>
		 <td width="15%">投影机</td>
                <td>
		<?php echo $form->dropDownList($model, 'projector', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'projector'); ?></td>
		  <td width="15%">功放</td>
                <td>
		<?php echo $form->dropDownList($model, 'amplifier', DailyChk::getDevOptions(), array("options" => array('正常' => array('selected' => 'selected')))); ?>
		<?php echo $form->error($model,'amplifier'); ?></td>
	</tr>
		<tr>
		 <td width="15%">讲台</td>
                <td>
		<?php echo $form->dropDownList($model, 'stage', DailyChk::getDevOptions()); ?>
		<?php echo $form->error($model,'stage'); ?></td>
		<td width="15%">灯泡照度</td>
		<td>
		<?php echo $form->textField($model, 'lampBrightness', array('size' => 6)); ?></td>
	<!-- <span style="position: absolute;"><?php echo $form->error($model,'lampBrightness'); ?></span></td> -->	
		<td width="15%">灯泡时间</td>
		<td>
		<?php echo $form->textField($model, 'lampTime', array('size' => 6)); ?>
		<span style="position: absolute;"><?php echo $form->error($model,'lampTime'); ?></span></td>
	</tr>
	</table>
	
	<div class="ps">
	<table>
	<tr>
	<td>注意事项:</td>
	<td>
	<textarea rows="15" cols="60" disabled="disabled">
1.灯泡时间和灯泡照度只允许输入整数
2.按下中控面版按键能否正常切换
3.用摇控器检查下投影灯泡使用时间。并站在教室中后部（教室的正中间靠后一点点的部位）用肉眼观察投影内容是否清晰可见
4.如有电动幕、或手动幕的课室，要检查投影幕布升降有无异常，有无泛黄、画花等
5.检查有线、无线麦能否正常使用，声音有无断续。（要熟悉麦到混音器的连接，可调频无线麦的使用等）
6.调混音器或功放使电脑、麦的音量在较理想的位置后，记住该数值，以后保持该数值不变。（要熟悉混音设备的使用）
7.多媒体讲台有无损坏，柜门有无损坏等
8.麦头的防风罩旧了、坏了、掉了、要及时补上
9.做好多媒体设备的清洁工作，做到每月至少清洁一次。（很重要！！！）
	</textarea></td>
</tr>
</table>
</div>
	
	</fieldset>

<fieldset>
<legend>检查情况登记</legend>
<table width="37%" style="float: left;" cellpadding="10">
<tr>
<td>
<?php echo $form->radioButton($model, 'state', array('value' => '所有设备正常', 'checked' => 'checked', 'uncheckValue'=>null));?>
所有设备正常
</td>
</tr>
<tr>
<td>
<?php echo $form->radioButton($model, 'state', array('value' => '已解决故障', 'uncheckValue'=>null));?>
已解决故障
</td>
</tr>
<tr>
<td>
<?php echo $form->radioButton($model, 'state', array('value' => '存在故障未解决', 'uncheckValue'=>null));?>
存在故障未解决
</td>
</tr>
<tr>
<td>
<table>
<tr>
<td>登记人</td><td><?php echo $form->textField($model, 'register', array('size' => '10'));?>&nbsp;<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('value' => '登记')); ?>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="ps">
	<table>
	<tr>
	<td>问题描述：</td>
	<td>
	<?php echo $form->textArea($model, 'details', array('cols' => '60', 'rows' => '10',));?>	
	</td>
</tr>
</table>
</div>
</fieldset>	


<?php $this->endWidget(); ?>

</div><!-- form -->