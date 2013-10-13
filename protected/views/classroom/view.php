<?php
/* @var $this ClassroomController */
/* @var $model Classroom */

$this->breadcrumbs=array(
	'课室基本信息'=>array('admin'),
	$model->className,
);

$this->menu=array(
	array('label'=>'新建课室', 'url'=>array('create')),
    
	array('label'=>'*编辑此课室', 'url'=>array('update', 'id'=>$model->classId)),
	array('label'=>'*删除此课室', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->classId),'confirm'=>'确定删除此课室?')),
);
?>


<?php 
    $building = Building::model()->findByPk($model->bid);
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'className',
		'seatNum',
		'examNum',
		array(
                    'label'=>'教学楼',
                    'value'=>$building->bname
                ),
		'more',
	),
    )); 
    echo '<br />';
    echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"'));
?>
