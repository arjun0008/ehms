var mySlotapps = ["09.00 AM - 09.30 AM","09.30 AM - 10.00 AM","10.00 AM - 10.30 AM","10.30 AM - 11.00 AM","11.00 AM - 11.30 AM","11.30 AM - 12.00 PM",];
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i => {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

function cur_display(divId) {
	const alldiv = document.querySelector('.pages .page.is-active');
	alldiv.classList.remove('is-active');
	const newdiv = document.getElementById(divId);
	newdiv.classList.add('is-active');
}

// TOGGLE SIDEBAR
// const menuBar = document.querySelector('#content nav .bx.bx-menu');
// const sidebar = document.getElementById('sidebar');


// menuBar.addEventListener('click', function () {
// 	sidebar.classList.toggle('hide');
// 	const Ehms =document.getElementById('logo');
// 	Ehms.style.opacity=Ehms.style.opacity=="1"?"0":"1";
// 	/*if(Ehms.style.opacity=="1"){
// 		Ehms.style.opacity="0";
// 	}
// 	else{
// 		Ehms.style.opacity="1";
// 	}*/	

// });







// const searchButton = document.querySelector('#content nav form .form-input button');
// const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
// const searchForm = document.querySelector('#content nav form');

// searchButton.addEventListener('click', function (e) {
// 	if (window.innerWidth < 576) {
// 		e.preventDefault();
// 		searchForm.classList.toggle('show');
// 		if (searchForm.classList.contains('show')) {
// 			searchButtonIcon.classList.replace('bx-search', 'bx-x');
// 		} else {
// 			searchButtonIcon.classList.replace('bx-x', 'bx-search');
// 		}
// 	}
// })



// if (window.innerWidth < 768) {
// 	sidebar.classList.add('hide');
// } else if (window.innerWidth > 576) {
// 	searchButtonIcon.classList.replace('bx-x', 'bx-search');
// 	searchForm.classList.remove('show');
// }


// window.addEventListener('resize', function () {
// 	if (this.innerWidth > 576) {
// 		searchButtonIcon.classList.replace('bx-x', 'bx-search');
// 		searchForm.classList.remove('show');
// 	}
// })



// const switchMode = document.getElementById('switch-mode');

// switchMode.addEventListener('change', function () {
// 	if (this.checked) {
// 		document.body.classList.add('dark');
// 	} else {
// 		document.body.classList.remove('dark');
// 	}
// })

function addemp(){
	document.getElementById("patadd").style.display = "none";
	document.getElementById("addinv").style.display = "none";
	document.getElementById("popup").style.display = "flex";
	document.getElementById("empadd").style.display = "flex";
}
function addpat(){
	document.getElementById("addinv").style.display = "none";
	document.getElementById("empadd").style.display = "none";
	document.getElementById("popup").style.display = "flex";
	document.getElementById("patadd").style.display = "flex";
}
function addinvfun(){
	document.getElementById("patadd").style.display = "none";
	document.getElementById("empadd").style.display = "none";
	document.getElementById("popup").style.display = "flex";
	document.getElementById("addinv").style.display = "flex";
}

// var image = document.getElementById("pro-pic");
// var imageSection = document.getElementById("prf");

// image.addEventListener("focus", function() {
// 	imageSection.style.display = "block";
// });

// // image.addEventListener("blur", function() {
// // 	imageSection.style.display = "none";
// // });

function pro(){
	document.getElementById('prf').style.display = 'block';
}
function proo(){
	document.getElementById('prf').style.display = 'none';
}

function setupTableSearch(searchInputId, tableId) {
	const searchInput = document.getElementById(searchInputId);
	const dataTable = document.getElementById(tableId);
  
	searchInput.addEventListener('input', function () {
	  const searchValue = this.value.trim();
  
	  const rows = dataTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  
	  for (let row of rows) {
		const cells = row.getElementsByTagName('td');
  
		for (let i = 1; i < cells.length - 1; i++) {
		  const cell = cells[i];
		  const cellText = cell.textContent;
		  const highlightedCellText = highlightMatchingText(cellText, searchValue);
		  cell.innerHTML = highlightedCellText;
		}
  
		const rowData = row.textContent;
		if (rowData.toLowerCase().includes(searchValue.toLowerCase())) {
		  row.style.display = 'table-row';
		} else {
		  row.style.display = 'none';
		}
	  }
	});
  
	function highlightMatchingText(text, searchValue) {
	  const regex = new RegExp(`(${escapeRegex(searchValue)})`, 'gi');
	  return text.replace(regex, '<span style="color: red;">$1</span>');
	}
  
	function escapeRegex(string) {
	  return string.replace(/[.*+\-?^${}()|[\]\\]/g, '\\$&');
	}
  }
  
  // Usage example:
//   setupTableSearch('searchInput', 'dataTable');

function submitForm_pat() {
	var form = document.getElementById('patAddForm');
	var formData = new FormData(form);
	console.log(formData);
	var xhr_pat = new XMLHttpRequest();
	xhr_pat.onreadystatechange = function() {
		if (xhr_pat.readyState === 4 && xhr_pat.status === 200) {
		  var response = xhr_pat.responseText;
		  console.log(response); // Handle the response from the PHP script
		  document.getElementById("popup").style.display = "none";
		  document.getElementById("notif").style.display = "flex";
		  document.getElementById("notif_emp_insert_success").style.display = "none";
		  document.getElementById("notif_inv_insert_success").style.display = "none";
		  document.getElementById("notif_pat_insert_success").style.display = "block";
		  // Optionally, perform additional actions based on the response
		}
	  };
	  xhr_pat.open("POST", "process_pat.php", true);
	  xhr_pat.send(formData);
}

function loadmsgfeed(fid){
	xhrf = new XMLHttpRequest();
	xhrf.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
	
			var data = JSON.parse(this.responseText);
			console.log(JSON.parse(this.responseText));

			document.getElementById("msgc").style.display = "block";
			var cl_ic = "<box-icon name='x' style='cursor: pointer;' onclick=\"document.getElementById('msgc').style.display = 'none';\"></box-icon>";
			document.getElementById("msgc").innerHTML = cl_ic+"<div class='head' style='margin-left: 20px;margin-top: 20px; display: block;'><h3>"+ data[0].subject+"</h3><div style='display: flex;'><p style='font-size: 12px;'>"+data[0].date+" : "+data[0].email+"</p></div></div><div id='fmsg' style='margin-top: 20px; margin-left: 20px;'><p>"+data[0].message +"</p></div>"
			var msqid ="fmsg"+fid;
			document.getElementById(msqid).className = '';
			document.getElementById(msqid).classList.add("not-completed");
			document.getElementById("noti_num").innerHTML = data['count'];

		}
	}
	var url = "set_read.php?id="+fid;
	xhrf.open("GET",url,true);
	xhrf.send();
}

