<?php

$serverName = "DESKTOP-RDC80N1\SQLEXPRESS";
$connectionInfo = array( "Database"=>"NORTHWND", "UID"=>"userphp", "PWD"=>"userphp", "CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) echo "Connection to database failed! <br />";

$id = $_GET['id'];
$pwd = $_GET['pwd'];
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

$updateSql = "UPDATE Employees SET password = '".$hashedPwd."' WHERE EmployeeID = '".$id."'";
    
    $stmt = sqlsrv_query($conn, $updateSql);
    if($stmt === false) 
    {
        die(print_r( sqlsrv_errors(), true) );
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close( $conn);