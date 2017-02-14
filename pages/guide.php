<?php

    session_start();
    include "../includes/connect.php";
    
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
         <div class="well well-sm">
         <div class="row">
           <div class="col-md-12 left">
           <h2 class="text-primary">INDEX PAGE</h2>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
           <p>The attendance is automatically calculated when the page loads according to the semester that we are currently in. So if we are in November it will calculate the students’ attendance for Semester 1 and if we are in January it will calculate for Semester 2(for the September intake) or Semester 1 (for the January intake.)</p>
           <p>But if you want to calculate the attendance for a previous semester you have to pick a date, so if you have done a TDS report from January till May, you have to upload it to the system and then go to the index page and pick the date. It will calculate the students’ attendance from the beginning of the semester till the day picked.</p>
           <p><h3>DOWNLOAD REPORT:</h3> On the index page you can download a full report of the students’ attendance in Excel format.</p>
           <p><h3>CALCULATE MANUALLY:</h3>You can click on the button on the right hand side of the index page. This button brings you to another page that allow you to calculate attendance for a specific student or for specific course. This could be necessary in case of timetable changes.</p>
           <p>So the same as index page you pick a date to calculate the attendance until. So if I done a TDS report till November and I am in September. The system will calculate the attendance from September till November.</p>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 left">
           <h2 class="text-primary">STATISTICS</h2>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 left">
           <p>In this page you will see statistics about the international students. The first map shows students by country.</p>
           <h3>ATTENDANCE CHARTS:</h3><p>When you click on Attendance Charts button it will show other two graphs with students’ information as international students’ attendance and nationalities.</p>
           </div>
         </div>
          <div class="row">
           <div class="col-md-12 left">
           <h2 class="text-primary">STUDENT DETAILS</h2>
           </div>
           </div>
        <div class="row">
           <div class="col-md-12 left">
           <p>In this page you can search for a specific student attendance details and on the right hand side you will see a graph showing the student’s attendance variation for the 3 semesters. </p>
           </div>
         </div>
        <div class="row">
           <div class="col-md-12 left">
           <h2 class="text-primary">MANAGE DATA</h2>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 left">
           <p>On this page you will be able to update information needed to calculate the attendance. You can update the CRM table, TDS Table and Course table. And also at the right hand side you can download templates for the table because to be upload to the website the tables need to have the same number of columns with the same name. So I created this templates to facilitate importing data to the system. </p>
           <h3>NOTE:</h3><p>Be aware when uploading data about empty fields. Try to fill all fields as much as possible before uploading it to avoid errors.</p>
           <h3>COURSE TABLE:</h3><p>When uploading courses merge the course name with the course year for example if we have “BSc Computing” then “Year 3” we join the columns in one as “BSc Computing3”.And in case the course runs in January and September add “JAN” to the end of the January starting course like this “MSc Data AnalyticsJAN1” so the system will be able to differentiate it and make a more accurate calculation. </p>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 left">
           <h2 class="text-primary">ARCHIVED</h2><p>In this section you will see all students which their course already ended so they get stored here if needed for future reference. You can download this table and also delete contents of the table if it gets too full.</p>
           </div>
         </div>
            </div>
        
        
         </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
	