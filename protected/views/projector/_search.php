<?php
/* @var $this ProjectorController */
/* @var $model Projector */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <table>
        <tr>
            <td><?php echo $form->label(Campus::model(),'cname'); ?></td>
            <td>
                <?php echo $form->dropDownList(Campus::model(), 'cname', Campus::model()->getCampusList(),array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>Yii::app()->createUrl('building/getAjaxBuilding'),
                    'update'=>'#Building_bid',
                    'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'campus'=>'js:$("#Campus_cname").val()'),
                    'success' => 'function(data){$("#Building_bid").html(data); $("#Projector_classId").html("");}'
                ),
                )); ?>
            </td>
            <td><?php echo $form->label(Building::model(),'bname'); ?></td>
            <td>
                <?php 
                    echo $form->dropDownList(Building::model(), 'bid', array(),array(
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>Yii::app()->createUrl('classroom/getAjaxClassroom'),
                        'update'=>'#Projector_classId',
                        'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'classroom'=>'js:$("#Building_bid").val()')
                    ),
                    )); 
                ?>
            </td>
            <td><?php echo $form->label($model,'classId'); ?></td>
            <td>
                <?php
                    echo $form->dropDownList($model, 'classId', array()) 
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'deviceNum'); ?></td>
            <td><?php echo $form->textField($model,'deviceNum',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'displayerType'); ?></td>
            <td><?php echo $form->dropDownList($model,'displayerType',array('数字'=>'数字投影机','液晶'=>'液晶投影机')); ?></td>
            <td><?php echo $form->label($model,'brand'); ?></td>
            <td><?php echo $form->textField($model,'brand',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'type'); ?></td>
            <td><?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'price'); ?></td>
            <td><?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'zhaodu'); ?></td>
            <td><?php echo $form->textField($model,'zhaodu',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'liuming'); ?></td>
            <td><?php echo $form->textField($model,'liuming',array('size'=>20,'maxlength'=>50)); ?></td>
            <td><?php echo $form->label($model,'buyTime'); ?></td>
            <td><?php echo $form->textField($model,'buyTime'); ?></td>
            <td><?php echo $form->label($model,'supplyCompany'); ?></td>
            <td><?php echo $form->textField($model,'supplyCompany',array('size'=>20,'maxlength'=>50)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->label($model,'usedTime'); ?></td>
            <td><?php echo $form->textField($model,'usedTime',array('size'=>20,'maxlength'=>10)); ?></td>
            <td><?php echo $form->label($model,'isUsing'); ?></td>
            <td><?php echo $form->dropDownList($model,'isUsing',array('在用'=>'在用设备', '备用'=>'备用设备')); ?></td>
        </tr>
    </table>
	<div class="row buttons">
		<?php echo CHtml::submitButton('检索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->