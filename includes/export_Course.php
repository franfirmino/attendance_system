<?php
      
   
        //Download Code
       
        $file = basename($_GET['file']);
        $file = "Course_Template.csv".$file;
        
        if(!$file){ // file does not exist
            die('file not found');
        } else {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
        
            // read the file from disk
            readfile($file);
        }
  
?>