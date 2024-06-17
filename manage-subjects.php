<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Manage Courses</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li> / Courses</li>
                        <li class="active">Manage Courses</li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <section class="section">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-md-12">

                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h5>View Courses Info</h5>
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
                            <div class="panel-body p-20">

                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Creation Date</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from tblsubjects";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                    <td><?php echo htmlentities($result->SubjectCode); ?></td>
                                                    <td><?php echo htmlentities($result->Creationdate); ?></td>
                                                    <td><?php echo htmlentities($result->UpdationDate); ?></td>
                                                    <td>
                                                        <a href="edit-subject.php?subjectid=<?php echo htmlentities($result->id); ?>"><i class="fa fa-edit" title="Edit Record"></i> </a>

                                                    </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>


                                    </tbody>
                                </table>


                                <!-- /.col-md-12 -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->


                </div>
                <!-- /.col-md-12 -->
            </div>
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-md-6 -->

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