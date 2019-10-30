<?php
$config = include "../dbconf.php";
//echo "대림대학교";
//print_r($config);

require "../Loading.php";
/*
require "../Module/Database/database.php"; //1개
require "../Module/Database/table.php"; //2개
*/

$db = new \Module\Database\Database($config);
$html = new \Module\Html\HtmlTable;

$query = "SHOW TABLES";
$result = $db->queryExecute($query);

$count = mysqli_num_rows($result);
$content = ""; //초기화
$rows = []; //배열 초기화
for($i=0;$i<$count;$i++){
    $row = mysqli_fetch_object($result);
    $rows []= $row; //배열 추가
    /*
    $content .="<tr>";
    $content .="<td>$i</td>";
    $content .= "<td>".$row->Tables_in_php."</td>";
    $content .="</tr>";
    */
}
$content = $html->table($rows);

$body = file_get_contents("../Resource/table.html");
$body = str_replace("{{content}}",$content, $body); // 데이터 치환
echo $body;

