<?php
session_start();

$serverName = "DESKTOP-RDC80N1\SQLEXPRESS";
$connectionInfo = array( "Database"=>"NORTHWND", "UID"=>"userphp", "PWD"=>"userphp", "CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) echo "Connection to database failed! <br />";

$q = $_GET['q'];
$val = $_GET['val'];

if (isset($_SESSION["userId"])) 
{
    $updateSql = "UPDATE Customers SET contactname = '".$val."' WHERE customerid = '".$q."'";
    
    $stmt = sqlsrv_query($conn, $updateSql);
    if($stmt === false) 
    {
        die(print_r( sqlsrv_errors(), true) );
    }

    sqlsrv_free_stmt($stmt);
}    

    $selectSql = "SELECT customerid, companyname, contactname, address, city, country FROM customers 
    WHERE customerid = '".$q."'";

    $stmt = sqlsrv_query($conn, $selectSql);
    if($stmt === false) {
        die(print_r( sqlsrv_errors(), true) );
    }
    $row = array();
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
    
    $row[6]=isset($_SESSION["userId"])?"Yes":"No";
    
    $resultJSON = json_encode($row);
    echo($resultJSON);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close( $conn);
?>
