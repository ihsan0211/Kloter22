<?php 
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>All</title>
</head>
<body class="d-flex justify-content-between">
    <a class="btn btn-success"  href="users/add.php">Add user</a>
    <?php 
    $sql = "SELECT * FROM users_tb";
    $result = mysqli_query($conn, $sql);
    
    if(!$result) {
        die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div>
        <img src="pictures/<?php echo $row['image'] ?>" alt="" style="width:200px;height:200px;">
        <h3><?php echo $row['name'] ?></h3>
        <a class="btn btn-info" href="users/edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a class="btn btn-warning" href="users/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete this post?')">Delete</a>
        <h4>Skills</h4>
        <p>
        <?php 
        $query = "SELECT * FROM skill_tb";
        $result1 = mysqli_query($conn, $query);
        
        if(!$result1) {
            die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }

        while ($row1 = mysqli_fetch_assoc($result1) ) {
            if($row1['user_id'] == $row['id'] ) {
                echo " ".$row1['name']." ";
            }
        } ?>
        </p>
        <form action="skills/add-action.php" method="POST">
        
            <input name="name" type="text" placeholder="Inpur username">
            <input name="id" type="hidden" value="<?php echo $row['id'] ?>" >
            <input class="btn btn-info" type="submit" name="submit">
        </form>
    

    </div>

    <?php } ?> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>