<?php 
require_once '../include/databaseConnection.php';
require_once '../login/session.php';

    $query1 = "SELECT * FROM products";
    $result1 = mysqli_query($con, $query1)or die(mysqli_error($con));
    
    $query2 = "SELECT * FROM services";
    $result2 = mysqli_query($con, $query2)or die(mysqli_error($con));
    
    isset($_GET['action']) ? $action=$_GET['action'] : $action="";
    
    if($action=='deleteProduct')//if the user clicked ok, run our delete query
    { 
        $id=$_REQUEST['id'];
        $query = mysqli_query($con,"DELETE   FROM products WHERE id='$id'") or die(mysqli_error($con));

        if($query)
        {
            echo "<div>Record was deleted.</div>";
        }
    }
    
    if($action=='deleteService')//if the user clicked ok, run our delete query
    { 
        $id=$_REQUEST['id'];
        $query = mysqli_query($con,"DELETE FROM services WHERE id='$id'") or die(mysqli_error($con));

        if($query)
        {
            echo "<div>Record was deleted.</div>";
        }
    }
    
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMINISTRATION</title>
    <link href="../Css/adminCss.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/bannerImages.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" href="../images/utility/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="../images/utility/favicon.ico" type="image/x-icon"/>
    <script src="../javascript/adminJS.js" type="text/javascript"></script>
</head>
<body onload="forms()">
    <div id = 'container'>
        <div id='user'><?php echo $login_session; ?></div>
        <div id='banner'>
            <img src='../products/images/banner/1.jpg' class='bannerImg' id='img1'/>
            <img src='../products/images/banner/2.jpg' class='bannerImg' id='img2'/>
            <img src='../products/images/banner/3.jpg' class='bannerImg' id='img3'/>
        </div>
        <?php
            include '../include/administrationMenu.php';
        ?>
        <div id = 'pagecontent'>
            <form id='form1' method="POST" action="addProduct.php">
                <fieldset>
                    <legend>ADD PRODUCT</legend>
                    Name :<br/><input id='addProName' name="proName" type='text' placeholder='Name Of Product'><br/><br/>
                    Stock :<br/><input id='addProStock' name="proStock" type='text' placeholder='Stock Of Product'><br/><br/>
                    Description :<br/><input id='addProDescrip' name="proDescrip" type='text' placeholder='Product Description'><br/><br/>
                    Type : 
                    <select name="proType">
                        <option id='addProType' value="accessories">Accessories</option>
                        <option id='addProType' value="crankshafts">Crank Shafts</option>
                        <option id='addProType' value="customexhausts">Exhausts</option>
                        <option id='addProType' value="pistions">Piston</option>
                        <option id='addProType' value="rims">Rims</option>
                        <option id='addProType' value="spoilers">Spoilers</option>
                        <option id='addProType' value="turbos">Turbos</option>
                        <option id='addProType' value="tyres">Tyre's</option>
                    </select><br/><br/>
                    <input id="addProduct" type='submit' name="addProduct" value='Add Product'>
                </fieldset>
            </form>
            <form id='form2'><!--Remove product table-->
                <table border="1px" class="table">
                    <tr><th>Name</th><th>Description</th><th>type</th><th style="border : solid red 1px;">Remove</th></tr>
                    <?php
                        
                        while($db_field = mysqli_fetch_assoc($result1))
                        {
                            $id = $db_field['ID'];
                            echo "<tr><th>" . $db_field['title'].  "</th><th>" . $db_field['details'] . "</th><th>" . $db_field['type'] . 
                                 "</th><th id='deleteButton'><input type='button' onclick='deleteProduct( {$id} );' value='Remove'></th></tr>";
                            
                        }
                    ?> 
                </table>
            </form>
            <form id='form3' method="POST" action="addService.php">
                <fieldset>
                    <legend>ADD SERVICE</legend>
                    Name : <br/><input id='addSerName' name="serName" type='text' placeholder='Name Of Service'><br/><br/>
                    Description :<br/><input id='addSerDescrip' name="serDesc" type='text' placeholder='Product Description'><br/><br/>
                    <input type='submit' value='Add Service'>
                </fieldset>
            </form>
            <form id='form4'>
                <table border="1" class="table">
                    <tr><th>Name</th><th>Description</th><th style='border : solid red 1px;'>Remove</th></tr>
                    <?php
                        while($db_field = mysqli_fetch_assoc($result2))
                        {
                            $id = $db_field['ID'];
                            echo "<tr><th>" . $db_field['title'] . "</th><th>" . $db_field['details'] . "</th><th id='deleteButton'><input type='button' onclick='deleteService( {$id} );' value='Remove'></th></tr>";
                        }
                    ?> 
                </table>
            </form>
        </div>
     </div>
    <script type='text/javascript'>

    function deleteProduct( id )
    {
        var answer = confirm('Are you sure you want to delete this product @ ID ' + id + ' from the database??');
        if ( answer )
        { 
            window.location = 'administration.php?action=deleteProduct&id=' + id;
        }
    }
    function deleteService( id )
    {
        var answer = confirm('Are you sure you want to delete this from the database??');
        if ( answer )
        { 
            window.location = 'administration.php?action=deleteProduct&id=' + id;
        }
    }
    
    </script>
</body>
</html>
