<?php
/* @var $this ComputerController */
/* @var $model Computer */

$this->breadcrumbs = array(
    '电脑' => array('admin'),
);

$this->menu = array(
    array('label' => '添加记录', 'url' => array('create')),
    array('label' => '导出Excel', 'url' => array('excel')),
	array('label' => '检索电脑', 'url' => '#',  'linkOptions' => array('class' => 'search-button'), )
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/getComRepairDetail.js");
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#computer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('#yw0').delegate('#reset', 'click', function() {
    $('#Building_bid').html('');
    $('#Computer_classId').html('');
    $('#Building_bid').append('<option value=\"\" style=\"display:none\"></option>');
});
", CClientScript::POS_END);
Yii::app()->clientScript->registercss('bool_display_tbl',"
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
            保修情况
            <?php echo CHtml::activeCheckBox($model, 'guarentee', array('onclick'=>'chkBox(this, 7);'))?>
	</td>
        <td>
            显示器类型
            <?php echo CHtml::activeCheckBox($model, 'displayer', array('onclick'=>'chkBox(this, 10);'))?>
	</td>
        <td>
            CPU
            <?php echo CHtml::activeCheckBox($model, 'cpu', array('onclick'=>'chkBox(this, 11);'))?>
	</td>
        <td>
            内存
            <?php echo CHtml::activeCheckBox($model, 'memory', array('onclick'=>'chkBox(this, 13);'))?>
	</td>
        <td>
            硬盘
            <?php echo CHtml::activeCheckBox($model, 'memory', array('onclick'=>'chkBox(this, 14);'))?>
	</td>
        <td>
            在用/备用
            <?php echo CHtml::activeCheckBox($model, 'isUsing', array('onclick'=>'chkBox(this, 15);'))?>
	</td>
        <td>
            物理地址
            <?php echo CHtml::activeCheckBox($model, 'mac', array('onclick'=>'chkBox(this, 16);'))?>
	</td>
        <td>
            IP地址
            <?php echo CHtml::activeCheckBox($model, 'ip', array('onclick'=>'chkBox(this, 17);'))?>
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
        grid = $('#computer-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).hide();
        });
    }
    function show_column(num){
        grid = $('#computer-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).show();
        });
		}

", CClientScript::POS_HEAD);
//处理ajax请求之后复选框选中失效的情况
$js=<<<_JS_
    function(id, data){
        $("#bool_display_tbl tr").children().each(function(i,n){
            //如果ajax请求之前checkbox选中，则显示
            if($(n).children(":checkbox").attr("checked"))
            {
                $(n).children(":checkbox").click();
                $(n).children(":checkbox").attr("checked",true)
            }
        });
		//url = $('.keys').attr('title');
		//alert(url.indexOf('Computer_page'));
		//location.href = url;
    }
_JS_;

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'computer-grid',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate' => $js,
    //'enableHistory' => true,
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'comid',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none', 'class' => 'comid'),
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
        'deviceNum',
        'type',
        'buyTime',
        array(
            'name' => 'guarentee',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'supplyCompany',
        'price',
        array(
            'name' => 'displayer',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'cpu',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'brand',
        array(
            'name' => 'memory',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'hardDisk',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'isUsing',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'mac',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'ip',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => '维修次数',
            'value' => 'ComRepair::model()->getRepair($data->comid)',
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
<?php //echo CHtml::link('检索电脑', '#', array('class' => 'search-button')); ?>
</div>
