<?php
/* @var $this VoiceBoxController */
/* @var $model VoiceBox */

$this->breadcrumbs = array(
    '音箱' => array('admin'),
);

$this->menu = array(
    array('label' => '添加记录', 'url' => array('create')),
    array('label' => '导出Excel', 'url' => array('excel')),
	array('label' => '检索音箱', 'url' => '#',  'linkOptions' => array('class' => 'search-button'), ),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/getVbRepairDetail.js");
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#voice-box-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
//下面是复选框的样式
Yii::app()->clientScript->registercss('bool_display_tbl', "
    #bool_display_tbl tr td
    {
        padding-right: 20px;
    }
    #bool_display_tbl tr td input
    {
        margin:0;
        vertical-align: bottom;
    }
");
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<table id="bool_display_tbl">
    <tr>
        <td>
            设备号
            <?php echo CHtml::activeCheckBox($model, 'deviceNum', array('onclick' => 'chkBox(this, 4);')) ?>
        </td>
        <td>
            购买时间
            <?php echo CHtml::activeCheckBox($model, 'buyTime', array('onclick' => 'chkBox(this, 10);')) ?>
        </td>
        <td>
            供贷商
            <?php echo CHtml::activeCheckBox($model, 'supplyCompany', array('onclick' => 'chkBox(this, 11);')) ?>
        </td>
        <td>
            保修情况
            <?php echo CHtml::activeCheckBox($model, 'guarentee', array('onclick' => 'chkBox(this, 12);')) ?>
        </td>
    </tr>
</table>

<?php
//复选框选中时，显示该列
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
        grid = $('#voice-box-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).hide();
        });
    }
    function show_column(num){
        grid = $('#voice-box-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).show();
        });
    }
", CClientScript::POS_HEAD);
//处理ajax请求之后复选框选中失效的情况
$js = <<<_JS_
    function(id, data){
        $("#bool_display_tbl tr").children().each(function(i,n){
            //如果ajax请求之前checkbox选中，则显示
            if($(n).children(":checkbox").attr("checked"))
            {
                $(n).children(":checkbox").click();
                $(n).children(":checkbox").attr("checked",true)
            }
        }); 
    }
_JS_;
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'voice-box-grid',
    'dataProvider' => $model->search(),	
    //'filter' => $model,
    'afterAjaxUpdate' => $js,
    'columns' => array(
        array(
            'name' => 'vid',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none', 'class' => 'vid'),
        ),
        array(
            'name' => 'class.b.c.cname',
            'value' => '$data->class->b->c->cname'
        ),
        array(
            'name' => 'class.b.bname',
            'value' => '$data->class->b->bname'
        ),
        array(
            'name' => 'class.className',
            'value' => '$data->class->className'
        ),
        array(
            'name' => 'deviceNum',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'brand',
        'type',
        'size',
        'price',
        'isUsing',
        array(
            'name' => 'buyTime',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'supplyCompany',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'guarentee',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => '维修次数',
            'value' => 'VbRepair::model()->getRepair($data->vid)',
            'type' => 'html'
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<div class='repair' style='width:300px;border: 2px solid #C6D880;position:absolute;display:none;background:white;padding:10px'></div>
<div style="text-align: left">
<?php //echo CHtml::link('检索音箱', '#', array('class' => 'search-button')); ?>
</div>

