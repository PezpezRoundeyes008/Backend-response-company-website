<!DOCTYPE html>
<html lang="en">

<!-- URL: http://127.0.0.1/[foldername]-->
<!-- URL: http://localhost/[foldername]-->
<!-- URL: http://localhost/4523m-project/manager/ViewCustomerList.php-->
<!-- URL: http://localhost/4523m-project/manager/ViewCustomerList.php... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- Remember to turn on xampp -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Better Limited - Customer List</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Articles-Badges.css">
    <link rel="stylesheet" href="../assets/css/Dashboard-layout-v11-1.css">
    <link rel="stylesheet" href="../assets/css/Dashboard-layout-v11-2.css">
    <link rel="stylesheet" href="../assets/css/Dashboard-layout-v11.css">
    <link rel="stylesheet" href="../assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="../assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Center.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Centered-Brand.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/styles.css">


    <script type="text/javascript">
        // function setDeleteEmail_Msg(customerEmail){
        //     document.getElementById('customerEmail').value = customerEmail;
        //     document.getElementById('custform').submit();
        // }
    </script>
</head>

<body>


    <div>
        <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="" style="background-image:url(&quot;https://vignette.wikia.nocookie.net/the-xmen-roleplay/images/c/c1/Forest-Lake-HD-Desktop-Wallpaper.jpg/revision/latest?cb=20130822192442&quot;);">
                <div class="sidebar-wrapper">
                    <div class="logo"><a class="simple-text" href="ManagerWorkspace.php">Manager dashboard</a></div>
                    <?php 
                        session_start();
                        if(isset($_SESSION["staffID"])){
                            echo <<<EOF
                            <p style="text-align:center;"> Staff ID:  {$_SESSION["staffID"]} </p>
                            <p style="text-align:center;"> Staff Name:  {$_SESSION["staffName"]} </p>
                            <p style="text-align:center;"> Position:  {$_SESSION["staffPosition"]} </p>
                            EOF;
                        }
                    ?>

                    <div id="list-group"><a class="btn btn-primary text-start" role="button" style="width: 260px;height: 40px;background: rgba(11,112,169,0.38);" href="ViewCustomerList.php">Customer List </a><a class="btn btn-primary text-start" role="button" style="width: 260px;height: 40px;background: rgba(11,112,169,0.38);" href="ViewItemInfo.php">Item List</a><a class="btn btn-primary text-start" role="button" style="width: 260px;height: 40px;background: rgba(11,112,169,0.38);" href="GenerateReport.php">Generate Report </a></div>
                    <div id="logout-button" style="padding: 5px 0px 5px;text-align: center;">
                        <a class="btn btn-primary" role="button" style="height: 42px;width: 260px;background: rgba(255,112,66,0.91);" href="../includes/logout.inc.php">
                        Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid">
                        <div><a class="navbar-brand" href="#">Customer List</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav"></ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="#">Account </a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="Container_Table" style="background: rgba(174,174,174,0.62);box-shadow: inset 5px 0px 8px rgba(33,37,41,0.23);">
                    <div class="container-fluid">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


                            <!-- table display here -->
                            <?php
                            include "../connection/conn.php";
                            $conn = getDBconnection();
                            $sql = "SELECT * FROM customer";
                            $rs = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>' . mysqli_error($conn) . "</div>"); // rs is the result set
                            $num = mysqli_num_rows($rs);
                            if ($num == 0) {
                                echo "No record found in customer table"; // echo "Number of records selected = $num<br>";
                            } else { ?>

                                <!-- Customer Table: header -->
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">Select Customer</th>
                                        <th>Customer Email</th>
                                        <th>Name</th>
                                        <th>Phone number</th>
                                    </tr>
                                </thead>

                                <!-- get the Customer List records -->
                                <!-- delete button:  GET method -->
                                <!--                <a href="Delete_Customer_Record.php?deleteEmail={$rec['customerEmail']}">
                                        <button class="btn btn-primary" style="background: #DB2626; ">X</button>
                                    </a> 

                                    <td style="width: 40px;text-align: center;">
                                        <button class="btn btn-primary" style="background: #DB2626; onclick="setDeleteEmail_Msg({$rec['customerEmail']})">X</button>
                                    </td>
                                -->
                                <tbody>
                                <?php
                                while ($rec = mysqli_fetch_assoc($rs)) {
                                    echo <<<EOF
                                        <tr>
                                            <td style="width: 40px;text-align: center;">
                                                <a href="Delete_Customer_Record.php?deleteEmail={$rec['customerEmail']}">
                                                    <button class="btn btn-primary" style="background: #DB2626; ">X</button>
                                                </a> 
                                            </td>
                                            <td>{$rec['customerEmail']}</td>
                                            <td>{$rec['customerName']}</td>
                                            <td>{$rec['phoneNumber']}</td>
                                        </tr>
                                    EOF;
                                }

                                echo mysqli_free_result($rs);
                                // testing $_GET['msg']
                                if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }
                                mysqli_close($conn);
                            } //else (end)
                                ?>

                                </tbody>
                        </table>

                    </div>
                </div>
                <div>
                    <nav class="navbar navbar-light navbar-expand-md" id="ToolbuttonList">
                        <div class="container-fluid">
                            <div>
                                <div class="btn-toolbar">
                                    <div class="btn-group" role="group"><button class="btn btn-primary" type="button" style="background: rgb(35,152,16);"><strong>Insert&nbsp;</strong></button><button class="btn btn-primary" type="button" style="background: rgb(13, 110, 253);">Update</button><button class="btn btn-primary" type="button" style="background: var(--bs-red);">Delete</button></div>
                                </div>
                            </div><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Dashboard-layout-v11.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>

</body>

</html>