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
    <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
          
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
                   <a class="navbar-brand" href="../pages/dashboard.php">ATTENDANCE REPORT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <ul class="nav navbar-nav">
                    <li>
                        <a href="../pages/map_chart.php">Statistics</a>
                    </li>
                    <li>
                        <a href="../pages/profile.php">Student Details</a>
                    </li>
                    <li>
                        <a href="../pages/update.php">Manage Data</a>
                    </li>   
                    <li>
                        <a href="../pages/archive.php">Archived</a>
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
   
          <div class="row">
                  <div class="col-md-3 left"></div>
                  <div class="col-md-6 center">                  
                  <h2>UPLOAD DETAILS</h2>
                  <div class="alert alert-success">
                  <strong>Success!</strong> Uploaded Succesfully.
                  </div>
                  </div>
                  <div class="col-md-3 right"></div>
          </div>
          <div class="row">
           <div class="col-md-3 left"></div>
            <div class="col-md-6 center">
                  <?php
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
            //echo "Stored in: " . $_FILES["file"]["tmp_name"];
                $a=$_FILES["file"]["tmp_name"];
                //echo $a;
                
        include "connect.php";
        
        // path where your CSV file is located
        //define('CSV_PATH','C:/xampp/htdocs/');
        //<!-- C:\\xampp\\htdocs -->
        // Name of your CSV file
        $csv_file = $a;
        $query = mysqli_query($con,"DELETE FROM TDS"); 
        
        if (($getfile = fopen($csv_file, "r")) !== FALSE) {
                 $data = fgetcsv($getfile, 1000, ",");
           while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
             //$num = count($data);
                   //echo $num;
                //for ($c=0; $c < $num; $c++) {
                    $result = $data;
                        $str = implode(",", $result);
                        $slice = explode(",", $str);
        
                    $col1 = $slice[0];
                    $col2 = $slice[1];
                    $col3 = $slice[2];
                    $col4 = $slice[3];
                    $col5 = $slice[4];
                    
                   
       
        $query1 = mysqli_query($con,"INSERT INTO TDS (Id,First_Name,Last_Name,Total_Swipes,Days_Swiped) VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."')");
      
        }
   
        }
        
        
         $query2 = mysqli_query($con,"UPDATE TDS SET Id =CONCAT ('x',Id)");
                
                  

        mysqli_close($con);}
?>
        </div>
         <div class="col-md-3 right"></div>
        </div>
                
                  

 <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</body>

</html>