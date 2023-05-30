<?php
require_once "conn.php";
session_start();
$nrc_pattern = "/^([0-9]{1,2})\/([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])([A-Z][a-z]|[A-Z][a-z][a-z])\([N,P,E]\)[0-9]{6}$/";
$name_pattern = "/^[\p{L} ]+$/u";
$phone_pattern = "/^(09|\\+?950?9|\\+?95950?9)\\d{7,9}$/";
$email_pattern = "/^[\w\.-]+@[\w\.-]+\.\w+$/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stu_id = $_POST['stu_id'];
    $stu_name = $_POST['stu_name'];
    $f_name = $_POST['f_name'];
    $nrc = $_POST['nrc'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $career = $_POST['career'];
    $createdAt = date("Y-m-d");
    $skills = $_POST['skills'];
    $skill_arr = array();
    foreach ($skills as $x => $y) {
        array_push($skill_arr, $y);
    }
    $skill = implode(",", $skill_arr);
    
    if (!empty($_POST['nrc'])) {
        if (!preg_match($nrc_pattern, $nrc)) {
            $errors[] = "You Entered Invalid NRC Format.";
    
        }
    }else{
        $errors[] = "NRC field is required.";
    }
    if (!empty($_POST['stu_name'])) {
        if (!preg_match($name_pattern, $stu_name)) {
            $errors[] = 'Name must contain letters and spaces only!';
        }
    }else{
        $errors[] = "Name field is required.";
    }
    if (!empty($_POST['f_name'])) {
        if (!preg_match($name_pattern, $f_name)) {
            $errors[] = 'Father Name must contain letters and spaces only!';
        }
    }else{
        $errors[] = "Father Name field is required.";
    }
    if (!empty($_POST['phno'])) {
        if (!preg_match($phone_pattern, $phno)) {
            $errors[] = 'Invalid Phone Number Entered';
        }
    }else{
        $errors[] = "Phone Number field is required.";
    }
    if (!empty($_POST['email'])) {
        if (!preg_match($email_pattern, $email)) {
            $errors[] = 'Invalid Email Format Entered';
        }
    }else{
        $errors[] = "Email field is required.";
    }

    if (!empty($_FILES["file"]["name"])) {
        $targetFolder = "upload/";
        $filename = $_FILES["file"]["name"];
        $fileLocation = $targetFolder . $filename;
        $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);
        $selectedOptions = ['png', 'jpg', 'jpeg'];

        if (!in_array($fileExtension, $selectedOptions)) {
            $errors[] = "Invalid file extension. Allowed extensions: " . implode(", ", $selectedOptions);
        } else {
            if (file_exists("upload/" . $filename)) {
                $errors[] =  $filename . " already exists";
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFolder . $filename);
            }
        }
    } else {
        $errors[] = "File field is required.";
    }
    if (empty($errors)) {
        $sql_query = "INSERT INTO students (`student_id`, `name`, `father_name`,`nrc`, `phone_no`, `email`, `gender`, `dob`, `address`, `career`, `skill`, `file`, `flag`, `created_at`) VALUES ('$stu_id', '$stu_name', '$f_name', '$nrc', '$phno', '$email', '$gender', '$dob','$address','$career', '$skill', '$fileLocation', '1', '$createdAt')";
        if ($conn->query($sql_query)) {
            $_SESSION["success_message"] = "Data added successfully.";
        } else {
            $errors[] = "Failed to add data.";
        }
    } else {
        $_SESSION["errors"] = $errors;
    }
}
header("Location: index.php");
exit();
