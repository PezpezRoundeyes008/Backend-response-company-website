<!DOCTYPE html>
<html lang="en">
<!-- URL: http://127.0.0.1/[foldername]-->
<!-- URL: http://localhost/[foldername]-->
<!-- URL: http://localhost/4523m-project/manager/ManagerWorkspace.php-->
<!-- URL: http://localhost/4523m-project/... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- Remember to turn on xampp -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Better Limited - Manager workspace</title>
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
                        <div><a class="navbar-brand" href="#">Control panel</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav"></ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="#">Account </a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content" style="background: rgba(174,174,174,0.62);box-shadow: inset 5px 0px 8px rgba(33,37,41,0.23);">
                    <div class="container">
                        <p class="text-center" style="font-size: 30px;">Welcome to Manager Dashboard.</p>
                    </div>
                </div>
                <div id="Toolbutton"></div>
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