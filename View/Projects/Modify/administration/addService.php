<?php
require_once '../include/databaseConnection.php';

$name = $_POST['serName'];
$desc = $_POST['serDesc'];

if($con)
{
    $query = "INSERT INTO services(title,details) VALUES ('$name','$desc')";
    mysqli_query($con, $query);

    echo "Done";
    echo "<input type='button' onclick='window.location.href=\"administration.php\"' value='ADMINISTRTION'/>";
}
else
{
    print("Error Connecting to Database...");
    mysql_close($con);
}
?>