function loadinv(iid){
	var xhri = new XMLHttpRequest();
	xhri.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
	
			var data = JSON.parse(this.responseText);
			console.log(JSON.parse(this.responseText));

			document.getElementById("inv_det_cap").style.display = "block";
			var iname = convertToUppercase(data[0].name);
			var icat = convertToUppercase(data[0].category);
			var iprice = data[0].price;
			var iquantity = data[0].quantity;
			var idesc = data[0].description;
			document.getElementById("inv_div").innerHTML = "<h2 style='opacity: .7;' >"+iname+"</h2><h4 style='margin-top: 10px; margin-left:20px; opacity: .7;' >CATEGORY : "+icat+" </h4><h4 style='margin-top: 10px; margin-left:20px; opacity: .7;'>QUANTITY : "+iquantity+" (Pcs)</h4><h4 style='margin-top: 10px; margin-left:20px; opacity: .7;'>PRICE : "+iprice+" </h4><h4 style='margin-top: 10px; margin-left:20px; opacity: .7;'> DESCRIPTION :</h4><div style='margin-top: 10px; margin-left: 25px;' ><p>"+idesc+"</p></div>";

		}
	}
	var url = "read_inv.php?id="+iid;
	xhri.open("GET",url,true);
	xhri.send();
}

function convertToUppercase(str) {
	return str.toUpperCase();
  }

  function myFunctioninv() {
	var input, filter, ul, li, a, i, txtValue;
	input = document.getElementById("searchInputinv");
	filter = input.value.toUpperCase();
	ul = document.getElementById("inventoryList");
	li = ul.getElementsByTagName("li");

	for (i = 0; i < li.length; i++) {
	  a = li[i].getElementsByTagName("a")[0];
	  txtValue = a.textContent || a.innerText;

	  if (txtValue.toUpperCase().indexOf(filter) > -1) {
		li[i].style.display = "";
		a.innerHTML = highlightMatch(txtValue, filter);
	  } else {
		li[i].style.display = "none";
	  }
	}
  }

  function highlightMatch(text, query) {
	var regex = new RegExp('(' + query + ')', 'gi');
	return text.replace(regex, '<span class="highlight">$1</span>');
  }

  var searchInput = document.getElementById('searchInputinv');
  searchInput.addEventListener('input', myFunctioninv);

  function not_display(divId){
	var liElements = document.querySelectorAll('.side-menu li');
		liElements.forEach(function(li) {
		li.classList.remove('active');
	});
	document.getElementById("notific").classList.add("active");
	const alldiv = document.querySelector('.pages .page.is-active');
	alldiv.classList.remove('is-active');
	const newdiv = document.getElementById(divId);
	newdiv.classList.add('is-active');
  }

