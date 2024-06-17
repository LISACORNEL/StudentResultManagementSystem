<?php
session_start();
//error_reporting(0);
include('includes/config.php'); ?>
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

    <div class="container w-50">
        <div class="row p-5 m-5" style="height: 50rem;">
            <div class="col-12 shadow-lg bg p-5 rounded align-self-center">
                <form action="transcript-result.php" method="post" class="p-5">
                    <div class="pb-5 display-4 text-center rounded mx-auto">
                        <i class="fa fa-address-card text-danger"></i>
                        <p class="lead">Student Results Management System</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reg Number" name="rollid">
                    </div>
                    <button type="submit" class="btn btn-primary">Search <i class="fa fa-check ps-2"></i></button>
                    <a href="index.php" type="submit" class="btn btn-outline-danger">Back Home <i class="fa fa-home ps-2"></i></a>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js3/jquery.min.js"></script>
    <script type="text/javascript" src="js3/pooper.min.js"></script>
    <script type="text/javascript" src="js3/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js3/selfStyle.js"></script>
</body>

</html>