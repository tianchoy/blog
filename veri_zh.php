<?php
session_start();

//设置画布
$image = imagecreatetruecolor(200 , 40);
$bgcolor = imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$bgcolor);

//生成随机纯数字
/*
for($i=0;$i<4;$i++){
    $fontsize = 6;
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    $fontcontent = rand(0, 9);
    $x = ($i*100/4)+rand(5,10);
    $y = rand(5,10);
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
*/
$str = "天高云重云彩密布的天空不能阻挡阳光的影子很多事都会像天空一样时而云彩密布时而晴空万里只希望未来的岁月能做到简单平凡而幸福就好再回首那些有风吹过的夏天里那些有阳光有云彩的日子不会太遗憾";
$fontface = 'fonts/ArialUnicode.ttf';
$strdb = str_split($str,3);
$vericode='';
//生成字母和数字混合验证码
for($i=0;$i<4;$i++){
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    $index = rand(0,count($strdb));
    $cn = $strdb[$index];
    $vericode .= $cn;
    imagettftext($image,mt_rand(14,16),mt_rand(-60,40),(40*$i+20),mt_rand(30,35),$fontcolor,$fontface,$cn);
}
$_SESSION['authcode']=$vericode;
//生成干扰点
for($i=0;$i<200;$i++){
    $pointcolor = imagecolorallocate($image,rand(80,120),rand(80,120),rand(80,120));
    imagesetpixel($image,rand(1,199),rand(1,59),$pointcolor);
}
//生成干扰线
for($i=0;$i<5;$i++){
    $linecolor = imagecolorallocate($image,rand(120,220),rand(120,220),rand(120,220));
    imageline($image,rand(1,199),rand(1,59),rand(1,199),rand(1,59),$linecolor);
}

header('content-type:image/png');

imagepng($image);

//销毁
imagedestroy($image);
?>
