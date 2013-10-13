<?php
/* @var $this LampZhaoduController */
/* @var $model LampZhaodu */

$this->breadcrumbs=array(
	'投影机灯泡'=>array('lamp/admin'),
    $lamp->class->b->c->cname . '-' . $lamp->class->b->bname . '-' . $lamp->class->className,
	'照度值管理',
);

$this->menu=array(
	array('label'=>'新增照度值', 'url'=>array('create', 'lid'=>$lamp->lid)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lamp-zhaodu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lamp-zhaodu-grid',
	'enableHistory' => true,
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'zhaodu',
		'time',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {delete}'
		),
	),
)); ?>

<?php echo CHtml::link('检索照度值','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->