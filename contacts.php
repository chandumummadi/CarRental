<?php
$file = fopen("contacts.txt","r");

while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);
?>