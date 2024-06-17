<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    //do nothing
}
?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - SRMS.</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1674944402" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./css3/fonts/css/all.css">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" layout-fluid">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark text-dark">
                    <a href="dashboard.php" class="">
                        <?php include('session_variables.php'); ?>
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>

                        <?php if ($role == 1) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M15 15l3.35 3.35" />
                                            <path d="M9 15l-3.35 3.35" />
                                            <path d="M5.65 5.65l3.35 3.35" />
                                            <path d="M18.35 5.65l-3.35 3.35" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Programmes
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="create-class.php">
                                        Create Programme
                                    </a>
                                    <a class="dropdown-item" href="manage-classes.php">
                                        Manage Programme
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M15 15l3.35 3.35" />
                                            <path d="M9 15l-3.35 3.35" />
                                            <path d="M5.65 5.65l3.35 3.35" />
                                            <path d="M18.35 5.65l-3.35 3.35" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Courses
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="create-subject.php" class="dropdown-item"><span> Create Course</span></a>
                                    <a href="manage-subjects.php" class="dropdown-item"><span> Manage Courses</span></a>
                                    <a href="add-subjectcombination.php" class="dropdown-item"> <span> Add Course Combination </span></a>
                                    <a href="manage-subjectcombination.php" class="dropdown-item"> <span> Manage Course Combination </span></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M15 15l3.35 3.35" />
                                            <path d="M9 15l-3.35 3.35" />
                                            <path d="M5.65 5.65l3.35 3.35" />
                                            <path d="M18.35 5.65l-3.35 3.35" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Students
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="add-students.php"><span> Add Students</span></a>
                                    <a class="dropdown-item" href="manage-students.php"><span> Manage Students</span></a>
                                </div>
                            </li>
                        <?php } ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M15 15l3.35 3.35" />
                                        <path d="M9 15l-3.35 3.35" />
                                        <path d="M5.65 5.65l3.35 3.35" />
                                        <path d="M18.35 5.65l-3.35 3.35" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Result
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="add-result.php"><span>Add Student Results</span></a>
                                <a class="dropdown-item" href="subject-results.php"> <span>Add Course Results</span></a>
                                <a class="dropdown-item" href="find-program.php"> <span>Results Report</span></a>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                SRMS Dashboard
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="nav-item dropdown col-auto ms-auto d-print-none bg-secondary text-white rounded-pill p-2">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="rounded-circle bg-dark p-2 text-white fa fa-user"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div><?php echo $_SESSION['alogin']; ?></div>
                                    <div class="mt-1 small text-muted"><?php echo $_SESSION['arole']; ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>