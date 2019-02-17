<?php require_once '../include/databaseConnection.php';
    
    $type = $_POST['type'];
    
    $query = "SELECT * FROM products where type LIKE %'$type'%";
    $result = mysqli_query($con, $query);
    
    $resultArr = array();
    
    $x = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        $resultArr[$x][0] = [$row['title']];
        $resultArr[$x][1] = [$row['stock']];
        $resultArr[$x][2] = [$row['details']];
        $resultArr[$x][3] = [$row['type']];
        
        $x++;
    }
    echo json_encode($resultArr);
?>