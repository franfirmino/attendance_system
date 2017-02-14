<?php
 
    session_start();
 
    include "../includes/connect.php";
    
    $user_id = $_SESSION['user_id'];
       
    
    if ($_SESSION['loggedin'] != $user_id) {      
 
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
         
          
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      
        
        <!--BootStrap Filter for Report Table-->
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
       <!--END Filter-->
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
     <!--END  Navigation -->


        <!--GETIING PHP VARIABLES-->
        <?php 
        $_SESSION['holidays']; 
        $_SESSION['date'];
        $_SESSION['course_date'];
        
        include "../includes/report_by_date.php"; 

        ?>
        <!--END VARIABLES-->
        
      <!-- Page Content -->         
      <div class="container">
      
             
          <h2>ATTENDANCE DETAILS</h2>
           
          <div class="alert alert-info">
          <strong>*Info!</strong> Student(s) were added to final report.
          </div>
          
         <!--DOWNLOAD AND REPORT BUTTON-->  
          <form action="../includes/export.php" method="post">
          <input class="btn btn-success" type="submit" name="submit" value="Download Final Report" /> 
          <a href="generate_report.php" class="btn btn-primary" role="button">Generate Another Report</a>
          </form></br>
        <!--END BUTTONS-->
      
        <!--FILTER FOR TABLE-->
          </br><div class="input-group"><span class="input-group-addon">Filter Result</span>
            <input id="filter" type="text" class="form-control" placeholder="Type here..."></div>
        <!--END FILTER FOR TABLE-->     
         
        
        <!--TABLE WITH INFO FROM STUDENTS TABLE-->
                                 
          <table class="table table-hover">
            <thead>
                <tr>
                <th>Student Number</th>
                <th>First Name</th>    
                <th>Last Name</th> 
                <th>Course</th> 
                <th>Classes Week</th> 
                <th>Days Swiped</th> 
                <th>Course Start Date</th> 
                <th>Attendance %</th>
              </tr>
            </thead>
            <tbody class="searchable">
          
            <?php 
         include "../includes/connect.php";
         
         $query = "SELECT * FROM Students WHERE Start_Date ='$course_date'"; 
         $result = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_array($result)){   
        echo "<tr><td>" . $row['Student_Number'] . "</td><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td>
        <td>" . $row['Course'] . "</td><td>" . $row['Classes_Week'] . "</td><td>" . $row['Days_Swiped'] . "</td>
        <td>" . $row['Start_Date'] . "</td><td>" . $row['Attendance'] . "</td></tr>";          
         
        }
        
         mysqli_close($con);
        ?>
        
        </tbody>
          </table>
          <!--END TABLE-->
          
        </div>       
        <!--END Page Content -->   
    
    
     <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   

</body>

</html>