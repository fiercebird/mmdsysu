<?php
/* @var $this WeeklyChkController */
/* @var $model WeeklyChk */

$this->breadcrumbs=array(
	'周检所有记录' => array('admin'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#weekly-chk-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
Yii::app()->clientScript->registercss('bool_display_tbl',"
");
$this->menu = array(
	array('label' => '记录筛选', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
	array('label'=> '导出excel', 'url' => '?r=weeklyChk/Excel'),
);

?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<table id="weeklyChk_tbl" style="table-layout:fixed;width:100%;">
	<tr>
	<td>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('discRom')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'discRom', array('onclick'=>'chkBox(this, 9);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('usb')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'usb', array('onclick'=>'chkBox(this, 10);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('patch')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'patch', array('onclick'=>'chkBox(this, 11);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('voice')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'voice', array('onclick'=>'chkBox(this, 12);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('net')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'net', array('onclick'=>'chkBox(this, 13);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('virus')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'virus', array('onclick'=>'chkBox(this, 14);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('noteBook')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'noteBook', array('onclick'=>'chkBox(this, 15);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('mid')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'mid', array('onclick'=>'chkBox(this, 16);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('maiHasLine')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'maiHasLine', array('onclick'=>'chkBox(this, 17);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('maiNoLine')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'maiNoLine', array('onclick'=>'chkBox(this, 18);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('proScreen')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'proScreen', array('onclick'=>'chkBox(this, 19);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('projector')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'projector', array('onclick'=>'chkBox(this, 20);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('amplifier')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'amplifier', array('onclick'=>'chkBox(this, 21);'))?>
		<?php echo CHtml::label(CHtml::encode($model->getAttributeLabel('stage')), false)?>
		<?php echo CHtml::activeCheckBox($model, 'stage', array('onclick'=>'chkBox(this, 22);'))?>
	</td>
	</tr>
	</table>
<?php 
Yii::app()->clientScript->registerScript('toggle', "
    function chkBox(e, num){
    if($(e).is(':checked')){
                    show_column(num);
                    }		
    else {
                    hide_column(num);
            }
    }
    function hide_column(num){
        grid = $('#weekly-chk-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).hide();
        });
    }

    function show_column(num){
        grid = $('#weekly-chk-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).show();
        });
    }
", CClientScript::POS_HEAD);
//处理ajax请求之后复选框选中失效的情况
$js=<<<_JS_
    function(id, data){
        $("#weeklyChk_tbl tr").children().each(function(i,n){
            //如果ajax请求之前checkbox选中，则显示
            if($(n).children(":checkbox").attr("checked"))
            {
                $(n).children(":checkbox").click();
                $(n).children(":checkbox").attr("checked",true)
            }
        }); 
    }
_JS_;
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'weekly-chk-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate' => $js,
	'columns'=>array(
		'wid',
		'week',
		array(
		'name' => 'cid',
		'value'=>'$data->campus->cname',
		),
		array(
		'name' => 'bid',
		'value' => '$data->building->bname',
		),
		array(
		'name'=>'class_search',
		'value'=>'$data->class->className',
		),
		'chkTime',
		'chkDate',
		'register',
		'state',
		
		array(
		'name' => 'discRom',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'usb',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'patch',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'voice',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'net',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'virus',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'noteBook',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'mid',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'maiHasLine',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'maiNoLine',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'proScreen',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'projector',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'amplifier',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		array(
		'name' => 'stage',
		'headerHtmlOptions' => array('style' => 'display:none'),
		'htmlOptions' => array('style' => 'display:none'),
		),
		'lampTime',
		'lampBrightness',
		array(
				'name' => 'details',
				'htmlOptions' => array('width' => '40%'),
			),
	),
)); ?>

