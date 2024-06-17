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
                $studentid = $_POST['studentid'];
                $ca = $_POST['cas'];
                $sid = $_POST['sid'];
                $fe = $_POST['fes'];
                $semester = $_POST['semester'];
                $academicYear = $_POST['academicyear'];

                $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid AND tblsubjects.semester=:semester order by tblsubjects.SubjectName");
                $stmt->execute(array(':cid' => $class, ':semester' => $semester));
                //  $stmt->execute(array(':semester' => $semester));
                $sid1 = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($sid1, $row['id']);
                }

                echo ($ca);
                // for($i=0;$i<count($ca);$i++) 
                //     $c=$ca[$i];
                //     $f=$fe[$i];
                //   $sid=$sid1[$i];
                $sql = "INSERT INTO  tblresult(StudentId,ClassId,SubjectId,ca,fe,academicYear) VALUES(:studentid,:class,:sid,:c,:f,:academicYear)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                $query->bindParam(':class', $class, PDO::PARAM_STR);
                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query->bindParam(':c', $ca, PDO::PARAM_STR);
                $query->bindParam(':f', $fe, PDO::PARAM_STR);
                $query->bindParam(':academicYear', $academicYear, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Result info added successfully";
                    echo $msg;
                } else {
                    $error = "Something went wrong. Please try again";
                    echo $error;
                }
            }
            ?>
            <script>
                function getStudent(val) {
                    $.ajax({
                        type: "POST",
                        url: "get_student.php",
                        data: 'classid=' + val,
                        success: function(data) {
                            $("#studentid").html(data);

                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "get_student.php",
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
                    <h2 class="title">Declare Result</h2>

                </div>

                <!-- /.col-md-6 text-right -->
            </div>
            <!-- /.row -->
            <div class="row breadcrumb-div">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                        <li class="active">Student Result</li>
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
                            <form class="form-horizontal" method="post">

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
                                    <label for="date" class="col-sm-2 control-label ">Student Name</label>
                                    <div class="col-sm-10">
                                        <!-- <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                    </select> -->
                                        <select name="studentid" class="form-control clid" id="classid" onChange="getresult(this.value);" required="required">
                                            <option value="">Select </option>
                                            <?php $sql = "SELECT * from tblstudents";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->StudentId); ?>"><?php echo htmlentities($result->StudentName); ?>&nbsp;<?php echo htmlentities($result->Section); ?></option>
                                            <?php }
                                            } ?>
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
                                    <label for="date" class="col-sm-2 control-label ">Semester</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="semester" class="form-control" id="default" placeholder="Academic year" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label ">Course Work</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cas" class="form-control" id="default" placeholder="Academic year" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label ">Final Examination</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fes" class="form-control" id="default" placeholder="Academic year" required="required">

                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-sm-10">
                                        <div id="reslt">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label">Courses</label>
                                    <div class="col-sm-10">
                                        <div id="subject">
                                        </div>
                                        <select name="sid" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                            <option value="">Select </option>
                                            <?php $sql = "SELECT * from tblsubjects";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SubjectName); ?><?php echo htmlentities($result->Section); ?></option>
                                            <?php }
                                            } ?>
                                        </select>
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