<?php
    include "inc/config.php";
    session_start();
    if($_SESSION['flg'] == 1){

    if(isset($_POST['submit'])){

        $flag = $_GET['flag'];

        $doctor = $_POST['doctors'];
        $date = $_POST['date'];
        $new_date = date('Y-m-d', strtotime($date));
        //echo $new_date;
        $slot = $_POST['slot'];
        $name = $_POST['fname'];
        $gender = $_POST['gender'];
        $phno = $_POST['phno'];
        $dob = $_POST['dob'];
        $currentDateTime = date('Y-m-d H:i:s');

        if($flag == 1){
            $email = $_POST['email'];
            $house = $_POST['house'];
            $area = $_POST['area'];
            $city = $_POST['city'];
            $pincode = $_POST['pincode'];
            $address = $house . ", " . $area . ", " . $city . ", " . $pincode ;

            $query = "INSERT INTO patients (`name`,`gender`,`dob`,`phone_no`,`email`,`address`) VALUES('$name','$gender','$dob','$phno','$email','$address')";
            $result = mysqli_query($conn,$query);

            if(!$result){
                die("Query failed: " . mysqli_error($conn));
            }
        }

        $query1 = "SELECT * FROM patients WHERE `name` = '$name' AND `phone_no` = '$phno' AND `dob` = '$dob'";
        $result1 = mysqli_query($conn,$query1);

        if(!$result1){
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $patient_id = $row['patient_id'];
        }

        $sql = "INSERT INTO `appointments`(`doc_id`,`pat_id`,`date`,`slot`,`booked`,`status`) VALUES ('$doctor','$patient_id','$new_date','$slot','$currentDateTime','')";
        $result2 = mysqli_query($conn,$sql);

        if(!$result2){
            die("Query failed: " . mysqli_error($conn));
        }
        else{
            $quer = "SELECT * FROM appointments WHERE doc_id = '$doctor' and pat_id = '$patient_id' and `date` = '$new_date' and slot = '$slot'";
            $res = mysqli_query($conn,$quer);
            if(!$res){
                die("Query failed: " . mysqli_error($conn));
            }
            else{
                $ro = mysqli_fetch_assoc($res);
                $app_id = $ro['appointment_id'];
            }
            //$app_id = mysqli_insert_id($conn);
            //echo $app_id;
            unset($_SESSION['flg']);
            //session_destroy();
            $_SESSION['prt'] = 1;
            header("location:reciept.php?id=$app_id");
        }
    }
    }
    else{
        header("location:Appointment.php");
    }   
?>