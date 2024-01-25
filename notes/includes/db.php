<?php 
    # connect the database
    $serverName = "localhost";
    $userName = "sqluser";
    $password = "sqlpassword";
    $dbName = "notes";

    # create connection strings
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

?>
