<?php
    if(isset($_REQUEST["submit"])){
        $username = $_REQUEST["username"];
        // $password = $_REQUEST["password"];
        $con = mysqli_connect("localhost","root","","test");
        // if($con) { echo "connected"; } else { echo "not connected"; }
        $queryRegister = "INSERT into users (username) VALUES('".$username."')";
        $result = mysqli_query($con, $queryRegister);
        if($result) { echo "executed"; } else { echo "not executed"; }
    }
?>
<html>
    <body>
        <h1>Register</h1>
        <!-- action="registerAction.php" -->
        <form method="POST">
            <input type="text" name="username">
            <!-- <input type="text" name="password"> -->
            <button type="submit" name="submit">Register</button>
        </form>
        <a href="login.php">Go to Login</a>
    </body>
</html>