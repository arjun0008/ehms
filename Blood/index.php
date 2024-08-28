<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Blood Donation Campaign</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head> 
<body>
<header class="main-header">
  <div class="container">
    <div class="branding grid-row">
      <div class="logo">
        <a href="#"><img src="logo.png" alt="logo"></a>
      </div>
      <span class="mobile-menu-btn desktop-hide"><i class="fa fa-bars"></i></span>
      <nav class="navbar mobile-menu">
        <span class="close-menu desktop-hide"><i class="fa fa-times"></i></span>
        <ul class="nav-listing">
          <li><a href="../index.php">Home</a></li>
          <li><a href="Blood.php">Donate</a></li>
          <!-- <li><a href="#tabsection">Give Blood</a></li> -->
          <li><a href="#tabsection">Volunteers</a></li>
          <!-- <li><a href="">Get Help</a></li> -->
        </ul>
      </nav>
    </div>
  </div>
</header>

<section class="main-section">
  <div class="container">
    <h1 class="main-heading">
      <span>#</span>
      <span>EVERYONE COULD</span>
      <span>BE A HERO</span>
    </h1>
    <div class="grid-row">
      <div class="left-col">
        <p>Every drop counts. Join our blood donation campaign and be a lifeline for those in need. Give the gift of life. Support our blood donation campaign and make a lasting impact on the lives of others.</p>
      </div>
      <div class="right-col">
        <h2 class="dark-heading">
          <span>You can</span>
          <span>Help save a life</span>
        </h2>
        <h2 class="small-top-space">Give blood</h2>
      </div>
    </div>
  </div>
  <div class="social-icons">
    <div class="container">
      <ul class="listing">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
      </ul>
    </div>
  </div>
</section>
<img src="bg.png" style="position: fixed; top: 0; right: 0; height: 100vh; ">
<section id="tabsection">
  <div>
    <div style="display:flex; align-items: center; justify-content: center; "><p style="color: grey; font-size: 40px; font-weight: 600; margin-top: 10px; " >Blood Donors List</p></div>
    <div style="display:flex; align-items: center; justify-content: space-evenly; margin-top: 10px; ">
      <div id="tabdiv">
      <div class="searchb" >
          <input type="text" id="searchInput" placeholder="Search..">
          <i class='bx bx-search' ></i>
        </div>
    <div id="nodivtable" style="height:640px; overflow:scroll">
    <table style="width: 100%;" id="dataTable">
      <thead>
      <tr style="margin: 10px 4px;">
      <th style="border: 2px solid grey; padding: 15px; " align="center">Name</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Blood Group</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Gender</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Date of Birth(Age)</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Phone Number</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Email</th>
      <th style="border: 2px solid grey; padding: 15px; " align="center">Address</th>
      </tr>
      </thead>
      <tbody>
        <?php
          include "inc/config.php";

          $query = "SELECT * FROM donor_camp";
          $result = mysqli_query($conn,$query);
          if(!$result){
            die("Error : ".mysqli_error($conn));
          }
          while($row = mysqli_fetch_assoc($result)){
            // Get the date of birth
            $dob = $row['dob']; // Replace with the actual date of birth

            // Create DateTime objects for the date of birth and current date
            $dateOfBirth = new DateTime($dob);
            $currentDate = new DateTime();

            // Calculate the difference between the current date and date of birth
            $ageInterval = $currentDate->diff($dateOfBirth);

            // Get the age in years from the difference
            $age = $ageInterval->y;

            // Output the age
            //echo "Age: " . $age;

            echo "<tr id='trst'>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['name']."</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['blood_group']."</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['gender']."</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['dob']."(".$age.")</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['phone_no']."</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['email']."</td>";
            echo "<td style='border: 2px solid grey; padding: 10px 15px; ' align='center'>".$row['address']."</td>";
            echo "</tr>";
          }
        ?>
        <!-- <tr id="trst">
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">John 1</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">AB+</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">Male</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">07/07/2001(21)</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">9446898290</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">arjunlaiju0@gmail.com</td>
          <td style="border: 2px solid grey; padding: 10px 15px; " align="center">Blah Blah Blah Blah</td>
        </tr> -->
      </tbody>
      
    </table>
    </div>
    </div>
    <div id="askmessage" style="z-index: 3000;">
      <div id="askdiv"><img src="bd.png" style="width: 110px; height:100px;"></div>
      <div id="askdiv"> 
      <p>Be a hero, be a blood donor. </p>
      </div>
      <div id="askdiv">
      <p> Participate in our blood donation campaign and help those in need.</p>
      </div>
      <div id="askdiv">
        <button onclick="location.href='Blood.php'" >Register</button>
      </div>
    </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  jQuery(".mobile-menu-btn").click(function(){
    jQuery(".mobile-menu").addClass("show-menu")
  }); 
  jQuery(".close-menu").click(function(){
    jQuery(".mobile-menu").removeClass("show-menu")
  }); 

  var searchInput = document.getElementById("searchInput");
var dataTable = document.getElementById("dataTable");

searchInput.addEventListener("input", function () {
    var searchValue = searchInput.value.trim().toLowerCase();
    var rows = dataTable.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var rowMatched = false;

        for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent.trim().toLowerCase();

            if (cellText.includes(searchValue)) {
                rowMatched = true;
                highlightMatchedInput(cells[j], searchValue);
            } else {
                removeHighlight(cells[j]);
            }
        }

        if (rowMatched) {
            rows[i].style.display = "table-row";
        } else {
            rows[i].style.display = "none";
        }
    }
});

function highlightMatchedInput(cell, searchValue) {
    var cellText = cell.textContent;
    var highlightedText = cellText.replace(new RegExp(searchValue, "gi"), function (match) {
        return '<span class="highlighted">' + match + '</span>';
    });
    cell.innerHTML = highlightedText;
}

function removeHighlight(cell) {
    cell.innerHTML = cell.textContent;
}


</script>
</body>
</html>        