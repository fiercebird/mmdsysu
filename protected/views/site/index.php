<?php
/* @var $this SiteController */

$this->pageTitle="中山大学多媒体后台管理平台";
?>

<p>
    这里是首页！
    <?php echo '您是' . Yii::app()->user->getState("auth")  . '级管理员'; ?>
</p>