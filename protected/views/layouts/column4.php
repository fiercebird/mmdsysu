<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="Bookmark" href="images/favicon.ico" />
        
        <link href="css/main.css" type="text/css" rel="stylesheet"></link>
<link href="css/form.css" type="text/css" rel="stylesheet"></link>

        <meta name="language" content="zh_cn" />
        <title>中山大学多媒体后台管理平台</title>
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <?php
        Yii::app()->clientScript->registerCoreScript('jquery');
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/ddsmoothmenu.js");
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/main.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/scrollTop.js");
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/ie.css");
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/main.css");
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/navCrud.css");
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/ddsmoothmenu.css");
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/ddsmoothmenu-v.css");
        ?>
    </head>

<body>
<div style="white-space:normal;width:95%;word-break:break-all;table-layout:fixed;margin:0 auto;">
<div id="tbl_nav">
    <?php
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
		'htmlOptions' => array('style' => 'text-align:left'),
    ));
    ?>
    <div class="operation">
        <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
            ));
        ?>
    </div>
</div>
<?php echo $content; ?>
</div>
</body>
</html>