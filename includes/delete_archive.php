<?php
        
        
        
        include "connect.php";
        
        $result =mysqli_query($con, "DELETE FROM Archive");

        mysqli_close($con);


?>