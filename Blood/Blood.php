<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation</title>
    <link rel="stylesheet" type="text/css" href="Blood.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section>
    <section>
    <div class="full">
     <form id="myForm" >
        <img src="b.png" alt="">
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
               
            </ul>
        </div>

        <div class="pages">
           
            <div class="page2" >
                <div class="item1">
                   
                        <div class="container">
                            <div class="doc">
                            <div class="errormsg" id="errormsg1">Please Enter your Name</div>
                            <div class="errormsg" id="errormsg2">Please select your Gender</div>
                            <div class="errormsg" id="errormsg3">Please Enter your Date of Birth</div>
                            <div class="errormsg" id="errormsg4">Please Enter your Phone number</div>
                            <div class="item1">
                                <label for="n1"></label>
                                <input type="text" id="n1" name="fname" placeholder="Full Name" required>
                                <label id="s1"><p><p>Gender</p></p></label>
                            </div>
                            <div class="it1" style="margin-top:-10px;">
                                <div class="g">
                                    <input type="radio" value="Male" name="gender" id="gender1">
                                    <label for="gender1" class="r7"><div class="round"></div></label><p><p>Male</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" value="Female" id="gender2">   
                                    <label for="gender2" class="r7"><div class="round"></div></label><p><p>Female</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" value="Other" id="gender3">
                                    <label for="gender3" class="r7"><div class="round"></div></label><p><p>Others</p></p>
                                </div>
                            </div>
                            
                            <div class="item1">
                                <label for="c2" style="margin-bottom:16px;"><p>Date of Birth</p></label>
                                <input type="date" id="c2" name="dob" placeholder="Date of Birth (dd/mm/yy)" required>
                            </div>
                            <div class="item1">
                                <label for="c4"></label>
                                <input type="number" id="c4" name="phno" placeholder="Phone No" required>
                            </div>
                        </div>
                    </div>
                    
                 </div>
                
            </div>

            <div class="page3" style="display: none;">
                <div class="item1">
                   
                        <div class="container">
                            <div class="doc">
                            <div class="errormsg" id="errormsg5">Please select your Blood group</div>
                            <div class="errormsg" id="errormsg6">Please Enter your Email</div>
                            <div class="errormsg" id="errormsg7">Please Enter your Address</div>
                                <div class="item1">
                                    <label for="n3"></label>
                                    <input type="text" id="n4" name="bgroup" placeholder="Blood Group"  list="blood">
                                    <datalist id="blood">
                                        <option value="A+">
                                        <option value="A-">
                                        <option value="AB+">
                                        <option value="AB-">
                                        <option value="B+">
                                        <option value="B-">
                                        <option value="O+">
                                        <option value="O-">
                                    </datalist>
                                </div>
                                <div class="item1">
                                    <label for="c3"></label>
                                    <input type="mail" id="c3" name="email" placeholder="Email">
                                </div>
                                <div class="item1">
                                    <!--label id="ta"> Address</label-->
                                    <textarea required id="ta1" name="address" placeholder="Address"></textarea>
                                </div>
                               
                            </div>
                        </div>
                   
                 </div>
                
            </div>

            <div class="page4" style="display: none;">
                <div class="item2">
                    
                        <div class="container">
                            <div class="doc">
                            <div class="errormsg" id="errormsg8">Please verify the details</div>
                            <label for="n1"><p>Confirm Details:</p></label>
                            <div id="conf-det">     
                            </div>

                            <div class="box_det">
                                <input type="checkbox" id="myCheckbox"><p>&nbsp;&nbsp;I verify the details above are correct</p>
                             </div>
                        </div>
                        </div>
                    
                 </div>
                
            </div>
        <div class="btns">
            <div class="bt bt1">
                <button type="button" class="b1">Next</button>
            </div>
            <div class="bt bt2" style="display:none" >
                <button type="button" class="b2">Back</button>
                <button type="button" class="b3" >Next</button>
            </div>
            <div class="bt bt4" style="display:none">
                <button type="button" class="b6">Back</button>
                <button type="button" onclick="checkChecked()" id="sub" class="b7">Confirm</button>
            </div>
        </div>
        </form>
    </div>
    </section>
    <section id="popup" style="display: none;">
        <div id="mem" style="background:white; border-radius:5px; padding:10px 20px; display:none;">
        <div style="display: flex; align-items:center; justify-content: center; " >
        <box-icon type='solid' name='donate-blood' color="#0cc3c3" size="60px"></box-icon>
        <!-- <i class='bx bxs-donate-blood' style="font-size: 60px; color:#0cc3c3;" ></i> -->
        </div>
        <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
           <p style="opacity: .92; font-size: 18px;">You are already a part of our campaign</p>
        </div>
        <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
            <h2 style="opacity: .92;">Thank you</h2>
        </div>
        <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
        <button style="background: teal; color:white; border:none; padding:8px 13px; border-radius: 3px; " onclick="location.href = 'blood.php'; ">Home</button>
        </div>
        </div>

        <div id="nomem" style="background: white; display: none; border-radius:5px; padding:10px 20px;" >
            <div style="display: flex; align-items:center; justify-content: center; " >
            <box-icon type='solid' name='donate-blood' color="#0cc3c3" size="60px"></box-icon>
            <!-- <i class='bx bxs-donate-blood' style="font-size: 60px; color:#0cc3c3;" ></i> -->
            </div>
            <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
                <h3 style="opacity: .92;">Thank you for joining our campaign</h3>
            </div>
            <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
                <p style="opacity: .92; ">We will contact you when we need you</p>
            </div>
            <div style="display:flex; align-items:center; justify-content:center; padding: 5px;">
                <button style="background: teal; color:white; border:none; padding:8px 13px; border-radius: 3px;" onclick="location.href = 'blood.php'; " >Home</button>
            </div>
        </div>
    </section>
    <div style="position: relative; display: flex;justify-content:center;align-items:center ">
        <a style="padding: 5px; font-size: 18px; text-decoration: none; " href="index.php">Home</a>
    </div>
    </section>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script type="text/javascript" src="Blood.js"></script>
</body>
</html>