<?php require_once '../include/databaseConnection.php';
    require_once '../login/session.php';
 
    $query = "SELECT * FROM home_page";
    $result = mysqli_query($con, $query);
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Modify</title>
    <link href="../Css/mainCss.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/bannerImages.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" href="../images/utility/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="../images/utility/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="../Css/homePage.css"/>
    <script src="../javascript/moderniz.custom.js"></script>
    <script src="../javascript/class.js"></script>
    <script src="../javascript/cbpScroller.js"></script>
    <script src="../ajax/jquery-1.11.2.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#searchButton").click(function(){
                var type = document.getElementById('searchBar').value;
                $.ajax({
                    url: "../ajax/homeAjax.php",
                    type: 'post',
                    data: {'type' : type}, 
                    success: function(data){
                        $('#searched').empty();
                        $('.heading').empty();
                        var assArr = jQuery.parseJSON(data);

                            var bigStr  = "<table border='1'><tr id='titles'><th>Name</th><th>Stock</th><th>Description</th><th>Type</th></tr>";
                            for(var i = 0; i < assArr.length; i++)
                            {
                                bigStr += "<tr>";
                                for(var j = 0; j < 4; j++)
                                {
                                    bigStr += "<td>" + assArr[i][j] + "</td>";
                                }
                                bigStr += "</tr>";
                            }
                            bigStr += "</table>";
                            $('#searched').append(bigStr);
                            $('.heading').append(type);
                    },
                    error: function() {
                        $("#searched").html("Error with ajax");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div id='container'>
        <div id='user'><p><?php echo $login_session; ?></p></div>
        
        <div id='banner'>
            <img src='../images/evoX/7.jpg' class='bannerImg' id='img1'/>
            <img src='../images/evoX/8.jpg' class='bannerImg' id='img2'/>
            <img src='../images/evoX/3.jpg' class='bannerImg' id='img3'/>
            
        </div>
        <?php
            include '../include/menu.php';
        ?>
        <div id='search'>
            <input id='searchBar' type='text' placeholder='Search For Products'>
            <input id='searchButton' type='submit' value='Search'/>
        </div>

        <div id='pagecontent'>
            <div class='container'>
                <div class='heading'>On Sale</div>
                <div id='cbp-so-scroller' class='cbp-so-scroller'>
                    <?php       
                        if($con)
                        {
                            echo "<div id='searched'>";
                            while($db_field = mysqli_fetch_assoc($result))
                            {
                                echo "<section class='cbp-so-section'>";
                                        echo "<article class='cbp-so-side cbp-so-side-left'>";
                                                echo "<h2>" . $db_field['name'] . "</h2>";
                                                echo "<p>" . $db_field['content'] . "</p>";
                                        echo "</article>";
                                        echo "<figure class='cbp-so-side cbp-so-side-right'>";
                                                echo "<a href='../products/images/". $db_field['type'] ."/" . $db_field['contentNum'] .".jpg'><img src='../products/images/". $db_field['type'] ."/" . $db_field['contentNum'] .".jpg' alt='img01'></a>";
                                        echo "</figure>";
                                echo "</section>";
                            } 
                            echo "</div";
                        mysqli_close($con);
                        }
                        else
                        {
                            print "Error : Unable to connect to page.";
                            mysqli_close($con);
                        }
                    ?>
                </div>
            </div>
            <script>
                new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );
            </script>
        </div>
    </div>
?> 
</body>
</html>
