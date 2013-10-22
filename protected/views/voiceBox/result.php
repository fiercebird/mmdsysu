<?php
/* @var $sum 总共的记录 */
/* @var $num 插入成功的记录 */
/* @var $erraor 插入失败的行号数组*/

$this->breadcrumbs=array(
	'音箱'=>array('admin'),
	'批量插入结果',
);
?>
批量导入结果：<br />
文件总共有记录<?php echo $sum ?>行；<br />
成功插入了<?php echo $num ?>行；<br />
以下行插入失败：
<?php
    if(count($error) == 0)
        echo '无；';
    else
    {
        foreach($error as $value)
            echo $value . ',';
        echo '.';
        echo '<small>原因是因为设备所在课室信息输入失败。</small>';
    }
?>

