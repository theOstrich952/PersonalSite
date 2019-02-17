<?php
    session_start(); // Starting Session
    
    $error = ''; // Variable To Store Error Message

    if (isset($_POST['submit'])) 
    {
            if (empty($_POST['username']) || empty($_POST['password'])) 
            {
                $error = "Username or Password is invalid";
                echo "<script>alert ('There was either no Email or Password entered for Login');</script>";
            } 
            else 
            {
                if($_POST['username'] == "admin@modify.ie")
                {
                    $connection = mysqli_connect("localhost", "root", "", "modificationwebsite" );

                   
                    if (mysqli_connect_errno()) 
                    {
                        printf("Connect failed: %s\n", mysqli_connect_error());
                        exit();
                    }       

                    $username = stripslashes($_POST['username']);
                    $password = stripslashes($_POST['password']);

                    $username = mysqli_real_escape_string($connection,$username);
                    $password = mysqli_real_escape_string($connection,$password);

                   
                    $result = mysqli_query($connection, "SELECT * FROM login "
                            . "where password='". md5($password) . "' "
                            . "AND email='$username'");

                    $rows = mysqli_num_rows( $result );

                    if ($rows == 1) {
                        $_SESSION['login_user'] = $username; 
                        header("location: ../administration/administration.php");
                    } else {
                        $error = "Username or Password is invalid";
                        echo "<script>alert ('Username or password is invalid');</script>";
                    }

                    
                    mysqli_free_result($result);

                    mysqli_close($connection);
                }
                else
                {
                  
                  $connection = mysqli_connect("localhost", "root", "", "modificationwebsite" );

                  if (mysqli_connect_errno()) {
                      printf("Connect failed: %s\n", mysqli_connect_error());
                      exit();
                  }       

                  $username = stripslashes($_POST['username']);
                  $password = stripslashes($_POST['password']);

                  $username = mysqli_real_escape_string($connection,$username);
                  $password = mysqli_real_escape_string($connection,$password);

                  $result = mysqli_query($connection, "SELECT * FROM login "
                          . "where password='" . md5($password) . "' "
                          . "AND email='$username'");
                  
                  $rows = mysqli_num_rows( $result );

                  if ($rows == 1) {
                      $_SESSION['login_user'] = $username;
                      header("location: ../home/home.php");
                  } else {
                      $error = "Username or Password is invalid";
                      echo "<script>alert ('Username or Password is invalid');</script>";
                  }
                  mysqli_free_result($result);

                  mysqli_close($connection); 
                }   
        }
    }
?>
