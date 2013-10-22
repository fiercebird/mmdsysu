<?php
/* @var $this LampController */
/* @var $model Lamp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
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
                        'success' => 'function(data){$("#Building_bid").html(data); $("#Lamp_classId").html("");}'
                    ),
                ));
                ?>
            </td>
            <td><?php echo $form->label(Building::model(), 'bname'); ?></td>
            <td>
                <?php
                echo $form->dropDownList(Building::model(), 'bid', array(), array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => Yii::app()->createUrl('classroom/getAjaxClassroom'),
                        'update' => '#Lamp_classId',
                        'data' => array(Yii::app()->request->csrfTokenName => Yii::app()->request->getCsrfToken(), 'classroom' => 'js:$("#Building_bid").val()')
                    ),
                ));
                ?>
            </td>
            <td><?php echo $form->label($model, 'classId'); ?></td>
            <td>
                <?php
                echo $form->dropDownList($model, 'classId', array())
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'updateTime'); ?></td>
            <td><?php echo $form->textField($model,'updateTime',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'displayerType'); ?></td>
            <td><?php echo $form->textField($model,'displayerType',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'type'); ?></td>
            <td><?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'price'); ?></td>
            <td><?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'liuming'); ?></td>
            <td><?php echo $form->textField($model,'liuming',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'isUsing'); ?></td>
            <td><?php echo $form->dropDownList($model,'isUsing',array('在用'=>'在用设备', '备用'=>'备用设备')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'onZhaodu'); ?></td>
            <td><?php echo $form->textField($model,'onZhaodu',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'offZhaodu'); ?></td>
            <td><?php echo $form->textField($model,'offZhaodu',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'usedTime'); ?></td>
            <td><?php echo $form->textField($model,'usedTime',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'supplyCompany'); ?></td>
            <td><?php echo $form->textField($model,'supplyCompany',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr><td>&nbsp;</td><td><?php echo CHtml::submitButton('检索'); ?></td></tr>
    </table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->