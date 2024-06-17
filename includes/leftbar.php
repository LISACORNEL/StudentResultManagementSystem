<?php include('session_variables.php'); ?>
<div class="left-sidebar bg-black-300 box-shadow ">
    <div class="sidebar-content">
        <div class="user-info closed">
            <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
            <h6 class="title"><?php echo $userName ?></h6>
            <small class="info">Administrator</small>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span class="">Main Category</span>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

                </li>

                <li class="nav-header">
                    <span class="">Appearance</span>
                </li>
                <?php if ($role == 1) { ?> <li class="has-children">
                        <a href="#"><i class="fa fa-file-text"></i> <span>Programmes</span> <i class="fa fa-angle-right arrow"></i></a>
                        <ul class="child-nav">
                            <li><a href="create-class.php"><i class="fa fa-bars"></i> <span>Create Programme</span></a></li>
                            <li><a href="manage-classes.php"><i class="fa fa fa-server"></i> <span>Manage Programme</span></a></li>

                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#"><i class="fa fa-file-text"></i> <span>Courses</span> <i class="fa fa-angle-right arrow"></i></a>
                        <ul class="child-nav">
                            <li><a href="create-subject.php"><i class="fa fa-bars"></i> <span>Create Course</span></a></li>
                            <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Courses</span></a></li>
                            <li><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Course Combination </span></a></li>
                            <a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Course Combination </span></a>
                    </li>
            </ul>
            </li>

            <li class="has-children">
                <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                    <li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Add Students</span></a></li>
                    <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>

                </ul>
            </li>
        <?php } ?>
        <li class="has-children">
            <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul class="child-nav">
                <li><a href="add-result.php"><i class="fa fa-bars"></i> <span>Add Student Results</span></a></li>
                <li><a href="subject-results.php"><i class="fa fa fa-server"></i> <span>Add Course Results</span></a></li>
                <li><a href="find-program.php"><i class="fa fa fa-server"></i> <span>Results Report</span></a></li>

            </ul>
        </li>


        <li class="has-children">




        <li><a href="change-password.php"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li>


        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>