<?php
$fp=fopen("datatext.txt",'w');
fwrite($fp,"hello1");
fwrite($fp,"PHP file1");
echo($fp);
fclose($fp);
?>