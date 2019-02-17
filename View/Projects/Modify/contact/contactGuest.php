<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title>Modify</title>
    <link href='../Css/mainCssGuest.css' rel='stylesheet' type='text/css'/>
    <link href='../Css/bannerImages.css' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
    <link rel='shortcut icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link rel='icon' href='../images/utility/favicon.ico' type='image/x-icon'/>
    <link rel='stylesheet' type='text/css' href='../Css/contactCss.css'/>
</head>

<body>
    <div id='container'>
        <div id='banner'>
            <img src='../images/350Z/1.jpg' class='bannerImg' id='img1'/>
            <img src='../images/350Z/2.jpg' class='bannerImg' id='img2'/>
            <img src='../images/350Z/3.jpg' class='bannerImg' id='img3'/>
        </div>
         <?php
            include '../include/menuGuest.php';
        ?>
        <div id='pagecontent'>
            <form id="contactInfo" method="POST" action="contactEmail.php">
                <table>
                    <tr>
                        <td><label for="first_name">First Name</label></td>
                        <td><input type="text" name="first_name" maxlength="50" size="30"></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Last Name</label></td>
                        <td><input type="text" name="last_name" maxlength="50" size="30"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email Address</label></td>
                        <td><input type="email" name="email" maxlength="80" size="30"></td>
                    </tr>
                    <tr>
                        <td><label for="telephone">Telephone Number</label></td>
                        <td><input type="text" name="telephone" maxlength="30" size="30"></td>
                    </tr>
                    <tr>
                        <td><label for="comments">Comments</label></td>
                        <td><textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center"><input type="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