//   function submitForm_emp() {
// 	var form = document.getElementById('myEmpAddForm');
// 	var formData = new FormData(form);
// 	console.log(formData);
// 	var xhr_emp = new XMLHttpRequest();
// 	xhr_emp.onreadystatechange = function() {
// 		if (xhr_emp.readyState === 4 && xhr_emp.status === 200) {
// 		  var response = xhr_emp.responseText;
// 		  console.log(response); // Handle the response from the PHP script
// 		  document.getElementById("popup").style.display = "none";
// 		  document.getElementById("notif").style.display = "flex";
// 		  document.getElementById("notif_emp_insert_success").style.display = "block";
// 		  // Optionally, perform additional actions based on the response
// 		}
// 	  };
// 	  xhr_emp.open("POST", "process_emp.php", true);
// 	  xhr_emp.send(formData);
// }

// Get the form element
var form_emp = document.getElementById('myEmpAddForm');

// Get the button element
var button = document.getElementById('emp_sub_button');

// Add event listener for button click
button.addEventListener('click', function(event) {
  event.preventDefault(); // Prevent button's default behavior
  
  // Create a new FormData object
  var formData = new FormData(form_emp);

  // Send the form data via AJAX
  var xhr_emp = new XMLHttpRequest();
  xhr_emp.open('POST', 'insert_data.php', true);
  xhr_emp.onreadystatechange = function() {
    if (xhr_emp.readyState === 4 && xhr_emp.status === 200) {
      // Handle the response from the server
      console.log(xhr_emp.responseText);
	  document.getElementById("popup").style.display = "none";
	document.getElementById("notif").style.display = "flex";
	document.getElementById("notif_inv_insert_success").style.display = "none";
		  document.getElementById("notif_pat_insert_success").style.display = "none";
	  document.getElementById("notif_emp_insert_success").style.display = "block";
    }
  };
  xhr_emp.send(formData);
});

