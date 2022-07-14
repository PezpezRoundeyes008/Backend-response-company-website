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
  <title>Better Limited - Delete Customer Record in customer List</title>
</head>



<body>

  <!-- -
完整內容
customerEmail	
customerName	
phoneNumber	-->
  <?php
  include('../connection/conn.php');
  if (isset($_GET['deleteEmail'])) {
    $conn = getDBconnection();
    $custEmail = $_GET['deleteEmail'];
    // Orders, ItemOrders and Customer table
    //$sql = "SELECT * FROM customer WHERE customerEmail='$custEmail'";
    $sql = "SELECT orderID FROM orders where customerEmail='$custEmail';";
    $rs = mysqli_query($conn, $sql);
    if (!$conn->query($sql) === true) {
      echo "<h3>Something is wrong! System cannot select the customer record(s).</h3>";
    } else {
      $rec = mysqli_fetch_assoc($rs);
      $CheckorderID = $rec['orderID'];
      var_dump($CheckorderID);
    }

    if (mysqli_num_rows($rs) >= 1) {
      // $sql = "DELETE FROM Customers WHERE custID='$custID'";
      // mysqli_query($conn, $sql) or die(mysqli_error($conn));
      // $delSuccess = (mysqli_affected_rows($conn) == 1);

      $sql = "DELETE ItemOrders.* FROM Customer,Orders,ItemOrders
                    WHERE 
                    orders.orderID = itemOrders.orderID AND
                    customer.customerEmail = Orders.customerEmail AND
                    customer.customerEmail = '$custEmail';"; //*** */
      if (!$conn->query($sql) === true) {
        echo mysqli_error($conn);
        echo "<h3>Something is wrong! System cannot delete item order table record(s).</h3>";
      }


      $sql = "DELETE Orders.* FROM Orders, Customer
                    WHERE 
                    customer.customerEmail = Orders.customerEmail AND
                    customer.customerEmail = '$custEmail';";
      if (!$conn->query($sql) === true) {
        echo mysqli_error($conn);
        echo "<h3>Something is wrong! System cannot delete order table record(s).</h3>";
      }
      $sql = "DELETE Customer FROM Customer WHERE customerEmail = '$custEmail';";
      if (!$conn->query($sql) === true) {
        echo mysqli_error($conn);
        echo "<h3>Something is wrong! System cannot delete customer table record(s).</h3>";
      }

      if (mysqli_affected_rows($conn) == 1) {
        $delSuccess = true;
        header("location:ViewCustomerList.php?msg=Customer+Record+is+successfully+deleted");
      } else {
        $delSuccess = false;
      }
    } else {
      // use mysqli_affected_rows($conn) to check how many records are deleted

      header("location:ViewCustomerList.php");   # redirect browser to this page
      // use urlencode() to encode the value embedded in the 'query string'
      // header("location:Lab05_1a.php?msg=Record+is+successfully+deleted");
    }
  }
  ?>

</body>

</html>