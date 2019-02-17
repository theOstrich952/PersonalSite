<?php
    session_start(); 
//session_regenerate_id(); // extra security?
    
// Storing Session
    $user_check = $_SESSION['login_user'];

// Establishing Connection with Server by passing server_name, user_id, password and database
    $connection = mysqli_connect("localhost", "root", "", "modificationwebsite");

// check connection
    if (mysqli_connect_errno()) 
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

// SQL query to fetch information of registered users and finds user match.
    $result = mysqli_query($connection, 
            "select fName from login "
            . "where email='$user_check'");

    $row = mysqli_fetch_assoc($result);

    $login_session = $row['fName'];  //who is currently in a session?

    mysqli_free_result($result);

    if (!isset($login_session)) {
        mysqli_close($connection); // Closing Connection
        echo("<script>window.location.replace('../login/login.php');</script>");  // redirect
    }
?>
