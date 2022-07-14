<?php
    if (isset($_POST['orderID'])) {
    include "../connection/conn.php";
    $conn = getDBconnection();
    extract($_POST);

    if ($deliAddress != "" && $deliDate != "") {
        $updateSql = "UPDATE orders SET deliveryAddress = '$deliAddress', deliveryDate = '$deliDate'
        WHERE "." orderID = '$orderID' ";
    } elseif ($deliAddress = "" && $deliDate = "") {
        $updateSql = "UPDATE order SET deliveryAddress = NULL, deliveryDate = NULL
        WHERE "." orderID = '$orderID'"; 
    }
    
    mysqli_query($conn, $updateSql) or die('<div class = "error">SQL command fails : <br>'.mysqli_error($conn)."</div>");
    $updatedRows = mysqli_affected_rows($conn);

    if ($updatedRows > 0) {
        header("Location:../salesperson/order.php");    
    }

    mysqli_close($conn);
    }
?>