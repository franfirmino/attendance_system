<?php

   session_start();
   
    include "../includes/connect.php";
     
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT username FROM users WHERE user_id = $user_id"; 
    $row = mysqli_query($con, $query);       
    
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
  
     <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          google.charts.setOnLoadCallback(drawChart2);
       
      
        
      function drawChart() {
       
        var data = google.visualization.arrayToDataTable([
        
          ['Nationality', 'Number of Students'],
       <?php
         
         $query11 = "SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='India'"; 
         $result11 = mysqli_query($con, $query11);        
         
         while($row11 = mysqli_fetch_array($result11)){  
         
         echo "['"."Indian"."',".$row11['Number']."],";
       
        }
        
        
        ?>
        
        <?php
         
         $query12 = "SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='China'"; 
         $result12 = mysqli_query($con, $query12);        
         
         while($row12 = mysqli_fetch_array($result12)){  
         
         echo "['"."Chinese"."',".$row12['Number']."],";
       
        }
        
        
        ?>
        
        <?php
         
         $query13= "SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country='Malaysia'"; 
         $result13 = mysqli_query($con, $query13);        
         
         while($row13 = mysqli_fetch_array($result13)){  
         
         echo "['"."Malaysian"."',".$row13['Number']."],";
       
        }
        
        
        ?>
        
        <?php
         
         $query14 ="SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='Brazil'"; 
         $result14 = mysqli_query($con, $query14);        
         
         while($row14 = mysqli_fetch_array($result14)){  
         
         echo "['"."Brazilian"."',".$row14['Number']."],";
       
        }
        
        
        ?>
        
        
        <?php
         
         $query15 = "SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='Nigeria'"; 
         $result15 = mysqli_query($con, $query15);        
         
         while($row15 = mysqli_fetch_array($result15)){  
         
         echo "['"."Nigerian"."',".$row15['Number']."],";
       
        }
        
        
        ?>
        
         <?php
         
         $query16 ="SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='Nepal'";
         $result16 = mysqli_query($con, $query16);        
         
         while($row16 = mysqli_fetch_array($result16)){  
         
         echo "['"."Nepalese"."',".$row16['Number']."],";
       
        }
        
        
        ?>
        
        <?php
         
         $query17 ="SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='Pakistan'";
         $result17 = mysqli_query($con, $query17);        
         
         while($row17 = mysqli_fetch_array($result17)){  
         
         echo "['"."Pakistani"."',".$row17['Number']."],";
       
        }
        
        
        ?>
        
        <?php
        
         $query18 ="SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country ='Taiwan'";
         $result18 = mysqli_query($con, $query18);        
         
         while($row18 = mysqli_fetch_array($result18)){  
         
         echo "['"."Taiwanese"."',".$row18['Number']."],";
       
        }
        ?>
        
           
        <?php
         
         $query10 = "SELECT COUNT(Student_Number) AS Number FROM CRM WHERE Country NOT LIKE 'Nigeria' AND Country NOT LIKE 'India' AND Country NOT LIKE 'Brazil' AND Country NOT LIKE 'Malaysia' AND Country NOT LIKE 'China' AND Country NOT LIKE 'Nepal' AND Country NOT LIKE 'Pakistan' AND Country NOT LIKE 'Taiwan'";       
         $result10 = mysqli_query($con, $query10);    
         
         while($row10 = mysqli_fetch_array($result10)){  
         
         echo "['"."Other"."',".$row10['Number']."],";
       
        }
        
        
        ?>
             
                        
        ]);
       

        var options = {
          title: 'NATIONALITIES AT NCI'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }     
      
     
  
    function drawChart2() {
 
    
      var data = google.visualization.arrayToDataTable([
        ["Attendance %", "No Students"],
        
        <?php
         
        $query22 = "SELECT COUNT(Attendance_Id) AS Number FROM Attendance WHERE Overall BETWEEN 85 AND 100"; 
        $result22 = mysqli_query($con, $query22);        
         
        while($row22 = mysqli_fetch_array($result22)){  
         
        echo "['"."85% - 100%"."',".$row22['Number']."],";
        }        
       
        
        ?>
        
        <?php
         
        $query6 = "SELECT COUNT(Attendance_Id) AS Number FROM Attendance WHERE Overall BETWEEN 70 AND 85"; 
        $result = mysqli_query($con, $query6);        
         
        while($row6 = mysqli_fetch_array($result)){  
         
        echo "['"."70% - 85%"."',".$row6['Number']."],";
       
        }
        
       
        
        ?>
        
        <?php
         
        $query2 = "SELECT COUNT(Attendance_Id) AS Number FROM Attendance WHERE Overall BETWEEN 50 AND 70"; 
        $result = mysqli_query($con, $query2);        
         
        while($row2 = mysqli_fetch_array($result)){  
         
        echo "['"."50% - 70%"."',".$row2['Number']."],";
       
        }
        
       
        
        ?>
        
        <?php
         
        $query3 = "SELECT COUNT(Attendance_Id) AS Number FROM Attendance WHERE Overall BETWEEN 0 AND 50"; 
        $result3 = mysqli_query($con, $query3);        
         
        while($row3 = mysqli_fetch_array($result3)){  
         
        echo "['"."0% - 50%"."',".$row3['Number']."],";
        }
 
        ?>
 
      ]);


      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1]);

      var options = {
        title: "STUDENTS ATTENDANCE",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
 
      
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
        
        <div class="col-md-12 left">
        <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Country</a>
        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
        <li><a href="country_graph.php?link=India" name="India">India</a></li>
        <li><a href="country_graph.php?link=Malaysia" name="Malaysia">Malaysia</a></li>
        <li><a href="country_graph.php?link=Brazi" name="Brazil">Brazil</a></li>
        <li><a href="country_graph.php?link=China" name="China">China</a></li>
        <li><a href="country_graph.php?link=Nigeria" name="Nigeria">Nigeria</a></li>
        </ul>
        </div>
    </div>
    
    <!--div class="well well-lg"-->
     <div class="row">
         <div class="col-md-6 right" ><div id="barchart_values" style="width: 800px; height: 800px;"></div></div>
         <div class="col-md-6 left" > <div id="piechart" style="width: 700px; height: 700px;"></div></div>
     </div>
    <!--/div-->
    </div> 
    
     <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>