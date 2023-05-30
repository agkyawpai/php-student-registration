<?php
require_once "conn.php";
session_start();
if ($_GET) {
    $stu_id =  $_GET['id'];
}
$sql = "UPDATE students SET flag = '0' WHERE student_id = '$stu_id'";
if (mysqli_query($conn, $sql)) {
    $_SESSION["success_message"] = "Data deleted successfully.";
}else{
    $errors[] = "Error occured while deleting data.";
    $_SESSION["errors"] = $errors;
}
header("Location: table-view.php");
exit();
?>