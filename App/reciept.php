<?php
    include "inc/config.php";
    session_start();
    if(isset($_SESSION['prt'])&&$_SESSION['prt']==1){

    $app_id = $_GET['id'];
    $mySlots = ["09.00 AM - 09.30 AM","09.30 AM - 10.00 AM","10.00 AM - 10.30 AM","10.30 AM - 11.00 AM","11.00 AM - 11.30 AM","11.30 AM - 12.00 PM"];

    $sql = "SELECT * FROM appointments WHERE appointment_id = '$app_id'";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $doc_id = $row['doc_id'];
        $pat_id = $row['pat_id'];
        $date = $row['date'];
        $slot = $row['slot'];

        $query = "SELECT * FROM patients WHERE patient_id = '$pat_id'";
        $result1 = mysqli_query($conn,$query);

        if(!$result1){
            die("Query failed: " . mysqli_error($conn));
        }
        else{
            $row1 = mysqli_fetch_assoc($result1);
            $pat_name = $row1['name'];
            $pat_gender = $row1['gender'];
            $pat_dob = $row1['dob'];
            $today = new DateTime();
            $diff = $today->diff(new DateTime($pat_dob));
            $pat_age = $diff->y;
            $pat_phno = $row1['phone_no'];
            $pat_email = $row1['email'];
        }

        $query1 = "SELECT * FROM doctors WHERE doc_id = '$doc_id'";
        $result2 = mysqli_query($conn,$query1);

        if(!$result2){
            die("Query failed: " . mysqli_error($conn));
        }
        else{
            $row2 = mysqli_fetch_assoc($result2);
            $doc_name = $row2['name'];
            $doc_gender = $row2['gender'];
            $doc_dob = $row2['dob'];
            $today = new DateTime();
            $diff = $today->diff(new DateTime($doc_dob));
            $doc_age = $diff->y;
            $doc_specialization = $row2['specialization'];
            $doc_hospital_id = $row2['hospital_id'];
            $doc_email = $row2['email'];

            $query2 = "SELECT * FROM hospitals WHERE hospital_id = '$doc_hospital_id'";
            $resultz3 = mysqli_query($conn,$query2);

            if(!$resultz3){
                die("Query failed: " . mysqli_error($conn));
            }
            else{
                $rowz = mysqli_fetch_assoc($resultz3);
                $doc_hospital_name = $rowz['hospital_name'];
            }
        }

    }
