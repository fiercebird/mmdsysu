<?php
/* @var $this WeekSurveyController */
/* @var $model WeekSurvey */

$this->breadcrumbs=array(
	'Week Surveys'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List WeekSurvey', 'url'=>array('index')),
	array('label'=>'Create WeekSurvey', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#week-survey-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Week Surveys</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'week-survey-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cid',
		'survey_sample',
		'survey_year',
		'survey_week',
		'record_man',
		/*
		'projector_vgd',
		'projector_gd',
		'projector_md',
		'projector_bd',
		'screen_vgd',
		'screen_gd',
		'screen_md',
		'screen_bd',
		'desksystem_vgd',
		'desksystem_gd',
		'desksystem_md',
		'desksystem_bd',
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
