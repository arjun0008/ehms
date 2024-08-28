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
    <link rel="stylesheet" href="css/normalize.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>


    <!-- header -->
    <header class="header bg-blue">
        <nav class="navbar bg-blue">
            <div class="container flex">
                <a href="index.html" class="navbar-brand">
                    <img src="images/logo2.png" style="width: 240px; height:110px; margin-top: 10px; transform:scale(1.1);" alt="site logo">
                </a>
                <button type="button" class="navbar-show-btn">
                    <img src="images/ham-menu-icon.png">
                </button>

                <div class="navbar-collapse bg-white">
                    <button type="button" class="navbar-hide-btn">
                        <img src="images/close-icon.png">
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#package-service" class="nav-link">Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="#doc-panel" class="nav-link">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a href="Blood/index.php" class="nav-link">Blood Donation Campaign</a>
                        </li>
                        <!-- <li class = "nav-item">
                            <a href = "#" class = "nav-link">Departments</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="#posts" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <div class="search-bar">
                        <a href="App/Appointment.php" class="btn btn-light-blue">Book Appointment</a>
                        <!-- <form>
                            <div class = "search-bar-box flex">
                                <span class = "search-icon flex">
                                    <img src = "images/search-icon-dark.png">
                                </span>
                                <input type = "search" class = "search-control" placeholder="Search here">
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </nav>

        <div class="header-inner text-white text-center">
            <div class="container grid">
                <div class="header-inner-left">
                    <h1>your most trusted<br> <span>health partner</span></h1>
                    <p class="lead">the best match services for you</p>
                    <p class="text text-md">Where compassion meets expertise, providing exceptional healthcare for a healthier tomorrow.</p>
                    <div class="btn-group">
                        <a href="#about" class="btn btn-white">Learn More</a>
                        <a href="app/Appointment.php" class="btn btn-light-blue">Book Appointment</a>
                    </div>
                </div>
                <div class="header-inner-right">
                    <img src="images/header.png">
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <main>
        <!-- about section -->
        <section id="about" class="about py">
            <div class="about-inner">
                <div class="container grid">
                    <div class="about-left text-center">
                        <div class="section-head">
                            <h2>About Us</h2>
                            <div class="border-line"></div>
                        </div>
                        <p class="text text-lg">The mission of E-Hospital is to provide quality health services and facilities for the community, to promote wellness, to relieve suffering, and to restore health as swiftly, safely, and humanely as it can be done, consistent with the best service we can give at the highest value for all concerned.</p>
                        <a href="#posts" class="btn btn-white">Learn More</a>
                    </div>
                    <div class="about-right flex">
                        <div class="img">
                            <!-- <img src = "images/about-img.png"> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- banner one -->
        <section id="banner-one" class="banner-one text-center">
            <div class="container text-white">
                <blockquote class="lead"><i class="fas fa-quote-left"></i> When you are young and healthy, it never occurs to you that in a single second your whole life could change. <i class="fas fa-quote-right"></i></blockquote>
                <small class="text text-sm">- Anonim Nano</small>
            </div>
        </section>
        <!-- end of banner one -->

        <!-- services section -->
        <section id="services" class="services py">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="lead">The Best Doctor gives the least medicines</h2>
                    <p class="text text-lg">A perfect way to show your hospital services</p>
                    <div class="line-art flex">
                        <div></div>
                        <img src="images/4-dots.png">
                        <div></div>
                    </div>
                </div>
                <div class="services-inner text-center grid">
                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-1.png">
                        </div>
                        <h3>Cardio Monitoring</h3>
                        <p class="text text-sm">Facilities to do all non invasive cardiac testing like Colour Doppler Echo Cardiography, computerized Treadmill Test, 24 hours ECG monitoring (Holter monitoring), 24 hours blood pressure monitoring (ABPM) etc.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-2.png">
                        </div>
                        <h3>Medical Treatment</h3>
                        <p class="text text-sm">A fully equipped emergency services, catering to medical, cardiac, surgical and obstetric patient functions round the clock under supervision of trained Medical Officers and trained Para Medical Personnel.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-3.png">
                        </div>
                        <h3>Emergency Help</h3>
                        <p class="text text-sm">E- Hospital Emergency Help Cell is specially equipped to provide the highest level of care for all types of emergencies like abdominal pains, accidents, heart attack, snake bites etc.</p>
                    </article>

                    <article class="service-item">
                        <div class="icon">
                            <img src="images/service-icon-4.png">
                        </div>
                        <h3>First Aid</h3>
                        <p class="text text-sm">Successive steps in total emergency care involve local authorities and lay citizens for initial care and transportation, and medical and paramedical personnel under medical supervision for definitive treatment.</p>
                    </article>
                </div>
            </div>
        </section>
        <!-- end of services section -->

        <!-- banner two section -->
        <section id="banner-two" class="banner-two text-center">
            <div class="container grid">
                <div class="banner-two-left">
                    <img src="images/banner-2-img.png">
                </div>
                <div class="banner-two-right">
                    <p class="lead text-white">When you are young and healthy, it never occurs to you that in a single second your whole life could change.</p>
                    <div class="btn-group">
                        <a href="#" class="btn btn-white">Learn More</a>
                        <!-- <a href = "#" style="background: rgb(0, 187, 255);" class = "btn btn-light-blue">Sign In</a> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end of banner two section -->

        <!-- doctors section -->
        <section id="doc-panel" class="doc-panel py">
            <!-- <div class = "container">
                <div class = "section-head">
                    <h2>Our Doctor Panel</h2>
                </div> -->
            <iframe src="swiper/DocSlider.html" frameborder="0" scrolling="no" style="width:100%; height:70vh;"></iframe>
            <!-- <div class = "doc-panel-inner grid">
                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "images/doc-1.png" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">samuel goe</p>
                                <p class = "text-lg">Medicine</p>
                            </div>
                        </div>
                    </div>

                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "images/doc-2.png" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">elizabeth ira</p>
                                <p class = "text-lg">Cardiology</p>
                            </div>
                        </div>
                    </div>

                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "images/doc-3.png" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">tanya collins</p>
                                <p class = "text-lg">Medicine</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- end of doctors section -->

        <!-- package services section -->
        <section id="package-service" class="package-service py text-center">
            <div class="container">
                <div class="package-service-head text-white">
                    <h2>Package Service</h2>
                    <p class="text text-lg">Best service package for you</p>
                </div>
                <div class="package-service-inner grid">
                    <div class="package-service-item bg-white">
                        <div class="icon flex" style="background: teal;">
                            <i class="fa-solid fa-phone fa-2xl"></i>
                        </div>
                        <h3>Regular Case</h3>
                        <p class="text text-sm">Our experienced healthcare professionals, state-of-the-art facilities, and patient-centered approach ensure that every individual receives the highest standard of care. Whether it's routine check-ups, preventive care, or management of chronic conditions, we strive to deliver personalized attention and comprehensive treatment to meet the unique needs of each patient.</p>
                        <a href="#" class="btn btn-blue">Read More</a>
                    </div>

                    <div class="package-service-item bg-white">
                        <div class="icon flex" style="background: teal;">
                            <i class="fa-solid fa-bed-pulse fa-2xl"></i>
                        </div>
                        <h3>Serious Case</h3>
                        <p class="text text-sm">Our intensive care units (ICUs) are widely recognized as the finest in town, offering exceptional critical care services. With a dedicated team of specialized doctors, nurses, and cutting-edge technology, our ICUs provide the highest level of monitoring and treatment for critically ill patients. We prioritize patient comfort, advanced medical interventions, and round-the-clock care to ensure the best possible outcomes in intensive care.</p>
                        <a href="#" class="btn btn-blue">Read More</a>
                    </div>

                    <div class="package-service-item bg-white">
                        <div class="icon flex" style="background: teal;">
                            <i class="fa-solid fa-truck-medical fa-2xl"></i>
                        </div>
                        <h3>Emergency Case</h3>
                        <p class="text text-sm">Our emergency care facility stands out as the premier, providing top-notch medical assistance with swift response times, highly skilled healthcare professionals, and state-of-the-art equipment. We prioritize patient well-being and deliver exceptional emergency care services to ensure the highest level of safety and optimal outcomes.</p>
                        <a href="#" class="btn btn-blue">Read More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of package services section -->

        <!-- posts section -->
        <section id="posts" class="posts py">
            <div class="container">
                <div class="section-head">
                    <h2>Latest Post</h2>
                </div>
                <div class="posts-inner grid">
                    <article class="post-item bg-white">
                        <div class="img">
                            <img src="images/post-1.jpg">
                        </div>
                        <div class="content">
                            <h4>Inspiring stories of person and family centered care during a global pandemic.</h4>
                            <p class="text text-sm">During the global pandemic, nurse Emily went above and beyond to provide person and family-centered care. She connected an isolated elderly patient, Mrs. Johnson, with her family through daily calls and created a wall gallery of family photos in Mrs. Johnson's room, bringing comfort and support. Emily's compassion and dedication exemplified the essence of person-centered care, inspiring others.</p>
                            <p class="text text-sm">Emily's commitment to person and family-centered care not only improved Mrs. Johnson's well-being but also fostered a sense of hope and resilience among patients and healthcare providers alike.</p>
                            <div class="info flex">
                                <small class="text text-sm"><i class="fas fa-clock"></i> October 27, 2021</small>
                                <small class="text text-sm"><i class="fas fa-comment"></i> 5 comments</small>
                            </div>
                        </div>
                    </article>

                    <article class="post-item bg-white">
                        <div class="img">
                            <img src="images/post-2.jpg">
                        </div>
                        <div class="content">
                            <h4>Inspiring stories of person and family centered care during a global pandemic.</h4>
                            <p class="text text-sm">Amidst the global pandemic, a healthcare worker named Sarah demonstrated remarkable person and family-centered care. When a patient, John, was admitted to the hospital with COVID-19, his family was devastated as they couldn't be by his side. Sensing their distress, Sarah went the extra mile to bridge the physical distance. She arranged daily video calls between John and his family, ensuring they could see and talk to each other, providing emotional support during a difficult time.</p>
                            <p class="text text-sm">Sarah's compassion and dedication brought solace to the family, reminding us of the power of human connection even in the most challenging circumstances.</p>
                            <div class="info flex">
                                <small class="text text-sm"><i class="fas fa-clock"></i> October 27, 2021</small>
                                <small class="text text-sm"><i class="fas fa-comment"></i> 5 comments</small>
                            </div>
                        </div>
                    </article>

                    <article class="post-item bg-white">
                        <div class="img">
                            <img src="images/post-3.jpg">
                        </div>
                        <div class="content">
                            <h4>Inspiring stories of person and family centered care during a global pandemic.</h4>
                            <p class="text text-sm">Three men, David, James, and Michael, formed an unbreakable bond while receiving treatment at the hospital during the pandemic, supporting each other through challenging times and inspiring others with their unwavering determination to overcome adversity.</p>
                            <p class="text text-sm">Their shared experiences and mutual support created a powerful sense of camaraderie among the three men, reminding everyone of the resilience of the human spirit in the face of adversity.</p>
                            <div class="info flex">
                                <small class="text text-sm"><i class="fas fa-clock"></i> October 27, 2021</small>
                                <small class="text text-sm"><i class="fas fa-comment"></i> 5 comments</small>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- end of posts section -->

        <!-- contact section -->
        <section id="contact" class="contact py">
            <div class="container grid">
                <div class="contact-left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15555.072070198536!2d77.6003721!3d12.9226262!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1523705b42d7%3A0xe220a20e610f5f0d!2se%20Hospital!5e0!3m2!1sen!2sin!4v1685963662466!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2384.6268289831164!2d-6.214682984112116!3d53.29621947996855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486709e0c9c80f8f%3A0x92f408d10f2277c2!2sREVO!5e0!3m2!1sen!2snp!4v1636264848776!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                </div>
                <div class="contact-right text-white text-center bg-blue">
                    <div class="contact-head">
                        <h3 class="lead">Contact Us</h3>
                        <p class="text text-md">Feel free to send your queries and feedbacks</p>
                    </div>
                    <form id="myfeedbackform" autocomplete="off">
                        <div class="errormsg" id="erromsg">
                            <p>Please fill in all required fields</p>
                        </div>
                        <div class="form-element">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Your name">
                        </div>
                        <div class="form-element">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email">
                        </div>
                        <div class="form-element">
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-element">
                            <textarea rows="5" name="message" id="message" placeholder="Your Message" class="form-control"></textarea>
                        </div>
                        <button type="button" id="submitBtn" class="btn btn-white btn-submit">
                            <!-- <i class = "fas fa-arrow-right"></i> -->
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- end of contact section -->
    </main>

    <!-- footer  -->
    <footer id="footer" class="footer text-center">
        <div class="container">
            <div class="footer-inner text-white py grid" style="padding: 10.9rem 0;">
                <div class="footer-item">
                    <h3 class="footer-head">about us</h3>
                    <div class="icon">
                        <img style="transform: scale(2); margin-left:55px;" src="images/logo1.png">
                    </div>
                    <p class="text text-md">Elevating healthcare accessibility and convenience through the power of digital technology.</p>
                    <address>
                        E-HMS Clinic <br>
                        69 Deerpark Rd, Mount Merrion <br>
                        Co. Dublin, A94 E9D3 <br>
                        Ireland
                    </address>
                </div>

                <div class="footer-item">
                    <h3 class="footer-head">tags</h3>
                    <ul class="tags-list flex">
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

                <div class="footer-item">
                    <h3 class="footer-head">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="text-white">Our Services</a></li>
                        <li><a href="#" class="text-white">Our Plan</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Appointment Schedule</a></li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h3 class="footer-head">Make an appointment</h3>
                    <p class="text text-md">Simplify your healthcare journey with hassle-free online appointment booking.</p>
                    <ul class="appointment-info">
                        <li>8:00 AM - 11:00 AM</li>
                        <li>2:00 PM - 05:00 PM</li>
                        <li>8:00 PM - 11:00 PM</li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>contact@ehms.com</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+003 478 2834(00)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-links">
                <ul class="flex">
                    <li><a href="#" class="text-white flex"> <i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="text-white flex"> <i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="text-white flex"> <i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- end of footer  -->
    <section id="popfeed" style="display: none; z-index: 2000; position: fixed; top:0; width: 100%; height: 100vh; justify-content: center; align-items: center; background: #dcdcdca8; ">
        <div style="background: white; padding: 20px 30px; display: flex; justify-content: center; align-items: center; flex-direction: column; ">
            <box-icon type='solid' size="72px" color="green" name='check-circle'></box-icon>
            <p style="margin: 10px 0;">Thank you for your valuable feedback</p>
            <button onclick="document.getElementById('popfeed').style.display = 'none';" style="background:teal; padding: 10px; border: none; border-radius: 4px; color: white; ">Done</button>
        </div>
    </section>

    <!-- custom js -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>