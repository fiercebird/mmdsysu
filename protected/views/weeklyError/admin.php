<?php
/* @var $this WeeklyErrorController */
/* @var $model WeeklyError */

$this->breadcrumbs=array(
	'周检故障记录'=>array('admin'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#weekly-error-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->menu = array(
	array('label' => '记录筛选', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
	array('label'=> '导出excel', 'url' => '?r=weeklyError/Excel'),
);

?>


<?php 
Yii::app()->clientScript->registerScript('ChgColor',"
	function chgColor() {
		 grid = $('#weekly-error-grid');
    $('tr', grid).each(function() {
		if ( $('td:eq(10)',this).html() == '未解决')
        	$('td:eq(10)',this).css('background-color', 'gray');
		else if ( $('td:eq(10)',this).html() == '已处理')
			$('td:eq(10)',this).css('background-color', 'green'); 
    });
		} 
		chgColor();
		", CClientScript::POS_END);
?>

<?php 
Yii::app()->clientScript->registerScript('Update',"
$('#updateButton').click(function(){
        // get the ids
        var ids =  $.fn.yiiGridView.getSelection('weekly-error-grid');
		var name = $('#mark_handler').val();
		name = $.trim(name);
        if('' == ids)
        {
        	alert('请选取至少一条记录');
        	return false;
        }
		if('' == name)
		{
			alert('请填写请处理人签名');
        	return false;
		}
        else 
        {   
                // we have array, lets split them into a string separating
                // values with commas
                ids  = ids.join(',');
                // now just call the ajax
                $.ajax({
                        url: '".Yii::app()->createUrl('/weeklyError/UpdateHandler/')."',
                        data: {ids:ids, name:name},
                        success: function(data){
                                $.fn.yiiGridView.update('weekly-error-grid', {
                                        data: $(this).serialize()
                                });
                },
                error: function(){
                	return false;
                }});
        }
        return false; // if you want to avoid default button action
});",CClientScript::POS_READY);
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'weekly-error-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate' => 'function(id, data){chgColor();}',
	'selectableRows'=>2,
	'columns'=>array(
		array(
			'name' => 'id',
			'class' => 'CCheckBoxColumn',
			'value' => '$data->id',
			),
		array(
		'name'=>'chkDate',
		'value'=>'$data->chkDate',
		),
		array(
		'name' => 'chkTime',
		'value' => '$data->chkTime',
		),
		array(
		'name' => 'cid',
		'value'=>'$data->campus->cname',
		),
		array(
		'name' => 'bid',
		'value' => '$data->building->bname',
		),
		array(
		'name'=>'search_classroom',
		'value'=>'$data->class->className',
		),
		array(
		'name'=>'week',
		'value'=>'$data->week',
		),
		array(
		'name'=>'register',
		'value'=>'$data->register',
		),
		'device',
		array (
		'name' => 'details',
		'value' => '$data->details',
		),
		'state',
		'handler',
	),
)); ?>

<div class="row">
<?php echo CHtml::label("处理人签名", false)?>
<?php echo CHtml::textField('mark_handler', '', array('id' => 'mark_handler', 'size' => '10'));?>
<?php echo CHtml::button('标记为已处理', array('id' => 'updateButton'))?>
</div>
