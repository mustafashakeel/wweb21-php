<?php

echo readfile("myfile.txt");


$myfile = fopen("myfile.txt", "r") or die("I am not able to get the file ");

echo "<br/>";
echo fgets($myfile);

echo " Multi Line <br/>";

while (!feof($myfile)) {
    echo fgets($myfile) . '<br/>';
}


echo " Read Single Characters ";
while (!feof($myfile)) {
    echo fgetc($myfile);
}


fclose($myfile);
