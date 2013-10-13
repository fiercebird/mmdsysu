<?php
header("Content-Type:text/html; charset=UTF-8");

$misdb_i = new misdb();
$misdb_i->DbConnect();
$result = $misdb_i->DbQuery('select ArteId,ArteName,CateId,Campus,PubTime from Article where CateId="2" order by PubTime desc limit 0,' . ServiceNums );
while ($row = $misdb_i->DbResult($result))
{
	echo 
	'<div class="Item">
	<a title="' . $row['ArteName']  . '" href="./infoContent.php?ArteId='. urlencode($row['ArteId']) .  '">
	<span class="Campus">[' . $GetCampus[$row['Campus']] .']</span>' 
	. $row['ArteName'] 
	. '</a>
	<span class="PubTime">'. substr($row["PubTime"],0,10) .'</span>
	</div>';
}
$misdb_i->DbFree($result);
$misdb_i->DbClose();
?>
