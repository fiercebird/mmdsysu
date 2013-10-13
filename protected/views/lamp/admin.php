<?php
/* @var $this LampController */
/* @var $model Lamp */

$this->breadcrumbs = array(
    '投影机灯泡' => array('admin'),
);

$this->menu = array(
    array('label' => '添加记录', 'url' => array('create')),
    array('label' => '导出Excel', 'url' => array('excel')),
    array('label' => 'Excel批量覆盖', 'url' => array('cover')),
	array('label' => '检索投影机灯泡', 'url' => '#',  'linkOptions' => array('class' => 'search-button'), )
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/getZhaoduDetail.js");
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lamp-grid').yiiGridView('update', {
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
            价格
            <?php echo CHtml::activeCheckBox($model, 'price', array('onclick' => 'chkBox(this, 7);')) ?>
        </td>
        <td>
            更换时间
            <?php echo CHtml::activeCheckBox($model, 'updateTime', array('onclick' => 'chkBox(this, 4);')) ?>
        </td>
        <td>
            保修情况
            <?php echo CHtml::activeCheckBox($model, 'guarentee', array('onclick' => 'chkBox(this, 15);')) ?>
        </td>
        <td>
            开机照度
            <?php echo CHtml::activeCheckBox($model, 'onZhaodu', array('onclick' => 'chkBox(this, 10);')) ?>
        </td>
        <td>
            未开机照度
            <?php echo CHtml::activeCheckBox($model, 'offZhaodu', array('onclick' => 'chkBox(this, 11);')) ?>
        </td>
        <td>
            供应商
            <?php echo CHtml::activeCheckBox($model, 'supplyCompany', array('onclick' => 'chkBox(this, 14);')) ?>
        </td>
        <td>
            在用/备用
            <?php echo CHtml::activeCheckBox($model, 'isUsing', array('onclick' => 'chkBox(this, 9);')) ?>
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
        grid = $('#lamp-grid');
        $('tr', grid).each(function() {
            $('td:eq('+num+'), th:eq('+num+')',this).hide();
        });
    }
    function show_column(num){
        grid = $('#lamp-grid');
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
    'id' => 'lamp-grid',
    'dataProvider' => $model->search(),	
    'afterAjaxUpdate' => $js,
    //'filter' => $model,
    'columns' => array(
        array(
            'name' => 'lid',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none', 'class' => 'lid'),
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
            'name' => 'updateTime',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'displayerType',
        'type',
        array(
            'name' => 'price',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
         'liuming',
        array(
            'name' => 'isUsing',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'onZhaodu',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'offZhaodu',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        'zhaodu',
        'usedTime',
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
            'header'=>'照度曲线',
            'value'=>'getLinkToZhaodu($data->lid)',
            'type'=>'html'
        ),
        array(
            'header'=>'照度管理',
            'value'=>'getLinkToManager($data->lid)',
            'type'=>'html'
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>

<?php
    //生成表格中获取历史照度的链接<a>，好像Yii的gridview中value得调用函数
    function getLinkToZhaodu($lid)
    {
        return "<a href='#' class='aZhaodu'>点击查询</a>";
    }
    function getLinkToManager($lid)
    {
        return "<a href='?r=lampZhaodu/admin&lid=$lid'>照度管理</a>";
    }
?>
<div class='zhaodu' style='width:700px;height:230px;border:2px solid #C6D880;position:absolute;display:none;background:white;padding:10px'>
<img id="img1" src="images/loading.gif" style="margin-left:200px;height: 200px;" />
  <img id="img2" />
</div>
<div style="text-align: left">
<?php //echo CHtml::link('检索投影机灯泡', '#', array('class' => 'search-button')); ?>
</div>
