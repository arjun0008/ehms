// navbar toggling
const navbarShowBtn = document.querySelector('.navbar-show-btn');
const navbarCollapseDiv = document.querySelector('.navbar-collapse');
const navbarHideBtn = document.querySelector('.navbar-hide-btn');

navbarShowBtn.addEventListener('click', function(){
    navbarCollapseDiv.classList.add('navbar-show');
});
navbarHideBtn.addEventListener('click', function(){
    navbarCollapseDiv.classList.remove('navbar-show');
});

// changing search icon image on window resize
window.addEventListener('resize', changeSearchIcon);
function changeSearchIcon(){
    let winSize = window.matchMedia("(min-width: 1200px)");
    if(winSize.matches){
        document.querySelector('.search-icon img').src = "images/search-icon.png";
    } else {
        document.querySelector('.search-icon img').src = "images/search-icon-dark.png";
    }
}
// changeSearchIcon();

// stopping all animation and transition
let resizeTimer;
window.addEventListener('resize', () =>{
    document.body.classList.add('resize-animation-stopper');
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        document.body.classList.remove('resize-animation-stopper');
    }, 400);
});

document.getElementById('submitBtn').addEventListener('click', function(event) {
    event.preventDefault(); 
    var form = document.getElementById('myfeedbackform');
    var formData = new FormData(form);

    // Perform form validation
    var name = form.elements['fname'].value;
    var email = form.elements['email'].value;
    var subject = form.elements['subject'].value;
    var message = form.elements['message'].value;

    // Check if required fields are filled
    if (name.trim() === '' || email.trim() === '' || subject.trim() === '' || message.trim() === '') {
        //alert('Please fill in all required fields.');
        document.getElementById("erromsg").style.display = "";
        return;
    }

    // Perform additional validation if needed, such as email format validation

    var xhr = new XMLHttpRequest();
    var url = 'insert_feedback.php'; // Replace with the URL of your PHP script

    xhr.open('POST', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle the response from the PHP script if needed
                console.log(xhr.responseText);
                //alert('Data inserted');
                document.getElementById('popfeed').style.display = 'flex';
                document.getElementById('myfeedbackform').reset();
            } else {
                // Handle the error if the request fails
                console.log('Error: ' + xhr.status);
            }
        }
    };

    xhr.send(formData);
});
