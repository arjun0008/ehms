var page1 = document.querySelector(".page1");
var page2 = document.querySelector(".page2");
var page3 = document.querySelector(".page3");
var page4 = document.querySelector(".page4");

var bt1 = document.querySelector(".bt1");
var bt2 = document.querySelector(".bt2");
var bt4 = document.querySelector(".bt4");

var b1 = document.querySelector(".b1");
var b2 = document.querySelector(".b2");
var b3 = document.querySelector(".b3");
var b6 = document.querySelector(".b6");
var b7 = document.querySelector(".b7");


var he2 = document.querySelector(".he2");
var he3 = document.querySelector(".he3");

var fname = document.getElementById("n1");
var phno = document.getElementById("c4");
var dob = document.getElementById("c2");

var myflag = 0;

b1.addEventListener("click",function(){
    if(fname.value == ""){
        console.log(fname.value);
        const nodeList = document.querySelectorAll(".errormsg");
        for (let i = 0; i < nodeList.length; i++) {
            nodeList[i].style.display = "none";
        }
        document.getElementById("errormsg1").style.display = "flex";
    }
    else{
        if(document.querySelector('input[name = "gender"]:checked') == null){
            const nodeList = document.querySelectorAll(".errormsg");
            for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].style.display = "none";
            }
            document.getElementById("errormsg2").style.display = "flex";
        }
        else{
            if(document.getElementById("c2").value == ""){
                console.log(document.getElementById("c2").value);
                const nodeList = document.querySelectorAll(".errormsg");
                for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].style.display = "none";
                }
                document.getElementById('errormsg3').style.display = "flex";
            }
            else{
                if(phno.value == ""){
                    console.log(phno.value);
                    const nodeList = document.querySelectorAll(".errormsg");
                    for (let i = 0; i < nodeList.length; i++) {
                        nodeList[i].style.display = "none";
                    }
                    document.getElementById("errormsg4").style.display = "flex";
                }
                else{
                    var xhr = new XMLHttpRequest();
                    var url = "blood_don.php?fname="+fname.value+"&gender="+document.querySelector('input[name = "gender"]:checked').value+"&dob="+dob.value+"&phno="+phno.value;
                    xhr.open("GET",url,true);
                    xhr.send();
                    xhr.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                    
                            var data = JSON.parse(this.responseText);
                            console.log(JSON.parse(this.responseText));
                            console.log(data.length);
                            if(data.length>0){
                                document.getElementById("popup").style.display = "flex";
                                document.getElementById("mem").style.display = "block";
                            }
                            else{
                               // myflag = 1;
                                page2.style.display="none";
                                page3.style.display="block";

                                b1.style.display="none";
                                bt2.style.display="flex";

                                he2.classList.add("h");
                            }
                            
                        }
                    };
                    
                }
            }
        }
    }
    
});

b2.addEventListener("click",function(){
    page2.style.display="block";
    page3.style.display="none";

    b1.style.display="flex";
    bt2.style.display="none";

    he2.classList.remove("h");
});

var blood_group = document.getElementById("n4");
var email = document.getElementById("c3");
var taddress = document.getElementById("ta1");

b3.addEventListener("click",function(){
    if(blood_group.value == ""){
        const nodeList = document.querySelectorAll(".errormsg");
        for (let i = 0; i < nodeList.length; i++) {
        nodeList[i].style.display = "none";
        }
        document.getElementById('errormsg5').style.display = "flex";
    }
    else{
        if(email.value == ""){
            const nodeList = document.querySelectorAll(".errormsg");
            for (let i = 0; i < nodeList.length; i++) {
            nodeList[i].style.display = "none";
            }
            document.getElementById('errormsg6').style.display = "flex";
        }
        else{
            if(taddress.value == ""){
                const nodeList = document.querySelectorAll(".errormsg");
                for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].style.display = "none";
                }
                document.getElementById('errormsg7').style.display = "flex";
            }
            else{
                document.getElementById("conf-det").innerHTML = fname.value + "<br>" + document.querySelector('input[name = "gender"]:checked').value + "<br>" + dob.value + "<br>" + phno.value + "<br>" + document.getElementById("n4").value + "<br>" + document.getElementById("c3").value + "<br>" + document.getElementById("ta1").value + "<br>" ;
                page3.style.display="none";
                page4.style.display="block";

                bt2.style.display="none";
                bt4.style.display="flex";

                he3.classList.add("h");
            }
        }

    }
});

b6.addEventListener("click",function(){
    page4.style.display="none";
    page3.style.display="block";

    bt4.style.display="none";
    bt2.style.display="flex";

    he3.classList.remove("h");
});

b7.addEventListener("click",function(){

});

var c4 = document.getElementById("c4");

c4.addEventListener("input", function() {
    if (this.value.length > 10) {
    this.value = this.value.slice(0, 10);
  }
});


function submitForm() {
    var form = document.getElementById("myForm");
    var formData = new FormData(form);
    
    var xhr1 = new XMLHttpRequest();
    xhr1.onreadystatechange = function() {
      if (xhr1.readyState === 4 && xhr1.status === 200) {
        var response = xhr1.responseText;
        console.log(response); // Handle the response from the PHP script

        document.getElementById("popup").style.display = "flex";
        document.getElementById("nomem").style.display = "block";
        // Optionally, perform additional actions based on the response
      }
    };
    xhr1.open("POST", "process.php", true);
    xhr1.send(formData);
  }

  function checkChecked(){
    var checkbox = document.getElementById("myCheckbox");
  
    if (checkbox.checked) {
      console.log("Checkbox is checked");
      submitForm();
    } else {
      console.log("Checkbox is not checked");
      document.getElementById("errormsg8").style.display = "flex";
    }
  }

  