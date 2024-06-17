<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            if (isset($_POST['submit'])) {
                $class = $_POST['class'];
                $subject = $_POST['subject'];
                $status = 1;
                $sql = "INSERT INTO  tblsubjectcombination(ClassId,SubjectId,status) VALUES(:class,:subject,:status)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':class', $class, PDO::PARAM_STR);
                $query->bindParam(':subject', $subject, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Combination added successfully";
                } else {
                    $error = "Something went wrong. Please try again";
                }
            }
            ?>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Add Course Combination</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li>/ Courses</li>
                        <li class="active">Add Course Combination</li>
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
                                <h5>Add Course Combination</h5>
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
                                    <label for="default" class="col-sm-2 control-label">Programme</label>
                                    <div class="col-sm-10">
                                        <select name="class" class="form-control" id="default" required="required">
                                            <option value="">Select Programme</option>
                                            <?php $sql = "SELECT * from tblclasses";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="default" class="col-sm-2 control-label">Course</label>
                                    <div class="col-sm-10">
                                        <select name="subject" class="form-control" id="default" required="required">
                                            <option value="">Select Course</option>
                                            <?php $sql = "SELECT * from tblsubjects";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SubjectName); ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 py-2">
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
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