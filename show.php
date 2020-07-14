<?php
/*
$title   = $_POST['title_text'].'.txt';
$content = $_POST['content'];
$file = fopen($title, 'w');
fwrite($file, $content);
fclose($file);
*/
$myfile = fopen("test 1 .txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("test 1 .txt"));
fclose($myfile);