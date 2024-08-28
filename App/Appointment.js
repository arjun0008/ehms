var page0 = document.querySelector(".page0");
var page1 = document.querySelector(".page1");
var page2 = document.querySelector(".page2");
var page3 = document.querySelector(".page3");
var page4 = document.querySelector(".page4");

var bt0 = document.querySelector(".bt0");
var bt1 = document.querySelector(".bt1");
var bt2 = document.querySelector(".bt2");
var bt3 = document.querySelector(".bt3");
var bt4 = document.querySelector(".bt4");

var b1 = document.querySelector(".b1");
var b2 = document.querySelector(".b2");
var b3 = document.querySelector(".b3");
var b4 = document.querySelector(".b4");
var b5 = document.querySelector(".b5");
var b6 = document.querySelector(".b6");
var b8 = document.querySelector(".b8");
var b7 = document.querySelector(".b7");

var flagVariable = 0;

var mySlots = ["09.00 AM - 09.30 AM","09.30 AM - 10.00 AM","10.00 AM - 10.30 AM","10.30 AM - 11.00 AM","11.00 AM - 11.30 AM","11.30 AM - 12.00 PM",];
//console.log(mySlots[4]);

var doc_id_name ;
var doc_id_spec ;
var doc_id_hos_id ;
var hospitals;

var he2 = document.querySelector(".he2");
var he3 = document.querySelector(".he3");
var he4 = document.querySelector(".he4");
var he5 = document.querySelector(".he5");

var xhr_hos = new XMLHttpRequest();
xhr_hos.open('GET', 'get_hospitals.php');
xhr_hos.onload = function() {
    if (xhr_hos.status === 200) {
        // Parse the JSON response and store it in an array
        hospitals = JSON.parse(xhr_hos.responseText);
        console.log(hospitals);
    } else {
        console.log('Request failed.  Returned status of ' + xhr_hos.status);
    }
};
xhr_hos.send();

b1.addEventListener("click", function () {
  if (document.getElementById('a0').value == "") {
    document.getElementById('errormsg2').style.display = "flex";
  }
  else {
    if (document.getElementById('c0').value == "") {
      const nodeList = document.querySelectorAll(".errormsg");
      for (let i = 0; i < nodeList.length; i++) {
        nodeList[i].style.display = "none";
      }
      document.getElementById('errormsg3').style.display = "flex";
    }
    else {
      page0.style.display = "none";
      page1.style.display = "block";

      bt0.style.display = "none";
      bt1.style.display = "flex";

      he2.classList.add("h");
    }
  }
});

b2.addEventListener("click", function () {
  const nodeList = document.querySelectorAll(".errormsg");
  for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.display = "none";
  }
  page1.style.display = "none";
  page0.style.display = "block";

  bt1.style.display = "none";
  bt0.style.display = "flex";

  he2.classList.remove("h");
});

b3.addEventListener("click", function () {
  if (document.querySelector('input[name = "slot"]:checked:not(:disabled)') == null) {
    const nodeList = document.querySelectorAll(".errormsg");
    for (let i = 0; i < nodeList.length; i++) {
      nodeList[i].style.display = "none";
    }
    document.getElementById('errormsg4').style.display = "flex";
  }
  else {
    page1.style.display = "none";
    page2.style.display = "block";

    bt1.style.display = "none";
    bt2.style.display = "flex";

    he3.classList.add("h");
  }
});

b4.addEventListener("click", function () {
  const nodeList = document.querySelectorAll(".errormsg");
  for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.display = "none";
  }
  page2.style.display = "none";
  page1.style.display = "block";

  bt2.style.display = "none";
  bt1.style.display = "flex";

  he3.classList.remove("h");
});


