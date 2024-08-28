<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-hospital</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- normalize css -->
    <link rel = "stylesheet" href = "css/normalize.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
    <link rel="stylesheet" href="doc-style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    

    <!-- header -->
    <header style="height:100px;" class = "bg-blue">
        <nav class = "navbar bg-blue">
            <div class = "container flex">
                <a href = "index.html" class = "navbar-brand">
                    <img src = "images/logo2.png" style="width: 240px; height:110px; margin-top: 10px; transform:scale(1.1);" alt = "site logo">
                </a>
                <button type = "button" class = "navbar-show-btn">
                    <img src = "images/ham-menu-icon.png">
                </button>

                <div class = "navbar-collapse bg-white">
                    <button type = "button" class = "navbar-hide-btn">
                        <img src = "images/close-icon.png">
                    </button>
                    <ul class = "navbar-nav">
                        <li class = "nav-item">
                            <a href = "index.php" class = "nav-link">Home</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php#about" class = "nav-link">About</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php#package-service" class = "nav-link">Service</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "our-doctors.php" class = "nav-link">Doctors</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "Blood/index.php" class = "nav-link">Blood Donation Campaign</a>
                        </li>
                        <!-- <li class = "nav-item">
                            <a href = "#" class = "nav-link">Departments</a>
                        </li> -->
                        <li class = "nav-item">
                            <a href = "index.php#posts" class = "nav-link">Blog</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php#contact" class = "nav-link">Contact</a>
                        </li>
                    </ul>
                    <!-- <div class = "search-bar">
                        <a href = "App/Appointment.php" class = "btn btn-light-blue">Book Appointment</a>
                        <form>
                            <div class = "search-bar-box flex">
                                <span class = "search-icon flex">
                                    <img src = "images/search-icon-dark.png">
                                </span>
                                <input type = "search" class = "search-control" placeholder="Search here">
                            </div>
                        </form>
                    </div> -->
                </div> 
            </div>
        </nav>

        <!-- <div class = "header-inner text-white text-center">
            <div class = "container grid">
                <div class = "header-inner-left">
                    <h1>your most trusted<br> <span>health partner</span></h1>
                    <p class = "lead">the best match services for you</p>
                    <p class = "text text-md">Where compassion meets expertise, providing exceptional healthcare for a healthier tomorrow.</p>
                    <div class = "btn-group">
                        <a href = "#about" class = "btn btn-white">Learn More</a>
                        <a href = "app/Appointment.php" class = "btn btn-light-blue">Book Appointment</a>
                    </div>
                </div>
                <div class = "header-inner-right">
                    <img src = "images/header.png">
                </div>
            </div> -->
        </div>
    </header>
    <!-- end of header -->

    <main>
        
        <section style="margin-top:20px;display: flex; justify-content: center; align-items: center; " >
            <p style="color:grey; font-size: 72px; font-weight: 600;  ">OUR DOCTORS</p>
        </section>
            <div style="width:300px; margin-left: 67%; margin-bottom:20px; display:flex;" >
            <p style="font-size:24px; font-weight: 500; margin-right: 20px; " >Filters :</p>
            <select style="border: 2px solid grey; border-radius:4px;" >
                <option value="">--Choose Hopsital--</option>
            </select>
        </div>
        <section style="background:white; min-height: 90vh; display: flex; align-items: start; justify-content: space-evenly; ">
            <!-- <div style=" display:flex; justify-content: flex-start ; flex-direction:column; align-items:center; min-width: 20%; box-shadow: 0 0 8px 0 grey; border-radius:4px; position: static; min-height: 70vh; position:sticky; top:140px; margin-bottom: 40px;  " > 
                
            </div> -->
            <div style="min-width: 75%; min-height: 85vh; padding-left: 20px; padding-right: 20px; padding-bottom: 20px; ">
                <ul id="our_doc_ul">
                    <?php 
                        include "inc/config.php";

                        $query = "SELECT `doc_id`, `name`, `specialization`, `dp`, `working_days`, `hospital_name` from `doctors`, `hospitals` where `doctors`.`hospital_id`= `hospitals`.`hospital_id`";
                        $result = mysqli_query($conn,$query);

                        if(!$result){
                            die("Error : ".mysqli_error($conn));
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<li id="our_doc_li">
                                    <img src="admin/dp/'.$row['dp'].'" id="our_doc_dp" alt="doc_dp">
                                    <div id="our_doc_det" >
                                        <p id="ptag">Name: '.$row['name'].'</p>
                                        <p id="ptag">Specialization: '.$row['specialization'].'</p>
                                        <p id="ptag">Hospital : '.$row['hospital_name'].'</p>
                                        <p id="ptag">Working days:
                                            <div id="daydiv" >';
                                            $workingDaysString = $row['working_days']; // Assuming the working days are stored as a string (e.g., "1,3,5")

                                            // Explode the string by comma to create an array
                                            $workingDays = explode(',', $workingDaysString);

                                            // Convert each array element to an integer
                                            $workingDays = array_map('intval', $workingDays);
                                            // Assuming the array contains the working days
                                            
                                            $daysOfWeek = [
                                              1 => 'Sunday',
                                              2 => 'Monday',
                                              3 => 'Tuesday',
                                              4 => 'Wednesday',
                                              5 => 'Thursday',
                                              6 => 'Friday',
                                              7 => 'Saturday'
                                            ];
                                            
                                            // Loop through each day from 1 to 7
                                            for ($day = 1; $day <= 7; $day++) {
                                              $pTagId = 'dayp' . $day;
                                            
                                              // Check if the current day is in the $workingDays array
                                              if (in_array($day, $workingDays)) {
                                                // The day is included, display the corresponding day
                                                echo "<p class=\"dayp\" id=\"$pTagId\">{$daysOfWeek[$day]}</p>";
                                              } else {
                                                // The day is not included, display an empty p tag
                                                echo "<p class=\"dayp\" id=\"$pTagId\" style=\"display:none;\"></p>";
                                              }
                                            }
                                        echo '</div>
                                        </p>
                                        <div id="botton_div" >
                                            <button id="doc_book_button">Book Appointment</button>
                                        </div>
                                    </div>
                                </li>';
                                echo "<script>
                                    function updateWorkingDays(wdStrings) {
                                        if (typeof wdStrings === 'string') {
                                        var workingDays = wdStrings.split(',');
                                    
                                        for (var i = 0; i < workingDays.length; i++) {
                                            var day = parseInt(workingDays[i]);
                                            var pTag = document.getElementById('dayp' + day);
                                    
                                            if (pTag) {
                                            pTag.style.display = ''; // Set display style to default ('')
                                            }
                                        }
                                        }
                                    }
                                </script>";
                                $workingDays[] = $row['working_days'];
                                $workingDaysJson = json_encode($workingDays);
                                echo '<script>updateWorkingDays(' . $workingDaysJson . ');</script>';
                        }
                        
                    ?>
                    <!-- <li id="our_doc_li">
                        <img src="images/doc-2.png" id="our_doc_dp" alt="doc_dp">
                        <div id="our_doc_det" >
                        <p id="ptag">Name: John Doe</p>
                        <p id="ptag">Specialization: General Medicine</p>
                        <p id="ptag">Hospital : Kerala</p>
                        <p id="ptag">Working days:<div id="daydiv" >
                            <p id="dayp">Sunday</p>
                            <p id="dayp">Monday</p>
                            <p id="dayp">Tuesday</p>
                            <p id="dayp">Wednesday</p>
                            <p id="dayp">Thursday</p>
                            <p id="dayp">Friday</p>
                            <p id="dayp">Saturday</p>
                        </div></p>
                        <div id="botton_div" >
                        <button id="doc_book_button">Book Apppointment</button>
                        </div>
                        </div>
                    </li>

                    <li id="our_doc_li">
                        <img src="images/doc-2.png" id="our_doc_dp" alt="doc_dp">
                        <div id="our_doc_det" >
                        <p id="ptag">Name: John Doe</p>
                        <p id="ptag">Specialization: General Medicine</p>
                        <p id="ptag">Hospital : Kerala</p>
                        <p id="ptag">Working days:<div id="daydiv" >
                            <p id="dayp">Sunday</p>
                            <p id="dayp">Monday</p>
                            <p id="dayp">Tuesday</p>
                            <p id="dayp">Wednesday</p>
                            <p id="dayp">Thursday</p>
                            <p id="dayp">Friday</p>
                            <p id="dayp">Saturday</p>
                        </div></p>
                        <div id="botton_div" >
                        <button id="doc_book_button">Book Apppointment</button>
                        </div>
                        </div>
                    </li>

                    <li id="our_doc_li">
                        <img src="images/doc-2.png" id="our_doc_dp" alt="doc_dp">
                        <div id="our_doc_det" >
                        <p id="ptag">Name: John Doe</p>
                        <p id="ptag">Specialization: General Medicine</p>
                        <p id="ptag">Hospital : Kerala</p>
                        <p id="ptag">Working days:<div id="daydiv" >
                            <p id="dayp">Sunday</p>
                            <p id="dayp">Monday</p>
                            <p id="dayp">Tuesday</p>
                            <p id="dayp">Wednesday</p>
                            <p id="dayp">Thursday</p>
                            <p id="dayp">Friday</p>
                            <p id="dayp">Saturday</p>
                        </div></p>
                        <div id="botton_div" >
                        <button id="doc_book_button">Book Apppointment</button>
                        </div>
                        </div>
                    </li>

                    <li id="our_doc_li">
                        <img src="images/doc-2.png" id="our_doc_dp" alt="doc_dp">
                        <div id="our_doc_det" >
                        <p id="ptag">Name: John Doe</p>
                        <p id="ptag">Specialization: General Medicine</p>
                        <p id="ptag">Hospital : Kerala</p>
                        <p id="ptag">Working days:<div id="daydiv" >
                            <p id="dayp">Sunday</p>
                            <p id="dayp">Monday</p>
                            <p id="dayp">Tuesday</p>
                            <p id="dayp">Wednesday</p>
                            <p id="dayp">Thursday</p>
                            <p id="dayp">Friday</p>
                            <p id="dayp">Saturday</p>
                        </div></p>
                        <div id="botton_div" >
                        <button id="doc_book_button">Book Apppointment</button>
                        </div>
                        </div>
                    </li>

                    <li id="our_doc_li">
                        <img src="images/doc-2.png" id="our_doc_dp" alt="doc_dp">
                        <div id="our_doc_det" >
                        <p id="ptag">Name: John Doe</p>
                        <p id="ptag">Specialization: General Medicine</p>
                        <p id="ptag">Hospital : Kerala</p>
                        <p id="ptag">Working days:<div id="daydiv" >
                            <p id="dayp">Sunday</p>
                            <p id="dayp">Monday</p>
                            <p id="dayp">Tuesday</p>
                            <p id="dayp">Wednesday</p>
                            <p id="dayp">Thursday</p>
                            <p id="dayp">Friday</p>
                            <p id="dayp">Saturday</p>
                        </div></p>
                        <div id="botton_div" >
                        <button id="doc_book_button">Book Apppointment</button>
                        </div>
                        </div>
                    </li> -->

                </ul>
            </div>
        </section>
    </main>
    
    <!-- footer  -->
    <footer id = "footer" class = "footer text-center">
        <div class = "container">
            <div class = "footer-inner text-white py grid" style="padding: 10.9rem 0;" >
                <div class = "footer-item">
                    <h3 class = "footer-head">about us</h3>
                    <div class = "icon">
                        <img style="transform: scale(2); margin-left:55px;" src = "images/logo1.png">
                    </div>
                    <p class = "text text-md">Elevating healthcare accessibility and convenience through the power of digital technology.</p>
                    <address>
                        E-HMS Clinic <br>
                        69 Deerpark Rd, Mount Merrion <br>
                        Co. Dublin, A94 E9D3 <br>
                        Ireland
                    </address>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">tags</h3>
                    <ul class = "tags-list flex">
                        <li>medicalcare</li>
                        <li>emergency</li>
                        <li>therapy</li>
                        <li>surgery</li>
                        <li>medication</li>
                        <li>nurse</li>
                        <li>medicalresearch</li>
                        <li>wellness</li>
                        <li>ehospital</li>
                        <li>healthtech</li>
                        <li>patientcare</li>
                    </ul>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">Quick Links</h3>
                    <ul>
                        <li><a href = "#" class = "text-white">Our Services</a></li>
                        <li><a href = "#" class = "text-white">Our Plan</a></li>
                        <li><a href = "#" class = "text-white">Privacy Policy</a></li>
                        <li><a href = "#" class = "text-white">Appointment Schedule</a></li>
                    </ul>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">Make an appointment</h3>
                    <p class = "text text-md">Simplify your healthcare journey with hassle-free online appointment booking.</p>
                    <ul class = "appointment-info">
                        <li>8:00 AM - 11:00 AM</li>
                        <li>2:00 PM - 05:00 PM</li>
                        <li>8:00 PM - 11:00 PM</li>
                        <li>
                            <i class = "fas fa-envelope"></i>
                            <span>contact@ehms.com</span>
                        </li>
                        <li>
                            <i class = "fas fa-phone"></i>
                            <span>+003 478 2834(00)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class = "footer-links">
                <ul class = "flex">
                    <li><a href = "#" class = "text-white flex"> <i class = "fab fa-facebook-f"></i></a></li>
                    <li><a href = "#" class = "text-white flex"> <i class = "fab fa-twitter"></i></a></li>
                    <li><a href = "#" class = "text-white flex"> <i class = "fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    
    <!-- end of footer  -->
    <!-- custom js -->
    <!-- <script src = "js/script.js"></script> -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>