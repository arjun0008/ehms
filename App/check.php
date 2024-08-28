<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Appointment</title>
    <link rel="stylesheet" href="check.css" type="text/css">
    <link rel="stylesheet" href="details.css" type="text/css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section id="fulll" >
    <div class="full" id="full">
        <img src="ca.png" alt="">
        <div class="pages">
            <div class="page2" >
                <div class="item1">
                   
                        <div class="container">
                            <div class="doc">
                            <div class="errormsg" id="errormsg1">Please Enter your Name</div>
                            <div class="errormsg" id="errormsg2">Please Enter your Phone Number</div>
                            <div class="errormsg" id="errormsg3">Please Enter your D-O-B</div>
                            <div class="item1">
                                <label for="n1"></label>
                                <input type="text" id="n1" placeholder="Full Name" >
                                <!-- <label id="s1" style="margin-left:3px;"><p><p>Gender</p></p></label> -->
                            </div>
                            <!-- <div class="it1" style="margin-top:-10px;">
                                <div class="g">
                                    <input type="radio" name="gender" id="gender1">
                                    <label for="gender1" class="r7"><div class="round"></div></label><p><p>Male</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" id="gender2">   
                                    <label for="gender2" class="r7"><div class="round"></div></label><p><p>Female</p></p>
                                </div>
                                <div class="g">
                                    <input type="radio" name="gender" id="gender3">
                                    <label for="gender3" class="r7"><div class="round"></div></label><p><p>Others</p></p>
                                </div>
                            </div> -->
                            <div class="item1">
                                <label for="c4"></label>
                                <input type="number" id="c4" placeholder="Phone No" >
                            </div>
                            <div class="item1">
                                <label for="c2" style="margin-bottom:16px; margin-left: 3px;"><p>Date of Birth</p></label>
                                <input type="date" id="c2" placeholder="Date of Birth (dd/mm/yy)" >
                            </div>
                            
                        </div>
                    </div>
                    
                 </div>
            </div>
            <div class="btns">
               
                <div class="bt bt2" >
                    <button  class="b2" onclick="location.href = 'Appointment.php';">Book Appiontment</button>
                    <!-- <input type="submit"  class="b3" value="Check"> -->
                    <button  class="b3" id="b3">Check</button>
                </div>
               
            </div>
        </div>
    </div>
    

        
    <section class="con" id="details" style="display:none;">
        <div class="box">
            <div class="top">
                <img src="a.png" alt="">
            </div>
            <div class="t" id="t">
                <!-- <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>05:30pm-06:00pm</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>    
                <div class="ibox">
                    <ul>
                        <li>Dr.Sophia</li>
                        <li>22/05/23</li>
                        <li>10:30am</li>
                    </ul> 
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a> 
                </div> -->
                <!-- <div class="ibox">
                    <ul>
                        <li>Dr.Varun</li>
                        <li>23/05/23</li>
                        <li>11:30am</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Bhargavan</li>
                        <li>23/05/23</li>
                        <li>01:00pm</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>  
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div>
                <div class="ibox">
                    <ul>
                        <li>Dr.Ravi</li>
                        <li>23/05/23</li>
                        <li>Time</li>
                    </ul>
                    <a href="#"><span><ion-icon name="chevron-forward-outline"></ion-icon></span></a>
                </div> -->
            </div>
            <div class="btn">
                <button id="back1">Back</button>
            </div>
        </div>
    </section>
    <div id="home_tag" style="position: relative; display: flex;justify-content:center;align-items:center ">
            <a style="padding: 5px; font-size: 18px; text-decoration: none; " href="../index.php">Home</a>
        </div> 
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    var c4 = document.getElementById("c4");
    var mySlots = ["09.00 AM - 09.30 AM","09.30 AM - 10.00 AM","10.00 AM - 10.30 AM","10.30 AM - 11.00 AM","11.00 AM - 11.30 AM","11.30 AM - 12.00 PM",];

    c4.addEventListener("input", function() {
        if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
     }
    });
    
    var phno = document.getElementById("c4");
    var dob = document.getElementById("c2");
    var b3 =document.getElementById("b3");
    b3.addEventListener("click", function(){
        if(document.getElementById("n1").value == ""){
            document.getElementById("errormsg1").style.display = "flex";
        }
        else{
            if(document.getElementById("c4").value == ""){
                const nodeList = document.querySelectorAll(".errormsg");
                for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].style.display = "none";
                }
                document.getElementById('errormsg2').style.display = "flex";
            }
            else{
                if(document.getElementById("c2").value == ""){
                    const nodeList = document.querySelectorAll(".errormsg");
                    for (let i = 0; i < nodeList.length; i++) {
                    nodeList[i].style.display = "none";
                    }
                    document.getElementById('errormsg3').style.display = "flex";
                }
                else{
                    var url = "check_apps.php?pat_name=" + document.getElementById("n1").value + "&pat_phno=" + phno.value + "&pat_dob=" + dob.value;
                    xhr.open("GET", url, true);
                    xhr.send();
                    document.getElementById("full").style.display = "none";
                    document.getElementById("details").style.display = "grid";
                    //document.getElementById("home_tag").style.top = "85vh";
                }
            }
        }
        // var url = "check_apps.php?pat_name=" + document.getElementById("n1").value + "&pat_phno=" + phno.value + "&pat_dob=" + dob.value;
        //     xhr.open("GET", url, true);
        //     xhr.send();
        // document.getElementById("full").style.display = "none";
    });
    var b4 =document.getElementById("back1");
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            var data = JSON.parse(this.responseText);
            console.log(JSON.parse(this.responseText));
            console.log(data);
            if(data.length > 0){
                var html = "";
                for (var i = 0; i < data.length; i++) {
                    html += '<div class="ibox"><ul><li>'+data[i].doc_name+'</li><li>'+ data[i].date+'</li><li>'+ mySlots[data[i].slot-1]+'</li></ul><span><button id="viewb" onclick="setSessionVariable('+data[i].appointment_id+')">View</button></span></div>';
                }
                document.getElementById("t").innerHTML = html;
            }
            else{
                document.getElementById("t").innerHTML = "<div class='iibox'>You dont have any appointments<div>";
            }
        }
    };
    function setSessionVariable(appointment_id) {
    var xhrx = new XMLHttpRequest();
    xhrx.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        location.href = 'reciept.php?id=' + appointment_id;
      }
    };
    xhrx.open('GET', 'set_session_variable.php?set=1', true);
    xhrx.send();
    }
    b4.addEventListener("click", function(){
        const nodeList = document.querySelectorAll(".errormsg");
            for (let i = 0; i < nodeList.length; i++) {
            nodeList[i].style.display = "none";
        }
        document.getElementById("details").style.display = "none";
        document.getElementById("full").style.display = "grid";
        });
        
</script>  

</body>
</html>