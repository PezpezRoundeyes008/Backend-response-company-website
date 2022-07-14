<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer's Email</th>
                <th>Customer's Name</th>
                <th>Customer's Phone Number</th>
                <th>staff ID</th>
                <th>Staff Name</th>
                <th>Order Date & Time</th>
                <th>Delivery Address</th>
                <th>Delivery Date</th>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Order Quantity</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <?php
        include "../connection/conn.php";
        $conn = getDBconnection();
        extract($_GET);

        $sql = "SELECT * FROM orders WHERE orderId = '$orderID'";
        $rs = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>' . mysqli_error($conn) . "</div>");
        $rec = mysqli_fetch_assoc($rs);
        $orderID = ;


        echo <<<EOF
                <tbody>
                    <tr>
                        <td>{$rec['orderID']}</td>
                        <td>{$rec['customerEmail']}</td>
                        <td>{$rec['customerName']}</td>
                        <td>{$rec['phoneNumber']}</td>
                        <td>{$rec['staffID']}</td>
                        <td>{$rec['staffName']}</td>
                        <td>{$rec['dateTime']}</td>
                        <td>{$rec['deliveryAddress']}</td>
                        <td>{$rec['deliveryDate']}</td>
                        <td>{$rec['itemID']}</td>
                        <td>{$rec['itemName']}</td>
                        <td>{$rec['orderQuantity']}</td>
                        <td>{$rec['orderAmount']}</td>
                    </tr>
                </tbody>
                EOF;
        ?>
    </table>
    <button><a href="../salesperson/order.php">back to Orders</a></button>
</body>

</html>