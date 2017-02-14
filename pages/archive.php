<?php
 
    session_start();
    include "../includes/connect.php";

    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT username FROM users WHERE user_id = $user_id"; 
    $row = mysqli_query($con, $query);   
    
    if(isset($_POST['delete'])){ 
    
    include "../includes/delete_archive.php";
    
    }
    
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
      
    }
    </style>
    
    <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
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

    <!-- Page Content -->
    <div class="container">
    
          <div class="row">
          <div class="col-md-12 left">
          <h2>ARCHIVE</h2>         
          </div>
          </div>
          
          <div class="well well-sm">
          <div class="row">
          <div class="col-md-6 left">
          <form action="../includes/export_archive.php" method="post" style="float:left">
          <input class="btn btn-success" type="submit" name="submit" value="Download Archive" /> 
          </form>
          </div>
          <div class="col-md-6 right">
          <form action="" method="post" style="float:right">
          <input class="btn btn-danger" type="submit" name="delete" value="Delete Entries" /> 
          </form>
          </div>
          </div>
          </div>
  
          <!--FILTER FOR TABLE-->
            <div class="input-group"><span class="input-group-addon">Filter Result</span>
            <input id="filter" type="text" class="form-control" placeholder="Type here..."></div>
        <!--END FILTER FOR TABLE-->     
         
        
        <!--TABLE WITH INFO FROM STUDENTS TABLE-->
             <div class="table-responsive">                     
          <table class="table table-hover">
            <thead>
                <tr>
                <th>Student Number</th>
                <th>Full Name</th>
                <th>Semester 1 %</th>    
                <th>Semester 2 %</th> 
                <th>Semester 3 %</th> 
                <th>Overall</th>
                <th>From Year</th>
                <th>To Year</th>
              </tr>
            </thead>
            <tbody class="searchable">
          
            <?php 
                 include "../includes/connect.php";
                 
                $result =mysqli_query($con, "
                
                SELECT DISTINCT Id, Year, Name, Att_Sem1, Att_Sem2, Att_Sem3, Overall, Year, Year2
                FROM Archive");

                while($row = mysqli_fetch_array($result)){   
                echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Att_Sem1'] . "</td>
                <td>" . $row['Att_Sem2'] . "</td><td>" . $row['Att_Sem3'] . "</td><td>" . $row['Overall'] . "</td><td>" . $row['Year'] . "</td>
                <td>" . $row['Year2'] ."</td></tr>";          
                 
                }
                
                 mysqli_close($con);
              ?>
        
        </tbody>
          </table>
          </div>
          <!--END TABLE-->
    
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
	