<?php
include_once '../../db.php';
header("Content-Type:text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Origin: http://tianchao.duapp.com");

$sql_initbest="select * from arts";


$query = mysql_query($sql_initbest);
$items=array();


$data=array();
$sql = "show fields from arts";
$query1 = mysql_query($sql);
while($row1=mysql_fetch_array($query1)){
    $data[]=$row1['Field'];
}
echo "{";
echo '
    "arts":';
echo "[";
while($row=mysql_fetch_array($query)){

    $d0 = "".$data[0]."";
    $d1 = "".$data[1]."";
    $d2 = "".$data[2]."";
    $d3 = "".$data[3]."";
    $d4 = "".$data[4]."";
    $d5 = "".$data[5]."";
    $id = "".$row["id"]."";
    $title = "".$row["title"]."";
    $content = "".$row["content"]."";

    $qian=array(" ","　","\t","\n","\r");
    $hou=array("","","","","");
    $content = str_replace($qian,$hou,$content);

//    $content = str_replace(PHP_EOL, '', $content);
    $content = str_replace('<br>','', $content);
    $content = str_replace('<p>','<span>',$content);
    $content = str_replace('</p>','</span>',$content);
    $content = str_replace('<div>','<span>',$content);
    $content = str_replace('</div>','</span>',$content);
    $content = str_replace('<span></span>','',$content);

//    $content = strip_tags($content);


    $time = "".$row["time"]."";
    $hits = "".$row["hits"]."";
    $art_love = "".$row["art_love"]."";


    $res = "{".'"'.$d0. '"'.':'.'"'.$id.'"'.','.'"'.$d1. '"'.':'.'"'.$title.'"'.','.'"'.$d3. '"'.':'.'"'.$content.'"'.','.'"'.$d2. '"'.':'.'"'.$time.'"'.','.'"'.$d4. '"'.':'.'"'.$hits.'"'.','.'"'.$d5. '"'.':'.'"'.$art_love.'"},';

    echo $res;

}

echo rtrim($res,',');

echo "]}";
?>


