<?php
/* @var $this MonthSurveyController */
/* @var $model MonthSurvey */

$this->breadcrumbs=array(
	'月_调查统计结果',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#month-survey-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'month-survey-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cid',
		'survey_sample',
		'survey_year',
		'survey_month',
		'record_man',
		/*
		'pg_zhaodu_vgd',
		'pg_zhaodu_gd',
		'pg_zhaodu_md',
		'pg_zhaodu_bd',
		'desksystem_vgd',
		'desksystem_gd',
		'desksystem_md',
		'desksystem_bd',
		'projector_vgd',
		'projector_gd',
		'projector_md',
		'projector_bd',
		'screen_vgd',
		'screen_gd',
		'screen_md',
		'screen_bd',
		'computer_vgd',
		'computer_gd',
		'computer_md',
		'computer_bd',
		'rom_vgd',
		'rom_gd',
		'rom_md',
		'rom_bd',
		'notebook_vgd',
		'notebook_gd',
		'notebook_md',
		'notebook_bd',
		'hasline_vgd',
		'hasline_gd',
		'hasline_md',
		'hasline_bd',
		'phone_vgd',
		'phone_gd',
		'phone_md',
		'phone_bd',
		'service_vgd',
		'service_gd',
		'service_md',
		'service_bd',
		'repair_y',
		'repair_n',
		'noline_vgd',
		'noline_gd',
		'noline_md',
		'noline_bd',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
