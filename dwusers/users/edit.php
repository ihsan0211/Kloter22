<?php 
include("../connection.php");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users_tb WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    if(!count($row)) {
        echo "<script>alert('Data not found.');window.location='../index.php'</script>";
    }
} else {
    echo "<script>alert('Error ID');window.location='../index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1>Edit user <?php echo $row['name']?> </h1>
    <form action="edit-action.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="">Username</label>
                <input type="text" name="name" value="<?php echo $row['name'] ?>" required>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
            </li>
            <li>
                <label for="">Profil picture</label>
            <img src="../pictures/<?php echo $row['image'];?>"style="width: 200px; margin: 5px;"  >
                <input name="image" type="file">
            </li>
            <input type="submit" name="submit">
        </ul>
    </form>
    <form action="../skills/edit-action.php" method="POST">
        <ul>
            <?php 
            $sql = "SELECT * FROM skill_tb WHERE user_id = '$id'";
            $result1 = mysqli_query($conn, $sql);
            
            if(!$result1) {
                die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
            }

            while($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                <input type="hidden" name="id[]" value="<?php echo $row1['id'];?>" >
                <input name="name[]" type="text" value="<?php echo $row1['name'] ?>" required>
                <a href="../skills/delete.php?id=<?php echo $row1['id']; ?>"  onclick="return confirm('Do you want to delete this skill?')">Delete</a>
            <?php 
            }
            ?>
            <input type="submit" name="submit">
        </ul>
    </form>
</body>
</html>