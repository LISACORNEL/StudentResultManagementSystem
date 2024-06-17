<?php include('includes/header.php'); ?>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <?php
            if (isset($_POST['submit'])) {
                $cas = array();
                $fes = array();
                $class = $_POST['class'];
                $subjectid = $_POST['subjectid'];
                $ca = $_POST['cas'];
                $fe = $_POST['fes'];
                $semester = $_POST['semester'];
                $academicYear = $_POST['academicyear'];

                $stmt = $dbh->prepare("SELECT * FROM tblstudents WHERE ClassId=:cid");
                $stmt->execute(array(':cid' => $class));
                $sid1 = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    array_push($sid1, $row['StudentId']);
                }

                for ($i = 0; $i < count($ca); $i++) {
                    $c = $ca[$i];
                    $f = $fe[$i];
                    $sid = $sid1[$i];
                    $sql = "INSERT INTO  tblresult(StudentId,ClassId,SubjectId,ca,fe, academicYear) VALUES(:sid,:class,:subjectid,:cas,:fes,:academicYear)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                    $query->bindParam(':class', $class, PDO::PARAM_STR);
                    $query->bindParam(':subjectid', $subjectid, PDO::PARAM_STR);
                    $query->bindParam(':cas', $c, PDO::PARAM_STR);
                    $query->bindParam(':fes', $f, PDO::PARAM_STR);
                    $query->bindParam(':academicYear', $academicYear, PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    if ($lastInsertId) {
                        $msg = "Result info added successfully";
                    } else {
                        $error = "Something went wrong. Please try again";
                    }
                }
            }
            ?>
            <script>
                function getStudent(val) {
                    $.ajax({
                        type: "POST",
                        url: "get_student-list.php",
                        data: 'classid=' + val,
                        success: function(data) {
                            $("#studentid").html(data);

                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "get_student-list.php",
                        data: 'classid1=' + val,
                        success: function(data) {
                            $("#subject").html(data);

                        }
                    });
                }
            </script>
            <script>
                function getresult(val, clid) {

                    var clid = $(".clid").val();
                    var val = $(".stid").val();;
                    var abh = clid + '$' + val;
                    //alert(abh);
                    $.ajax({
                        type: "POST",
                        url: "get_student.php",
                        data: 'studclass=' + abh,
                        success: function(data) {
                            $("#reslt").html(data);

                        }
                    });
                }
            </script>
            <div class="row page-title-div">
                <div class="col-md-6">
                    <h2 class="title">Course Results</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                        <li class="active">/ Course Results</li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">

                        <div class="panel-body">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success left-icon-alert" role="alert">
                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                </div><?php } else if ($error) { ?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>
                            <form class="form-horizontal" method="post" action="">

                                <div class="form-group">
                                    <label for="default" class="col-sm-2 control-label">Programme</label>
                                    <div class="col-sm-10">
                                        <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                            <option value="">Select </option>
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
                                    <label for="date" class="col-sm-2 control-label ">Course Name</label>
                                    <div class="col-sm-10">
                                        <select name="subjectid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label ">Academic Year</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="academicyear" class="form-control" id="default" placeholder="Academic year" required="required">

                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-sm-10">
                                        <div id="reslt">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label">Students</label>
                                    <div class="col-sm-10">
                                        <div id="subject">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 py-2">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
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