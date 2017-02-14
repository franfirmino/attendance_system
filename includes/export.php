<?php

    include "connect.php";
    
    //Create File    
    header("content-type: application/force-download");
    header('Content-Type: application/csv');
    header('Pragma: no-cache');
    
    $result =mysqli_query($con, "
                
                SELECT CRM.Student_Number, TDS.First_Name, TDS.Last_Name, Courses.Course, TDS.Days_Swiped, 
                Attendance.Att_Sem1, Attendance.Att_Sem2, Attendance.Att_Sem3, Attendance.Overall, Courses.Start_Date, Courses.End_Date
                FROM CRM
                     JOIN TDS
                          ON TDS.Id = CRM.Student_Number
                     JOIN Courses
                          ON Courses.Course = CRM.Course
                     JOIN Attendance
                          ON Attendance.Attendance_Id = CRM.Student_Number");
                          
      
    $filename = "Att_Rpt_".date("Y-m-d").".csv";
    
    $fp = fopen( $filename, 'w');
    
    $csv_fields=array();

        $csv_fields[] = 'Student Number';
        $csv_fields[] = 'First Name';
        $csv_fields[] = 'Last Name';
        $csv_fields[] = 'Course';
        $csv_fields[] ='Days Swiped';
        $csv_fields[] = 'Semester 1 %';
        $csv_fields[] = 'Semester 2 %';
        $csv_fields[] = 'Semester 3 %';
         $csv_fields[] = 'Overall %';
        $csv_fields[] ='Course Start Date';
        $csv_fields[] ='Course End Date';
  
        
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