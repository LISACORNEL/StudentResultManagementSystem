<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            if (isset($_POST['submit'])) {
                $classname = $_POST['classname'];
                $classnamenumeric = $_POST['classnamenumeric'];
                $section = $_POST['section'];
                $sql = "INSERT INTO  tblclasses(ClassName,ClassNameNumeric,Section) VALUES(:classname,:classnamenumeric,:section)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':classname', $classname, PDO::PARAM_STR);
                $query->bindParam(':classnamenumeric', $classnamenumeric, PDO::PARAM_STR);
                $query->bindParam(':section', $section, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Class Created successfully";
                } else {
                    $error = "Something went wrong. Please try again";
                }
            }
            ?>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Create Student Programme</h2>
                </div>

            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">/ Programmes</a></li>
                        <li class="active">Create Programmes</li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <section class="section">
            <div class="container-fluid">





                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h5>Create Student Programme</h5>
                                </div>
                            </div>
                            <?php if ($msg) { ?>
                                <div class="alert alert-success left-icon-alert" role="alert">
                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                </div><?php } else if ($error) { ?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>

                            <div class="panel-body">

                                <form method="post">
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Programme</label>
                                        <div class="">
                                            <input type="text" name="classname" class="form-control" required="required" id="success">

                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Programme Number</label>
                                        <div class="">
                                            <input type="number" name="classnamenumeric" required="required" class="form-control" id="success">

                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Session</label>
                                        <div class="">
                                            <input type="text" name="section" class="form-control" required="required" id="success">

                                        </div>
                                    </div>
                                    <div class="form-group has-success">

                                        <div class=" py-2">
                                            <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit</button>
                                        </div>



                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-8 col-md-offset-2 -->
                </div>
                <!-- /.row -->




            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.section -->

    </div>
    <!-- /.main-page -->

</div>
<!-- /.content-container -->
</div>
</div>

<?php include('includes/footer.php'); ?>
<?php //} 
?>