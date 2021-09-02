
<?php
$serverName = "DESKTOP-RDC80N1\SQLEXPRESS";
$connectionInfo = array( "Database"=>"NORTHWND", "UID"=>"userphp", "PWD"=>"userphp", "CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) echo "Connection to database failed! <br />";

$q = $_GET['q'];
$sql = "SELECT customerid, companyname, contactname, address, city, country FROM customers 
WHERE country = '".$q."'";

$stmt = sqlsrv_query($conn, $sql);
if($stmt === false) {
    die(print_r(sqlsrv_errors(), true) );
}

$result = array();
$i = 0;
while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC) ) {
    $result[$i] = $row;
    $i++;
}
$resultJSON = json_encode($result);
echo($resultJSON);

sqlsrv_free_stmt($stmt);
sqlsrv_close( $conn);
?>

