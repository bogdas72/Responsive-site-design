<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBV Responsive site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm fixed-top navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">DBV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cases.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cases.php#contact">Contact</a>
                    </li>
                    <?php
                        if (isset($_SESSION["username"])) {
                            echo '<li class="nav-item">
                                  <a class="nav-link" href="logout.php">Log Out</a>
                                  </li>';
                        }
                        else {
                            echo '<li class="nav-item">
                                  <a class="nav-link" href="login.php">Log In</a>
                                  </li>';
                        }
                    ?>
                </ul>
            </div>   
        </div>        
    </nav>