<?php
/* @var $this AlertRuleController */
/* @var $model AlertRule */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'alert-rule-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    
    <table>
        <tr>
            <td>规则名：</td>
            <td><?php echo $form->textField($model, 'tittle', array('size' => 40, 'maxlength' => 100)); ?></td>
            <td>如：照度值低于指定值</td>
        </tr>
        <tr>
            <td>选择设备：</td>
            <td><?php echo $form->dropDownList($model, 'device', $this->getDeviceDropList(),array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => Yii::app()->createUrl('alertRule/getDeviceAlertField'),
                        'update' => '#AlertRule_field',
                        'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'deviceName' => 'js:$("#AlertRule_device").val()'),
                        'success' => 'function(data){$("#AlertRule_field").html(data);}'
                    ),)); ?></td>
        </tr>
        <tr>
            <td>选择提醒条件：</td>
            <td><?php echo $form->dropDownList($model, 'field', array()); ?></td>
        </tr>
        <tr>
            <td>是否大于上述条件：</td>
            <td><?php echo $form->dropDownList($model, 'isBig', array('1' => '是', '0' => '否')); ?></td>
            <td>如：照度<300时提醒，选否；反之亦然。</td>
        </tr>
        <tr>
            <td>提醒阀值：</td>
            <td><?php echo $form->textField($model, 'rule', array('size' => 15, 'maxlength' => 15)); ?></td>
            <td>请输入数字</td>
        </tr>
    </table>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->