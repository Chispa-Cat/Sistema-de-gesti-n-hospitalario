<?php
function conexion(){
 $server = "localhost";
 $username = "root";
 $pass = "";
 $db = "bdhospital";

    $Connect=mysqli_connect($server, $username, $pass);
    mysqli_select_db($Connect, $db);

    return $Connect;
    }
?>