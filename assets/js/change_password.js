/* ==================================================
# REGISTER FORM -Get form inputs
===================================================*/
const form = document.querySelector('form'),
    pswd_0 = form.querySelector('#pswd_0'),
    pswd_1 = form.querySelector('#pswd_1'),
    pswd_2 = form.querySelector('#pswd_2');
const message = document.querySelector('.message');

const ALPHABET_UPPER = /[A-Z]/g;
const ALPHABET_LOWER = /[a-z]/g;
const NUMBERS = /[0-9]/g;
const SPECIAL_CHARS = /[*-?]/g;

// New password
pswd_1.addEventListener('keyup', () => {

    // Validate uppercase, lowecase, number and length
    if (pswd_1.value.match(ALPHABET_UPPER) && pswd_1.value.match(ALPHABET_LOWER) && pswd_1.value.match(NUMBERS)) {
        message.innerHTML = "";
        message.classList.remove('form-warning-animated');
        if (pswd_1.value.length >= 8) {
            message.innerHTML = "";
            message.classList.remove('form-warning-animated');
        } else {
            message.innerHTML = "Password must contain at least 8 or more characters!";
            message.classList.add('form-warning-animated');
        }
    } else {
        message.innerHTML = "Password must contain at least one number, <br> one uppercase, and one lowercase letter!";
        message.classList.add('form-warning-animated');
    }
})

/* === on Form Submit  === */
form.onsubmit = (e) => {
    /* === Preventing form from submitting === */
    e.preventDefault();

    // Create new XMLHttpRequest Object
    const xhr = new XMLHttpRequest();

    // Open connection
    xhr.open('POST', '../pages/process_change_password.php', true);

    // Execution of the ajax call
    // xhr.onload = function () {
    // Status codes
    // 200 = Correct
    // 403 = Forbidden
    // 404 = Not Found
    // console.log(this.status);
    // if (this.status === 200) {
    // Invoke the checkInputs function
    // checkInputs();
    //     }
    // }

    xhr.onreadystatechange = function () {
        // Ready State
        // 0 = Unsent
        // 1 = Opened
        // 2 = Received
        // 3 = Loading
        // 4 = Done
        console.log('Ready State: ', xhr.readyState);
        if (this.status === 200 && this.readyState === 4) {
            let response = xhr.response;
            if (response.indexOf("Incorrect current password") != -1 || response.indexOf("Fields cannot be blank") != -1 || response.indexOf("Password mismatch") != -1 || response.indexOf("Password has already been used") != -1 || response.indexOf("Not saved ") != -1 || response.indexOf("Fatal error ") != -1) {
                message.classList.add('form-warning-animated');
                message.classList.remove('form-success-animated');
                message.innerText = response;
            } else {    
                /* === Show and hide success message  === */
                message.classList.remove('form-warning-animated');
                message.classList.add('form-success-animated');
                message.innerText = response;
                /* === Clear inputs  === */
                fname = "";
                lname = "";
                uname = "";
                email = "";
                pswd_1 = "";
                pswd_2 = "";
            }
            /* === Calling the check inputs function  === */
        }
    }
    /* === Calling the check inputs function  === */
    // Creating new formData object. This object is used to send form data.
    let formData = new FormData(form);

    // Send the request (form data)
    xhr.send(formData);

}


/* ==================================================
# User Password And Eyes
===================================================*/
const pass_0 = document.querySelector('#pswd_0');
const pass_1 = document.querySelector('#pswd_1');
const pass_2 = document.querySelector('#pswd_2');

const pswd_eye_0 = document.querySelector('.password-group-0 .fa-eye');
pswd_eye_0.addEventListener('click', function () {
    pswd_eye_0.classList.add('hide');
    pswd_eye_slash_0.classList.add('show');
    if (pass_0.getAttribute("type") === "password") {
        pass_0.setAttribute("type", "text");
    }
})

const pswd_eye_slash_0 = document.querySelector('.password-group-0 .fa-eye-slash');
pswd_eye_slash_0.addEventListener('click', function () {
    pswd_eye_slash_0.classList.remove('show');
    pswd_eye_0.classList.remove('hide');
    if (pass_0.getAttribute("type") === "text") {
        pass_0.setAttribute("type", "password");
    }
})

const pswd_eye_1 = document.querySelector('.password-group-1 .fa-eye');
pswd_eye_1.addEventListener('click', function () {
    pswd_eye_1.classList.add('hide');
    pswd_eye_slash_1.classList.add('show');
    if (pass_1.getAttribute("type") === "password") {
        pass_1.setAttribute("type", "text");
    }
})

const pswd_eye_slash_1 = document.querySelector('.password-group-1 .fa-eye-slash');
pswd_eye_slash_1.addEventListener('click', function () {
    pswd_eye_slash_1.classList.remove('show');
    pswd_eye_1.classList.remove('hide');
    if (pass_1.getAttribute("type") === "text") {
        pass_1.setAttribute("type", "password");
    }
})

const pswd_eye_2 = document.querySelector('.password-group-2 .fa-eye');
pswd_eye_2.addEventListener('click', function () {
    pswd_eye_2.classList.add('hide');
    pswd_eye_slash_2.classList.add('show');
    if (pass_2.getAttribute("type") === "password") {
        pass_2.setAttribute("type", "text");
    }
})

const pswd_eye_slash_2 = document.querySelector('.password-group-2 .fa-eye-slash');
pswd_eye_slash_2.addEventListener('click', function () {
    pswd_eye_slash_2.classList.remove('show');
    pswd_eye_2.classList.remove('hide');
    if (pass_2.getAttribute("type") === "text") {
        pass_2.setAttribute("type", "password");
    }
})