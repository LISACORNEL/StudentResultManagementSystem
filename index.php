<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <script src="js3/color-modes.js"></script>
    <link rel="stylesheet" type="text/css" href="css3/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css3/fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="css3/main.css">
    <title>SRMS</title>
</head>

<body>

    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4>About</h4>
                        <p class="text-body-secondary"> and generate informative reports to support data-driven decision-making in education.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4>Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Instagram</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <i class="fa fa-address-card px-2"> </i>
                    <strong>SRMS</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container-fluid" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/bg.png');
    background-size: cover;">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto text-white">
                    <h1 class="fw-light"><b>Student Record Management System</b></h1>
                    <p class="lead text-body-secondary">This system will enable the streamlining of administrative tasks, improved communication, and the provision of valuable insights for educators and administrators, empowering them to make well-informed decisions. The system's specific features can be tailored to align with the unique needs and requirements of the educational institution implementing it</p>
                    <p>
                        <a href="#" class="btn btn-lg btn-primary my-2">Read More .. </a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row">
                    <div class="col-6">
                        <div class="card shadow-sm bg-light">
                            <img src="images/top.png" style="width: 90%; height: 100%; object-fit: cover;" alt="">
                            <div class="card-body">
                                <p class="card-text text-dark">Click below for student login. Make sure your credentials are right to get access securely.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="transcript.php" type="button" class="btn btn btn-outline-primary">Student Transcript</a>
                                        <a href="find-result.php" type="button" class="btn btn btn-outline-danger">Semester Results</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow-sm bg-light">
                            <img src="images/hill.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                            <div class="card-body">
                                <p class="card-text text-dark">Click below for administration login. Make sure your credentials are right to get access.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="admin-login.php" type="button" class="btn btn btn-outline-success">Admin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Made By Lisa. C &copy; 2024</p>
        </div>
    </footer>

    <script type="text/javascript" src="js3/jquery.min.js"></script>
    <script type="text/javascript" src="js3/pooper.min.js"></script>
    <script type="text/javascript" src="js3/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js3/selfStyle.js"></script>
</body>

</html>