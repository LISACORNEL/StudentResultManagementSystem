<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            if (isset($_POST['submit'])) {
                $subjectname = $_POST['subjectname'];
                $subjectcode = $_POST['subjectcode'];
                $semester = $_POST['semester'];
                $sql = "INSERT INTO  tblsubjects(SubjectName,SubjectCode,semester) VALUES(:subjectname,:subjectcode,:semester)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
                $query->bindParam(':subjectcode', $subjectcode, PDO::PARAM_STR);
                $query->bindParam(':semester', $semester, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Subject Created successfully";
                } else {
                    $error = "Something went wrong. Please try again";
                }
            }
            ?>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Course Creation</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li> / Courses</li>
                        <li class="active">Create Course</li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h5>Create Course</h5>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success left-icon-alert" role="alert">
                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                </div><?php } else if ($error) { ?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="default" class="col-sm-2 control-label">Course Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subjectname" class="form-control" id="default" placeholder="Subject Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="default" class="col-sm-2 control-label">Course Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subjectcode" class="form-control" id="default" placeholder="Subject Code" required="required">
                                    </div>

                                    <label for="default" class="col-sm-2 control-label">Semester</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="semester" class="form-control" id="default" placeholder="Semester eg 1 or 2" required="required">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 py-2">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.col-md-12 -->
            </div>
        </div>
    </div>
    <!-- /.content-container -->
</div>
</div>

<?php include('includes/footer.php'); ?>
<?php //} 
?>