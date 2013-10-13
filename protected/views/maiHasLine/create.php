<?php
/* @var $this MaiHasLineController */
/* @var $model MaiHasLine */

$this->breadcrumbs=array(
	'有线麦'=>array('admin'),
	'添加记录',
);

?>
<div style="float:left;width:450px;margin-right:20px;">
    <h3>添加单条记录</h3>
    <hr />
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<div style="float:left;width:330px;">
    <h3>批量导入数据</h3>
    <hr />
    <form name="frmBatchSettle" id="" action="" method="post" enctype="multipart/form-data">
        <small>
            *请下载Excel模板，填充数据后上传。<br />
            *填充信息时，必须保证设备所在课室的“校区”、“教学楼”、“课室名”与《
            <a target="_blank" href="?r=classroom/admin">课室基本信息</a>
            》中一致。<br /><br />
        </small>
        <div style="line-height:300%">
            1. 下载模板：<a href="<?php echo Yii::app()->request->baseUrl ?>/files/youxianmai.xls">点击这里</a><br>
            2. 选择文件：<input type="file" name="batchFile" value=""><br />
            3. 上传文件：<input type="submit" value="上传"><br />
        </div>
    </form>
</div>