b5.addEventListener("click", function () {
  if (document.getElementById('n1').value == "") {
    const nodeList = document.querySelectorAll(".errormsg");
    for (let i = 0; i < nodeList.length; i++) {
      nodeList[i].style.display = "none";
    }
    document.getElementById('errormsg5').style.display = "flex";
  }
  else {
    if (document.querySelector('input[name = "gender"]:checked') == null) {
      const nodeList = document.querySelectorAll(".errormsg");
      for (let i = 0; i < nodeList.length; i++) {
        nodeList[i].style.display = "none";
      }
      document.getElementById('errormsg6').style.display = "flex";
    }
    else {
      if (document.getElementById('c4').value == "") {
        const nodeList = document.querySelectorAll(".errormsg");
        for (let i = 0; i < nodeList.length; i++) {
          nodeList[i].style.display = "none";
        }
        document.getElementById('errormsg7').style.display = "flex";
      }
      else {
        if (document.getElementById('c2').value == null || document.getElementById('c2').value.trim() == "") {
          const nodeList = document.querySelectorAll(".errormsg");
          for (let i = 0; i < nodeList.length; i++) {
            nodeList[i].style.display = "none";
          }
          document.getElementById('errormsg8').style.display = "flex";

        }
        else {
          var pat_check = new XMLHttpRequest();

          pat_check.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {

              var data = JSON.parse(this.responseText);
              console.log(JSON.parse(this.responseText));

            //   for (var i = 0; i < data.length; i++) {
            //     html += '<option value="' + data[i].doc_id + '">' + data[i].name + '(' + data[i].specialization + ')' + '</option>';
            //     // + data[i].field_name + "</p>";
            //   }
            //   //var myData = document.getElementById("my-data");
            //   c_doc.innerHTML = '<option value="">--Select Doctor--</option>' + html;
            // }
              if (data.length > 0) {
                document.getElementById('app_det').innerHTML = doc_id_name + "<br>" + doc_id_spec + "<br>" + hospitals[document.getElementById("a1").value-1].hospital_name + "<br>"+document.getElementById('c0').value+"<br>"+mySlots[document.querySelector('input[name = "slot"]:checked').value-1];
                document.getElementById('pat_det').innerHTML = document.getElementById('n1').value + "<br>" + document.getElementById('c4').value + "<br>" + document.querySelector('input[name = "gender"]:checked').value + "<br>" + document.getElementById('c2').value;
                flagVariable = 0;
                console.log(flagVariable);
                page2.style.display = "none";
                page4.style.display = "block";

                bt2.style.display = "none";
                bt4.style.display = "flex";

                he4.classList.add("h");
                he5.classList.add("h");
                
                console.log(pat_check.responseText);
              }
              else {
                flagVariable = 1;
                page2.style.display = "none";
                page3.style.display = "block";

                bt2.style.display = "none";
                bt3.style.display = "flex";

                he4.classList.add("h");
                console.log("Response data is null");
              }
            }
          };
          var url = "pat_check.php?pat_name=" + document.getElementById('n1').value + "&pat_dob=" + document.getElementById('c2').value +"&pat_ph="+ document.getElementById('c4').value;
          pat_check.open("GET", url, true);
          pat_check.send();
        }
      }
    }
  }

});

b6.addEventListener("click", function () {
  const nodeList = document.querySelectorAll(".errormsg");
  for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.display = "none";
  }
  page3.style.display = "none";
  page2.style.display = "block";

  bt3.style.display = "none";
  bt2.style.display = "flex";

  he4.classList.remove("h");
});

