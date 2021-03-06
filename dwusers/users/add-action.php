<?php 
include("../connection.php");

$name = $_POST['name'];
$img = $_FILES['image']['name'];


if(isset($_POST['submit'])) {
    //
    $allowed = array('png', 'jpg','jpeg'); // File extensi yang di perbolehkan
    $x = explode('.', $img); // Memisahkan string dan mengubah menjadi array
    $extention = strtolower(end($x)); // Memilih string di akhir array
    $file_tmp = $_FILES['image']['tmp_name']; 
    $angka_acak = rand(1,999);
    $newImgName = $angka_acak.'-'.$img; 
    
    if(in_array($extention, $allowed)){
        //
        move_uploaded_file($file_tmp, '../pictures/'.$newImgName);
        $query = "INSERT INTO users_tb (name, image) VALUES ('$name', '$newImgName')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Sucsessfully Added'); window.location='../index.php';</script>";
        }
    } else {
        //
        echo "<script>alert('Only jpg or png'); window.location = 'add.php';</script>";
    }
}


?>