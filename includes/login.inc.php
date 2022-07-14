<?php
    require_once('../connection/conn.php');   # or use : include 'conn.php'
    // Do you need to check the record exists before delete this record?
    // $custID = $_GET['custID'];
    // $sql = "DELETE FROM Customers WHERE custID='$custID'";
    // mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
 // 完整內容
// staffID	 $rec['staffID'];
// staffName	 $rec['staffName'];
// password	  $rec['password'];
// position $rec['position'];

    $conn = getDBconnection();

    extract($_POST);
    // if (isset($_POST["submit"])) {
    //     $StaffID = $_POST["staffID"];
    //     $pwd = $_POST["pwd"];
    //     var_dump($_POST);
    // }

    $sql = "SELECT * FROM staff WHERE staffID='$staffID'";
    $rs = mysqli_query($conn, $sql) or 
          die('SQL command fails :<br>' . mysqli_error($conn)."");
    
    $num = mysqli_num_rows($rs);
    
    if (mysqli_num_rows($rs) == 1) {
        $rec = mysqli_fetch_assoc($rs);
        $checkstaffID = $rec['staffID'];
        $checkPWD = $rec['password'];
        $PlacePosition = $rec['position'];
        
        if ($staffID != $checkstaffID ){
            header("location: ../login-page.php?error=invalidStaffid");
            exit();

        } else if ($pwd != $checkPWD){
            header("location: ../login-page.php?error=passwordNotMatch");
            exit();
        }
        session_start();
        $_SESSION["staffID"] = $rec['staffID'];
        $_SESSION["staffName"] = $rec['staffName'];
        $_SESSION["staffPosition"] = $rec['position'];

        if ($PlacePosition != "Staff"){
            // header("location: ../salesperson/salesdash.php");
            header("location: ../manager/ManagerWorkspace.php");
            exit();
        } else if ($PlacePosition = "Staff") {
            // header("location: ../manager/ManagerWorkspace.php");
            header("location: ../salesperson/salesdash.php");
            exit();
        } else {
            header("location: ../login-page.php?error=wrongLogin");
            exit();
        }


        // $sql = "UPDATE item SET itemName = '$itemName', itemDescription = '$itemDescription', stockQuantity = '$stockqty', price = '$itemPrice' WHERE itemID='$itemid'";
        // mysqli_query($conn, $sql) or die(mysqli_error($conn));
        // // $delSuccess = (mysqli_affected_rows($conn) == 1);
        // if (mysqli_affected_rows($conn) == 1) {
        // $delSuccess = true;
        // header("location:Edit_ItemInfo.php?itemid=$itemid?msg=Record+is+successfully+updated");
        // } else{
        // $delSuccess = false;
        // }
    } 

    // else {
        header("location: ../login-page.php");
        exit();
    // }
?>