<?php
// 连主库
$link=mysql_connect("sqld.duapp.com".':'."4050","b8c008567f27469380aa9dcf469b96cb","2fbefac1df9a4453aa537322200a31fe");

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if($link)
{
    mysql_select_db(QBvxfZVtEdNlRLcqkHtw,$link);
    //your code goes here
}
?>