<?php
/* @var $this ClassroomController */
/* @var $model Classroom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classroom-form',
	'enableAjaxValidation'=>false,
)); ?>
    <?php
        //如果是更新，则把原来的校区选中，jq实现
        if(!$model->isNewRecord)
        {
            $script='<script>$(document).ready(function(){$("#Campus_cname").attr("value", "' . $cid . '");});</script>';
            echo $script;
        }
    ?>
        <p class="note">带<span class="required">*</span>为必填项.</p>
	<?php echo $form->errorSummary($model); ?>
        
        <table>
            <tr>
                <td>校区*</td>
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
                <td><?php echo $form->labelEx($model,'bid'); ?></td>
                <td>
                    <?php 
                    //如果是新的记录，则教学楼列表为空，否则为该教室所在教学楼的列表
                    if($model->isNewRecord)
                        echo $form->dropDownList($model, 'bid', array()); 
                    else
                        echo $form->dropDownList($model, 'bid', Building::model()->getBuildingOptionsByCampus($cid)); 
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'className'); ?></td>
                <td><?php echo $form->textField($model,'className',array('size'=>10,'maxlength'=>50)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'seatNum'); ?></td>
                <td><?php echo $form->textField($model,'seatNum',array('size'=>10,'maxlength'=>10)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'examNum'); ?></td>
                <td><?php echo $form->textField($model,'examNum',array('size'=>10,'maxlength'=>10)); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'more'); ?></td>
                <td><?php echo $form->textField($model,'more',array('size'=>10,'maxlength'=>200)); ?></td>
            </tr>
            <tr>
                <td><?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?></td>
                <td><?php echo CHTML::button('返回', array('onclick' => 'js:location.href="'.$this->createUrl('admin', array('back' => '1')).'"')); ?></td>
            </tr>
        </table>

<?php $this->endWidget(); ?>

</div><!-- form -->