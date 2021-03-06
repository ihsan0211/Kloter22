<?php 
include("../connection.php");

  


if(isset($_POST['submit'])) {
    //
    $count = count($_POST['id']);
    for( $i = 0; $i < $count; $i++) {
        $id = $_POST['id'][$i];
        $name = $_POST['name'][$i];
        $query = "UPDATE skill_tb SET name = '$name' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    }
    if(!$result) {
        //
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        //
        echo "<script>alert('Updated'); window.location='../index.php';</script>";
    }

}

?>