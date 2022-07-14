<?php
include "../connection/conn.php";
$conn = getDBconnection();
extract($_GET);

if (isset($_GET['orderID'])) {

    $selectdSql = "SELECT * FROM itemorders WHERE orderID = '$orderID'";
    $rs = mysqli_query($conn, $selectdSql) or die('SQL command fails :<br>' . mysqli_error($conn) . "");

    if (!$conn->query($selectdSql) === true) {
        echo "<h3>Something is wrong! System cannot select the customer record(s).</h3>";
    } else {
        $rec = mysqli_fetch_assoc($rs);
        $CheckorderID = $rec['orderID'];
        var_dump($CheckorderID);
    }

    if (mysqli_num_rows($rs) >= 1) {
        $deleteSql = "DELETE itemorders.* FROM itemorders, orders
                        WHERE itemorders.orderID = orders.orderID
                        AND itemorders.orderID = '$orderID'";
        if (!$conn->query($deleteSql) === true) {
            echo mysqli_error($conn);
            echo "<h3>Something is wrong! System cannot delete item order table record(s).</h3>";
        }
        $deleteSql = "DELETE orders FROM orders WHERE orderID = '$orderID'";

        if (!$conn->query($deleteSql) === true) {
            echo mysqli_error($conn);
            echo "<h3>Something is wrong! System cannot delete order table record(s).</h3>";
        }

        if (mysqli_affected_rows($conn) == 1) {
            header("location:../salesperson/order.php?msg=order record successfully deleted");
        }
        mysqli_close($conn);
    }
} else {
    header("location:../salesperson/order.php");
}
