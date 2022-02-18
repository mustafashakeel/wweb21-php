<?php


/// To open a file use a php function called fopen()
// it accepts two parameters 
// 1. file name 
// 2. permissions 

$myfile = fopen("mynewfile.txt", "w+") or die("I am not able to get the file ");


//  to write content on to the file selected or created use fwrite function 
//  it also accepts parameters 
// 1. the loaded or selected file 
// 2.  the content which is to be written 

$text = "Hello word";
fwrite($myfile, $text);

$text2 = "\n how is your day";
fwrite($myfile, $text2);


fclose($myfile);
