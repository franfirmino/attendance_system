<?php 
 
session_start();

include "includes/connect.php";
 
if ($_GET['login']) {
   
     $query = "SELECT * FROM users"; 
     $result = mysqli_query($con, $query);        
     
     while ($row = mysqli_fetch_assoc($result)){
     
     if ($_POST['username'] == $row['username']
         && $_POST['password'] == $row['password']) {

         $row['user_id'] = $user_id;
         
         $_SESSION['user_id'] = $user_id;
         
         $_SESSION['loggedin'] = $user_id;
         
 
         header("Location: pages/dashboard.php");
         exit;
        
      }
    }
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

 
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
                <a class="navbar-brand" href="index.php">ATTENDANCE REPORT</a>
            </div>
       
        </div>
        <!-- /.container -->
     </nav>
     <!--END  Navigation -->
        
      <!-- Page Content -->         
      <div class="container">      
             
       
        
        <!--FORM FOR LOGIN-->
        
        <div  class="row">
                <div class="col-md-3 left"></div>
                <div  class="col-md-6 center">
                <div  class="well well-sm" id="login-form">
                        
                        <form  class="form-group" form action="?login=1" method="post">
                                               
                        Username: <input type="text" name="username" /></br></br>
                        Password : <input type="password" name="password" /></br></br>
                        <input type="submit"/>
                                                      
                        </form>
                       
                </div>
                </div>
                <div class="col-md-3 right"></div>
        </div>    
                        
        
        </div>       
        <!--END Page Content -->

   

    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</body>

</html>