<?php 
$host= $_SERVER['HTTP_HOST'];
$url= $_SERVER['PHP_SELF'];
$query_string= $_SERVER['QUERY_STRING'];
echo 'Host: '.$host.'<br>';
echo 'URL: '.$url.'<br>';
echo 'URL: '.$query_string.'<br>';
?>