<!DOCTYPE html>
<html lang="en">

<!-- URL: http://127.0.0.1/[foldername]-->
<!-- URL: http://localhost/[foldername]-->
<!-- URL: http://localhost/4523m-project/manager/Edit_ItemInfo.php-->
<!-- URL: http://localhost/4523m-project/manager/Edit_ItemInfo.php... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- Remember to turn on xampp -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Better Limited - Edit Item Info and Push</title>
</head>



<body>
    
<!-- 
完整內容
itemID	
itemName	
itemDescription	
stockQuantity	
price	 -->
<?php
        include('../connection/conn.php');   # or use : include 'conn.php'
        // Do you need to check the record exists before delete this record?
        // $custID = $_GET['custID'];
        // $sql = "DELETE FROM Customers WHERE custID='$custID'";
        // mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        extract($_POST);
        $conn = getDBconnection();
        $sql = "SELECT * FROM item WHERE itemID='$itemid'";
        $rs = mysqli_query($conn, $sql) or 
                die('<div class="error">SQL command fails :<br>' . mysqli_error($conn)."</div>");
        $num = mysqli_num_rows($rs);

        if (mysqli_num_rows($rs) == 1) {
            $sql = "UPDATE item SET itemName = '$itemName', itemDescription = '$itemDescription', stockQuantity = '$stockqty', price = '$itemPrice' WHERE itemID='$itemid'";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            // $delSuccess = (mysqli_affected_rows($conn) == 1);
            if (mysqli_affected_rows($conn) == 1) {
            $delSuccess = true;
            header("location:Edit_ItemInfo.php?itemid=$itemid?msg=Record+is+successfully+updated");
            } else{
            $delSuccess = false;
            }
        } else {
        // use mysqli_affected_rows($conn) to check how many records are deleted
        
        header("location:Edit_ItemInfo.php");   # redirect browser to this page
        // use urlencode() to encode the value embedded in the 'query string'
        // header("location:Lab05_1a.php?msg=Record+is+successfully+deleted");
        }

?>

</body>

</html>