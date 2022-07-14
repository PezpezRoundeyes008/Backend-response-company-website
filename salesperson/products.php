<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>Salesperson</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar" style="height: 170px;">
                    <li class="nav-item"><a class="nav-link active" href="products.php"><i class="fas fa-table"></i><span>Products</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="order.php"><i class="fas fa-table"></i><span>Order</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="placeOrder.php"><i class="fas fa-window-maximize"></i><span>Place Order</span></a></li>
                </ul><button class="btn btn-primary" type="button" style="background: rgb(227,41,0);"><a href="../index.html">Log out</a></button>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><span>Welcome, User!</span></div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" style="width: 1241px;transform: translate(10px);">Product</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Products Info</p>
                        </div>
                        <div class="card-body" style="height: 696px;">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">

                                    <thead>
                                        <tr>
                                            <th style="width: 83px;">Select Item</th>
                                            <th style="width: 57.177px;">Item ID</th>
                                            <th style="width: 420px;">Item Name</th>
                                            <th style="width: 460px;">Description</th>
                                            <th style="width: 40px;">Quantity</th>
                                            <th style="width: 55px;">Price</th>
                                            <th style="width: 55px;">select Quantity</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        include "../connection/conn.php";
                                        $conn = getDBconnection();
                                        $sql = "SELECT * FROM item";
                                        $rs = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>' . mysqli_error($conn) . "</div>"); // rs is the result set
                                        $num = mysqli_num_rows($rs);
                                        if ($num == 0) {
                                            echo "No record found in item table"; // echo "Number of records selected = $num<br>";
                                        } else {
                                            while ($rec = mysqli_fetch_assoc($rs)) {
                                                echo <<<EOF
                                                    <tr>
                                                    <td style="width: 40px;text-align: center;"><input type="checkbox" style="width: 15.6667px;"></td>
                                                    <td style="width: 100px;">{$rec['itemID']}</td>
                                                    <td style="width: 450px;">{$rec['itemName']}</td>
                                                    <td style="width: 450px;">{$rec['itemDescription']}</td>
                                                    <td style="width: 40px;">{$rec['stockQuantity']}</td>
                                                    <td style="width: 55px;">{$rec['price']}</td>
                                                    <td style="width: 30px;"><input type="number"></td>
                                                    </tr>
                                                EOF;
                                            }
                                            echo mysqli_free_result($rs);
                                            mysqli_close($conn);
                                        }
                                        ?>
                                    <tfoot>
                                        <tr>
                                            <td style="font-weight: bold;">Select Item<strong></strong></td>
                                            <td><strong>Item ID</strong></td>
                                            <td><strong>Item Name</strong></td>
                                            <td><strong>Description</strong></td>
                                            <td><strong>Quantity</strong></td>
                                            <td><strong>Price</strong></td>
                                            <td><strong>select Quantity</strong></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="btn-toolbar" style="transform: translateY(10px);">
                                <div class="btn-group" role="group"><button class="btn btn-primary" type="button">Create Order</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="height: 807.396px;text-align: center;border-style: dashed;">
                                <div class="row mb-5" style="height: 61.3958px;">
                                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                                        <h2 style="transform: translateY(10px);">Place Order</h2>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center" style="height: 626px;">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-5">
                                            <div class="card-body d-flex flex-column align-items-center">
                                                <form class="text-center" action="placeOrder.php" method="post" style="height: 311px;">
                                                    <div class="mb-3" style="width: 358.333px;"><input class="form-control" type="email" name="custEmail" placeholder="Customer's Email"></div>
                                                    <div class="mb-3"><input class="form-control" type="text" name="staffID" placeholder="Staff ID" style="width: 360px;"></div>
                                                    <div class="mb-3"><input class="form-control" type="datetime" name="orderDate" placeholder="Order Date & Time" style="width: 360px;"></div>
                                                    <div class="mb-3"><input class="form-control" type="text" name="deliAddress" placeholder="Delivery Address (optional)" style="width: 360px;"></div>
                                                    <div class="mb-3"><input class="form-control" type="datetime" name="deliDate" placeholder="Delivery Date (optional)" style="width: 360px;"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><button class="btn btn-primary" type="button" style="transform: translateY(20px);">Submit</button>
                            </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Better Limited 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>