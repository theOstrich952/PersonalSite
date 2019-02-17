<?php require_once '../include/databaseConnection.php';
    require_once '../login/session.php';
    $query = "SELECT * FROM products where type='accessories'";
    $result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title>Modify</title>
    <link rel='shortcut icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link rel='icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
    <link href='../Css/mainCss.css' rel='stylesheet' type='text/css'/>
    <link href='../Css/bannerImages.css' rel='stylesheet' type='text/css'/>
    <link rel='stylesheet' type='text/css' href='../Css/products2.css' />
    <link rel='stylesheet' type='text/css' href='../Css/product1.css' />
    <script src='../java/modernizr.custom.js'></script>
</head>

<body>
    <div id = 'container'>
        <div id='user'><?php echo $login_session; ?></div>
        <div id='banner'>
            <img src='../products/images/banner/1.jpg' class='bannerImg' id='img1'/>
            <img src='../products/images/banner/2.jpg' class='bannerImg' id='img2'/>
            <img src='../products/images/banner/3.jpg' class='bannerImg' id='img3'/>
        </div>
        <?php
            include '../include/menu.php';
        ?>
        <div id = 'pagecontent'>
            <div class='container'>
                <header class='clearfix'>
                    <span>Part's</span>
                    <h1>Accessories</h1>
                    <?php
                        include '../include/productMenu.php';
                    ?>
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
                                        echo"<a class='cbp-vm-image' href='../products/images/" . $db_field['type'] . "/" . $db_field['imageNum'] . ".jpg'><img src='../products/images/" . $db_field['type'] . "/" . $db_field['imageNum'] . ".jpg'></a>";
                                        echo"<h3 class='cbp-vm-title'>" . $db_field['title'] . "</h3>";
                                        echo"<div class='cbp-vm-price'>" . $db_field['stock'] . "</div>";
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
