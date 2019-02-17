<?php require_once '../include/databaseConnection.php';
    require_once '../login/session.php';
    $query = "SELECT * FROM about_page";
    $result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title>Modify</title>
    <link href='../Css/mainCss.css' rel='stylesheet' type='text/css'/>
    <link href='../Css/bannerImages.css' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
    <link rel='shortcut icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link rel='icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link rel='stylesheet' type='text/css' href='../Css/aboutCSS.css'/>
</head>
<body> 
    <div id="container">
        <div id='user'><?php echo $login_session; ?></div>
        <div id='banner'>
            <img src='../images/BMW/8.jpg' class='bannerImg' id='img1'/>
            <img src='../images/BMW/7.jpg' class='bannerImg' id='img2'/>
            <img src='../images/BMW/13.jpg' class='bannerImg' id='img3'/>
        </div>
        <?php
            include '../include/menu.php';
        ?>
        <div id='pagecontent'>
            <div class='text'>
                <div id='text'>
                    <?php
                        if($con)
                        {
                            while($db_field = mysqli_fetch_assoc($result))
                            {
                                echo "<p>" . $db_field['content'] . "</p>";
                            }
                            mysqli_close($con);
                        }
                        else
                        {
                            print "Error : Unable to find Database";
                            mysqli_close($con);
                        }
                    ?> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
