<?php 
include("../connection.php");

$id = $_POST['id'];
$name = $_POST['name'];

if(isset($_POST['submit'])) {
    //
    if($_FILES['image']['name']) {
        
        $img = $_FILES['image']['name'];
        
        $allowed = array('png', 'jpg','jpeg'); // File extensi yang di perbolehkan
        $x = explode('.', $img); // Memisahkan string dan mengubah menjadi array
        $extention = strtolower(end($x)); // Memilih string di akhir array
        $file_tmp = $_FILES['image']['tmp_name']; 
        $angka_acak = rand(1,999);
        $newImgName = $angka_acak.'-'.$img; 
        
        if(in_array($extention, $allowed)) {
            //
            move_uploaded_file($file_tmp, '../pictures/'.$newImgName);
            $query = "UPDATE users_tb SET name = '$name', image = '$newImgName' WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                //
                die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
            } else {
                //
                echo "<script>alert('Updated'); window.location='../index.php';</script>";
            }
        } else {
            //
            echo "<script>alert('Only jpg or png'); window.location = 'add.php';</script>";
        }
    } else {
        $query = "UPDATE users_tb SET name = '$name' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Updated'); window.location='../index.php';</script>";
        }
    }
}


?>