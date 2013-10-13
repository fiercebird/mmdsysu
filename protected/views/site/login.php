<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>


    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><table width="962" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="235" background="images/login_top.gif" valign="bottom">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td height="53"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="394" height="53" background="images/login_05.gif">&nbsp;</td>
                                    <td width="206" background="images/login_06.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="16%" height="25"><div align="right"><span class="STYLE1">用户</span></div></td>
                                                <td width="57%" height="25"><div align="center">
                                                        <?php echo $form->textField($model, 'username', array("style" => "width:105px; height:17px; background-color:Black; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff")); ?>
                                                    </div></td>
                                                <td width="27%" height="25"><div id="usrError" class="errorMsg"><?php echo $form->error($model, 'username'); ?></div></td>
                                            </tr>
                                            <tr>
                                                <td height="25"><div align="right"><span class="STYLE1">密码</span></div></td>
                                                <td height="25"><div align="center">
                                                        <?php echo $form->passwordField($model, 'password', array("style" => "width:105px; height:17px; background-color:Black; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff")); ?>
                                                    </div></td>
                                                <td width="27%" height="25"><div id="pwError" class="errorMsg">
                                                        <?php echo $form->error($model, 'password'); ?></div></td>        		
                                            </tr>
                                        </table></td>
                                    <td width="362" background="images/login_07.gif">&nbsp;</td>
                                </tr>

                            </table></td>
                    </tr>
                    <tr>
                        <td height="213" background="images/login_08.gif" valign="top"></td>
                    </tr>
                </table></td>
        </tr>

    </table>
        <div id="sub" style="margin:auto 0;width: 100%;text-align:center">
            <?php echo CHtml::button('Login', array("src" => "images/dl.gif", "type" => "image", "alt" => "Submit")); ?>&nbsp;
        </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
