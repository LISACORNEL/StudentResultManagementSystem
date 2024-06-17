<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">
                    <!-- /.left-sidebar -->
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">Student Result Management System</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <section class="section" id="exampl">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h3 align="center">Result Report</h3>
                                                    <hr />
                                                        <?php
                                                        // code Student Data
                                                        $classid=$_POST['class'];
                                                        $academicYear=$_POST['academicYear'];
                                                        $semester=$_POST['semester'];
                                                        $_SESSION['classid']=$classid;
                                                        $query="SELECT * FROM tblclasses WHERE id=:classid";
                                                        $query= $dbh -> prepare($query);
                                                        $query->bindParam(':classid',$classid,PDO::PARAM_STR);
                                                        $query-> execute();  
                                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                                        foreach($results as $result){
                                                           ?>
                                                        <p><b>Programme:</b> <?php echo htmlentities($result->ClassName);?></p>

                                                        <?php
                                                        }
                                                        ?>
                                                        <p><b>Semester :</b> <?php echo $semester;?></p>
                                                        <p><b>Academic Year :</b> <?php echo $academicYear;?></p>
                                                        <?php 

                                                            ?>
                                            </div>
                                            <div class="panel-body p-20">


                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">#</th>
                                                            <th style="text-align: center">Reg#</th>
                                                            <?php
                                                            $query="SELECT * FROM tblsubjectcombination JOIN tblsubjects on tblsubjectcombination.SubjectId = tblsubjects.id WHERE ClassId=:classid";
                                                            $query= $dbh -> prepare($query);
                                                            $query->bindParam(':classid',$classid,PDO::PARAM_STR);
                                                            $query-> execute();  
                                                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                                            
                                                            foreach($results as $result){
                                                                ?>
                                                                <th style="text-align: center"><h6><b><?php echo htmlentities($result->SubjectCode);  ?></b></h6><div style="width:100%; display: flex; justify-content: space-around"><span>CA</span><span>FE</span><span>GD</span></div></th> 
                                                                <?php
                                                                // echo $result->SubjectCode;
                                                            }
                                                            ?>  
                                                            <th style="text-align: center">GPA</th>
                                                            <th style="text-align: center">Status</th>                                                  
                                                        </tr>
                                               </thead>
                                               <tbody>
                                                 
<?php                                              
// Code for result

$query="SELECT * FROM tblstudents WHERE ClassId=:classid";
$query= $dbh -> prepare($query);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
    ?>
<?php
foreach($results as $result){
    $id=$result->StudentId
    ?>
                                               		<tr>
<th scope="row" style="text-align: center"><?php echo htmlentities($cnt);?></th>
<th scope="row" style="text-align: center"><?php echo htmlentities($result->RollId);?></th>
<?php
$query="SELECT * FROM tblresult where StudentId=:id";
$query= $dbh -> prepare($query);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$gpaCnt=0;
$gpaNo=0;
$semesterStatus = 'Pass';
foreach($results as $result){
?>
<td style="text-align: center"><div style="display: flex; justify-content: space-around"><span><?php echo htmlentities($result->ca); ?></span><span><?php echo htmlentities($result->fe); ?></span><span><?php if($result->fe+$result->ca >=70) {$gpaCnt=$gpaCnt+5; echo "A";}
if($result->fe+$result->ca >=60 && $result->fe+$result->ca <70 ) {$gpaCnt=$gpaCnt+4; echo "B+";}
if($result->fe+$result->ca >=50 && $result->fe+$result->ca <60 ) {$gpaCnt=$gpaCnt+3.5; echo "B";}
if($result->fe+$result->ca >=40 && $result->fe+$result->ca <50 ) {$gpaCnt=$gpaCnt+2; echo "C"; }
if($result->fe+$result->ca  <40) {$gpaCnt=$gpaCnt+1; echo "F"; } 
if ($result->ca < 24) {
    $semesterStatus = 'Retake';
}

if ($result->fe < 24 && $semesterStatus !== 'Retake'){
    $semesterStatus = 'Sup';
}

?></span></div></td>
<?php
$gpaNo++;
}
?>
<td style="text-align: center"><?php echo round($gpaCnt/$gpaNo,2); ?></td>
<td style="text-align: center"><?php if(round($gpaCnt/$gpaNo,2)<=1.8){ echo"Discontinued";} else{ echo $semesterStatus;} ?></td>
</tr>
<?php
$cnt++;
}
?>

<tr>
                              
<td colspan="5" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
                                                             </tr>

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 

?>
                                        </div>



                                                	</tbody>
                                                </table>
                                                <h6>Key</h6>
                                                <?php
                                                 $query="SELECT * FROM tblsubjectcombination JOIN tblsubjects on tblsubjectcombination.SubjectId = tblsubjects.id WHERE ClassId=:classid";
                                                 $query= $dbh -> prepare($query);
                                                 $query->bindParam(':classid',$classid,PDO::PARAM_STR);
                                                 $query-> execute();  
                                                 $results = $query -> fetchAll(PDO::FETCH_OBJ);

                                                 foreach($results as $result){
                                                    ?>
                                                    <p><?php echo $result->SubjectCode ?>-><?php echo $result->SubjectName ?></p>
                                                    <?php
                                                 }
                                                ?>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                                        </div>

                                </div>
                                
  
                            </div>
                            
                        </section>
                       

                    </div>
                  

                  
                </div>
               
            </div>
         

        </div>
    
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

       
        <script src="js/prism/prism.js"></script>

        
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

        </script>

    </body>
</html>
