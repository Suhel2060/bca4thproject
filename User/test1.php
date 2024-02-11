<?php
$fp=fopen("datatext.txt",'w');
fwrite($fp,"hello");
fwrite($fp,"PHP file");
echo($fp);
fclose($fp);
?>