<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            if (isset($_POST['Update'])) {
                $sid = intval($_GET['subjectid']);
                $subjectname = $_POST['subjectname'];
                $subjectcode = $_POST['subjectcode'];
                $sql = "update  tblsubjects set SubjectName=:subjectname,SubjectCode=:subjectcode where id=:sid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
                $query->bindParam(':subjectcode', $subjectcode, PDO::PARAM_STR);
                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query->execute();
                $msg = "Subject Info updated successfully";
            }
            ?>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Update Subject</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li> / Subjects</li>
                        <li class="active">Update Subject</li>
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
                                <h5>Update Subject</h5>
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

                                <?php
                                $sid = intval($_GET['subjectid']);
                                $sql = "SELECT * from tblsubjects where id=:sid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {   ?>
                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Subject Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="subjectname" value="<?php echo htmlentities($result->SubjectName); ?>" class="form-control" id="default" placeholder="Subject Name" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Subject Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="subjectcode" class="form-control" value="<?php echo htmlentities($result->SubjectCode); ?>" id="default" placeholder="Subject Code" required="required">
                                            </div>
                                        </div>
                                <?php }
                                } ?>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 py-2">
                                        <button type="submit" name="Update" class="btn btn-primary">Update</button>
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