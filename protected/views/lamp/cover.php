<?php
$this->breadcrumbs=array(
	'投影机灯泡'=>array('admin'),
	'批量覆盖',
);

$this->menu=array(
	
);
?>

<div style="width:500px;margin:20px 0 0 20px;">
    <h3>Excel批量覆盖灯泡数据</h3>
    <p>大量修改灯泡照度时使用。</p>
    <hr />
    <form name="frmBatchSettle" id="" action="" method="post" enctype="multipart/form-data">
        <small>
            *先导出Excel，修改数据后上传。（请勿修改“校区”、“教学楼”、“课室名”三列，否则无法覆盖）<br />
            *填充信息时，必须保证设备所在课室的“校区”、“教学楼”、“课室名”与《
            <a target="_blank" href="?r=classroom/admin">课室基本信息</a>
            》中一致。<br /><br />
        </small>
        <div style="line-height:300%">
            1. 导出Excel(还没导出？<a href="?r=lamp/admin">点击这里</a>去导出数据).<br />
			2. 修改数据，<strong style="color:red;font-size:16px">请勿修改ID，否则无法覆盖。另存为excel2003-2007格式。</strong><br />
			<img src="./images/format_notice.png" width="500px" height="300px"/>
            3. 选择文件：<input type="file" name="batchFile" value=""><br />
            4. 上传文件：<input type="submit" value="上传"><br />
        </div>
    </form>
</div>