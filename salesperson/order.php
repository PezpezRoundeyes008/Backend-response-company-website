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
                    <li class="nav-item"><a class="nav-link" href="products.php"><i class="fas fa-table"></i><span>Products</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="order.php"><i class="fas fa-table"></i><span>Order</span></a></li>
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
                    <h3 class="text-dark mb-4">ORDERS</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Orders info</p>
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
                                            <th style="width: 88.083px;">Action</th>
                                            <th style="width: 61px;">Order ID</th>
                                            <th style="width: 144px;">Customer Email</th>
                                            <th style="width: 85px;">Staff ID</th>
                                            <th style="width: 155.562px;">Order Date & Time</th>
                                            <th style="width: 212.969px;">Delivery Address</th>
                                            <th style="width: 212.698px;">Delivery Date</th>
                                            <th style="width: 74.406px;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "../connection/conn.php";
                                        $conn = getDBconnection();
                                        $sql = "SELECT * FROM orders";
                                        $rs = mysqli_query($conn, $sql) or die('<div class = "error">SQL command fails : <br>' . mysqli_error($conn) . "</div>"); // rs is the result set
                                        $num = mysqli_num_rows($rs);
                                        if ($num == 0) {
                                            echo "No record found in order table"; // echo "Number of records selected = $num<br>";
                                        } else {
                                            while ($rec = mysqli_fetch_assoc($rs)) {
                                                echo <<<EOF
                                                <tr>
                                                    <td style="text-align: center;">
                                                    <a href="deleteOrder.php?orderID={$rec['orderID']}">
                                                    <button class="btn btn-primary" type="button" name="deleteButton" style="background: rgb(255,60,47);" onClick="submitDelete()">Delete</button>
                                                    </a>
                                                    <a href="reciept.php?customerEmail={$rec['customerEmail']}">
                                                    <button class="btn btn-primary" type="button" name="deleteButton" style="background: rgb(0,0,255);" onClick="viewReciept()">View Reciept</button>
                                                    </a>
                                                    </td>
                                                    </form>
                                                    <td>{$rec['orderID']}</td>
                                                    <td>{$rec['customerEmail']}</td>
                                                    <td>{$rec['staffID']}</td>
                                                    <td>{$rec['dateTime']}</td>
                                                    <td>{$rec['deliveryAddress']}</td>
                                                    <td>{$rec['deliveryDate']}</td>
                                                    <td style="width: 100.406px;">{$rec['orderAmount']}</td>
                                                </tr>
                                            EOF;
                                            }
                                            echo mysqli_free_result($rs);
                                            mysqli_close($conn);
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 88.083px;">Action</th>
                                            <th style="width: 61px;">Order ID</th>
                                            <th style="width: 144px;">Customer Email</th>
                                            <th style="width: 85px;">Staff ID</th>
                                            <th style="width: 155.562px;">Order Date & Time</th>
                                            <th style="width: 212.969px;">Delivery Address</th>
                                            <th style="width: 212.698px;">Delivery Date</th>
                                            <th style="width: 74.406px;">Amount</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <form action="updateOrder.php" method="post" name="updateOrder" id="updateOrder">
                                        <div class="mb-3"><input class="form-control" type="text" name="orderID" placeholder="Order ID" style="width: 360px;"></div>
                                        <div class="mb-3"><input class="form-control" type="text" name="deliAddress" placeholder="Delivery Address" style="width: 360px;"></div>
                                        <div class="mb-3">Delivery Date<input class="form-control" type="date" name="deliDate" style="width: 360px;"></div>
                                        <button class="btn btn-primary" type="button" style="background: rgb(34,218,19);" onClick="submitUpdate()">Update</button>
                                    </form>
                                </div>
                                <script>
                                    function submitDelete() {
                                        document.getElementById("deleteOrder").submit();
                                    }

                                    function submitUpdate() {
                                        document.getElementById("updateOrder").submit();
                                    }
                                </script>
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
                        </div>
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