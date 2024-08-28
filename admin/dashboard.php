<?php
include "inc/config.php";
session_start();
if (!isset($_SESSION['adm_login']) || $_SESSION['adm_login'] != 1) {
	header("location:login.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<!-- My CSS -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/Employee.css">
		<link rel="stylesheet" href="css/patient.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

		<title>E-HMS Admin-Dasboard</title>
	</head>

	<body>


		<!-- SIDEBAR -->
		<section id="sidebar">
			<!--div id="white">
			blah Blah
		</div-->
			<a href="#" class="brand">
				<!-- <div id="logo" style="opacity:0;"><img src="src/5.png" alt="" ></div> -->

				<!--<i class='bx bxs-smile'></i>-->
				<span class="text"><img src="src/9.png" class="name" alt=""></span>
			</a>
			<ul class="side-menu top tabs">
				<li class="active">
					<a onclick="cur_display('dashboard');">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('employees');setupTableSearch('searchInput1', 'dataTable1');">
						<i class='bx bxs-user-detail'></i>
						<span class="text">Employees</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('patients');setupTableSearch('searchInput2', 'dataTable2');">
						<i class='bx bxs-group'></i>
						<span class="text">Patients</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('records')">
						<i class='bx bx-library'></i>
						<span class="text">Records</span>
					</a>
				</li>
				<li id="notific">
					<a onclick="cur_display('notifications')">
						<i class='bx bxs-message-dots'></i>
						<span class="text">Notifications</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('accountings')">
						<!-- <i class='bx bxs-doughnut-chart'></i> -->
						<i class='bx bxs-school'></i>
						<span class="text">Hospitals</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('bdc');setupTableSearch('searchInput6', 'dataTable6');">
						<i class='bx bxs-donate-blood'></i>
						<span class="text">Blood Donation Campaign</span>
					</a>
				</li>
				<li>
					<a onclick="cur_display('pass-resets')">
						<!-- <i class='bx bxs-injection' ></i> -->
						<i class='bx bxs-injection'></i>
						<!-- <box-icon type='solid' id="syringe" name='injection' size="18px" style=" margin-left: 15px; margin-right: 10px;"></box-icon> -->
						<span class="text">Inventory</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
				<!--<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>-->
				<li>
					<a href="logout.php" class="logout">
						<i class='bx bxs-log-out-circle'></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->




		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<!-- <i class='bx bx-menu' id="bar" onclick="hidelogo();"></i> -->
				<!-- <i class='bx bx-menu' id="bar"S></i> -->
				<form action="#">
					<div class="form-input">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome Administrator</p>
						<!-- <input type="search" placeholder="" disabled> -->
						<!--<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>-->
					</div>
				</form>
				<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>-->
				<a class="notification" onclick="not_display('notifications')">
					<i class='bx bxs-bell'></i>
					<span class="num" id="noti_num">
						<?php
						include "inc/config.php";
						// Assuming you have already established a database connection

						// Define the query
						$query = "SELECT COUNT(*) AS `count` FROM feedbacks WHERE status = 'unread'";

						// Execute the query
						$result = mysqli_query($conn, $query);

						// Check if the query was successful
						if ($result) {
							// Fetch the count value
							$row = mysqli_fetch_assoc($result);
							$count = $row['count'];

							// Print the count
							echo $count;
						} else {
							// Handle the query error
							echo "Error executing query: " . mysqli_error($conn);
						}

						?>
					</span>
				</a>
				<a href="#" onfocus="pro();" onblur="proo();" class="profile">
					<img id="pro-pic" src="src/7.png">
				</a>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<section class="pages">
					<div id="dashboard" class="page is-active">
						<div class="head-title">
							<div class="left">
								<h1>Dashboard</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<ul class="box-info">
							<li>
								<?php
								$query = "SELECT * FROM patients";
								$result = mysqli_query($conn, $query);
								$total_patients = mysqli_num_rows($result);
								?>
								<i class='bx bxs-user-detail'></i>
								<span class="text">
									<h3><?php echo $total_patients; ?></h3>
									<p>Total Patients</p>
								</span>
							</li>
							<li>
								<?php
								$query = "SELECT * FROM doctors";
								$result = mysqli_query($conn, $query);
								$total_employees = mysqli_num_rows($result);
								?>
								<i class='bx bxs-group'></i>
								<span class="text">
									<h3><?php echo $total_employees; ?></h3>
									<p>Total Employees</p>
								</span>
							</li>
							<li>
								<i class='bx bx-calendar'></i>
								<span class="text">
									<p style="font-size:20px;">
										<?php
										date_default_timezone_set('Asia/Kolkata');
										$currentDate = date("Y-m-d");
										echo $currentDate;
										?>
									</p>
									<!-- <p>Total Payments Recieved</p> -->
								</span>
							</li>
						</ul>


						<div class="table-data">
							<div class="order order1">
								<div class="head">
									<h3>Employees</h3>
								</div>
								<table>
									<thead>
										<tr>
											<th></th>
											<th>&nbsp;&nbsp;Name</th>
											<th>Specialization</th>
											<th>Hospital</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "inc/config.php";
										$query = "SELECT * FROM doctors";
										$result = mysqli_query($conn, $query);

										if (!$result) {
											die("Query failed: " . mysqli_error($conn));
										} else {
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>";
													// echo "<td>".$row['doc_id']. "</td>";
													echo "<td><img src='dp/" . $row['dp'] . "'></td>";
													echo "<td>&nbsp;&nbsp;" . $row['name'] . "</td>";
													// echo "<td>".ucfirst($row['gender']). "</td>";
													// echo "<td>".$row['phone_no']. "</td>";
													// echo "<td>".$row['email']. "</td>";
													echo "<td>" . $row['specialization'] . "</td>";
													$sql = "SELECT hospital_name FROM hospitals WHERE hospital_id = " . $row['hospital_id'];
													$result1 = mysqli_query($conn, $sql);
													$row1 = mysqli_fetch_assoc($result1);
													echo "<td>" . $row1['hospital_name'] . "</td>";
													echo '<td><button onclick="load_emp_det_sec(' . $row['doc_id'] . ');" class="vm">View</button></td>';
													echo "</tr>";
												}
											}
										}
										?>
										<!-- <tr>
								<td><img src="src/people.png"></td>
								<td>Baodkadaih</td>
								<td>9446898290</td>
								<td>General Medicine</td>
								<td>Kerala</td>
								<td><button class="vm">View</button></td>
							</tr> -->
										<!--<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>-->
									</tbody>
								</table>
							</div>
							<div class="todo">
								<div class="head">
									<h3>Feedbacks</h3>
									<div class="color c1"></div>Unread
									<div class="color c2"></div>Read
									<!--<i class='bx bx-plus' ></i>-->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<ul class="todo-list">
									<?php
									include "inc/config.php";

									$queryf = "SELECT * FROM `feedbacks` ORDER BY `id` DESC";
									$resultf = mysqli_query($conn, $queryf);

									if (!$resultf) {
										die("Query failed: " . mysqli_error($conn));
									} else {
										if (mysqli_num_rows($resultf) > 0) {
											while ($rowf = mysqli_fetch_assoc($resultf)) {
												if ($rowf['status'] == "read") {
													$cmp = "not-completed";
												} else {
													$cmp = "completed";
												}
												echo "<li class='" . $cmp . "'style='cursor: pointer;' id='fmsg" . $rowf['id'] . "' onclick='loadmsgfeed123(" . $rowf['id'] . ");'>";
												echo "<div style='display: block;'>";
												echo "<h4>" . $rowf['name'] . "</h4>";
												echo "<p style='font-size: 12px;'>" . $rowf['date'] . " : " . $rowf['email'] . "</p>";
												echo "</div>";
												echo "<i class='bx bx-chevron-right'></i>";
												echo "</li>";
											}
										}
									}
									?>
									<!-- <li class="completed">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li> -->
									<!--<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>-->
								</ul>
							</div>
						</div>
					</div>


					<div id="employees" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Employees</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<div class="order">
								<div class="head">
									<h3>Employees</h3>
									<i class='bx bx-plus' onclick="addemp()"></i>
									<div class="searchb">
										<input type="text" id="searchInput1" placeholder="Search..">
										<i class='bx bx-search'></i>
									</div>
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<table id="dataTable1">
									<thead>
										<tr>
											<!-- <th>Id</th> -->
											<th></th>
											<th>Name</th>
											<!-- <th>Gender</th> -->
											<th>Phone</th>
											<th>Email</th>
											<th>Appointments</th>
											<th>Specialization</th>
											<th>Hospital</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "inc/config.php";
										$query = "SELECT * FROM doctors";
										$result = mysqli_query($conn, $query);

										if (!$result) {
											die("Query failed: " . mysqli_error($conn));
										} else {
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													$query2 = "SELECT COUNT(*) AS row_count FROM appointments WHERE doc_id = " . $row['doc_id'] . " AND `date` >= CURDATE() AND `status` != 'canceled' ";
													$result2 = mysqli_query($conn, $query2);
													if (!$result2) {
														die("Query failed: " . mysqli_error($conn));
													}
													$row2 = mysqli_fetch_assoc($result2);
													$app_count = $row2['row_count'];
													echo "<tr>";
													// echo "<td>".$row['doc_id']. "</td>";
													echo "<td><img src='dp/" . $row['dp'] . "'></td>";
													echo "<td>" . $row['name'] . "</td>";
													// echo "<td>".ucfirst($row['gender']). "</td>";
													echo "<td>" . $row['phone_no'] . "</td>";
													echo "<td>" . $row['email'] . "</td>";
													echo "<td style='text-align: center;'>" . $app_count . "</td>";
													echo "<td>" . $row['specialization'] . "</td>";
													$sql = "SELECT hospital_name FROM hospitals WHERE hospital_id = " . $row['hospital_id'];
													$result1 = mysqli_query($conn, $sql);
													$row1 = mysqli_fetch_assoc($result1);
													echo "<td>" . $row1['hospital_name'] . "</td>";
													echo '<td><button onclick="load_emp_det_sec(' . $row['doc_id'] . ');" class="vm">View</button></td>';
													echo "</tr>";
												}
											}
										}
										?>

										<!-- <tr>
								<td>Id</td>
								<td>
									<img src="src/people.png">
									<p>Baodkadaih</p>
								</td>
								<td>9464515424</td>
								<td>01-10-2021</td>
								<td>ahiugdi@gmail.ocm</td>
								<td><span class>Address Completed</span></td>
							</tr> -->
										<!--<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>-->
									</tbody>
								</table>
							</div>
							<!--<div class="todo">
					<div class="head">
						<h3>Feedbacks</h3>
						<div class="color c1"></div>Unread
						<div class="color c2"></div>Read
						<i class='bx bx-plus' ></i>-->
							<!--<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>-->
						</div>
					</div>


					<div id="patients" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Patients</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<div class="order">
								<div class="head">
									<h3>Patients</h3>
									<i class='bx bx-plus' onclick="addpat();"></i>
									<div class="searchb">
										<input type="text" id="searchInput2" placeholder="Search..">
										<i class='bx bx-search'></i>
									</div>
									<!-- <i class='bx bx-search' ></i> -->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<table id="dataTable2">
									<thead>
										<tr>
											<th>&nbsp;&nbsp;Id&nbsp;&nbsp;</th>
											<th>Name&nbsp;&nbsp;</th>
											<th>Gender&nbsp;&nbsp;</th>
											<th>Date-of-Birth&nbsp;&nbsp;</th>
											<th>Phone Number&nbsp;&nbsp;</th>
											<th>Email&nbsp;&nbsp;</th>
											<th>Address</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "inc/config.php";
										$query = "SELECT * FROM patients";
										$result = mysqli_query($conn, $query);

										if (!$result) {
											die("Query failed: " . mysqli_error($conn));
										} else {
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>";
													echo "<td>" . $row['patient_id'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['name'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . ucfirst($row['gender']) . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['dob'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['phone_no'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['email'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['address'] . "</td>";
													echo '<td><button onclick="fetchDatavm1(' . $row['patient_id'] . ');" class="vm">View</button></td>';
													echo "</tr>";
												}
											}
										}
										?>
										<!-- <tr>
								<td>
									<img src="img/people.png">
									 <p>Baodkadaih</p>
									id111
								</td>
								<td>Name kbksdg</td>
								<td>Male</td>
								<td>64664686849</td>
								<td>01-10-2021</td>
								<td>kajyfd@jbsdkugf</td>
								<td><span class>house area city pincode</span></td>
							</tr> -->
										<!--<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>-->
									</tbody>
								</table>
							</div>
							<!--<div class="todo">
					<div class="head">
						<h3>Feedbacks</h3>
						<div class="color c1"></div>Unread
						<div class="color c2"></div>Read
						<i class='bx bx-plus' ></i>-->
							<!--<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>-->
						</div>
					</div>


					<div id="records" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Records</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<div class="todo">
								<div class="head">
									<h3>Records</h3>
									<div class="searchb">
										<input type="text" placeholder="Search.." onkeyup="myFunctionrec()" id="searchInputrec">
										<i class='bx bx-search'></i>
									</div>
									<!-- <i class='bx bx-plus' ></i> -->
									<!-- <i class='bx bx-x'></i> -->
									<!-- <box-icon name='x'></box-icon> -->
								</div>
								<ul class="todo-list" id="recList">
									<?php
									// Include your database connection file or establish a database connection
									include "inc/config.php";
									// Assuming you have already established a connection, execute the query
									$query = "SELECT * FROM records";
									$result = mysqli_query($conn, $query);

									// Check if the query executed successfully
									if ($result) {
										// Fetch each row as an associative array
										while ($row = mysqli_fetch_assoc($result)) {
											$rid = $row['id'];
											$datetime = $row['datetime'];
											$pid = $row['pid'];
											$did = $row['did'];
											$disease_info = $row['disease_info'];
											$prescription = $row['prescription'];

											$queryp = "SELECT * FROM patients WHERE patient_id = '$pid'";
											$resultp = mysqli_query($conn, $queryp);

											// Check if the query executed successfully
											// if ($resultp) {
											// 	// Fetch the row as an associative array
											$rowp = mysqli_fetch_assoc($resultp);

											// 	// Check if a row was found
											// 	if ($rowp) {
											// Access the values of each column
											$patientId = $rowp['patient_id'];
											$pname = $rowp['name'];
											$pgender = $rowp['gender'];
											$pdob = $rowp['dob'];
											$pphoneNo = $rowp['phone_no'];
											$pemail = $rowp['email'];
											$paddress = $rowp['address'];
											// } else {
											// 	// Handle the case when no row is found
											// 	echo "No patient found with patient_id = 11";
											// }
											// } else {
											// 	// Handle the case when the query fails
											// 	echo "Error in executing the query: " . mysqli_error($conn);
											// }

											$queryd = "SELECT name, specialization FROM doctors WHERE doc_id = '$did'";
											$resultd = mysqli_query($conn, $queryd);

											// if ($resultd) {
											// 	// Fetch the row as an associative array
											$rowd = mysqli_fetch_assoc($resultd);

											// 	// Check if the row exists
											// 	if ($rowd) {
											$dname = $rowd['name'];
											$dspecialization = $rowd['specialization'];
											// 	} else {
											// 		// Handle the case when no row is found
											// 		echo "No doctor found with doc_id = 9";
											// 	}
											// } else {
											// 	// Handle the case when the query fails
											// 	echo "Error in executing the query: " . mysqli_error($conn);
											// }
											// echo "<li class='med' style='cursor: pointer;' onclick='loadinv(".$invId.")'><a style='display:flex; justify-content:space-between; align-items: center;'>";
											// echo "<p>" . $row['name'] . "</p></a>";
											// echo "<i class='bx bx-chevron-right'></i>";
											// echo "</li>";

											echo "<li class='completed' style='cursor: pointer;' onclick='load_record(" . $rid . ")';'>";
											echo "<a style='width:100%; display:flex; justify-content:space-between; align-items:center;'><p>" . $pname;
											echo "</p><p>" . $dname . "</p>";
											echo "<p>" . $datetime . "</p>";
											echo "</a></li>";
										}
									} else {
										// Handle the case when the query fails
										echo "Error in executing the query: " . mysqli_error($conn);
									}

									// // Close the database connection
									// mysqli_close($conn);
									?>
									<!-- <li class="completed">
							<p>Luttappi</p>
							<p>Doctor</p>
							<p>Date</p>
							<i class='bx bx-chevron-right'></i>
						</li> -->
									<!-- <li class="completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li> -->
								</ul>
							</div>
							<div class="order" id="rec_show" style="display: none;">
								<div class="head">
									<h3>Report</h3>
									<!-- <div class="searchb">
							<input type="text" placeholder="Search..">
							<i class='bx bx-search' ></i>
						</div> -->
									<box-icon name='x' onclick="document.getElementById('rec_show').style.display = 'none';"></box-icon>
									<!-- <i class='bx bx-search' ></i> -->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<div id="rec_show_1">
									<table>
										<thead>
											<tr>
												<th>Patient Name : Arjun</th>
												<th>DOB : 07/07/2001</th>
												<th>Gender : Male </th>
												<th><button class="vm">View</button></th>
											</tr>
										</thead>
									</table>
									<div>
										<h4 style="margin-top: 20px; margin-bottom: 10px;">Disease Information</h4>
										<div>
											<p>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah</p>
										</div>
										<h4 style="margin-top: 20px; margin-bottom: 10px;">Prescriptions</h4>
										<div>
											<p>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah</p>
										</div>
									</div>
									<!-- <div style="position: absolute; bottom:50px;" >
									<p> Last modified: kjubddkzbcidlgfiv</p>
								</div> -->
								</div>

								<!-- <table>
						<thead>
							<tr>
								<th>Patient Name</th>
								<th>Doctor Name</th>
								<th>Last Modified</th>
							</tr>
						</thead>
						<tbody>
						

							<tr>
								<td>Name</td>
								<td>01-10-2021</td>
								<td><span class>Completed</span></td>
							</tr>

							 -->
								<!--<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>-->
								<!-- </tbody>
					</table> -->
							</div>

						</div>
					</div>


					<div id="notifications" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Notifications</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<!--<div class="order">
					<div class="head">
						<h3>Employees</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Date-of-Birth</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Baodkadaih</p>
								</td>
								<td>01-10-2021</td>
								<td><span class>Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>-->
							<div class="todo" id="msg">
								<div class="head">
									<h3>Feedbacks</h3>
									<div class="color c1"></div>Unread
									<div class="color c2"></div>Read
									<!--<i class='bx bx-plus' ></i>-->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<ul class="todo-list">
									<?php
									include "inc/config.php";

									$queryf = "SELECT * FROM `feedbacks` ORDER BY `id` DESC";
									$resultf = mysqli_query($conn, $queryf);

									if (!$resultf) {
										die("Query failed: " . mysqli_error($conn));
									} else {
										if (mysqli_num_rows($resultf) > 0) {
											while ($rowf = mysqli_fetch_assoc($resultf)) {
												if ($rowf['status'] == "read") {
													$cmp = "not-completed";
												} else {
													$cmp = "completed";
												}
												echo "<li class='" . $cmp . "'style='cursor: pointer;' id='fmsg" . $rowf['id'] . "' onclick='loadmsgfeed(" . $rowf['id'] . ");'>";
												echo "<div style='display: block;'>";
												echo "<h4>" . $rowf['name'] . "</h4>";
												echo "<p style='font-size: 12px;'>" . $rowf['date'] . " : " . $rowf['email'] . "</p>";
												echo "</div>";
												echo "<i class='bx bx-chevron-right'></i>";
												echo "</li>";
											}
										}
									}
									?>

									<!-- <li class="completed">
						<div style="display: block;">
							<h4>Luttappi</h4>
							<p style="font-size: 12px;" >date sender</p>
							</div>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<div style="display: block;">
							<h4>Luttappi</h4>
							<p style="font-size: 12px;" >date sender</p>
							</div>
							<i class='bx bx-chevron-right'></i>
						</li> -->
									<!--<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>-->
								</ul>
							</div>
							<div class="order" id="msgc" style="display: none;">
								<box-icon name='x' style="cursor: pointer;" onclick="document.getElementById('inv_det_cap').style.display = 'none';"></box-icon>
								<!-- <div class="head" style="margin-left: 20px;margin-top: 20px; display: block;" >
						<h3>Subject</h3>
						<div style="display: flex;" >
							<p style='font-size: 12px;'> time sender</p>
						</div>
						 <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> 
					</div>
					<div id="fmsg" style="margin-top: 20px; margin-left: 20px;">
						test message here for testing feedback
					</div> -->
								<!-- <table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Date-of-Birth</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Baodkadaih</p>
								</td>
								<td>01-10-2021</td>
								<td><span class>Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table> -->
							</div>
						</div>
					</div>

					<div id="accountings" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Our Hospitals</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<div class="todo">
								<div class="head">
									<h3>Hospitals</h3>
									<!-- <div class="color c1"></div>Unread
						<div class="color c2"></div>Read -->
									<i class='bx bx-plus'></i>
									<div class="searchb">
										<input type="text" id="searchInputhos" placeholder="Search..">
										<i class='bx bx-search'></i>
									</div>
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<ul id="hosList" class="todo-list">
									<?php
									// Assuming you have already established a connection to the database

									// Query to fetch all data from the "hospitals" table
									$query = "SELECT * FROM hospitals";
									$result = mysqli_query($conn, $query);

									// Check if the query executed successfully
									if ($result) {
										// Fetch each row from the result set
										while ($row = mysqli_fetch_assoc($result)) {
											// Access the data using the column names
											$id = $row['hospital_id'];
											$name = $row['hospital_name'];
											echo "<li class='completed' onclick='all_hos_disp(" . $id . ")' ><a><p>" . $name . "</p></a><i class='bx bx-chevron-right'></i></li>";
										}
										// Free the result set
										mysqli_free_result($result);
									} else {
										// Handle any errors that occurred during the query execution
										echo "Error: " . mysqli_error($conn);
									}

									// Close the database connection
									mysqli_close($conn);
									?>
									<!-- <li class="completed">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li> -->
									<!--<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>-->
								</ul>
							</div>

							<div class="order" id="hos_id_page" style="display:none;">
								<div class="head">
									<h3>Hospital Details</h3>
									<!--<form action="#" class=".emp-search">
							<div class="form-input">
								<input type="search" placeholder="">
								<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
							</div>
						</form>-->
									<box-icon name='x' onclick="document.getElementById('hos_id_page').style.display = 'none';"></box-icon>
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<div id="hs_det_1">
									<p style="font-weight: 600;">Branch Name : United States</p>
									<p style="font-weight: 600; margin-top: 10px;">Total Employees : 7</p>
									<p style="font-weight: 600; margin-top: 10px;">Address : </p>
									<p style="margin-left: 15px; margin-top: 5px; ">Blah Blah Blah Blah Blah BlahBLah Blah BLah Blah</p>
									<img style="margin-top: 15px; width: 600px; height: 300px; " src="hos_dp/default_hos.png" alt="hos_dp">
								</div>
								<!-- <table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Date-of-Birth</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="src/people.png">
									<p>Baodkadaih</p>
								</td>
								<td>01-10-2021</td>
								<td><span class>Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table> -->
							</div>

						</div>
					</div>

					<div id="bdc" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Blood Donation Campaign</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">
							<div class="order">
								<div class="head">
									<h3>Blood Donors</h3>
									<div class="searchb">
										<input type="text" id="searchInput6" placeholder="Search..">
										<i class='bx bx-search'></i>
									</div>
									<!-- <i class='bx bx-search' ></i> -->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<table id="dataTable6">
									<thead>
										<tr>
											<th>Id&nbsp;&nbsp;</th>
											<!-- <th></th> -->
											<th>Name</th>
											<th>Gender</th>
											<th>Blood Group</th>
											<th>Date of Birth</th>
											<th>Phone</th>
											<th>Email</th>
											<!-- <th>Hospital</th> -->
											<th>Address</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "inc/config.php";
										$query = "SELECT * FROM donor_camp";
										$result = mysqli_query($conn, $query);

										if (!$result) {
											die("Query failed: " . mysqli_error($conn));
										} else {
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>";
													echo "<td>" . $row['d_id'] . "&nbsp;&nbsp;</td>";
													echo "<td>" . $row['name'] . "</td>";
													echo "<td>" . ucfirst($row['gender']) . "</td>";
													echo "<td>" . $row['blood_group'] . "</td>";
													echo "<td>" . $row['dob'] . "</td>";
													echo "<td>" . $row['phone_no'] . "</td>";
													echo "<td>" . $row['email'] . "</td>";
													echo "<td>" . $row['address'] . "</td>";
													// echo '<td><button class="vm">View</button></td>';
													echo "</tr>";
												}
											}
										}
										?>

										<!-- <tr>
								<td>Id</td>
								<td><img src="src/people.png"></td>
								<td><p>Baodkadaih</p></td>
								<td>9464515424</td>
								<td>01-10-2021</td>
								<td>ahiugdi@gmail.ocm</td>
								<td><span class>Address Completed</span></td>
							</tr> -->

										<!--<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>-->
									</tbody>
								</table>
							</div>
							<!--<div class="todo">
					<div class="head">
						<h3>Feedbacks</h3>
						<div class="color c1"></div>Unread
						<div class="color c2"></div>Read
						<i class='bx bx-plus' ></i>-->
							<!--<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="completed">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>-->
						</div>
					</div>



					<div id="pass-resets" class="page">
						<div class="head-title">
							<div class="left">
								<h1>Inventory</h1>
								<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
							</div>
							<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download Report</span>
				</a>-->
						</div>

						<!--<ul class="box-info">
				<li>
					<i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1024</h3>
						<p>Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>jfhgfy    gfwuer</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Total Payments Recieved</p>
					</span>
				</li>
			</ul>-->


						<div class="table-data">

							<div class="todo" id="inventory">
								<div class="head">
									<h3>Items in Inventory</h3>
									<!-- <div class="color c1"></div>Unread
						<div class="color c2"></div>Read -->
									<i class='bx bx-plus' onclick="addinvfun()"></i>
									<div class="searchb">
										<input type="text" id="searchInputinv" onkeyup="myFunctioninv()" placeholder="Search..">
										<i class='bx bx-search'></i>
									</div>
									<!-- <i class='bx bx-filter' ></i> -->
								</div>
								<ul class="todo-list" id="inventoryList">
									<?php
									include "inc/config.php";

									$query = "SELECT * FROM inventory";
									$result = mysqli_query($conn, $query);

									if (!$result) {
										die("Error in connection" . mysqli_error($conn));
									}

									while ($row = mysqli_fetch_assoc($result)) {
										// Access the data using $row['column_name']
										$invId = $row['id'];
										echo "<li class='med' style='cursor: pointer;' onclick='loadinv(" . $invId . ")'><a style='display:flex; justify-content:space-between; align-items: center;'>";
										echo "<p>" . $row['name'] . "</p></a>";
										echo "<i class='bx bx-chevron-right'></i>";
										echo "</li>";
									}
									?>


									<!-- <li class="med">
							<p>Luttappi</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="comp">
							<p>Dakini</p>
							<i class='bx bx-chevron-right'></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li> -->
								</ul>
							</div>
							<div class="order" id="inv_det_cap" style="display: none;">
								<div class="head">
									<h3></h3>
									<!--<form action="#" class=".emp-search">
							<div class="form-input">
								<input type="search" placeholder="">
								<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
							</div>
						</form>-->
									<!-- <i class='bx bx-search' ></i> -->
									<box-icon name='x' style="cursor: pointer;" onclick="document.getElementById('inv_det_cap').style.display = 'none';"></box-icon>
									<!-- <i class='bx bx-x' ></i> -->
									<!--<i class='bx bx-filter' ></i>-->
								</div>
								<div style=" padding: 10px; margin-top: 20px; " id="inv_div">
									<h2 style="opacity: .7;">ITEM NAME</h2>
									<h4 style="margin-top: 10px; margin-left:20px; opacity: .7;">CATEGORY : MEDICINE </h4>
									<h4 style="margin-top: 10px; margin-left:20px; opacity: .7;">PRICE : 10.00 </h4>
									<h4 style="margin-top: 10px; margin-left:20px; opacity: .7;">QUANTITY : 10 (Pcs)</h4>
									<h4 style="margin-top: 10px; margin-left:20px; opacity: .7;"> DESCRIPTION :</h4>
									<div style="margin-top: 10px; margin-left: 25px;">
										<p>Blah Blah Blah Blah Blah Blah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah BlahBlah Blah Blah Blah Blah</p>
									</div>
								</div>
								<!-- <table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Date-of-Birth</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="src/people.png">
									<p>Baodkadaih</p>
								</td>
								<td>01-10-2021</td>
								<td><span class>Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table> -->
							</div>
						</div>

					</div>



				</section>
			</main>
			<!-- MAIN -->
		</section>
		<!-- CONTENT -->

		<section id="popup" style="display: none;">
			<section id="addinv" style="display: none;">
				<form id="invaddform" style="display:flex; align-items:center; justify-content:center;  ">

					<div style="display: block; padding: 20px; background: white; border-top: 4px solid teal; border-radius: 4px; ">
						<box-icon name='x' style="margin-left: 305px;" onclick="document.getElementById('popup').style.display = 'none';document.getElementById('addinv').style.display = 'none';"></box-icon>
						<div style="padding: 10px;">
							<input type="text" id="c3" style="width: 320px;padding: 10px;" name="fname" placeholder="Name" required>
						</div>
						<div style="padding: 10px;">
							<select style="width: 320px; padding: 10px;" name="category" id="med" required>
								<option value="">Category</option>
								<option value="Medicine">Medicine</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div style="padding: 10px;">
							<input type="number" style="width: 320px;padding: 10px;" name="price" id="n4" placeholder="Price" required>
						</div>
						<div style="padding: 10px;">
							<input type="number" style="width: 320px;padding: 10px;" name="quantity" id="n4" placeholder="Quantity" required>
						</div>
						<div style="padding: 10px;">
							<textarea style="width: 320px; height: 176px; padding: 10px; resize: none;" name="desc" required placeholder="Description"></textarea>
						</div>
						<div style="padding: 10px; display:flex; align-items: center; justify-content: flex-end; ">
							<button id="button_inv_sub" style="padding: 10px; border: none; border-radius: 4px; background: teal; color: white; ">Add Medicine</button>
						</div>
					</div>
				</form>
			</section>

			<section class="full" id="empadd" style="display: none;">
				<form id="myEmpAddForm">
					<div class="outter">
						<div class="info" style="background:white;">
							<div id="preview">
								<img style=" margin-top: 20px; margin-left: 25px; border-radius: 50%; width: 200px; height: 200px;" id="output" />
								<script>
									var loadFile = function(event) {
										var reader = new FileReader();
										reader.onload = function() {
											var output = document.getElementById('output');
											output.src = reader.result;
										};
										reader.readAsDataURL(event.target.files[0]);
									};
								</script>
							</div>
							<div class="cat op">
								<input type="file" onchange="loadFile(event)" name="dp" id="dp" style="margin-left:80px; margin-bottom: 10px;" accept="image/*">

								<!-- <button style="margin-left:-60px;" type="submit">Upload</button> -->
								<!--div class="p1"><input type="text" required list="job" placeholder="Designation" id="doc"></div>
                  <select name="doc" id="doc">
                    <option value="">Designation</option>
                    <option value="DOCTOR">DOCTOR</option>
                    <option value="NURSE">NURSE</option>
                    <option value="OTHER STAFF"> OTHER </option>
                  </select-->
							</div>
						</div>
						<div class="form">

							<i class='bx bx-x' id="cl-ico" onclick="document.getElementById('popup').style.display='none';"></i>
							<div class="details">
								<div class="items">
									<ul>
										<li>
											<input type="text" name="ename" required>
											<span>Name</span>
										</li>
										<label id="l1">Gender</label>
										<li class="gender" style="margin-top: 2px;">
											<input type="radio" value="Male" name="esex"> Male
											<input type="radio" value="Female" name="esex">Female
											<input type="radio" value="Other" name="esex">Other
										</li>
										<li>
											<input type="text" required onfocus="(this.type='date')" name="edob" onfocusout="(this.type='text')">
											<span>Date of Birth(dd/mm/yyyy)</span>
										</li>
										<li>
											<input type="number" required id="c4" name="ephno" style="margin-top: 20px;">
											<span>Phone No</span>
										</li>
										<li>
											<div class="k1" style="margin-top: 25px;">
												<input type="text" name="espec" required>
												<span>Specification</span>
											</div>

										</li>

									</ul>
								</div>

								<div class="items1">
									<ul>
										<li>
											<input type="mail" name="eemail" required>
											<span>E-mail</span>
										</li>
										<label for="doc" style="margin-left: 10px;" class="p">Hospital</label>
										<li>
											<select name="hos" required>
												<option value="">--Select Hopsital--</option>
												<?php
												// Assuming you have already established a connection to the database

												// Query to fetch all data from the "hospitals" table
												$query = "SELECT * FROM hospitals";
												$result = mysqli_query($conn, $query);

												// Check if the query executed successfully
												if ($result) {
													// Fetch each row from the result set
													while ($row = mysqli_fetch_assoc($result)) {
														// Access the data using the column names
														$id = $row['hospital_id'];
														$name = $row['hospital_name'];
														// $address = $row['address'];
														// $phone = $row['phone'];
														echo "<option value='" . $id . "'>" . $name . "</option>";
														// Process or display the data as needed
														// echo "ID: $id<br>";
														// echo "Name: $name<br>";
														// echo "Address: $address<br>";
														// echo "Phone: $phone<br><br>";
													}

													// Free the result set
													mysqli_free_result($result);
												} else {
													// Handle any errors that occurred during the query execution
													echo "Error: " . mysqli_error($conn);
												}

												// Close the database connection
												mysqli_close($conn);
												?>

											</select>
										</li>
										<li style="margin-top: 20px;">
											<input type="text" name="ewd" required>
											<span>Working Days</span>
										</li>
										<li class="t" style="margin-top: -10px;">
											<textarea id="txtar" name="ead" required></textarea>
											<span>Address</span>
										</li>
									</ul>
								</div>

								<div class="item">
									<button type="button" style="padding: 10px 20px; background: teal; border:none; border-radius:4px; color: white; width: 150px; margin-left: 330px;" id="emp_sub_button">Submit</button>
								</div>

							</div>
						</div>
					</div>
					</div>
				</form>
			</section>

			<section class="full2" id="patadd" style="display: none;">
				<form id="patAddForm">
					<div class="outter2">
						<div class="form2">
							<i class='bx bx-x' id="cl-ico" onclick="document.getElementById('popup').style.display='none';"></i>
							<img src="src/6.png" alt="">

							<div class="details2">
								<div class="items2">
									<ul>
										<li>
											<input type="text" name="fname" required>
											<span>Name</span>
										</li>
										<li>
											<!--input type="age" required>
                                <span>Age</span-->
										</li>
										<label id="l1">Gender</label>
										<li class="gender2" style="margin-top: 30px;">
											<input type="radio" value="Male" name="sex"> Male
											<input type="radio" value="Female" name="sex">Female
											<input type="radio" value="Other" name="sex">Other
										</li>
										<li style="margin-top: 35px;">
											<input type="number" name="phno" required id="c4">
											<span>Phone No</span>
										</li>
									</ul>
								</div>

								<div class="items12">
									<ul>
										<li>
											<input type="text" required onfocus="(this.type='date')" name="dob" onfocusout="(this.type='text')">
											<span>Date of Birth(dd/mm/yyyy)</span>
										</li>
										<li>
											<input type="mail" name="email" required>
											<span>E-mail</span>
										</li>
										<!--li>
                                <input type="text" required>
                                <span>Prescribed Doctor</span>
                            </li-->
										<li>
											<input type="text" name="hn" required>
											<span>House Name</span>
										</li>


										<li>
											<input type="text" name="place" required>
											<span>Place</span>
										</li>

									</ul>
								</div>

								<div class="item2_button">
									<button type="button" onclick="submitForm_pat()">Submit</button>
								</div>

							</div>
						</div>

					</div>
					</div>
				</form>
			</section>
			<script>
				var c4 = document.getElementById("c4");

				c4.addEventListener("input", function() {
					if (this.value.length > 10) {
						this.value = this.value.slice(0, 10);
					}
				});

				var doc = document.getElementById("doc");
				var doc1 = document.querySelector('.k1');
				//   doc.addEventListener("change",function(){
				//     if(this.value=='DOCTOR'){
				//         doc1.style.display='block';
				//     }
				//     if(this.value!='DOCTOR'){
				//         doc1.style.display='none';
				//     }
				//   });
				var cl_ico = document.getElementById("cl-ico");
				cl_ico.addEventListener("click", function() {
					document.getElementById("popup").style.display = "none";
				});
			</script>
		</section>
		<section class="prf" id="prf">
			<div class="profile">
				<ul>
					<li>Profile</li>
					<li>Change Password</li>
				</ul>
			</div>
		</section>
		<section id="notif">
			<div id="notif_pat_insert_success" style="display: none;">
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<box-icon name='check-circle' type='solid' size="60px" color="green"></box-icon>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<h3>Success</h3>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<p>Patient details added successfully</p>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<button style="padding: 10px; border:none; border-radius: 4px; color: white; background: teal; " onclick="document.getElementById('notif').style.display = 'none';">Done</button>
				</div>
			</div>

			<div id="notif_emp_insert_success" style="display: none;">
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<box-icon name='check-circle' type='solid' size="60px" color="green"></box-icon>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<h3>Success</h3>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<p>Employee details added successfully</p>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<button style="padding: 10px; border:none; border-radius: 4px; color: white; background: teal; " onclick="document.getElementById('notif').style.display = 'none';">Done</button>
				</div>
			</div>

			<div id="notif_inv_insert_success" style="display: none;">
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<box-icon name='check-circle' type='solid' size="60px" color="green"></box-icon>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<h3>Success</h3>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<p>Item added added successfully</p>
				</div>
				<div style="display: flex; align-items: center; justify-content: center; padding: 5px;">
					<button style="padding: 10px; border:none; border-radius: 4px; color: white; background: teal; " onclick="document.getElementById('notif').style.display = 'none';">Done</button>
				</div>
			</div>
		</section>
		<section id="vm_page_sec" style=" position: absolute; width: 100%; height: 100vh; top: 0; display: none; align-items: center; justify-content: center; background: rgba(128, 128, 128, 0.571); z-index: 2000; padding: 40px; ">
			<div style="overflow: scroll; background: white; border-top: 4px solid teal; border-radius: 5px; padding: 10px; width: 100%; height: 90vh; " id="vm_page">
				<box-icon name='x' style="margin-left: 98%;" onclick="document.getElementById('vm_page_sec').style.display = 'none';"></box-icon>
				<div style="margin-top: 10px; margin-bottom: 10px; padding: 10px; ">
					<h2>Patient Details</h2>
				</div>
				<div style="margin-bottom: 10px; padding: 10px; ">
					<div style="display: flex; align-items: center; justify-content: space-around; margin-bottom: 20px;height: 380px;  ">
						<div style="background: white; padding: 10px; margin-top: -180px; ">
							<p style="margin-bottom: 10px; font-size:20px; font-weight: 600; ">Personal Details</p>
							<div id="vm_pat_det_page">
								<p>Name : John Doe</p>
								<p>Gender : Male</p>
								<p>Age : 21</p>
								<p>DoB : 07/07/2001</p>
								<p>Phone No : 9446898290</p>
								<p>Email : arjunlaiju0@gmail.com</p>
								<p>Address : House name, Place, City, State, Pincode</p>
							</div>
						</div>
						<div style=" border: 2px solid gainsboro; border-radius:4px; padding:10px; position: static;margin-top: -80px;height: 300px; overflow:scroll;">
							<h5 style="margin: 10px 0;">Appointments (from today)</h5>
							<div style="display:flex; align-items: center; justify-content: space-between; padding: 10px; margin-left: 10px; ">
								<table style="width: 100%;">
									<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; ">
										<th style="border: 2px solid #d5d5d5; padding: 10px; ">Doctor Name</th>
										<th style="border: 2px solid #d5d5d5; padding: 10px; ">Appointment Date</th>
										<th style="border: 2px solid #d5d5d5; padding: 10px; ">Appointment Time</th>
										<th style="border: 2px solid #d5d5d5; padding: 10px; ">Hospital</th>
										<!-- <th style="border: 2px solid #d5d5d5;padding: 10px; ">Blah Blah</th> -->
									</tr>
									<tbody id="app_ul_list1">
										<!-- <tr>
						<td colspan="4" align="center">-- No valid appointments --</td>
					</tr> -->
										<!-- <tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " > 
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">12.30 PM - 01.00 PM</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">United States</td>
			</tr> -->
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<h5 style=" margin-bottom: 10px;">Medical History :</h5>
					<div style="display:flex; align-items: center; justify-content: space-between; padding: 10px; margin-left: 10px; ">
						<table style="width: 100%;">
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; ">
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Disease</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Treated Doctor</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Prescription</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Modified Date</th>
								<th style="border: 2px solid #d5d5d5;padding: 10px; ">Modified time</th>
							</tr>
							<tbody id="med_det_vm">
								<!-- <tr>
					<td colspan="5" align="center">-- No Medical History --</td>
				</tr> -->
								<!-- <tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">12.30 PM - 01.00 PM</td>
				<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">2023-05-19 17:36:23</td>
				<td align="center" style="border: 2px solid #d5d5d5;padding: 10px; ">Date Exceeded</td>
			</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>

		<section id="det_page_doc" style="position: absolute;top: 0; display: none; align-items:center; justify-content:center; background: #808080ba; width: 100%; height: 100vh; z-index: 2000; ">
			<div style="overflow: scroll; background: white; border-radius: 5px; border-top: 4px solid teal; padding: 10px; width: 95%; height: 90vh; ">
				<div style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px; margin-right: 10px; ">
					<h1>&nbsp;&nbsp;&nbsp;&nbsp;Employee Details</h1>
					<box-icon name='x' onclick="document.getElementById('det_page_doc').style.display = 'none'"></box-icon>
				</div>
				<div id="doc_per_det" style="display: flex; align-items: center; justify-content: flex-start; margin-top: 20px; padding: 10px; background: white; ">
					<img id="doc_per_det_dp" src="dp/default.png" style="height: 280px; width: 250px; margin-right: 100px; margin-left: 50px; " alt="profile">
					<div id="doc_per_det1" style="padding: 10px; height: 280px; ">
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Name : John Doe</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Specialization : Neurology</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Gender : Male</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Age : 65</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Phone Number : 6238582279</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Email : johndoe@mail.com</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Residential Address : </p>
						<p style="font-size: 18px; font-weight: 500; margin-bottom: 10px;margin-left: 10px;">AddressAddressAddressAddressAddressAddress</p>
					</div>
					<div id="doc_per_det2" style="padding: 10px; margin-left: 50px; height: 280px; ">
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Current Working Hospital : United States</p>
						<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Current Working Days :
						<div style="width: 250px; margin-left:30px; font-size: 16px; display: flex; justify-content:space-around">
							<div>
								<p style=" padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d1">Sunday</p>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d3">Tuesday</p>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d5">Thursday</p>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d7">Saturday</p>
							</div>
							<div>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d2">Monday</p>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d4">Wednesday</p>
								<p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d6">Friday</p>
							</div>
							</p>
						</div>
					</div>
				</div>
				<div style="display: flex; align-items: center; justify-content: flex-start; padding-left:15px; margin-top: 10px; ">
					<div style=" margin-top: 10px; margin-left: 40px; margin-right: 100px; ">
						<h1 style="margin-bottom: 15px;">Appointments Today</h1>
						<table style="width: 100%;">
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; ">
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Patient Name</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Time</th>
								<!-- <th style="border: 2px solid #d5d5d5; padding: 10px; ">Appointment Time</th>
							<th style="border: 2px solid #d5d5d5; padding: 10px; ">Hospital</th> -->
								<!-- <th style="border: 2px solid #d5d5d5;padding: 10px; ">Blah Blah</th> -->
							</tr>
							<tbody id="doc_apps_today">
								<tr>
									<td colspan="2" align="center">-- No appointments for today --</td>
								</tr>
								<!-- <tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
							</tr> -->
							</tbody>
						</table>
					</div>
					<div style=" margin-top: 10px; margin-left: 40px; ">
						<h1 style="margin-bottom: 15px;">All Appointments</h1>
						<table style="width: 100%;">
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; ">
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Patient Name</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Time</th>
								<th style="border: 2px solid #d5d5d5; padding: 10px; ">Date</th>
								<!-- <th style="border: 2px solid #d5d5d5; padding: 10px; ">Hospital</th> -->
								<!-- <th style="border: 2px solid #d5d5d5;padding: 10px; ">Blah Blah</th> -->
							</tr>
							<tbody id="doc_apps_active">
								<tr>
									<td colspan="3" align="center">-- You don't have any appointments --</td>
								</tr>
								<!-- <tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
							</tr>
							<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " >
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >Roy Mathews</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">09.00 AM - 9.30 PM</td>
								<td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">07/07/2001</td>
							</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
		<script src="js/script.js"></script>
	</body>

	</html>
<?php
}

?>