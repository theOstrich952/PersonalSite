<?php
require_once '../include/databaseConnection.php';

$name = $_POST['proName'];
$stock = $_POST['proStock'];
$desc = $_POST['proDescrip'];
$type = $_POST['proType'];

if($con)
{
    $query = "INSERT INTO products(title, stock, details, type) VALUES ('$name','$stock','$desc','$type')";
    mysqli_query($con, $query);

    echo "Done";
}
else
{
    print("Error Connecting to Database...");
    mysql_close($con);
}
?>