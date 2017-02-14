<?php

    include "connect.php";
    
    //Create File    
    header("content-type: application/force-download");
    header('Content-Type: application/csv');
    header('Pragma: no-cache');
    
    $result =mysqli_query($con, "
                
                SELECT DISTINCT Id, Year, Name, Att_Sem1, Att_Sem2, Att_Sem3, Overall, Year, Year2
                FROM Archive");
                          
      
    $filename = "Archive_".date("Y-m-d").".csv";
    
    $fp = fopen( $filename, 'w');
    
    $csv_fields=array();

        $csv_fields[] = 'Student Number';
        $csv_fields[] = 'Full Name';
        $csv_fields[] = 'Semester 1 %';
        $csv_fields[] = 'Semester 2 %';
        $csv_fields[] ='Semester 3 %';
        $csv_fields[] = 'Overall %';
        $csv_fields[] ='From Year';
        $csv_fields[] ='To Year';
  
        
        fputcsv($fp, $csv_fields);
    
    while($row = mysqli_fetch_assoc($result))
    {
      
        fputcsv($fp,$row);
    }
    
    fclose($fp); 
    
    
        
        //Download Code
        $file = basename($_GET['file']);
        $file = $filename.$file;
        
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
        
            //close the db connection
            mysqli_close($con);



    
?>