function loadmsgfeed123(fid){
	xhrf = new XMLHttpRequest();
	xhrf.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
	
			var data = JSON.parse(this.responseText);
			console.log(JSON.parse(this.responseText));
			var divId123 = "notifications";
			not_display(divId123);
			document.getElementById("msgc").style.display = "block";
			var cl_ic = "<box-icon name='x' style='cursor: pointer;' onclick=\"document.getElementById('msgc').style.display = 'none';\"></box-icon>";
			document.getElementById("msgc").innerHTML = cl_ic+"<div class='head' style='margin-left: 20px;margin-top: 20px; display: block;'><h3>"+ data[0].subject+"</h3><div style='display: flex;'><p style='font-size: 12px;'>"+data[0].date+" : "+data[0].email+"</p></div></div><div id='fmsg' style='margin-top: 20px; margin-left: 20px;'><p>"+data[0].message +"</p></div>"
			var msqid ="fmsg"+fid;
			document.getElementById(msqid).className = '';
			document.getElementById(msqid).classList.add("not-completed");
			document.getElementById("noti_num").innerHTML = data['count'];

		}
	}
	var url = "set_read.php?id="+fid;
	xhrf.open("GET",url,true);
	xhrf.send();
}


function load_record(rid) {
	// Create an XMLHttpRequest object
	var xhr = new XMLHttpRequest();
  
	// Set the request URL with the rid as a GET parameter
	var url = 'load_rec.php?rid=' + rid;
  
	// Set the request method to GET
	xhr.open('GET', url, true);
  
	// Set the event listener for handling the response
	xhr.onreadystatechange = function () {
	  if (xhr.readyState === 4 && xhr.status === 200) {
		// Parse the JSON response
		var data = JSON.parse(xhr.responseText);
  
		// Access the data and perform further processing
		console.log(data);
		// Process the data here
  
		// Example: Display the patient name
		var patientName = data.patient.name;
		console.log('Patient Name:', patientName);
		document.getElementById("rec_show").style.display = "block"; 
		document.getElementById("rec_show_1").innerHTML = `<table><thead><tr><th>Patient Name : ${data.patient.name}</th><th>DOB : ${data.patient.dob}</th><th>Gender : ${data.patient.gender}</th><th><button onclick='fetchDatavm1(${data.patient.patient_id});' class='vm'>View</button></th></tr></thead></table><div><h4 style='margin-top: 20px; margin-bottom: 10px;' >Disease Information</h4><div><p>${data.record.disease_info}</p></div><h4 style='margin-top: 20px; margin-bottom: 10px;'>Prescriptions</h4><div><p>${data.record.prescription}</p></div></div>`;
	  }
	};
  
	// Send the request
	xhr.send();
  }
  
  function myFunctionrec() {
	var input, filter, ul, li, a, i, txtValue;
	input = document.getElementById("searchInputrec");
	filter = input.value.toUpperCase();
	ul = document.getElementById("recList");
	li = ul.getElementsByTagName("li");

	for (i = 0; i < li.length; i++) {
	  a = li[i].getElementsByTagName("a")[0];
	  txtValue = a.textContent || a.innerText;

	  if (txtValue.toUpperCase().indexOf(filter) > -1) {
		li[i].style.display = "";
	  } else {
		li[i].style.display = "none";
	  }
	}
  }

  var searchInput = document.getElementById('searchInputrec');
  searchInput.addEventListener('input', myFunctionrec);

  var button_inv_sub = document.getElementById("button_inv_sub");
  button_inv_sub.addEventListener('click', function(event) {
	event.preventDefault();
	// Get form data
	var form = document.getElementById("invaddform");
	var formData = new FormData(form);
  
	// Create XHR object
	var xhr_inv = new XMLHttpRequest();
  
	// Configure XHR request
	xhr_inv.open("POST", "invinsert_data.php", true);
  
	// Handle XHR response
	xhr_inv.onreadystatechange = function() {
		if (xhr_inv.readyState === 4 && xhr_inv.status === 200) {
		  var response = xhr_inv.responseText;
		  console.log(response); // Handle the response from the PHP script
		  document.getElementById("popup").style.display = "none";
		  document.getElementById("notif").style.display = "flex";
		  document.getElementById("notif_emp_insert_success").style.display = "none";
		  document.getElementById("notif_pat_insert_success").style.display = "none";
		  document.getElementById("notif_inv_insert_success").style.display = "block";
		  // Optionally, perform additional actions based on the response
		}
	  };
  
	// Send the form data
	xhr_inv.send(formData);
  });
  
  function fetchDatavm1(patientId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_data.php?patientId=" + patientId, true);
    xhr.responseType = "json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var data = xhr.response;
                var patientName = data.patient.name;
                var patientGender = data.patient.gender;
                var patientDOB = data.patient.dob;
                var patientAge = calculateAge1(patientDOB);
                var patientPhone = data.patient.phone_no;
                var patientEmail = data.patient.email;
                var patientAddress = data.patient.address;
                document.getElementById("vm_pat_det_page").innerHTML = "<p>Name : " + patientName + "</p><p>Gender : " + patientGender + "</p><p>Age : " + patientAge + "</p><p>DoB : " + patientDOB + "</p><p>Phone No : " + patientPhone + "</p><p>Email : " + patientEmail + "</p><p>Address : " + patientAddress + "</p>";
                var records = data.records;
                if (records.length == 0) {
                    document.getElementById("med_det_vm").innerHTML = '<tr><td colspan="5" align="center">-- No Medical History --</td></tr>';
                }
                for (var i = 0; i < records.length; i++) {
                    renderRecord(records[i]);
                }
                var appointments = data.appointments;
                if (appointments.length == 0) {
                    document.getElementById("app_ul_list1").innerHTML = '<tr><td colspan="4" align="center">-- No valid appointments --</td></tr>';
                }
                for (var j = 0; j < appointments.length; j++) {
                    renderAppointment(appointments[j]);
                }
                document.getElementById("vm_page_sec").style.display = "flex";
            } else {
                console.error("Error: " + xhr.statusText);
            }
        }
    };
    xhr.send();
}

