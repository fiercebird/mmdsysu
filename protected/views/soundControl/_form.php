<?php
/* @var $this SoundControlController */
/* @var $model SoundControl */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sound-control-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <?php
    //如果是更新，则把原来的校区教学楼选中，jq实现
    if (!$model->isNewRecord)
    {
        $script = '<script>$(document).ready(function(){';
        $script .= '$("#Campus_cname").attr("value", "' . $model->class->b->cid . '");';
        $script .= '$("#Building_bid").attr("value", "' . $model->class->bid . '");';
        $script .= '});</script>';
        echo $script;
    }
    ?>
    <?php echo $form->errorSummary($model); ?>
    <table>
        <tr>
            <td><?php echo $form->label(Campus::model(), 'cname'); ?></td>
            <td>
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
            </td>
            <td>请选择校区</td>
        </tr>
        <tr>
            <td><?php echo $form->label(Building::model(), 'bname'); ?></td>
            <td>
                <?php
                //如果是新的记录，则教学楼列表为空，否则为该教室所在教学楼的列表
                if (!$model->isNewRecord)
                    $building = Building::model()->getBuildingOptionsByCampus($model->class->b->cid);
                else
                    $building = array();
                echo $form->dropDownList(Building::model(), 'bid', $building, array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => Yii::app()->createUrl('classroom/getAjaxClassroom'),
                        'update' => '#SoundControl_classId',
                        'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'classroom' => 'js:$("#Building_bid").val()')
                    ),
                ));
                ?>
            </td>
            <td>请选择教学楼</td>
        </tr>
        <tr>
            <td><?php echo $form->label($model, 'classId'); ?></td>
            <td>
                <?php
                if (!$model->isNewRecord)
                    $classroom = Classroom::model()->getClassOptionsByBid($model->class->bid);
                else
                    $classroom = array();
                echo $form->dropDownList($model, 'classId', $classroom)
                ?>
            </td>
            <td>请选择课室</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'deviceNum'); ?></td>
            <td><?php echo $form->textField($model, 'deviceNum', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入设备号</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'brand'); ?></td>
            <td><?php echo $form->textField($model, 'brand', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入品牌</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'type'); ?></td>
            <td><?php echo $form->textField($model, 'type', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入型号</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'road'); ?></td>
            <td><?php echo $form->textField($model, 'road', array('size' => 20, 'maxlength' => 10)); ?></td>
            <td>输入路数</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'price'); ?></td>
            <td><?php echo $form->textField($model, 'price', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入价格</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'supplyCompany'); ?></td>
            <td><?php echo $form->textField($model, 'supplyCompany', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入供应商</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'buyTime'); ?></td>
            <td><?php $this->widget(
                    'zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model'     => $model,
                        'attribute' => 'buyTime',
                        'options'   => array(
                            'dateFormat' => 'yy-mm-dd',
                            'mode'    => 'date',
                        ),
                    )
                ); ?>
            </td>
            <td>点击文本框选择时间</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'isUsing'); ?></td>
            <td><?php echo $form->dropDownList($model,'isUsing',array('在用'=>'在用设备', '备用'=>'备用设备')); ?></td>
            <td>选择在用设备或备用设备</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'guarentee'); ?></td>
            <td><?php echo $form->textField($model, 'guarentee', array('size' => 20, 'maxlength' => 50)); ?></td>
            <td>输入保修情况</td>
        </tr>
    </table>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?>
        <?php echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->