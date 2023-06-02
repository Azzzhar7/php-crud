<?php
    session_start();

    if(!isset($_SESSION["login"]) || $_SESSION["login"] != true) {
        header("location:login.php");
    }

    /*
    if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
        ?>
            <a href="logout.php">Logout</a><br>
        <?php
        echo "Welcome";
    }
    else {
        header("location:login.php");
    }
    */
    if(isset($_REQUEST["btnsubmit"])) {
        // if($_REQUEST["search"] != "")    
        $search = $_REQUEST["search"];
        $users = "SELECT * FROM users WHERE username = '".$search."'";
    }
    else {
        $users = "SELECT * FROM users";
    }
    $con = mysqli_connect("localhost","root","","test");
    // if($con) { echo "connected"; } else { echo "not connected"; }
    $usersResult = mysqli_query($con, $users);
    // if($result) { echo "executed"; } else { echo "not executed"; }
    // if(mysqli_num_rows($usersResult) > 0) { }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_REQUEST["message"])) {
        echo $_REQUEST["message"];
    }
    ?>
    <form>
        <input type="text" name="search">
        <input type="submit" name="btnsubmit">
    </form>
    <table width="100%" border="1">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Role</td>
            <td>Action</td>
        </tr>
        <?php 
        if(mysqli_num_rows($usersResult) > 0) {
            while($row = mysqli_fetch_assoc($usersResult)) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

                    </td>
                </tr>
                <?php 
            } 
        }
        else {
                ?>
                <tr>
                    <td>No record found.</td>
                </tr>
                <?php
        }
        ?>
    </table>
</body>
</html>