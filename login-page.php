<!DOCTYPE html>
<html lang="en">

<!-- URL: http://127.0.0.1/[foldername]-->
<!-- URL: http://localhost/[foldername]-->
<!-- URL: http://localhost/4523m-project/login-page.php-->
<!-- URL: http://localhost/4523m-project/login-page.php... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- URL: http://127.0.0.1/4523m-project/... -->
<!-- Remember to turn on xampp -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Better Limited - Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Badges.css">
    <link rel="stylesheet" href="assets/css/Dashboard-layout-v11-1.css">
    <link rel="stylesheet" href="assets/css/Dashboard-layout-v11-2.css">
    <link rel="stylesheet" href="assets/css/Dashboard-layout-v11.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Login-Center.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Brand.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="background: rgb(69,89,109);--bs-dark: #062b4f;--bs-dark-rgb: 6,43,79;">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-box-seam">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"></path>
                        </svg></span><span>Better Limited</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Membership</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Store Location</a></li>
                    </ul><a class="btn btn-primary ms-md-2" role="button" href="login-page.php">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <div>
        <header></header>
        <div class="container">
            <div class="row row-login" id="row-border">
                <div class="col-10 col-sm-6 col-md-4 offset-1 offset-sm-3 offset-md-4">
                    <div>
                        <div class="card-body">
                            <h3 class="text-dark">Staff Login </h3>
                            <form action="includes/login.inc.php" method="post">
                                <div class="form-group mb-3">
                                    <label class="form-label">Staff ID</label>
                                    <input class="form-control" type="text" name="staffID" placeholder = "Staff ID...">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Password </label>
                                    <input class="form-control" type="password" name="pwd" placeholder = "Password...">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="formCheck-6">
                                        <label class="form-check-label" for="formCheck-6">Remember me</label>
                                    </div>
                                </div>
                                <!-- <a class="btn btn-success d-block w-100" role="button" href="#">LOGIN </a> -->
                                <button class="btn btn-success d-block w-100" type="submit" name="login">LOGIN</button>
                            </form>


                            <!-- return GET error msg -->
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"]  ===  'emptyinput'){
                                        echo `<p class="login-fail-msg" style="padding-top: 20px; color: rgb(176, 32, 32);">
                                                Please fill in all fields!</p>`;
                                    }
                                    else if ($_GET["error"] === 'invalidStaffid') {
                                        echo `<p class="login-fail-msg" style="padding-top: 20px; color: rgb(176, 32, 32);">
                                                The staff ID is not valid! Please re-enter.</p>`;
                                    }
                                    else if ($_GET["error"] === 'passwordNotMatch') {
                                        echo `<p class="login-fail-msg" style="padding-top: 20px; color: rgb(176, 32, 32);">
                                                Password is not correct</p>`;
                                    } else if ($_GET["error"] === 'wrongLogin'){
                                        echo `<p class="login-fail-msg" style="padding-top: 20px; color: rgb(176, 32, 32);">
                                                Something wrongs! Please re-enter the form.</p>`;
                                    }
                                }
                            ?>
                            <!-- return GET error msg -->
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <footer>
        <footer class="text-center bg-dark">
            <div class="container text-white py-4 py-lg-5">
                <ul class="list-inline">
                    <li class="list-inline-item me-4"><a class="link-light" href="#">About Us</a></li>
                    <li class="list-inline-item me-4"><a class="link-light" href="#">Contact Us</a></li>
                    <li class="list-inline-item"><a class="link-light" href="#">Terms of Use</a></li>
                </ul>
                <p class="text-muted mb-0">Copyright © 2022 Better Limited</p>
            </div>
        </footer>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Dashboard-layout-v11.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>