<?php
/* @var $this DeviceController */

$this->breadcrumbs = array(
    '设备待换提醒',
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery-1.9.1.min.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/alert.js");
?>

<div style="padding-bottom:5px;border-bottom:solid 2px #aaa;margin-bottom:10px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'alert-form',
        'enableAjaxValidation' => false,
    ));
    ?>
	数据筛选：<br/><br/>
	
	<div style="float:right;margin-right:50px">
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <input value="确定" id="btnSubmit" type="button">
	</div>
	
	<div style="float:right;margin-right:300px">
	设备:<br/>
    <?php
    echo CHtml::checkBoxList('deviceName', null, $this->getDeviceCheckBoxList());
    ?>
	</div>
	
	<div style="margin-left:50px">
    校区：<br/>
    <?php
    echo CHtml::checkBoxList('campusName', null, Campus::model()->getCampusCheckBoxList());
    ?>
    </div><br/><br/>

    <div style="margin-left:50px">
    提醒原因：<br/>
    <?php
    echo CHtml::checkBoxList('reason', null, array('1' => '购买超过年限', '2' => '维修超过次数', '3' => '照度低于指定值', '4' => '灯泡使用时间超过指定值'));
    ?>
    </div><br/><br/>
    
    <?php $this->endWidget(); ?>
</div>
<div id="alertContent" style="min-height:100px;">
    <?php
    if ($dataProvider != null) {
        echo '<span style="color:red">' . $tips . '</span>';
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'computer-grid',
            'dataProvider' => $dataProvider,
            'columns'=>$displayColumn
        ));
    }
    ?>
</div>

<script type="text/javascript" language="javascript" charset="utf-8">
	function mark()    //单元格标记函数
	{        
	    $('tr').each    //表格每行
		(
		    function()    //暂时随便标记一下，多条件标记比较麻烦
		   {
		        $('td:eq(4)',this).css('background-color','red');
		   }
		);
	}
	mark();       //调用
</script>

<div style="padding-bottom:5px;border-bottom:solid 2px #aaa;padding-top:5px;border-top:solid 2px #aaa;margin-top:10px;margin-bottom:10px;">
    
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'alertrule-form',
            'enableAjaxValidation'=>false,
            'action'=>'?r=alertrule/update&id=1'
    )); ?>
    重置提醒条件：&nbsp;&nbsp;
    购买超过年限：<?php echo $form->textField($alertrule,'usedYear',array('size'=>2,'maxlength'=>5)); ?>&nbsp;&nbsp;
    维修超过次数：<?php echo $form->textField($alertrule,'repairTimes',array('size'=>2,'maxlength'=>5)); ?>&nbsp;&nbsp;
    照度低于指定值：<?php echo $form->textField($alertrule,'lampzhaodu',array('size'=>2,'maxlength'=>10)); ?>&nbsp;&nbsp;
    灯泡使用时间超过指定值：<?php echo $form->textField($alertrule,'lampHour',array('size'=>2,'maxlength'=>10)); ?>&nbsp;&nbsp;
    <?php echo CHtml::submitButton('确定'); ?>
    <?php $this->endWidget(); ?>
</div>
<div style="height:10px;clear:both;">
    
</div>