    <?php

    include "../includes/connect.php";
    
    if(isset($_POST['numberbtn'])){ 
  
    $_SESSION['stu_number'];
     
    $stu_number = $_POST['stu_number'];
    
         
    } 
    
    
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
      
    }
    </style>
    
    <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
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
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Semester', 'Attendance %'],
         
                
        <?php
        
         
        $query3 = "SELECT Att_Sem1 AS Number FROM Attendance WHERE Attendance_Id = '$stu_number'"; 
        $result3 = mysqli_query($con, $query3);        
         
        while($row3 = mysqli_fetch_array($result3)){ 
        
        if(is_null($row3['Number'])){
        
        
        }else{
 
        echo "['"."Semester 1"."',".$row3['Number']."],";
        }
      
        }
 
        ?>
        
        <?php
         
        $query4 = "SELECT Att_Sem2 AS Number FROM Attendance WHERE Attendance_Id = '$stu_number'"; 
        $result4 = mysqli_query($con, $query4);        
         
        while($row4 = mysqli_fetch_array($result4)){  
         
        if(is_null($row4['Number'])){
        
        
        }else{
        
        echo "['"."Semester 2"."',".$row4['Number']."],";
        }
        }
 
        ?>
        
        
        <?php
         
        $query5 = "SELECT Att_Sem3 AS Number FROM Attendance WHERE Attendance_Id = '$stu_number'"; 
        $result5 = mysqli_query($con, $query5);        
         
        while($row5 = mysqli_fetch_array($result5)){  
         
        if(is_null($row5['Number'])){
        
        
        }else{
         
        echo "['"."Semester 3"."',".$row5['Number']."],";
        }
        }
 
        ?>
          
          
          
       
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
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

          <!--DOWNLOAD AND REPORT BUTTON--> 
     <div class="well well-sm">
          <div class="row">
          <div class="col-md-6 left">
          <form action="" method="post" style="float:left" >
          <label  for="num">Enter Student Number:</label>
          <input id="num" name="stu_number" type="text">
          <input class="btn btn-primary" name="numberbtn" type="submit" /> 
          </form>
          </div>
          </div>
     </div>
    
          
        <!--END BUTTONS-->
 
        <!--TABLE WITH INFO FROM STUDENTS TABLE-->
        <div class="row">
          <div class="col-md-6 left">
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
                 
                $result =mysqli_query($con, "
                
                SELECT CRM.Student_Number, TDS.First_Name, TDS.Last_Name, Courses.Course, TDS.Days_Swiped,
                Attendance.Overall, Attendance.Att_Sem1, Attendance.Att_Sem2, Attendance.Att_Sem3, Courses.Start_Date, Courses.End_Date, CRM.Notes
                FROM CRM
                     JOIN TDS
                          ON TDS.Id = CRM.Student_Number
                     JOIN Courses
                          ON Courses.Course = CRM.Course
                     JOIN Attendance
                          ON Attendance.Attendance_Id = CRM.Student_Number
                     WHERE CRM.Student_Number = '$stu_number'");

                while($row = mysqli_fetch_array($result)){  
                
                $notes = $row['Notes'];
                             
                echo "<tr><td>" . $row['Student_Number'] . "</td><td>" . $row['First_Name'] . "</td><td>" . $row['Last_Name'] . "</td>
                <td>" . $row['Course'] . "</td><td>" . $row['Att_Sem1'] . "</td><td>" . $row['Att_Sem2'] . "</td><td>" . $row['Att_Sem3'] . "</td>
                <td>" . $row['Overall'] ."</td><td>" . $row['Start_Date'] . "</td><td>" . $row['End_Date'] . "</td></tr>";          
                 
                }
                
               
              ?>
        
        </tbody>
          </table>
          
           </div>
         
          <div class="form-group">
          <form action="profile.php" method="post">
          <label for="comment">Comment:</label>
          <input type="hidden" name="stnumb" value="<?php echo $stu_number?>"/>
          <textarea class="form-control" name="note" rows="5" id="comment"> <?php echo $notes?></textarea>
          <input class="btn btn-primary" name="savebtn" type="submit" value="Save" /> 
          </form>
          </div>
          
           <?php  
                       
            if(isset($_POST['stnumb'])){ 
    
            $notes = $_POST['note'];
            $stu_number = $_POST['stnumb'];
          
            $query44 = mysqli_query($con,"UPDATE CRM SET Notes = '$notes' WHERE Student_Number = '$stu_number'"); 
              
            }
            
            
            ?>
          
          
          </div>
     
           <div class="col-md-6"><div id="curve_chart" style="width: 500px; height: 500px"></div></div>
          
          </div>
       
          
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
	