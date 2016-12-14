<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 if (is_uploaded_file($_FILES['upfile']['tmp_name'])){   //判断文件是否上传
  $upfile=($_FILES['upfile']);
  $name=$upfile['name'];
  $type=$upfile['type'];
  $size=$upfile['size'];
  $tmp_name=$upfile['tmp_name'];
  $error=$upfile['error'];   
   //限制文件格式只可为：pjpeg  png  gif  jpeg 格式！
  switch($type){
  case 'image/pjpeg': $ok=1;
       break;
case'image/png' : $ok=1;
   break;
case 'image/gif' :$ok=1;
   break;
case 'image/jpeg' :$ok=1;
   break; 
 } 
 if($ok && $error=='0'){
  move_uploaded_file($tmp_name,'images/'.$name);  
   echo "上传成功！";
} else{
 echo "非法文件！";      //非图片格式，给出提示
      }
 }
}
unset($upfile,$error,$name,$ok,$size,$tmp_name,$type);
?>
<!doctype>
<html>
  <head>
    <title>上传图片</title>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data" name="upform">    
    上传文件：<input type="file" name="upfile">
        <input type="submit" value="上传"><br>
    </form>
  </body>
</html>        