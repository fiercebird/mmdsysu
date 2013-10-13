<?php
/* @var $this DeviceController */

$this->breadcrumbs = array(
    '设备维修登记',
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery-1.9.1.min.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/alert.js");
?>
<div style="padding-bottom:5px;border-bottom:solid 2px #aaa;margin-bottom:10px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'repair-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    数据筛选：&nbsp;&nbsp;

    校区
    <?php
    echo CHtml::dropDownList('campusName', '0', Campus::model()->getCampusList());
    ?>
    &nbsp;&nbsp;

    设备
    <?php
    echo CHtml::dropDownList('deviceName', '0', $this->getDeviceDropList());
    ?>
    &nbsp;&nbsp;

    <input value="确定" id="btnRepairSubmit" type="button">
    <?php $this->endWidget(); ?>
</div>

<div id="alertContent" style="min-height:100px;">
    <?php
    if ($dataProvider != null) {
        echo '<span style="color:red">' . $tips . '</span>';
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'computer-grid',
            'dataProvider' => $dataProvider,
            'columns' => array(
                array(
                    'name' => 'cc.class.b.c.cname',
                    'value' => '$data->cc->class->b->c->cname'
                ),
                array(
                    'name' => 'cc.class.b.bname',
                    'value' => '$data->cc->class->b->bname'
                ),
                array(
                    'name' => 'cc.class.className',
                    'value' => '$data->cc->class->className'
                ),
                array(
                    'name' => 'details',
                    'header' => '详情'
                ),
                array(
                    'name' => 'man',
                    'header' => '维修人'
                ),
                array(
                    'name' => 'cost',
                    'header' => '花费'
                ),
                array(
                    'name' => 'time',
                    'header' => '维修时间'
                ),
            )
        ));
    }
    ?>
</div>

<div style="padding-bottom:5px;border-bottom:solid 2px #aaa;padding-top:5px;border-top:solid 2px #aaa;margin-top:10px;margin-bottom:10px;">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'repair-add-form',
        'enableAjaxValidation' => false,
        'action' => '?r=device/addRepair'
    ));
    ?>
    校区
    <?php
    echo $form->dropDownList(Campus::model(), 'cname', Campus::model()->getCampusList(), array(
        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('building/getAjaxBuilding'),
            'update' => '#Building_bid',
            'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'campus' => 'js:$("#Campus_cname").val()'),
            'success' => 'function(data){$("#Building_bid").html(data); $("#Computer_classId").html("");}'
        ),
    ));
    ?>
    &nbsp;&nbsp;
    教学楼
    <?php
    echo $form->dropDownList(Building::model(), 'bid', array(), array(
        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('classroom/getAjaxClassroom'),
            'update' => '#classId',
            'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'classroom' => 'js:$("#Building_bid").val()')
        ),
    ));
    ?>
    &nbsp;&nbsp;
    课室
    <?php echo CHtml::dropDownList('classId', 0, array()); ?>
    &nbsp;&nbsp;
    设备
    <?php echo CHtml::dropDownList('addDeviceName', '0', $this->getDeviceDropList()); ?>
    <br />
    详情
    <?php echo CHtml::textField('details', '', array('size' => 15, 'maxlength' => 100)) ?>
    &nbsp;&nbsp;
    维修人
    <?php echo CHtml::textField('man', '', array('size' => 15, 'maxlength' => 50)) ?>
    &nbsp;&nbsp;
    花费
    <?php echo CHtml::textField('cost', '', array('size' => 15, 'maxlength' => 50)) ?>
    <br />
    <input value="登记" id="btnAddSubmit" type="button">
    <?php $this->endWidget(); ?>
</div>
