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
        image{
            border-radius: 50%;
        }
    </style>
</head>
<?php
    if ($_GET) {
        $stu_id =  $_GET['id'];
        $nrc = $_GET['nrc'];
        $dob = $_GET['dob'];
        $gender = $_GET['gender'];
        $file = $_GET['file'];
    }  
?>
<body style="background-color: cornsilk;">
    <section style="margin-bottom: 20px;">
        <h1 style="text-align: center;margin: 50px 0;">Student Registration</h1>
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
                    <div class="form-group col-lg-6">
                        <label for="">Student ID</label>
                        <?php
                            echo "<input type='text' name='stu_id' id='id' class='form-control' value='$stu_id' disabled>";
                        ?>

                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Name</label>
                        <input type='text' name='stu_name' id='stu_name' class='form-control'>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Father's Name</label>
                        <input type='text' name='f_name' id='f_name' class='form-control'>
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label for="">NRC</label>
                        <?php
                        echo "<input type='text' name='nrc' id='nrc' class='form-control' value=$nrc disabled>";
                        ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Phone No</label>
                        <input type='text' name='phno' id='phno' class='form-control'>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Email</label>
                        <input type='text' name='email' id='email' class='form-control'>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Address</label>
                        <input type='text' name='address' id='address' class='form-control'>
                    </div>
                    <div class="form-group col-lg-6"></div>
                    <div class="form-group col-lg-2">
                    <img src="<?php echo $file; ?> " width="100px" height="100px">
                    </div>
                    <div class="form-group col-lg-4>
                        <label for="fileselect">Upload New Photo : </label>
                        <input type="file" name="file" id="fileselect" required>
                    </div>
                    <div class="form-group col-lg-12 mt-3">
                        <?php
                          if($gender='1'){
                            echo "<p>Gender : </p>
                            <input type='radio' id='gender' name='gender' checked=?yes? disabled>
                            <label for='gender'>Male</label><br>
                            <input type='radio' id='gender' name='gender' disabled>
                            <label for='gender'>Female</label><br>";
                          }
                          else{
                            echo "<p>Gender : </p>
                            <input type='radio' id='gender' name='gender' disabled>
                            <label for='gender'>Male</label><br>
                            <input type='radio' id='gender' name='gender' checked=?yes? disabled>
                            <label for='gender'>Female</label><br>";
                          }
                        ?>
                        
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
                    <div class="form-group col-lg-1 " style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary mt-3">
                    </div>
                    <div class="form-group col-lg-1 " style="display: grid;align-items:  flex-end;">
                        <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-warning mt-3">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>