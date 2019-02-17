<?php
require_once('loginValidation.php'); // Include the Login Script
// if logged in user ID exists, then there is a session in progress with that user
if (isset($_SESSION['login_user'])) {
    echo("<script>window.location.replace('../administration/administration.php');</script>");  // redirect
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <title>Login</title>
        <link href='../Css/mainCss.css' rel='stylesheet' type='text/css'/>
        <link href='../Css/bannerImages.css' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
        <link rel='shortcut icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
        <link rel='icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
        <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
        <link rel='stylesheet' type='text/css' href='../Css/loginCss.css'/>
    </head>

    <body>
        <?php
        include '../include/databaseConnection.php';
        if (isset($_POST['register'])) {
            $email = $_POST['regEmail'];
            $fName = $_POST['regFName'];
            $lName = $_POST['regLName'];
            $password1 = $_POST['regPassword1'];
            $password2 = $_POST['regPassword2'];

            $connection = mysqli_connect("localhost", "root", "", "modificationwebsite");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }

            $result = mysqli_query($connection, "SELECT email from login where email='$email'");
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] == true) {
                mysqli_free_result($result);
                mysqli_close($connection);
                echo("<script>window.location.replace('../login/login.php');</script>");
                echo "<script>alert ('There is already a User with that Email address please try registering again');</script>";
            } else {
                if ($_POST['regPassword1'] == $_POST['regPassword2']) {

                    $query = mysqli_query($con, "insert into login SET email='$email', fName='$fName', lName='$lName', password='" . md5($password1) . "'") or die(mysqli_error($con));
                } else {
                    $error = "Passwords do not match!!";
                    echo "<script>alert ('Passwords do not match please try Registering again');</script>";
                }
                mysqli_free_result($result);
                mysqli_close($connection);
            }

            unset($_POST['regEmail'], $_POST['regFName']);
            unset($_POST['regLName'], $_POST['regPassword1']);
            unset($_POST['regPassword2']);
        }
        ?>
        <div id='container'>
            <div id='banner'>
                <img src='../images/BUGGIN/3.jpg' class='bannerImg' id='img1'/>
                <img src='../images/BUGGIN/4.jpg' class='bannerImg' id='img2'/>
                <img src='../images/BUGGIN/8.jpg' class='bannerImg' id='img3' />
            </div>
            <div id='pagecontent'>                   
                <div id="left">
                    <span class="button" id="toggle-login">Login</span>
                    <div id="login">
                        <div id="triangle"></div>
                        <h1>Log in</h1>
                        <form method="post" action="">
                            <input id='userEmail' name='username' type='email' placeholder='Email' required=""/>
                            <input id='userPassword' name='password' type='password' placeholder='Password' required=""/>
                            <input id='userSubmit' name='submit' type='submit' value='Log in'/>
                        </form>
                    </div>
                </div>
                <div id="right">
                    <span class="button" id="toggle-login">Register</span>
                    <div id="login">
                        <div id="triangle"></div>
                        <h1>Register</h1>
                        <form method="post" action="">
                            <input id="registerFName"  name="regFName" type="text" placeholder="First Name" required=""/>
                            <input id="registerLName"  name="regLName" type="text" placeholder="Last Name" required=""/>
                            <input id="registerEmail"  name="regEmail" type="email" placeholder="Email" required=""/>
                            <input id="registerPassword" name="regPassword1" type="password" placeholder="Password" required=""/>
                            <input id="registerPassword" name="regPassword2" type="password" placeholder="Re-Type Password" required=""/>
                            <input id="registerSubit" type="submit" value="Register" name="register"/>
                        </form>
                    </div>
                </div>
            </div>	
        </div>            
    </body>
</html>
