<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
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
                    <li class="nav-item"><a class="nav-link" href="order.php"><i class="fas fa-table"></i><span>Order</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="placeOrder.php"><i class="fas fa-window-maximize"></i><span>Place Order</span></a></li>
                </ul><button class="btn btn-primary" type="button" style="background: rgb(227,41,0);"><a href="../index.html">Log out</a></button>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><span>Welcome, User!</span></div>
                </nav>
                <section class="position-relative py-4 py-xl-5" style="height: 907.396px;">
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
                </section>
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