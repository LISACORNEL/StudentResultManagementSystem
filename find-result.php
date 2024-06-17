<?php
session_start();
//error_reporting(0);
include('includes/config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js3/color-modes.js"></script>
    <link rel="stylesheet" type="text/css" href="css3/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css3/fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="css3/main.css">
    <title>SRMS</title>
</head>

<body>

    <div class="container w-50">
        <div class="row p-5 m-5" style="height: 50rem;">
            <div class="col-12 shadow-lg bg p-5 rounded align-self-center">
                <form action="result.php" method="post" class="p-5">
                    <div class="pb-5 display-4 text-center rounded mx-auto">
                        <i class="fa fa-address-card text-danger"></i>
                        <p class="lead">Student Results Management System</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reg Number" name="rollid">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Programme</label>
                        <select class="form-select" aria-label="Default select example" name="class">
                            <option selected value="">Select Programme</option>
                            <?php $sql = "SELECT * from tblclasses";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                            <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Academic Year</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Academic Year" name="academicYear">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Semester</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Semester" name="semester">
                    </div>
                    <button type="submit" class="btn btn-primary">Search <i class="fa fa-check ps-2"></i></button>
                    <a href="index.php" type="submit" class="btn btn-outline-danger">Back Home <i class="fa fa-home ps-2"></i></a>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js3/jquery.min.js"></script>
    <script type="text/javascript" src="js3/pooper.min.js"></script>
    <script type="text/javascript" src="js3/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js3/selfStyle.js"></script>
</body>

</html>