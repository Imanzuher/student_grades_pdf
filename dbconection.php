<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'student_data';
 
    $con = mysqli_connect($host, $user, $password, $database);
 
    if (!$con){
        ?>
            <script>alert("Connection Unsuccessful!!!");</script>
        <?php
    }
?>