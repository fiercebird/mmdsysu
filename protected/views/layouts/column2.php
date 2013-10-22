<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
<link href="css/main.css" type="text/css" rel="stylesheet"></link>
<link href="css/form.css" type="text/css" rel="stylesheet"></link>
<link href="css/screen.css" type="text/css" rel="stylesheet"></link>
</head>
<body>
<div style="white-space:normal;width:95%;word-break:break-all;table-layout:fixed;margin:0 auto;">
<div id="tbl_nav">
	<div class="breadcrumbs">
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'homeLink' => '<a href="index.html">首页</a>',
			'links' => $this->breadcrumbs,
		));
		?>
	</div>
    <div class="operation" >
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
