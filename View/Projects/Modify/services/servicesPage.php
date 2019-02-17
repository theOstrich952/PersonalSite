<?php require_once '../include/databaseConnection.php';
    require_once '../login/session.php';
    $query = "SELECT * FROM services";
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
    <link rel='stylesheet' type='text/css' href='../Css/products2.css' />
<link rel='stylesheet' type='text/css' href='../Css/product1.css' />
</head>

<body>
    <div id='container'>
        <div id='user'><?php echo $login_session; ?></div>
        <div id='banner'>
            <img src='../services/images/4.jpg' class='bannerImg' id='img1'/>
            <img src='../services/images/5.jpg' class='bannerImg' id='img2'/>
            <img src='../services/images/6.jpg' class='bannerImg' id='img3'/>
        </div>
        <?php
            include "../include/menu.php";
        ?>
        <div id='pagecontent'>
            <div class='container'>
                <header class='clearfix'>
                    <h1>Service's</h1>
                </header>	
                <div class='main'>
                    <div id='cbp-vm' class='cbp-vm-switcher cbp-vm-view-grid'>
                        <div class='cbp-vm-options'>
                                <a href='#' class='cbp-vm-icon cbp-vm-grid cbp-vm-selected' data-view='cbp-vm-view-grid'>Grid View</a>
                                <a href='#' class='cbp-vm-icon cbp-vm-list' data-view='cbp-vm-view-list'>List View</a>
                        </div>
                        <ul>
                            <?php
                                if($con)
                                {
                                    while($db_field = mysqli_fetch_assoc($result))
                                    {
                                        echo"<li>";
                                                echo"<a class='cbp-vm-image' href='../services/images/" . $db_field['imageNum'] . ".jpg'><img src='../services/images/" . $db_field['imageNum'] . ".jpg'></a>";
                                                echo"<h3 class='cbp-vm-title'>" . $db_field['title'] . "</h3>";
                                                echo"<div class='cbp-vm-details'>";
                                                echo $db_field['details'];
                                                echo"</div>";
                                        echo"</li>";
                                    }
                                    mysqli_close($con);
                                }
                                else
                                {
                                    print "Error : Unable to find Database";
                                    mysqli_close($con);
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script src='../javascript/classie.js'></script>
            <script src='../javascript/cbpViewModeSwitch.js'></script>
        </div>  
    </div>
</body>
</html>
