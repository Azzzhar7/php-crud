<?php
$id = $_REQUEST["id"];
$con = mysqli_connect("localhost","root","","test");
$query = "DELETE FROM users WHERE id = '".$id."'";
$result = mysqli_query($con, $query);

header("location:index.php?message=Record deleted.");
?>