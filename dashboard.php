<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <a href="manage-students.php" class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- nothing -->
                            <?php
                            $sql1 = "SELECT StudentId from tblstudents ";
                            $query1 = $dbh->prepare($sql1);
                            $query1->execute();
                            $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                            $totalstudents = $query1->rowCount();
                            ?>
                        </div>
                        <div class="h1 mb-3"><?php echo htmlentities($totalstudents); ?></div>
                        <div class="d-flex mb-2">
                            <div>Students</div>
                            <div class="ms-auto">
                                <!-- nothing -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <a href="manage-subjects.php" class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- nothing -->
                            <?php
                            $sql = "SELECT id from  tblsubjects ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totalsubjects = $query->rowCount();
                            ?>
                        </div>
                        <div class="h1 mb-3"><?php echo htmlentities($totalsubjects); ?></div>
                        <div class="d-flex mb-2">
                            <div>Courses</div>
                            <div class="ms-auto">
                                <!-- nothing -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <a href="manage-classes.php" class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- nothing -->
                            <?php
                            $sql2 = "SELECT id from  tblclasses ";
                            $query2 = $dbh->prepare($sql2);
                            $query2->execute();
                            $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                            $totalclasses = $query2->rowCount();
                            ?>
                        </div>
                        <div class="h1 mb-3"><?php echo htmlentities($totalclasses); ?></div>
                        <div class="d-flex mb-2">
                            <div>Programmes</div>
                            <div class="ms-auto">
                                <!-- nothing -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <a href="manage-results.php" class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- nothing -->
                            <?php
                            $sql3 = "SELECT  distinct StudentId from  tblresult ";
                            $query3 = $dbh->prepare($sql3);
                            $query3->execute();
                            $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                            $totalresults = $query3->rowCount();
                            ?>
                        </div>
                        <div class="h1 mb-3"><?php echo htmlentities($totalresults); ?></div>
                        <div class="d-flex mb-2">
                            <div>Results</div>
                            <div class="ms-auto">
                                <!-- nothing -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<?php //} 
?>