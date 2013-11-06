<?php
/* @var $this MixerController */
/* @var $model Mixer */
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
                        'success' => 'function(data){$("#Building_bid").html(data); $("#Computer_classId").html("");}'
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
                        'update' => '#Mixer_classId',
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
            <td><?php echo $form->label($model,'deviceNum'); ?></td>
            <td><?php echo $form->textField($model,'deviceNum',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'brand'); ?></td>
            <td><?php echo $form->textField($model,'brand',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'power'); ?></td>
            <td><?php echo $form->textField($model,'power',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'buyTime'); ?></td>
            <td><?php echo $form->textField($model,'buyTime',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'supplyCompany'); ?></td>
            <td><?php echo $form->textField($model,'supplyCompany',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'type'); ?></td>
            <td><?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'price'); ?></td>
            <td><?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'guarentee'); ?></td>
            <td><?php echo $form->textField($model,'guarentee',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'isUsing'); ?></td>
            <td><?php echo $form->textField($model,'isUsing',array('size'=>20,'maxlength'=>10)); ?></td>
        </tr>
        <tr><td>&nbsp;</td><td><?php echo CHtml::submitButton('检索'); ?></td></tr>
    </table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->