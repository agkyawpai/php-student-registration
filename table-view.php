<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Setting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper -->
    <style>
    body {
    font-family: 'Helvetica', sans-serif !important;
}
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</head>

<body style="background-color: cornsilk;">
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">StudentID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Career</th>
                        <th scope="col">Phone</th>
                        <th scope="col" colspan="3" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT `student_id`,`name`,`nrc`,`dob`,`gender`,`file`, `email`,`career`,`phone_no` FROM students WHERE flag='1';";
                    $i = 0;
                    if ($result = $conn->query($sql_query)) {
                        while ($row = $result->fetch_assoc()) {
                            $stu_id = $row['student_id'];
                            $nrc = $row['nrc'];
                            $dob = $row['dob'];
                            $file = $row['file'];
                            $stu_name = $row['name'];
                            $email = $row['email'];
                            $gender = $row['gender'];
                            $career = $row['career'];
                            if($career=='1'){
                                $career_part = 'Front End';
                            }elseif($career=='2'){
                                $career_part = 'Back End';
                            }
                            $phone_no = $row['phone_no'];
                            $i++;
                    ?>

                            <tr class="trow">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $stu_id; ?></td>
                                <td><?php echo $stu_name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $career_part; ?></td>
                                <td><?php echo $phone_no; ?></td>
                                <td><a href="edit-form.php?id=<?php echo $stu_id; ?>&nrc=<?php echo $nrc; ?>&dob=<?php echo $dob; ?>&gender=<?php echo $gender; ?>&file=<?php echo $file; ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="detail.php?stu_id=<?php echo $stu_id; ?>" class="btn btn-warning">Detail</a></td>
                                <td><a href="delete-data.php?id=<?php echo $stu_id; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>