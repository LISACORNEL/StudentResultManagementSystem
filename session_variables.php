<?php
echo $_SESSION['alogin'];
$uname = $_SESSION['alogin'];
$sql = "SELECT UserName,role FROM admin WHERE StaffId=:uname ";
$query = $dbh->prepare($sql);
$query->bindParam(':uname', $uname, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $userName = $result->UserName;
        $role = $result->role;
    }
} else {
    echo "Nothing here";
}
echo $result->UserName;
