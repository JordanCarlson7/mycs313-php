<?php
     // create a PHP object with the filename,filetype, and cwd properties.
     class fileN
     {
        public $fileName;
        public $fileType;
        public $cwd;
     }

     $cwd = getcwd();     // get path to the current working directory
     $folder = ".";       // Set the folder variable to specify the "current" directory
     
     $files = scandir($folder);
     $directory = Array();     // create a array object to store a list of objects.

     $len = sizeof($files);
     for ($i = 0; $i < $len; $i++){
         $directory[$i] = new fileN();
         $directory[$i]->fileName = $files[$i]; //"assign02.html"; //
         $directory[$i]->fileType =  fileType($files[$i]);//"file";//
         $directory[$i]->cwd = $cwd;//"/home/joh0801/public_html/";*/
     }

     // convert the PHP array of objects to a JSON string
     $str = json_encode($directory);
     print "\n $str \n";   //output the json string - The string is sent to the browser.      
     
?>