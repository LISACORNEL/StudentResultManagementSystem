<?php
include('includes/config.php');
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{
 $stmt = $dbh->prepare("SELECT tblsubjects.id as ID , tblsubjects.SubjectName as Name FROM tblsubjectcombination JOIN tblsubjects ON tblsubjectcombination.SubjectId = tblsubjects.id JOIN admin ON admin.SubjectId=tblsubjects.id WHERE ClassId=:id");
 $stmt->execute(array(':id' => $cid));
 ?><option value="">Select Course </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['ID']); ?>"><?php echo htmlentities($row['Name']); ?></option>
  <?php
 }
}

}
// Code for Subjects
if(!empty($_POST["classid1"])) 
{
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{
 $status=0;	
$stmt = $dbh->prepare("SELECT * FROM tblstudents WHERE ClassId=:cid");
 $stmt->execute(array(':cid' => $cid1));
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {?>
  <p> <?php echo htmlentities($row['StudentName']); ?><input type="text"  name="cas[]" value="" class="form-control" required="" placeholder="CA" autocomplete="off">
  <input type="text"  name="fes[]" value="" class="form-control" required="" placeholder="FE" autocomplete="off">
  </p>
  
<?php  }
}
}


?>

<?php

if(!empty($_POST["studclass"])) 
{
$id= $_POST['studclass'];
$dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
$query = $dbh->prepare("SELECT StudentId,ClassId FROM tblresult WHERE StudentId=:id1 and ClassId=:id ");
//$query= $dbh -> prepare($sql);
$query-> bindParam(':id1', $id1, PDO::PARAM_STR);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
 ?></p>
<?php }


  }?>


