<?php
/* @var $this DeviceController */

$this->breadcrumbs = array(
    '设备批量删除',
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/deleteMany.js");
?>
<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'delete-many-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <table>
        <tr>
            <td>选择设备：</td>
            <td>
                <?php
                    echo CHtml::dropDownList('deviceName', '0', $this->getDeviceDropList());
                ?>
            </td>
        </tr>
        <tr>
            <td>选择校区：</td>
            <td>
                <?php
                echo CHtml::dropDownList('campusName', '0', Campus::model()->getCampusList(), array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => Yii::app()->createUrl('building/getAjaxBuilding'),
                        'update' => '#buildingName',
                        'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'campus' => 'js:$("#campusName").val()'),
                        'success' => 'function(data){$("#buildingName").html(data);}'
                    ),
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>选择教学楼：</td>
            <td>
                <?php
                echo CHtml::dropDownList('buildingName', '0', array());
                ?>
            </td>
        </tr>
        <tr>
            <td><input type="button" value="确定" id="submitBtn"></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->
