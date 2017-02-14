<?php  
      
        include "connect.php";
  
       
        $stu_number =  $_POST['stu_number']; 
        $customized_date =  $_POST['date']; 
        $days_off =  $_POST['days_off'];
       
        $date = $customized_date;
       
        
        
      
        //Get semesters start and end dates
        $s1 = mysqli_query($con, "SELECT semester, start_sem, end_sem, reading_week FROM Academic_Calendar WHERE semester ='Sem1'");
        
        while($sem1 = mysqli_fetch_assoc($s1)){       
        $sem1_start = $sem1['start_sem'];
        $sem1_end = $sem1['end_sem'];
        $sem1_reading = $sem1['reading_week'];
        
        }  
        
        $s2 = mysqli_query($con, "SELECT semester, start_sem, end_sem, reading_week FROM Academic_Calendar WHERE semester ='Sem2'");
        
        while($sem2 = mysqli_fetch_assoc($s2)){       
        $sem2_start = $sem2['start_sem'];
        $sem2_end = $sem2['end_sem'];
        $sem2_reading = $sem2['reading_week'];
        
        } 
        
        $s3 = mysqli_query($con, "SELECT semester, start_sem, end_sem, reading_week FROM Academic_Calendar WHERE semester ='Sem3'");
        
        while($sem3 = mysqli_fetch_assoc($s3)){       
        $sem3_start = $sem3['start_sem'];
        $sem3_end = $sem3['end_sem'];
        $sem3_reading = $sem3['reading_week'];
        
        }         
        //END semesters start and end dates
 
        // set array
        $att = array();
        $row2 =array();
        $result = array();
        
        $sql1 = mysqli_query($con,"SELECT Id, Days_Swiped, First_Name, Last_Name FROM TDS");

         // look through query
         while($att = mysqli_fetch_assoc($sql1)){        
        
         $days_swiped = $att['Days_Swiped'];
         $stu_number = $att['Id'];
         $fname = $att['First_Name'];
         $lname = $att['Last_Name'];
         
         
                
         $sql2 = mysqli_query($con,"            
         SELECT Course, Nationality, Gender
         FROM CRM
         WHERE Student_Number = '$stu_number'");
          
         while($row2 = mysqli_fetch_assoc($sql2)){
         
         $course = $row2['Course'];
         $nationality = $row2['Nationality'];
         $gender = $row2['Gender'];
         
         }

         $sql4 = mysqli_query($con, "
         SELECT Classes_Week, Classes_Week2, Classes_Week3, Start_Date, End_Date, Days_off, Days_off2, Days_off3
         FROM Courses
         WHERE Course = '$course'");
         
         while($result = mysqli_fetch_assoc($sql4)){
         $class_week = $result['Classes_Week'];
         $class_week2 = $result['Classes_Week2'];
         $class_week3 = $result['Classes_Week3'];
         $start = $result['Start_Date'];
         $end = $result['End_Date'];
         $days_off = $result['Days_off'];
         $days_off2 = $result['Days_off2'];
         $days_off3 = $result['Days_off3'];
         

         $course_start = new DateTime($start);         
         $todays_date = new DateTime($date);  
         
         $month_end =  date("m",strtotime($end));
         $month_start = date("m",strtotime($start));
 
         $september ='09';
         $january ='01';
         $august ='08';

 
         if ($date >= $sem1_start && $date <= $sem1_end){
                              
 
                    if($month_start == $september){
                 
                             
                     $semester_start = new DateTime($sem1_start);       
                     $interval = $semester_start->diff($todays_date);
                     $weeks_passed =(round(($interval->days)/7));
                     
                     $weeks = $weeks_passed;
                         
                     $classes_total = ($weeks*$class_week)-$days_off;
                      
    
                     $sem1_att = (round($days_swiped*100/$classes_total));               
 
                     
                     $sql6 = mysqli_query($con,"UPDATE Attendance SET Att_Sem1='$sem1_att', Swipes_Sem1='$days_swiped',
                     Classes_Sem1= '$classes_total', Overall='$sem1_att' WHERE Attendance_Id = '$stu_number'");
     
    
                     }else if($month_end == $january){
                              
                                     
                             $semester_start = new DateTime($sem1_start);       
                             $interval = $semester_start->diff($todays_date);
                             $weeks_passed =(round(($interval->days)/7));
                             
                             $weeks = $weeks_passed;
                                 
                             $classes_total = ($weeks*$class_week3)-$days_off;
                              
            
                             $sem1_att = (round($days_swiped*100/$classes_total));               
         
                         
                         $swipes_sem3 = $days_swiped;
                         $classes_sem3 = $classes_total;
                         
                         $sql3 = mysqli_query($con,"            
                         SELECT *
                         FROM Attendance
                         WHERE Attendance_Id = '$stu_number'");
                         
                         while($row5 = mysqli_fetch_assoc($sql3)){
                         
                         $att_sem1 = $row5['Att_Sem1'];
                         $att_sem2 = $row5['Att_Sem2'];
                         $swipes_sem1 = $row5['Swipes_Sem1'];
                         $swipes_sem2 = $row5['Swipes_Sem2'];
                         $classes_sem1 = $row5['Classes_Sem1'];
                         $classes_sem2 = $row5['Classes_Sem2'];
                         
                         } 
                  
                    
                     $overall = (($swipes_sem1 + $swipes_sem2 + $swipes_sem3) / ($classes_sem1 + $classes_sem2 + $classes_sem3))*100;   
                     
                     $sql8 = mysqli_query($con,"UPDATE Attendance SET Att_Sem3= '$sem1_att', Overall='$overall',
                     Classes_Sem3= '$classes_total', Swipes_Sem3='$days_swiped' WHERE Attendance_Id = '$stu_number'");
                  

                     }else{
                     
                     }
                  
          
         }else if($date >= $sem2_start && $date <= $sem2_end){
   
                   if($month_start == $september){ 
                   
                                                       
                             $semester_start = new DateTime($sem2_start);       
                             $interval = $semester_start->diff($todays_date);
                             $weeks_passed =(round(($interval->days)/7));
                             
                             $weeks = $weeks_passed;
                                
                             $classes_total = ($weeks*$class_week2)-$days_off;                          
                                      
                             $sem2_att = (round($days_swiped*100/$classes_total)); 
                             
                
                         $swipes_sem2 = $days_swiped;
                         $classes_sem2 = $classes_total;
      
                         $sqlov = mysqli_query($con,"            
                         SELECT *
                         FROM Attendance
                         WHERE Attendance_Id = '$stu_number'");
                         
                         while($row7 = mysqli_fetch_assoc($sqlov)){
                         
                         $att_sem1 = $row7['Att_Sem1'];
                         $swipes_sem1 = $row7['Swipes_Sem1'];
                         $classes_sem1 = $row7['Classes_Sem1'];  
                         } 
                         
                     $overall2 = (($swipes_sem1 + $swipes_sem2) / ($classes_sem1 + $classes_sem2))*100;
                  
                     $sql9 = mysqli_query($con,"UPDATE Attendance SET Att_Sem2= '$sem2_att', Overall='$overall2',
                     Classes_Sem2= '$classes_total', Swipes_Sem2='$days_swiped'
                     WHERE Attendance_Id = '$stu_number'");

                     }else if($month_start == $january){
                                                  
                             $semester_start = new DateTime($sem2_start);       
                             $interval = $semester_start->diff($todays_date);
                             $weeks_passed =(round(($interval->days)/7));
                             
                             $weeks = $weeks_passed;
                                
                             $classes_total = ($weeks*$class_week)-$days_off;
      
                             $sem1_att = (round($days_swiped*100/$classes_total)); 
                             
                     
                     $sql13 = mysqli_query($con,"UPDATE Attendance SET Att_Sem1='$sem1_att', Classes_Sem1='$classes_total', 
                     Swipes_Sem1='$days_swiped', Overall='$sem1_att'");
                      
                     }else{
                     
                     }
          
         
         }else if($date >= $sem3_start && $date <= $sem3_end){
         
                     if($month_end == $august && $month_start == $september){
                                        
                     $semester_start = new DateTime($sem3_start);       
                     $interval = $semester_start->diff($todays_date);
                     $weeks_passed =(round(($interval->days)/7));
                          
                     $weeks = $weeks_passed;
                         
                     $classes_total = ($weeks*$class_week3)-$days_off;
                 
                     $sem3_att = (round($days_swiped*100/$classes_total));
                     
                         
                         $sql3 = mysqli_query($con,"            
                         SELECT *
                         FROM Attendance
                         WHERE Attendance_Id = '$stu_number'");
                         
                         while($row5 = mysqli_fetch_assoc($sql3)){
                         
                         $att_sem1 = $row5['Att_Sem1'];
                         $att_sem2 = $row5['Att_Sem2'];
                         $swipes_sem1 = $row5['Swipes_Sem1'];
                         $swipes_sem2 = $row5['Swipes_Sem2'];
                         $classes_sem1 = $row5['Classes_Sem1'];
                         $classes_sem2 = $row5['Classes_Sem2'];
                         
                         } 
                  
                     $overall = (($swipes_sem1 + $swipes_sem2 + $swipes_sem3) / ($classes_sem1 + $classes_sem2 + $classes_sem3))*100;
                     
                     $sql23 = mysqli_query($con,"UPDATE Attendance SET Att_Sem3= '$sem3_att', Overall='$overall',
                     Classes_Sem3= '$classes_total', Swipes_Sem3='$days_swiped' WHERE Attendance_Id = '$stu_number'");
      
                     }else if($month_end == $january && $month_start == $january){
                     
                                      
                     $semester_start = new DateTime($sem3_start);       
                     $interval = $semester_start->diff($todays_date);
                     $weeks_passed =(round(($interval->days)/7));
                          
                     $weeks = $weeks_passed;
                         
                     $classes_total = ($weeks*$class_week2)-$days_off;
                 
                     $sem2_att = (round($days_swiped*100/$classes_total));
                      
                     $sql44 = mysqli_query($con,"            
                         SELECT *
                         FROM Attendance
                         WHERE Attendance_Id = '$stu_number'");
                         
                         while($row8 = mysqli_fetch_assoc($sql44)){
                         
                         $att_sem1 = $row8['Att_Sem1'];
                         $att_sem2 = $row8['Att_Sem2'];
                         $swipes_sem1 = $row8['Swipes_Sem1'];
                         $swipes_sem2 = $row8['Swipes_Sem2'];
                         $classes_sem1 = $row8['Classes_Sem1'];
                         $classes_sem2 = $row8['Classes_Sem2'];
                         
                         } 
                  
                     $overall = (($swipes_sem1 + $swipes_sem2) / ($classes_sem1 + $classes_sem2))*100;
                                          
                     $sql54 = mysqli_query($con,"UPDATE Attendance SET Att_Sem2= '$sem2_att', Overall='$overall',
                     Classes_Sem2= '$classes_total', Swipes_Sem2='$days_swiped' WHERE Attendance_Id = '$stu_number'");
                    
                     
                     }else{
                     
                     }
  
              }
           
        }
  
     }
  
    
?>     