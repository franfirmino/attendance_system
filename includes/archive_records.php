<?php

include "../includes/connect.php";

                //$date = date('Y-m-d');
                
                $date = '2015-11-27';
                
                
                 
                $result =mysqli_query($con, "
                
                SELECT CRM.Student_Number, Courses.End_Date, Courses.Start_Date, CRM.Full_Name
                FROM CRM
                     JOIN Courses
                          ON Courses.Course = CRM.Course");
                
                while($row = mysqli_fetch_array($result)){ 
                
                $stu_number = $row['Student_Number'];
                $end_date = $row['End_Date'].'     ';
                $start_date = $row['Start_Date'];
                $name = $row['Full_Name'];
                
               
                $end_three = strtotime("+3 months", strtotime($end_date));
                $after_three = date('Y-m-d', $end_three).'      ';
                
                $year_start =  date("Y",strtotime($start_date));
                $year_end =  date("Y",strtotime($end_date));
                
                    
                
                if ($date > $after_three){
      
                $archive =mysqli_query($con,"INSERT INTO Archive
                (Id,Att_Sem1, Att_Sem2, Att_Sem3, Swipes_Sem1, Swipes_Sem2, Swipes_Sem3, Classes_Sem1, Classes_Sem2, Classes_Sem3, Overall)
                SELECT *
                FROM Attendance WHERE Attendance_Id = '$stu_number'");
                
                $insert_year =mysqli_query($con,"UPDATE Archive SET Name= '$name', Year='$year_start', Year2='$year_end' WHERE Id ='$stu_number'");
                
                $delete =mysqli_query($con,"DELETE FROM Attendance
                WHERE Student_Number = '$stu_number'");                
                
                
                }
                          
          }

?>