<?php  
        $dedcuted_datess = $_POST['holidays']; 
        $date = $_POST['date'];
        $course_date = $_POST['course_date'];
       
        $now_date = new DateTime($date);
        $now_date->format('Y-m-d');

        include "connect.php";
        
        
        $sql1 = mysqli_query($con,"SELECT Id, Days_Swiped, First_Name, Last_Name FROM TDS");

        // set array
        $att = array();
        $row2 =array();
        $result = array();
        

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
         
         $sql3 = mysqli_query($con, "
         SELECT Classes_Week, Start_Date
         FROM Courses
         WHERE Course = '$course'");
         
         while($result = mysqli_fetch_assoc($sql3)){
         $class_week = $result['Classes_Week'];
         $start_date = $result['Start_Date'];
         
         if($course_date == $start_date){         
         
         $start = new DateTime($start_date);
         $interval = $start->diff($now_date);
         $result = (int)(($interval->days)/7);
         
         $weeks = $result - $holidays.'   ';
                 
         $classes_total = $weeks*$class_week.'    ';
         
         $attendance = (round($days_swiped*100/$classes_total)).'    ';  
                 
         $sql5 = mysqli_query($con,
         "INSERT INTO Students (Student_Number,First_Name, Last_Name, Course, Attendance, Classes_Week, Days_Swiped, Start_Date,Nationality, Gender) 
         VALUES ('$stu_number','$fname','$lname','$course','$attendance','$class_week', '$days_swiped', '$start_date','$nationality','$gender')");
         
       }
         
         
  
         
     } 

   
         
         
  
?>     