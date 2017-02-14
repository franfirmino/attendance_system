<?php

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

        <div class="row">
   
          <div class="col-lg-6 left">
            <div class="well well-sm">
                <h2>UPDATE CRM TABLE</h2>
                 <form action="../includes/import_CRM.php" method="post"
                    enctype="multipart/form-data"></br>
                         <input type="file" name="file" id="file"></br>
                         <input  class="btn btn-primary" type="submit" name="submit" value="Submit">
               </form>    
               </div>
            </div> 
            <div class="col-lg-6 left">
                  <form action="../includes/export_CRM.php" method="post"
                   <label>Template for CRM List</label></br>
                   <input class="btn btn-success" type="submit" name="export_CRM" value="DOWNLOAD">
               </form>                
              </div> 
          </div>
         <div class="row">
            <div class="col-lg-6 right">
                 <div class="well well-sm">
                <h2>UPDATE TDS TABLE</h2>
                      <form action="../includes/import_TDS.php" method="post"
                    enctype="multipart/form-data"></br>
                         <input type="file" name="file" id="file"></br>
                          <input class="btn btn-primary" type="submit" name="submit" value="submit">
               </form>  
            </div>
          </div>
          
              <div class="col-lg-6 left">
                  <form action="../includes/export_TDS.php" method="post"
                   <label>Template for TDS List</label></br>
                   <input class="btn btn-success" type="submit" name="export_TDS" value="DOWNLOAD">
               </form>                
              </div> 
        </div>
        
         <div class="row">
            <div class="col-lg-6 right">
                 <div class="well well-sm">
                <h2>UPDATE COURSE LIST</h2>
                      <form action="../includes/import_course.php" method="post"
                    enctype="multipart/form-data"></br>
                         <input type="file" name="file" id="file"></br>
                          <input class="btn btn-primary" type="submit" name="submit" value="Submit">
               </form>  
                </div>
            </div>
               
              <div class="col-lg-6 left">
                  <form action="../includes/export_Course.php" method="post"
                   <label>Template for Course List</label></br>
                   <input class="btn btn-success" type="submit" name="export_Course" value="DOWNLOAD">
               </form>                
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
	