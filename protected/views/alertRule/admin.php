<?php
/* @var $this AlertRuleController */
/* @var $model AlertRule */

$this->breadcrumbs=array(
	'待换设备提醒规则管理',
);

$this->menu=array(
	array('label'=>'新建规则', 'url'=>array('create')),
);
?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alert-rule-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'arid',
		'tittle',
		'device',
		'field',
                array(
                    'name' => 'isBig',
                    'value' => '$data->isBig==="0"?"否":"是"'
                ),
		'rule',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {delete}'
		),
	),
)); ?>
