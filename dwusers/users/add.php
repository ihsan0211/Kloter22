<?php 
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <h1>Add users</h1>
    <form action="add-action.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li> 
                <label for="">Name</label>
                <input name="name" type="text" placeholder="Inpur username" required>
            </li>
            <li> 
                <label for="">Image</label>
                <input name="image" type="file" required>
            </li>
        </ul>
        <input type="submit" name="submit">
    </form>
</body>
</html>