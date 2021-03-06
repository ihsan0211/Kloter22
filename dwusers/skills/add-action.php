<?php 
include("../connection.php");

$name = $_POST['name'];
echo $_POST['id'];
$id = $_POST['id'];

if(isset($_POST['submit'])) {
    $query = "INSERT INTO skill_tb (name, user_id) VALUES ('$name', '$id')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Skill Added'); window.location='../index.php';</script>";
    }
}


?>