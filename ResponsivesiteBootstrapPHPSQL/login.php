<?php
    include_once 'header.php';
?>

    <main>
        <div class="container-lg mt-2 mb-4 text-center">
            <h2 class="mt-3 mb-3">Log In</h2>
            <form action="login_func.php" method="post">
            <div class="form-group col-md-4 mx-auto">
                <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>  
            <div class="form-group col-md-4 mx-auto">  
                <input type="password" class="form-control" name="pwd" placeholder="Enter password">
            </div>
                <button type="submit" name="submit" class="btn btn-dark">Log In</button>
            </form>
        </div> 
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<h6 class='col-md-4 mx-auto text-center alert alert-warning mb-4'>Fill in both fields!</h6>";
                }
                else if ($_GET["error"] == "invalidUser") {
                    echo "<h6 class='col-md-4 mx-auto text-center alert alert-warning mb-4'>No special characters!</h6>";
                }
                else if ($_GET["error"] == "wrongPwd") {
                    echo "<h6 class='col-md-4 mx-auto text-center alert alert-warning mb-4'>Incorrect password!</h6>";
                }
                else if ($_GET["error"] == "noUser") {
                    echo "<h6 class='col-md-4 mx-auto text-center alert alert-warning mb-4'>The user doesn't exist!</h6>";
                }
            } 
        ?>       
    </main>

<?php
    include_once 'footer.php';
?>