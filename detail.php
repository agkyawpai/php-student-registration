<?php
session_start();
if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}
if (isset($_SESSION["success_message"])) {
    $successMessage = $_SESSION["success_message"];
    unset($_SESSION["success_message"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            background-color: darkred;
        }

        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            background-color: aqua;
        }
    </style>
</head>

<body style="background-color: cornsilk;">
    <section style="margin-bottom: 20px;">
        <h1 style="text-align: center;margin: 50px 0;">Student Details</h1>
        <?php
        if (isset($errors) && !empty($errors)) {
            echo '<div class="container"><div class="error-message">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div></div>';
        }
        if (isset($successMessage)) {
            echo '<div class="container"><div class="success-message">' . $successMessage . '</div></div>';
        }
        ?>
        <div class="container">
            <form action="add-data.php" method="post" enctype="multipart/form-data">
                <div class="row">
                <?php
                    require_once "conn.php";
                    if ($_GET) {
                        $stu_id =  $_GET['stu_id'];
                    }
                    $sql_query = "SELECT `student_id`, `name`, `father_name`, `nrc`, `phone_no`, `email`, `gender`, `dob`, `address`, `career`, `skill`, `file`
                                    FROM students WHERE `student_id`=$stu_id";
                    if ($result = $conn->query($sql_query)) {
                        while ($row = $result->fetch_assoc()) {
                            $stu_id = $row['student_id'];
                            $stu_name = $row['name'];
                            $email = $row['email'];
                            $career = $row['career'];
                            $f_name = $row['father_name'];
                            $nrc = $row['nrc'];
                            $phno = $row['gender'];
                            $gender = $row['career'];
                            $dob = $row['dob'];
                            $address = $row['address'];
                            $skill = $row['skill'];
                            $file = $row['file'];
                        }
                    }
                    ?>
                    <div class="form-group col-lg-6">
                        <label for="">Student ID</label>
                        <?php
                        echo "<input type='text' name='stu_id' id='id' class='form-control' value=$stu_id disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Name</label>
                        <?php
                        echo "<input type='text' name='stu_name' id='stu_name' class='form-control' value=$stu_name disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Father's Name</label>
                        <?php
                        echo "<input type='text' name='f_name' id='f_name' class='form-control' value=$f_name disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label for="">NRC</label>
                        <?php
                        echo "<input type='text' name='nrc' id='nrc' class='form-control' value=$nrc disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Phone No</label>
                        <?php
                        echo "<input type='text' name='phno' id='phno' class='form-control' value=$phno disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Email</label>
                        <?php
                        echo "<input type='text' name='email' id='email' class='form-control' value=$email disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Address</label>
                        <?php
                        echo "<input type='text' name='address' id='address' class='form-control' value=$address disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6"></div>
                    <div class="form-group col-lg-12 mt-3">
                        <p>Gender : </p>
                        <input type="radio" id="gender" name="gender" value=1>
                        <label for="gender">Male</label><br>
                        <input type="radio" id="gender" name="gender" value=2>
                        <label for="gender">Female</label><br>
                    </div>
                    <div class="form-group col-lg-12 mt-3">
                        <p>Date of Birth : </p>
                        <?php
                        echo "<input type='date' id='date' name='dob' value=$dob disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                    <label for="career">Career Part</label>
                    <select name="career" id="career">
                        <option value=1>Front End</option>
                        <option value=2>Back End</option>
                    </select>
                    </div><div class="form-group col-lg-6"></div>
                    <div class="form-group col-lg-12 mt-3">
                        <label for="fileselect">Skill : </label>
                        <br>
                        <input type="checkbox" id="cpp" name="skills[]" value=1 />
                        <label>C++</label> 
                        <input type="checkbox" id="jv" name="skills[]" value=2 />
                        <label>Java</label>
                        <input type="checkbox" id="php" name="skills[]" value=3 />
                        <label>PHP</label> <br>
                        <input type="checkbox" id="rct" name="skills[]" value=4 />
                        <label>React</label>
                        <input type="checkbox" id="and" name="skills[]" value=5 />
                        <label>Android</label>
                        <input type="checkbox" id="lrv" name="skills[]" value=6 />
                        <label>Laravel</label>
                    </div>
                    <div class="form-group col-lg-6"></div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>