b7.addEventListener("click", function () {
  if (document.getElementById('c3').value == "") {
    const nodeList = document.querySelectorAll(".errormsg");
    for (let i = 0; i < nodeList.length; i++) {
      nodeList[i].style.display = "none";
    }
    document.getElementById('errormsg9').style.display = "flex";
  }
  else {
    if (document.getElementById('n3').value == "") {
      const nodeList = document.querySelectorAll(".errormsg");
      for (let i = 0; i < nodeList.length; i++) {
        nodeList[i].style.display = "none";
      }
      document.getElementById('errormsg10').style.display = "flex";
    }
    else {
      if (document.getElementById('n4').value == "") {
        const nodeList = document.querySelectorAll(".errormsg");
        for (let i = 0; i < nodeList.length; i++) {
          nodeList[i].style.display = "none";
        }
        document.getElementById('errormsg11').style.display = "flex";
      }
      else {
        if (document.getElementById('n5').value == "") {
          const nodeList = document.querySelectorAll(".errormsg");
          for (let i = 0; i < nodeList.length; i++) {
            nodeList[i].style.display = "none";
          }
          document.getElementById('errormsg12').style.display = "flex";
        }
        else {
          if (document.getElementById('n6').value == "") {
            const nodeList = document.querySelectorAll(".errormsg");
            for (let i = 0; i < nodeList.length; i++) {
              nodeList[i].style.display = "none";
            }
            document.getElementById('errormsg13').style.display = "flex";
          }
          else {
            
            document.getElementById('app_det').innerHTML = doc_id_name + "<br>" + doc_id_spec + "<br>" + hospitals[document.getElementById("a1").value-1].hospital_name + "<br>"+document.getElementById('c0').value+"<br>"+mySlots[document.querySelector('input[name = "slot"]:checked').value-1];
            document.getElementById('pat_det').innerHTML = document.getElementById('n1').value + "<br>" + document.getElementById('c4').value + "<br>" + document.querySelector('input[name = "gender"]:checked').value + "<br>" + document.getElementById('c2').value;

            page3.style.display = "none";
            page4.style.display = "block";

            bt3.style.display = "none";
            bt4.style.display = "flex";

            he5.classList.add("h");
          }
        }
      }
    }
  }
});

b8.addEventListener("click", function () {
  const nodeList = document.querySelectorAll(".errormsg");
  for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.display = "none";
  }
  if(flagVariable == 1){

    page4.style.display="none";
    page3.style.display="block";

    bt4.style.display="none";
    bt3.style.display="flex";

    he5.classList.remove("h");
}
else{
    page4.style.display="none";
    page2.style.display="block";

    bt4.style.display="none";
    bt2.style.display="flex";

    he5.classList.remove("h");
    he4.classList.remove("h");
}
  // page4.style.display = "none";
  // page3.style.display = "block";

  // bt4.style.display = "none";
  // bt3.style.display = "flex";

  // he5.classList.remove("h");
});

var c4 = document.getElementById("c4");

c4.addEventListener("input", function () {
  if (this.value.length > 10) {
    this.value = this.value.slice(0, 10);
  }
});

var n6 = document.getElementById("n6");

n6.addEventListener("input", function () {
  if (this.value.length > 6) {
    this.value = this.value.slice(0, 6);
  }
});

var c_hos = document.querySelector(".c_hos");
var c_doc = document.querySelector(".c_doc");
var c_date = document.querySelector(".dateapp");

var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {

    var data = JSON.parse(this.responseText);
    console.log(JSON.parse(this.responseText));

    var html = "";
    for (var i = 0; i < data.length; i++) {
      html += '<option value="' + data[i].doc_id + '">' + data[i].name + '(' + data[i].specialization + ')' + '</option>';
      // + data[i].field_name + "</p>";
    }


    //var myData = document.getElementById("my-data");
    c_doc.innerHTML = '<option value="">--Select Doctor--</option>' + html;
  }
};

c_hos.addEventListener("change", function () {
  var c_hos_value = c_hos.value;
  var url = "hos_doc.php?hos_id=" + c_hos_value;
  xhr.open("GET", url, true);
  xhr.send();

});


var xhr1 = new XMLHttpRequest();

