<?php

$myfile = fopen("mynewfile.txt", "w") or die("I am not able to get the file ");

$text = "Hello word";
fwrite($myfile, $text);

$text2 = "\n how is your day";
fwrite($myfile, $text2);


fclose($myfile);
