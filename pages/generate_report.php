<?php
 
    session_start();
    // Call this function so your page
    // can access session variables
       
    $user_id = $_SESSION['user_id'];   
       
    
    if ($_SESSION['loggedin'] != $user_id) {
        // If the 'loggedin' session variable
        // is not equal to 1, then you must
        // not let the user see the page.
        // So, we'll redirect them to the
        // login page (login.php).
 
        header("Location: ../index.php");
        exit;
    }
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INTERNATIONAL STUDENTS REPORT</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
          
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        </head>
        
     <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INTERNATIONAL STUDENTS REPORT</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
          
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">
        
       <script>
        
        $(document).ready(function () {

        (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        
                })
        
            }(jQuery));
        
        });

        </script>
  
        </head> 
 
 <body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">ATTENDANCE REPORT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                    <li>
                        <a href="map_chart.php">Statistics</a>
                    </li>
                    <li>
                        <a href="profile.php">Student Details</a>
                    </li>
                    <li>
                        <a href="update.php">Manage Data</a>
                    </li>   
                    <li>
                        <a href="archive.php">Archived</a>
                    </li> 
                   </ul>
                <ul class="nav navbar-nav navbar-right">
                       <li><a class="button" href="guide.php">Guide</a></li>
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>&nbsp;<a href="../includes/logout.php?logout">Sign Out</a></li>
                                </ul>
                        </li>
                    </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
     </nav>
     
     <!-- Page Content -->
  <div class="container">       
 <div class="row">
    <div class="col-md-6 left">
        <h3>Calculate for a Specific Student</h3>
               
      <!-- Form code begins -->
        <form role="form" action="" method="post">
        
        <div class="form-group">
        <label for="stu_number">Student Number</label>
        <input type="text" name="stu_number" id="stu_number" >
        </div>
        
        <div class="form-group">
        <label  for="date">Pick a Date</label>
        <input id="date" name="date" placeholder="YYYY/MM/DD" type="date">
        </div>
        
        <div class="form-group">
        <label for="days_off">Deduct(Days)</label>
        <input type="text" name="days_off" id="days_off" valeus="Days">
         <input class="btn btn-primary" type="submit" name="by_student" value="Generate">
        </div>
        
        </form> 
  </div>
  </div>
  </br>
   <div class="row">
   <div class="col-md-12 center">
   <div class="table-responsive">                       
          <table class="table table-hover">
            <thead>
                <tr>
                <th>Student Number</th>
                <th>First Name</th>    
                <th>Last Name</th> 
                <th>Course</th> 
                <th>Semester 1 %</th>
                <th>Semester 2 %</th>
                <th>Semester 3 %</th>
                <th>Overall %</th>
                <th>Course Start Date</th> 
                <th>Course End Date</th> 
              </tr>
            </thead>
            <tbody class="searchable">
          
            <?php 
                 include "../includes/connect.php";
          if(isset($_POST['by_student'])){
          
            $spec_number =  $_POST['stu_number']; 
            $customized_date =  $_POST['date']; 
            $days_off =  $_POST['days_off']; 
            
            include "../includes/customized_student.php";

            $result =mysqli_query($con, "
                
                SELECT CRM.Student_Number, TDS.First_Name, TDS.Last_Name, Courses.Course, TDS.Days_Swiped,
                Attendance.Overall, Attendance.Att_Sem1, Attendance.Att_Sem2, Attendance.Att_Sem3, Courses.Start_Date, Courses.End_Date
                FROM CRM
                     JOIN TDS
                          ON TDS.Id = CRM.Student_Number
                     JOIN Courses
                          ON Courses.Course = CRM.Course
                     JOIN Attendance
                          ON Attendance.Attendance_Id = CRM.Student_Number
                     WHERE CRM.Student_Number = '$spec_number'");
                     
                while($row = mysqli_fetch_array($result)){   
                echo "<tr><td>" . $row['Student_Number'] . "</td><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td>
                <td>" . $row['Course'] . "</td><td>" . $row['Att_Sem1'] . "</td><td>" . $row['Att_Sem2'] . "</td><td>" . $row['Att_Sem3'] . "</td>
                <td>" . $row['Overall'] ."</td><td>" . $row['Start_Date'] . "</td><td>" . $row['End_Date'] . "</td></tr>";          
                 
                }
               
            } 
           
          
              ?>
        
             </tbody>
          </table>
         </div>
        </div>
     </div>


    <!-- Page Content -->
</div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>




</body>
</html>
        
        