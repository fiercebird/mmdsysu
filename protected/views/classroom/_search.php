<?php
/* @var $this ClassroomController */
/* @var $model Classroom */
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
                                'update'=>'#Classroom_bid',
                                'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'campus'=>'js:$("#Campus_cname").val()')
                            ),
                            )); 
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->label($model,'bid'); ?></td>
                <td>
                    <?php echo $form->dropDownList($model, 'bid', array());?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->label($model,'className'); ?></td>
                <td><?php echo $form->textField($model,'className',array('size'=>10,'maxlength'=>50)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model,'seatNum'); ?></td>
                <td><?php echo $form->textField($model,'seatNum',array('size'=>10,'maxlength'=>10)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model,'examNum'); ?></td>
                <td><?php echo $form->textField($model,'examNum',array('size'=>10,'maxlength'=>10)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model,'more'); ?></td>
                <td><?php echo $form->textField($model,'more',array('size'=>10,'maxlength'=>200)); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo CHtml::submitButton('查询'); ?></td>
            </tr>
        </table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->