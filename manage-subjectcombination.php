<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            // for activate Subject   	
            if (isset($_GET['acid'])) {
                $acid = intval($_GET['acid']);
                $status = 1;
                $sql = "update tblsubjectcombination set status=:status where id=:acid ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':acid', $acid, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $msg = "Subject Activate successfully";
            }

            // for Deactivate Subject
            if (isset($_GET['did'])) {
                $did = intval($_GET['did']);
                $status = 0;
                $sql = "update tblsubjectcombination set status=:status where id=:did ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':did', $did, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $msg = "Subject Deactivate successfully";
            }
            ?>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Manage Courses Combination</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li>/ Courses</li>
                        <li class="active">Manage Courses Combination</li>
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
                                    <h5>View Courses Combination Info</h5>
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
                                            <th>Programme and Session</th>
                                            <th>Course </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT tblclasses.ClassName,tblclasses.Section,tblsubjects.SubjectName,tblsubjectcombination.id as scid,tblsubjectcombination.status from tblsubjectcombination join tblclasses on tblclasses.id=tblsubjectcombination.ClassId  join tblsubjects on tblsubjects.id=tblsubjectcombination.SubjectId";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->ClassName); ?> &nbsp; Section-<?php echo htmlentities($result->Section); ?></td>
                                                    <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                    <td><?php $stts = $result->status;
                                                        if ($stts == '0') {
                                                            echo htmlentities('Inactive');
                                                        } else {
                                                            echo htmlentities('Active');
                                                        }
                                                        ?></td>

                                                    <td>
                                                        <?php if ($stts == '0') { ?>
                                                            <a href="manage-subjectcombination.php?acid=<?php echo htmlentities($result->scid); ?>" onclick="confirm('do you really want to ativate this subject');"><i class="fa fa-check" title="Acticvate Record"></i> </a><?php } else { ?>

                                                            <a href="manage-subjectcombination.php?did=<?php echo htmlentities($result->scid); ?>" onclick="confirm('do you really want to deativate this subject');"><i class="fa fa-times" title="Deactivate Record"></i> </a>
                                                        <?php } ?>
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
</div>

<?php include('includes/footer.php'); ?>
<?php //} 
?>