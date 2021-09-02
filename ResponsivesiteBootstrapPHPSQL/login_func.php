<?php

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $serverName = "DESKTOP-RDC80N1\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"NORTHWND", "UID"=>"userphp", "PWD"=>"userphp", "CharacterSet" => "UTF-8");

    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if (!$conn) echo "Connection to database failed! <br />";
    $sql = "SELECT EmployeeID, LastName, Password FROM Employees WHERE LastName = '".$username."'";
    $stmt = sqlsrv_query($conn, $sql);
    if($stmt === false) {
        die(print_r( sqlsrv_errors(), true) );
    }
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $pwdDB = $row['Password']; //get the password from the database
        $checkPwd = password_verify($pwd, $pwdDB);

        if ($checkPwd===false) {
            header("location:login.php?error=wrongPwd");
        exit();
        }
        else if ($checkPwd===true){
            session_start();
            $_SESSION["userId"] =  $row["EmployeeID"];
            $_SESSION["username"] = $row["LastName"];
            header("location:index.php");
            exit();
        }
    }
    else {
        header("location:login.php?error=noUser");
        exit();
    }
}
//the actual log in
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location:login.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location:login.php?error=invalidUser");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location:login.php");
    exit();
}

