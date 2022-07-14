<?php
    session_start();
    include "../connection/conn.php";
    $conn = getDBconnection();
    
    if (isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        if (empty($username)) {
            header("Location:../login-page.php?error = User Name is required");
            exit;
        } elseif (empty($password)) {
            header("Location:../login-page.php?error = User Name is required");
            exit();
        } else {
            $sql = "SELECT * FROM Staff WHERE staffID='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>' . mysqli_error($conn) . "</div>");;
            if ($row['username'] === $username && $row['password'] === $password) {
                echo "Login Success";
                $_SESSION['username'] = $row['username'];
                exit();
            } else {
                header("Location:login-page.php?error=Incorrect user name or password");
                exit();
            }
            header("Location:login-page.php?error=Incorrect user name or password");
                exit();
        }
        // if (emptyLoginInput($StaffID, $pwd) !== false){
        //     header("location: ../login-page?error=emptyinput");
        //     exit();
        // }

        // if(invalidStaffID($StaffID) !== false){
        //     header("location: ../login-page?error=invalidStaffid");
        //     exit();
        // }

        // if(PasswordDoesNotMatch($pwd) !== false){
        //     header("location: ../login-page?error=passwordNotMatch");
        //     exit();
        // }
        // loginStaff($conn, $StaffID, $pwd);
    
    } else {
        header("Location:login-page.php");
        exit();
    }
?>