?>
<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Reciept</title>
                <link rel="stylesheet" type="text/css" href="reciept.css">
                <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                <link rel="stylesheet" href="print-styles.css" media="print">

            </head>
            <body>
                <div class="main">
                <div class="outline" id="outline">
                    <div id="printArea">
                    <div class="headsection" id="headsection">
                        <img src="ar.png" alt="logo">
                        <div class="space"></div>
                        <div class="addr">
                            <ul>
                                <li>Ph : 000-000-0000</li>
                                <li>Email : contact.ehms@mail.com</li>
                                <li>Date : <?php $date = date("F j, Y");echo $date;?></li>
                            </ul> 
                        </div>
                    </div>
                    <div class="det" id="det">
                    <div class="app_det" id="app_det">
                        Patient Details
                        <ul>
                            <li><?php echo "Name : " .$pat_name; ?></li>
                            <li><?php echo "Gender : " .$pat_gender; ?></li>
                            <li><?php echo "DOB : " .$pat_dob; ?></li>
                            <li><?php echo "Age : " .$pat_age; ?></li>
                            <li><?php echo "Phone Number : " .$pat_phno; ?></li>
                            <li><?php echo "Email : " .$pat_email; ?></li>
                        </ul>
                    </div>
                    <div class="doc_det" id="doc_det">
                        Appointment Details
                        <ul>
                            <li><?php echo "Doctor Name : " .$doc_name; ?></li>
                            <!-- <li><?php echo $doc_gender; ?></li>
                            <li><?php echo $pat_age; ?></li> -->
                            <li><?php echo "Specialization : " .$doc_specialization; ?></li>
                            <li><?php echo "Email : " .$doc_email; ?></li>
                            <li><?php echo "Hospital Name : " .$doc_hospital_name; ?></li>
                            <li><?php echo "Date : " .$date; ?></li>
                            <li><?php echo "Booked Slot : " .$mySlots[$slot-1]; ?></li>
                        </ul>
                    </div>
                    </div>
                    </div>
                    <div class="buttons">
                    <a href="Appointment.php"><button>Home</button></a>
                    <button onclick="printContent()">Print Reciept</button>
                    <button onclick='document.getElementById("cancel").style.display="flex";'>Cancel</button>
                </div>
                </div>
                
                </div>
                <section id="cancel">
                    <div id="can-con" style="background: white;padding:10px;border-radius:5px; opacity:1;display:block;">
                        <div>
                            <div class="can-con-ico" style="display: flex;justify-content:center;align-items:center">
                            <i class='bx bxs-x-circle' style="color:red;font-size:50px;"></i><br>
                            </div>
                            <div style="display: flex;justify-content:center;align-items:center">
                            <p>
                                Are you sure you want to cancel this appointment?
                            </p>
                            </div>
                        </div>
                        <div class="btt" style="display: flex;justify-content:space-evenly;align-items:center;margin-top:20px;">
                            <button style="padding:10px;background:teal;color:white;border:none;border-radius:4px;" onclick='document.getElementById("cancel").style.display="none";'>Back</button>
                            <button id="con-can" style="padding:10px;background:teal;color:white;border:none;border-radius:4px;">Confirm</button>
                        </div>
                    </div>
                    <div id="can-suc" style="background: white;padding:10px;border-radius:5px; opacity:1;display:none;">
                        <div>
                            <div class="can-con-ico" style="display: flex;justify-content:center;align-items:center">
                            <i class='bx bxs-check-circle' style="color:green;font-size:50px;"></i><br>
                            </div>
                            <div style="display: flex;justify-content:center;align-items:center">
                            <p>
                                Your appointment has been successfully canceled
                            </p>
                            </div>
                        </div>
                        <div class="btt" style="display: flex;justify-content:space-evenly;align-items:center;margin-top:20px;">
                            <!-- <button style="padding:10px;background:teal;color:white;border:none;border-radius:4px;" onclick='document.getElementById("cancel").style.display="none";'>Cancel</button> -->
                            <button onclick="location.href ='../index.php'" style="padding:10px;background:teal;color:white;border:none;border-radius:4px;">Home</button>
                        </div>
                    </div>
                </section>
                <script>
                    var can_con = document.getElementById("con-can");
                    can_con.addEventListener("click", function(){
                        xhr.send();
                    });
                    var xhr = new XMLHttpRequest();
                    var app_id = <?php echo $app_id; ?>;
                    var url = 'cancel_app.php?id='+app_id;
                    xhr.open('GET',url);
                    xhr.onreadystatechange =function(){
                        if (this.readyState === 4 && this.status === 200) {
                            document.getElementById("can-con").style.display = "none";
                            document.getElementById("can-suc").style.display = "block";
                        }
                    };

                    function printContent() {
                        // Hide any elements you don't want to print
                        var elementsToHide = document.getElementsByClassName("buttons");
                        for (var i = 0; i < elementsToHide.length; i++) {
                            elementsToHide[i].style.display = "none";
                        }
                        document.getElementById("det").style.display = "block";
                        document.getElementById("outline").style.height = "850px";
                        
                        // Print the page
                        window.print();
                        document.getElementById("det").style.display = "flex";
                        document.getElementById("outline").style.height = "";
                        // Restore the hidden elements after printing (optional)
                        for (var i = 0; i < elementsToHide.length; i++) {
                            elementsToHide[i].style.display = "";
                        }
                        
                    }
                </script>
            </body>
            </html>
            <?php 
    }
    else{
        header("location:Appointment.php");
    }
    ?>