xhr1.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {

    var data = JSON.parse(this.responseText);
    console.log(JSON.parse(this.responseText));

    doc_id_name = data[0].name;
    doc_id_spec = data[0].specialization;
    doc_id_hos_id = data[0].hospital_id;
    console.log(doc_id_name);


    var html1 = "";

    var str = data[0].working_days;
    var daysOfWeek = [];


    var arr = str.split(",");


    for (var i = 0; i < arr.length; i++) {
      var num = parseInt(arr[i]);
      daysOfWeek.push(num);
    }

    function getNextSevenDays(days) {
      var today = new Date();
      var dayOfWeek = today.getDay(); // 0 = Sunday, 1 = Monday, etc.

      var nextSevenDays = [];
      for (var i = 1; i < 8; i++) {
        var date = new Date(today);
        date.setDate(today.getDate() + i);
        if (days.includes(date.getDay())) {
          nextSevenDays.push(date);
        }
      }

      return nextSevenDays;
    }
    var Week1 = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var monthsOfYear = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Example usage: get next Monday, Wednesday, and Friday
    //var days = [1, 3, 5]; // 0 = Sunday, 1 = Monday, 2 = Tuesday, etc.
    var dates = getNextSevenDays(daysOfWeek);
    for (var i = 0; i < dates.length; i++) {
      var date = dates[i];
      var day1 = date.getDay();
      var month = date.getMonth();
      var day = date.getDate();
      var year = date.getFullYear();
      // console.log(month + "/" + day + "/" + year);
      var locdate = date.toLocaleDateString();
      console.log(locdate);
      html1 += '<option value="' + locdate + '">' + Week1[day1] + " " + monthsOfYear[month] + " " + day + " " + year + '</option>';
    }

    var doc_hos_id = data[0].hospital_id;
    c_hos.options[doc_hos_id].selected = true;

    c_date.innerHTML = '<option value="">--Select Date--</option>' + html1;
  }
};


c_doc.addEventListener("change", function () {
  if (c_doc.value !== "") {
    var url1 = "doc_date.php?doc_id=" + c_doc.value;
    xhr1.open("GET", url1, true);
    xhr1.send();
  }
  else {
    //c_date.options[0].selected = true;
    c_date.innerHTML = '<option value="">--Select Doctor First--</option>';
  }
});

var c_slot = document.getElementsByName("slot");

var xhr2 = new XMLHttpRequest();

xhr2.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {

    var data = JSON.parse(this.responseText);
    console.log(JSON.parse(this.responseText));

    //var html2 = "";    
    const myArray = [];
    for (var i = 0; i < data.length; i++) {

      myArray.push(data[i].slot);

    }
    const arr = [];
    for (var i = 0; i < myArray.length; i++) {
      var num = parseInt(myArray[i]); // convert the substring to an integer
      arr.push(num); // add the integer to the new array
    }

    // Get all the radio buttons
    const radioButtons = document.getElementsByName('slot');

    // Loop through each radio button
    for (let i = 0; i < radioButtons.length; i++) {
      const radioButton = radioButtons[i];

      // Check if the value is present in the array
      if (arr.includes(parseInt(radioButton.value))) {
        radioButton.disabled = true;
        radioButton.checked = true;
      } else {
        radioButton.disabled = false;
        radioButton.checked = false;
      }
    }
    //var myData = document.getElementById("my-data");
    //c_doc.innerHTML = '<option value="">--Select Doctor--</option>' + html2;
  }
};

c_date.addEventListener("change", function () {

  if (c_date.value !== "") {
    var url1 = "date_slot.php?date_value=" + c_date.value + "&doc_id=" + c_doc.value;
    xhr2.open("GET", url1, true);
    xhr2.send();
  }
});
function validated(){
  if(document.getElementById('myCheckbox').checked){
      if(flagVariable == 0){
        document.getElementById('c3').value = "";
        document.getElementById('n3').value = "";
        document.getElementById('n4').value = "";
        document.getElementById('n5').value = "";
        document.getElementById('n6').value = "";
      }
      var sss = new XMLHttpRequest();
      sss.open("GET","session_change.php");
      sss.send();
      document.getElementById("myForm").action = "app_sub.php?flag="+flagVariable;
      return true;
  }
  else{
      const nodeList = document.querySelectorAll(".errormsg");
      for (let i = 0; i < nodeList.length; i++) {
          nodeList[i].style.display = "none";
      }
      document.getElementById('errormsg14').style.display = "flex";
      return false;
  }
}