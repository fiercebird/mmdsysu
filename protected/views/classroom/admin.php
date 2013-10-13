<?php
/* @var $this ClassroomController */
/* @var $model Classroom */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#classroom-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->breadcrumbs = array(
    '课室基本信息' => array('admin'),
);

$this->menu = array(
    array('label' => '添加记录', 'url' => array('create')),
    array('label' => '导出Excel', 'url' => array('excel')),
	array('label' => '检索课室', 'url' => '#',  'linkOptions' => array('class' => 'search-button'), )
);
?>
<span class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</span><!-- search-form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'classroom-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name'=>'b.cid',
            'value' => '$data->b->c->cname'
        ),
        array(
            'name' => 'bid',
            'value' => '$data->b->bname'
        ),
        'className',
        'seatNum',
        'examNum',
        'more',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<?php //echo CHtml::link('检索课室', '#', array('class' => 'search-button')); ?>

