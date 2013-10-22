<?php
/* @var $this ProjectorController */
/* @var $model Projector */

$this->breadcrumbs = array(
    '投影机' => array('admin'),
);

$this->menu = array(
    array('label' => '添加记录', 'url' => array('create')),
    array('label' => '导出Excel', 'url' => array('excel')),
	array('label' => '检索投影机', 'url' => '#',  'linkOptions' => array('class' => 'search-button'), )
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/getProRepairDetail.js");
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projector-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
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
            <?php echo CHtml::activeCheckBox($model, 'buyTime', array('onclick' => 'chkBox(this, 11);')) ?>
        </td>
        <td>
            投影机品牌
            <?php echo CHtml::activeCheckBox($model, 'brand', array('onclick' => 'chkBox(this, 6);')) ?>
        </td>
        <td>
            在用/备用
            <?php echo CHtml::activeCheckBox($model, 'isUsing', array('onclick' => 'chkBox(this, 14);')) ?>
        </td>
        <td>
            供应商
            <?php echo CHtml::activeCheckBox($model, 'supplyCompany', array('onclick' => 'chkBox(this, 12);')) ?>
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
        grid = $('#projector-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).hide();
        });
    }
    function show_column(num){
        grid = $('#projector-grid');
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
    'id' => 'projector-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,		
    'afterAjaxUpdate' => $js,
    'columns' => array(
        array(
            'name' => 'pid',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none', 'class' => 'pid'),
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
        'displayerType',
        array(
            'name' => 'brand',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'type',
        'price',
        'zhaodu',
        'liuming',
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
        'usedTime',
        array(
            'name' => 'isUsing',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => '维修次数',
            'value' => 'ProRepair::model()->getRepair($data->pid)',
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

</div>