function renderRecord(record) {
    const timestamp = record.datetime;
    const [datePart, timePart] = timestamp.split(' ');
    const [year, month, day] = datePart.split('-');
    const [hours, minutes, seconds] = timePart.split(':');
    const dater = `${year}-${month}-${day}`;
    const timer = `${hours}:${minutes}:${seconds}`;
    var recordDiseaseInfo = record.disease_info;
    var recordPrescription = record.prescription;
    var doc_id = record.did;
    fetchDatadoc(doc_id)
        .then(function(data) {
            var do_name = data[0].name;
            var do_spec = data[0].specialization;
            var recordHtml = "<tr style='align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px;'><td align='center' style='border: 2px solid #d5d5d5; padding: 10px;'>" + recordDiseaseInfo + "</td><td align='center' style='border: 2px solid #d5d5d5; padding: 10px;'>" + do_name + "(" + do_spec + ")</td><td align='center' style='border: 2px solid #d5d5d5; padding: 10px;'>" + recordPrescription + "</td><td align='center' style='border: 2px solid #d5d5d5; padding: 10px; '>" + dater + "</td><td align='center' style='border: 2px solid #d5d5d5;padding: 10px;'>" + timer + "</td></tr>";
            document.getElementById("med_det_vm").innerHTML += recordHtml;
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
}

function renderAppointment(appointment) {
    var appointmentDate = appointment.date;
    var appointmentTime = appointment.slot;
    var did1 = appointment.doc_id;
    fetchDatadoc(did1)
        .then(function(data) {
            var do_id = data[0].hospital_id;
            var do_name = data[0].name;
            var do_spec = data[0].specialization;
            fetchDatahos(do_id)
                .then(function(hosdata) {
                    var hosp_name = hosdata[0].hospital_name;
                    var appointmentHtml = '<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " ><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >' + do_name + '(' + do_spec + ')</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">' + appointmentDate + '</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">' + appointmentTime + '</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">' + hosp_name + '</td></tr>';
                    document.getElementById("app_ul_list1").innerHTML += appointmentHtml;
                })
                .catch(function(error1) {
                    console.error('Error:', error1);
                });
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
}


  
  function fetchDatadoc(doc_id) {
	return new Promise(function(resolve, reject) {
	  var xhr = new XMLHttpRequest();
	  var url = 'fetch_datadoc.php'; // Replace with your PHP script URL
	  var params = 'doc_id=' + doc_id;
  
	  xhr.open('GET', url + '?' + params, true);
	  xhr.onreadystatechange = function() {
		if (xhr.readyState === XMLHttpRequest.DONE) {
		  if (xhr.status === 200) {
			var response = JSON.parse(xhr.responseText);
			resolve(response); // Resolve the promise with the fetched data
		  } else {
			reject(xhr.status); // Reject the promise with the XHR status
		  }
		}
	  };
	  xhr.send();
	});
  }
  
//   function yourFunction() {
// 	var doc_id = 1;
// 	fetchData(doc_id)
// 	  .then(function(data) {
// 		// Use the fetched data here
// 		console.log(data);
// 	  })
// 	  .catch(function(error) {
// 		// Handle any errors that occurred during the fetch
// 		console.error('Error:', error);
// 	  });
//   }
function calculateAge1(dateOfBirth) {
	var dob = new Date(dateOfBirth);
	var today = new Date();
  
	var age = today.getFullYear() - dob.getFullYear();
	var monthDiff = today.getMonth() - dob.getMonth();
  
	if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
	  age--;
	}
  
	return age;
  }
  
  function fetchDatahos(hos_id) {
	return new Promise(function(resolve, reject) {
	  var xhr = new XMLHttpRequest();
	  var url = 'fetch_datahos.php'; // Replace with your PHP script URL
	  var params = 'doc_id=' + hos_id;
  
	  xhr.open('GET', url + '?' + params, true);
	  xhr.onreadystatechange = function() {
		if (xhr.readyState === XMLHttpRequest.DONE) {
		  if (xhr.status === 200) {
			var response = JSON.parse(xhr.responseText);
			resolve(response); // Resolve the promise with the fetched data
		  } else {
			reject(xhr.status); // Reject the promise with the XHR status
		  }
		}
	  };
	  xhr.send();
	});
  }

  function load_emp_det_sec(docId) {
	var xhr_doc_det = new XMLHttpRequest();
	xhr_doc_det.onreadystatechange = function() {
	  if (xhr_doc_det.readyState === 4 && xhr_doc_det.status === 200) {
		var response = JSON.parse(xhr_doc_det.responseText);
		// Use the fetched data here
		console.log(response);
		var doctorData = response.doctorData;
		var appointmentData = response.appointmentData;
		var hosData = response.hosData;
		console.log(doctorData);
		console.log(appointmentData);
		console.log(hosData);
		// Process and display the data as needed
		var doc_dob = doctorData.dob;
		var doc_age = calculateAge(doc_dob);

		var wd_string = doctorData.working_days;
		var numbers = wd_string.split(",").map(Number);
		console.log(numbers); // Output: [1, 2, 3]

		// console.log(age);
		// console.log(doctorData[0].dp);
		document.getElementById("det_page_doc").style.display = "flex";
		document.getElementById("doc_per_det_dp").src = 'dp/'+doctorData.dp;
		document.getElementById("doc_per_det1").innerHTML = `<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Name : ${doctorData.name}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Specialization : ${doctorData.specialization}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Gender : ${doctorData.gender}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Age : ${doc_age}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Phone Number : ${doctorData.phone_no}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Email : ${doctorData.email}</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Residential Address : </p><p style="font-size: 18px; font-weight: 500; margin-bottom: 10px;margin-left: 10px;">${doctorData.address}</p>`;
		document.getElementById("doc_per_det2").innerHTML = '<p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Current Working Hospital : '+hosData.hospital_name+'</p><p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">Current Working Days : <div style="width: 250px; margin-left:30px; font-size: 16px; display: flex; justify-content:space-around"><div><p style=" padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d1" >Sunday</p> <p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d3">Tuesday</p> <p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d5">Thursday</p><p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d7">Saturday</p></div><div><p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d2" >Monday</p> <p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d4">Wednesday</p> <p style="padding: 2px; border:2px solid #00c341; border-radius: 4px; background: #e4fae4; margin-bottom: 5px; " id="d6">Friday</p></div></p></div>';
		//var numbers = wd_array; // Example array of numbers
		// Iterate over the array of numbers
		for (var i = 1; i <= 7; i++) {
		var pTag = document.getElementById("d" + i); // Get the p tag by ID

		// Check if the number exists in the array
		if (numbers.includes(i)) {
			pTag.style.display = "block"; // Set display style to block
		} else {
			pTag.style.display = "none"; // Set display style to none
		}
		}
		var today = new Date(); // Create a new Date object with the current date

		var year = today.getFullYear(); // Get the four-digit year
		var month = String(today.getMonth() + 1).padStart(2, '0'); // Get the month (0-11) and pad with leading zero if needed
		var day = String(today.getDate()).padStart(2, '0'); // Get the day of the month and pad with leading zero if needed

		var formattedDate = year + '-' + month + '-' + day; // Format the date as yyyy-mm-dd

		console.log(formattedDate); // Output: e.g., "2023-05-27"

		if(appointmentData.length > 0){
			for(var i = 0; i<appointmentData.length; i++){
				 console.log(appointmentData[i].pat_id);
				 var dateObject = new Date(appointmentData[i].date);// The date in the variable to compare
				 var year = dateObject.getFullYear();
				var month = String(dateObject.getMonth() + 1).padStart(2, "0");
				var day = String(dateObject.getDate()).padStart(2, "0");
				var formattedDate = `${year}-${month}-${day}`;
				var dateToCompare = new Date(appointmentData[i].date);
				 console.log(dateToCompare);
				var slot = appointmentData[i].slot;
				fetchPatientName(appointmentData[i].pat_id)
				.then(function(patientName) {
				// Use the fetched patient name here
					console.log('Patient Name:', patientName);
					//console.log(appointmentData[i]);
					//console.log(dateToCompare);
					if (formattedDate === dateToCompare) {
						console.log("The dates are the same.");
						document.getElementById("doc_apps_today").innerHTML = '<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " ><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >'+patientName+'</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">'+mySlotapps[slot-1]+'</td></tr>';
						document.getElementById("doc_apps_active").innerHTML = '<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " ><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >'+patientName+'</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">'+mySlotapps[slot-1]+'</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">'+formattedDate+'</td></tr>';
					}
					else {
						console.log("The dates are different.");
						document.getElementById("doc_apps_active").innerHTML = '<tr style=" align-items: center; justify-content: space-between; border: 2px solid #d5d5d5; border-radius: 4px; " ><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; " >'+patientName+'</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">'+mySlotapps[slot-1]+'</td><td align="center" style="border: 2px solid #d5d5d5; padding: 10px; ">'+formattedDate+'</td></tr>';
					}
					
					// Perform further actions or update the UI with the patient name
					//document.getElementById('patientName').textContent = patientName;
				})
				.catch(function(error) {
				// Handle any errors that occurred during the fetch
				console.error('Error:', error);
				});
			}
		}
		else{
			document.getElementById("doc_apps_today").innerHTML = '<tr><td colspan="4" align="center">-- No appointments for today --</td></tr>';
			document.getElementById("doc_apps_active").innerHTML = '<tr><td colspan="4" align="center">-- You don\'t have any appointments --</td></tr>';
		}

	  }
	};
  
	xhr_doc_det.open("GET", "doc_det_fetch_data.php?docId=" + docId, true);
	xhr_doc_det.send();
  }
  

  function calculateAge(dob) {
	var currentDate = new Date();
	var dobDate = new Date(dob);
	var age = currentDate.getFullYear() - dobDate.getFullYear();
	
	var currentMonth = currentDate.getMonth();
	var currentDay = currentDate.getDate();
	var dobMonth = dobDate.getMonth();
	var dobDay = dobDate.getDate();
  
	if (currentMonth < dobMonth || (currentMonth === dobMonth && currentDay < dobDay)) {
	  age--;
	}
	
	return age;
  }
  
//   var dob = '1990-05-27';
//   var age = calculateAge(dob);
//   console.log(age);
// 

function fetchPatientName(patient_id) {
	return new Promise(function(resolve, reject) {
	  var xhr = new XMLHttpRequest();
	  var url = 'fetch_data_pat.php'; // Replace with your PHP script URL
	  var params = 'id=' + patient_id;
		console.log(patient_id);
	  xhr.open('GET', url + '?' + params, true);
	  xhr.onreadystatechange = function() {
		if (xhr.readyState === XMLHttpRequest.DONE) {
		  if (xhr.status === 200) {
			var response = JSON.parse(xhr.responseText);
			console.log(response);
			resolve(response.name); // Resolve the promise with the fetched patient name
		  } else {
			reject(xhr.status); // Reject the promise with the XHR status
		  }
		}
	  };
	  xhr.send();
	});
  }
  

  function all_hos_disp(hos_id){
	var xhr_hos_det = new XMLHttpRequest();
	  var url = 'fetch_datahos.php'; // Replace with your PHP script URL
	  var params = 'doc_id=' + hos_id;
  
	  xhr_hos_det.open('GET', url + '?' + params, true);
	  xhr_hos_det.onreadystatechange = function() {
		if (xhr_hos_det.readyState === 4 && xhr_hos_det.status === 200) {
			var response = JSON.parse(xhr_hos_det.responseText);
			console.log(response);
			document.getElementById("hos_id_page").style.display = "block";
			document.getElementById("hs_det_1").innerHTML = '<p style="font-weight: 600;" >Branch Name : '+response[0].hospital_name+'</p><p style="font-weight: 600; margin-top: 10px;" >Total Employees : '+response.emp_count+'</p><p style="font-weight: 600; margin-top: 10px;" >Address : </p><p style="margin-left: 15px; margin-top: 5px; " >'+response[0].address+'</p><img style="margin-top: 15px; width: 600px; height: 300px; " src="hos_dp/'+response[0].hos_dp+'" alt="hos_dp">';
		 
		}
	  };
	  xhr_hos_det.send();
  }

  function myFunctionhos_search() {
	var input, filter, ul, li, a, i, txtValue;
	input = document.getElementById("searchInputhos");
	filter = input.value.toUpperCase();
	ul = document.getElementById("hosList");
	li = ul.getElementsByTagName("li");

	for (i = 0; i < li.length; i++) {
	  a = li[i].getElementsByTagName("a")[0];
	  txtValue = a.textContent || a.innerText;

	  if (txtValue.toUpperCase().indexOf(filter) > -1) {
		li[i].style.display = "";
		a.innerHTML = highlightMatch(txtValue, filter);
	  } else {
		li[i].style.display = "none";
	  }
	}
  }

  function highlightMatch(text, query) {
	var regex = new RegExp('(' + query + ')', 'gi');
	return text.replace(regex, '<span class="highlight">$1</span>');
  }

  var searchInput = document.getElementById('searchInputhos');
  searchInput.addEventListener('input', myFunctionhos_search);

  // Send record_id and total_amount to PHP script and insert into database
  