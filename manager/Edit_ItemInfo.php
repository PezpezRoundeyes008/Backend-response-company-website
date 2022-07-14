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
    <title>Better Limited - Edit Item Info in Item List</title>
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
                        <div><a class="navbar-brand" href="#">Edit and Update Item Info</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav"></ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="#">Account </a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="Container_Table" style="background: rgba(174,174,174,0.62);box-shadow: inset 5px 0px 8px rgba(33,37,41,0.23);">
                    <div class="container-fluid"><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
        <?php
        include "../connection/conn.php";   
        $conn = getDBconnection();
        $sql = "SELECT * FROM item"; 
        $rs = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>'.mysqli_error($conn)."</div>"); // rs is the result set
        $num = mysqli_num_rows($rs); 
        if ($num == 0){
            echo "No record found in item table"; // echo "Number of records selected = $num<br>";
        } else { ?>

            <!-- Item Table: header -->
                    <thead>
                        <tr>
                            <th style="width: 10px;">Select Item</th>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>    
            <!-- get the Item Information List records -->
            <!-- <td style="width: 40px;text-align: center;"><a href="#"><input type="checkbox" style="width: 20.8px;"></a></td> -->
                    <tbody>
                    <?php
                    // $sql = "SELECT * FROM item"; 
                    // $rs = mysqli_query($conn, $sql);
                    while ($rec = mysqli_fetch_assoc($rs)) {
                        echo <<<EOF
                            <tr>
                                <td style="width: 40px;text-align: center;">
                                    <a href="Edit_ItemInfo.php?itemid={$rec['itemID']}">
                                        <button class="btn btn-primary" style="background: #0D6EFD;">O</button>
                                    </a>
                                </td>
                                
                                <td>{$rec['itemID']}</td>
                                <td>{$rec['itemName']}</td>
                                <td>{$rec['itemDescription']}</td>
                                <td>{$rec['stockQuantity']}</td>
                                <td>{$rec['price']}</td>
                            </tr>
                        EOF;
                    }

                    echo mysqli_free_result($rs);
                    // mysqli_close($conn);
                        } //else (end)
            ?>

            </tbody>
        </table>

        <!-- <a class="btn btn-primary" role="button" style="background: rgb(13, 110, 253);" href="Edit_ItemInfo.php">Update</a> -->
        
            </div>
                </div>
                
                <?php
                if (!empty($_GET)) {
                    // get a database record which match the custID
                    extract($_GET);
                    $sql = "SELECT * FROM item WHERE itemID = '$itemid'"; // itemid={$rec['itemID']}
                    $rs = mysqli_query($conn, $sql) or die('<div class="error">SQL command fails :<br>' . mysqli_error($conn)."</div>");
                        $num = mysqli_num_rows($rs);
                        if ($num == 0){
                            echo "Record not found<br>";
                            die();
                        } else {
                            // get database record date
                            $rec = mysqli_fetch_assoc($rs);
                        }
                            // 完整內容
                            // itemID	
                            // itemName	
                            // itemDescription	
                            // stockQuantity	
                            // price
                        $itemName = $rec['itemName'];
                        $itemDescription = $rec['itemDescription'];
                        $stockqty = $rec['stockQuantity'];
                        $itemPrice = $rec['price'];
                        // testing if it can grab the related recording
                        // echo "Testing: $itemid, $itemName, $itemDescription, $stockqty, $itemPrice";

                    
                    // Update function table
                    echo <<<EOD
                                <div class="container" style="background: rgba(107,136,153,0.74);">
                                <div class="row register-form">
                                    <div class="col-md-8 offset-md-2">


                                    <!-- Update function table -->
                                    <form class="custom-form" style="width: 540.99px;" action="Edit_ItemInfo_Push.php" method="post">
                                                <div class="row form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="col-form-label" for="name-input-field">Item ID</label>
                                                    </div>
                                                    <div class="col-sm-6 input-column">
                                                        <input class="form-control" type="number" name="itemid" value="$itemid" readonly></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="col-form-label" for="email-input-field">Item Name</label>
                                                </div>
                                                    <div class="col-sm-6 input-column">
                                                        <input class="form-control" type="text" name="itemName" value="$itemName"></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="col-form-label" for="pawssword-input-field">Item Description </label>
                                                    </div>
                                                    <div class="col-sm-6 input-column">
                                                        <input class="form-control" type="text" name="itemDescription" value="$itemDescription"></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="col-form-label" for="repeat-pawssword-input-field">Stock Quantity </label>
                                                    </div>
                                                    <div class="col-sm-6 input-column">
                                                        <input class="form-control" type="number" name="stockqty" value="$stockqty"></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-4 label-column">
                                                        <label class="col-form-label" for="dropdown-input-field">Price ($)</label>
                                                    </div>
                                                    <div class="col-sm-4 col-xl-6 input-column">
                                                        <input class="form-control" type="number" name="itemPrice" value="$itemPrice"></div>
                                                    </div>
                                                    <input class="btn btn-primary" style="background: var(--bs-red);" type="reset" value="Cancel" onclick="window.location.href='Edit_ItemInfo.php'">
                                                    <button class="btn btn-light submit-button" type="submit" value="update" name="update">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    EOD;

                    // Update function table
                    // mysqli_close($conn);
                }
                ?>

                <div>
                    <nav class="navbar navbar-light navbar-expand-md" id="ToolbuttonList">
                        <div class="container-fluid">
                            <div>
                                <div class="btn-toolbar">
                                    <div class="btn-group" role="group"><a class="btn btn-primary" role="button" style="background: rgb(35,152,16);" href="Insert_ItemInfo.php"><strong>Insert&nbsp;</strong></a><a class="btn btn-primary" role="button" style="background: rgb(13, 110, 253);" href="Edit_ItemInfo.php">Update</a><button class="btn btn-primary" type="button" style="background: var(--bs-red);">Delete</button></div>
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