<?php
    session_start();
    if(isset($_REQUEST["submit"])){
        $username = $_REQUEST["username"];
        $con = mysqli_connect("localhost","root","","test");
        // if($con) { echo "connected"; } else { echo "not connected"; }
        $queryLogin = "SELECT * FROM users WHERE username = '".$username."'";
        $result = mysqli_query($con, $queryLogin);
        // if($result) { echo "executed"; } else { echo "not executed"; }
        if(mysqli_num_rows($result) > 0) { 
            // echo "Login success"; 
            $_SESSION["login"] = true;
            // $_SESSION["role"] = $result["role"];

            header("location:index.php");
        } else { 
            
            // $_SESSION["login"] = false;
            echo "Invalid User"; 
            // header("location:login.php?status=0");
        }
        
    }
?>
<html>
    <body>
        <h1>Login</h1>
        <form method="GET">
            <input type="text" name="username">
            <button type="submit" name="submit">Login</button>
        </form>
        <a href="register.php">Go to Register</a>
    </body>
</html>