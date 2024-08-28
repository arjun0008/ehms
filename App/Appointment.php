<?php
    include "inc/config.php";
    header("Refresh: 420");
    session_start();
    $_SESSION['flg'] = 0;
    $_SESSION['prt'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="Appointment.css">
</head>
<body>
    <div class="full">
        <!--<h2>Appointment</h2>-->
        <img src="a.png" alt="">
        <div class="head">
            <ul>
                <li class="h he1">
                    <div>
                        <p class="pa">1</p>
                    </div>
                </li>
                <li class="he2">
                    <div>
                        <p class="pa">2</p>
                    </div>
                </li>
                <li class="he3">
                    <div>
                        <p class="pa">3</p>
                    </div>
                </li>
                <li class="he4">
                    <div>
                        <p class="pa">4</p>
                    </div>
                </li>
                <li class="he5">
                    <div>
                        <p class="pa">5</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="pages">
            <div class="page0">
                <div class="item1">
                <form action="app_sub.php" onsubmit="return validated()" id="myForm" method="post">
                    <div class="container">
                        <div class="doc">
                                    <div class="errormsg" id="errormsg2">Please Choose a Doctor</div>
                                    <div class="errormsg" id="errormsg3">Please Choose a Date</div>
                                    <label for="a1">Choose a Hospital</label>
                                    <select name="hosp" id="a1" class="c_hos">
                                        <option value="">--Select Hospital--</option>
                                        
                                        <!-- <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option> -->

                                        <?php
                                            $query = "SELECT * FROM hospitals";
                                            $result = mysqli_query($conn,$query);

                                            if(!$result){
                                                die("Query failed: " . mysqli_error($conn));
                                            }
                                            else{
                                                if (mysqli_num_rows($result) > 0) {
                
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row['hospital_id'].'">'.$row['hospital_name'].'</option>';
                                                    }
                                                }
                                            }
                                        ?>

                                      </select>
                                    <br>
                                    <br>
                                    <label for="a1">Choose a Doctor</label>
                                    <select name="doctors" id="a0" class="c_doc">
                                        <option value="">--Select Doctor--</option>
                                        
                                        <?php
                                        
                                            $query = " select * from doctors ";
                                            $result = mysqli_query($conn,$query);

                                            if(!$result){
                                                die("Query failed: " . mysqli_error($conn));
                                            }
                                            else{
                                                if (mysqli_num_rows($result) > 0) {
                
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row['doc_id'].'">'.$row['name']."(".$row['specialization'].")".'</option>';
                                                    }
                                                }
                                            }

                                        ?>

                                        <!--<option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>-->
                                      </select>
                                      <br><br>
                                    <div class="item1">
                                        <label for="c2">Choose a Date</label>
                                        <select name="date" class="dateapp" id="c0">
                                            <option value="">--Select Doctor First--</option>
                                            <!--<option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>-->
                                          </select>
                                    </div>
                                </div>
                    </div>
                </div>

            </div>
            <div class="page1" style="display: none;">
                
                <div class="item1">
                    
                        <div class="container1">
                            <div class="errormsg" id="errormsg4">Please Choose a Slot</div>
                            <div class="item1 item">
                                <label><p>Select Slot</p></label><br><br>
                                <div class="slot1">
                                    <div>
                                        <input type="radio" name="slot" id="radio1" value="1" disabled>
                                        <label for="radio1" class="r1"><p>09.00 AM - 09.30 AM</p></label><br><br>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="radio" name="slot" id="radio2" value="2" disabled>
                                        <label for="radio2" class="r2"><p>09.30 AM - 10.00 AM</p></label><br><br>
                                    </div>
                                </div><br>
                                <div class="slot2">
                                    <div>
                                        <input type="radio" name="slot" id="radio3" value="3" disabled>
                                        <label for="radio3" class="r3"><p>10.00 AM - 10.30 AM</p></label><br><br>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="radio" name="slot" id="radio4" value="4" disabled>
                                        <label for="radio4" class="r4"><p>10.30 AM - 11.00 AM</p></label><br><br>
                                    </div>
                                </div>
                                <br>
                                <div class="slot3">
                                    <div>
                                        <input type="radio" name="slot" id="radio5" value="5" disabled>
                                        <label for="radio5" class="r5"><p>11.00 AM - 11.30 AM</p></label><br><br>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="radio" name="slot" id="radio6" value="6" disabled>
                                        <label for="radio6" class="r6"><p>11.30 AM - 12.00 PM </p></label><br><br>
                                    </div>
                                </div>
                                <!--<div class="slot4">
                                 
                                    <div>
                                        <input type="radio" name="slot" id="radio8">
                                        <label for="radio8" class="r8"><p>02.30 PM - 03.00 PM </p></label>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="radio" name="slot" id="radio9">
                                        <label for="radio9" class="r9"><p>03.00 PM - 03.30 PM </p></label>
                                    </div>
                                </div>-->
                           </div>
                        </div>
                    <!--</form>-->
                 </div>
                
            </div>
            <div class="page2" style="display: none;">
                <div class="item1">
                    <!--<form action="">-->
                        <div class="container">
                            <div class="doc">
                                <div class="errormsg" id="errormsg5">Please enter your Name</div>
                                <div class="errormsg" id="errormsg6">Please select your Gender</div>
                                <div class="errormsg" id="errormsg7">Please enter your Phone Number</div>
                                <div class="errormsg" id="errormsg8">Please enter your DOB</div>
                            <div class="item1">
                                <label for="n1"></label>
                                <input type="text" id="n1" placeholder="Full Name" name="fname" required>
                                <label><br><p>&nbsp;Gender</p></label>
                            </div>
                            <div class="it1" style="margin-top:-11px;">
                                <div class="g">
                                    <input type="radio" name="gender" id="gender1" value="male">
                                    <label for="gender1" class="r7"><div class="round"></div></label><p><p>Male</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" id="gender2" value="female">   
                                    <label for="gender2" class="r7"><div class="round"></div></label><p><p>Female</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" id="gender3" value="other">
                                    <label for="gender3" class="r7"><div class="round"></div></label><p><p>Others</p></p>
                                </div>
                            </div>
                            <div class="item1">
                                <label for="c4"></label>
                                <input type="number" id="c4" name="phno" placeholder="Phone No" required>
                            </div>
                            <div class="item1">
                                <label for="c2" style="margin-bottom:10px;"><p>Date of Birth</p></label>
                                <input type="date" id="c2" placeholder="Date of Birth (dd/mm/yy)" class="dob" name="dob"  max="2999-12-31" min="1900-01-01" required>
                            </div>
                            <!--<div class="item1">
                                <label for="n3">Address</label>
                                <input type="text" id="n3" required>
                            </div>-->
                            </div>
                        </div>
                    <!--</form>-->
                 </div>
                
            </div>

            <div class="page3" style="display: none;">
                <div class="item1">
                   <!-- <form action="">-->
                        <div class="container">
                            <div class="doc">
                                <div class="errormsg" id="errormsg9">Please Enter your Email</div>
                                <div class="errormsg" id="errormsg10">Please Enter your Flat No / House No / House Name</div>
                                <div class="errormsg" id="errormsg11">Please Enter your Area</div>
                                <div class="errormsg" id="errormsg12">Please Enter your City</div>
                                <div class="errormsg" id="errormsg13">Please Enter your Pincode</div>
                                <div class="item1">
                                    <label for="c3"></label>
                                    <input type="mail" id="c3" name="email" placeholder="Email" >
                                </div>
                                <div class="item1">
                                    <label for="n3"></label>
                                    <input type="text" id="n3" name="house" placeholder="Flat No / House No / House Name" >
                                </div>
                                <div class="item1">
                                    <label for="n3"></label>
                                    <input type="text" id="n4" name="area" placeholder="Area" >
                                </div>
                                <div class="item1">
                                    <label for="n3"></label>
                                    <input type="text" id="n5" name="city" placeholder="City" >
                                </div>
                                <div class="item1">
                                    <label for="n3"></label>
                                    <input type="number" id="n6" name="pincode" placeholder="Pincode" >
                                </div>

                            </div>
                        </div>
                    <!--</form>-->
                 </div>
                
            </div>

            <div class="page4" style="display: none;">
                <div class="item2">
                    <!--<form action="">-->
                        <div class="container">
                            <div class="doc">
                                <div class="errormsg" id="errormsg14">Please verify the given details</div>
                            <div class="item1">
                                <label for="n1"><p>Appointment Details</p></label>
                                <div id="app_det"></div>
                            </div>
                            <div class="item1">
                                <label for="n1"><p>Patient Details</p></label>
                                <div id="pat_det"></div>
                            </div>
                             <div class="box_det">
                                <input type="checkbox" id="myCheckbox"><p>&nbsp;&nbsp;I verify the details above are correct</p>
                             </div>
                        </div>
                        </div>
                    <!--</form>-->
                 </div>
                
            </div>
        <div class="btns">
            <div class="bt bt0">
                <button class="b0" style="width: 170px;" onclick="location.href = 'check.php'">Check Appointment</button>
                <!-- <a href="check.php" style="text-decoration: none;">Check Appointments ?</a> -->
                <button type="button" class="b1">Next</button>
            </div>
            <div class="bt bt1" style="display: none;" >
                <button type="button" class="b2">Back</button>
                <button type="button" class="b3" >Next</button>
            </div>
            <div class="bt bt2" style="display:none" >
                <button type="button" class="b4">Back</button>
                <button type="button" class="b5" >Next</button>
            </div>
            <div class="bt bt3" style="display:none" >
                <button type="button" class="b6">Back</button>
                <button type="button" class="b7">Next</button>
            </div>
            <div class="bt bt4" style="display:none">
                <button type="button" class="b8">Back</button>
                <input type="submit" class="b9" name="submit" value="Confirm">
            </div>
        </div>
    </div>
    <div style="position: relative; top:7vh; display: flex;justify-content:center;align-items:center ">
        <a style="padding: 5px; font-size: 18px; text-decoration: none; " href="../index.php">Home</a>
    </div>
    <script type="text/javascript" src="Appointment.js"></script>
</body>
</html>