/* ==================================================
# REGISTER FORM -Get form inputs
===================================================*/
const register_form = document.querySelector('#sign_up form'),
    fname = form.querySelector('#fname'),
    lname = form.querySelector('#lname'),
    uname = form.querySelector('#uname'),
    email = form.querySelector('#email'),
    pswd_1 = form.querySelector('#pswd_1'),
    pswd_2 = form.querySelector('#pswd_2');
const sign_up_message = document.querySelector('#sign_up .message');

/* === on Form Submit  === */
register_form.onsubmit = (e) => {
    /* === Preventing form from submitting === */
    e.preventDefault();

    // Create new XMLHttpRequest Object
    const xhr_2 = new XMLHttpRequest();

    // Open connection
    xhr_2.open('POST', '/pages/process_register.php', true);

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

    xhr_2.onreadystatechange = function() {
            // Ready State
            // 0 = Unsent
            // 1 = Opened
            // 2 = Received
            // 3 = Loading
            // 4 = Done
            console.log('Ready State: ', xhr_2.readyState);
            if (this.status === 200 && this.readyState === 4) {
                let response = xhr_2.response;
                if (response.indexOf("Sorry, user already taken") != -1 || response.indexOf("Fields cannot be blank") != -1 || response.indexOf("Password mismatch") != -1 || response.indexOf("Not saved ") != -1 || response.indexOf("Fatal error") != -1 || response.indexOf("Server error") != -1) {
                    sign_up_message.classList.add('form-warning-animated');
                    sign_up_message.classList.remove('form-success-animated');
                    sign_up_message.innerText = response;
                } else {
                    /* === Show and hide success message  === */
                    sign_up_message.classList.remove('form-warning-animated');
                    sign_up_message.classList.add('form-success-animated');
                    sign_up_message.innerText = response;
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
    let formData = new FormData(register_form);

    // Send the request (form data)
    xhr_2.send(formData);

}


/* ==================================================
# User Password And Eyes
===================================================*/
const pass_1 = document.querySelector('#sign_up #pswd_1');
const pass_2 = document.querySelector('#sign_up #pswd_2');

const pswd_eye_1 = document.querySelector('#sign_up .password-group-1 .fa-eye');
pswd_eye_1.addEventListener('click', function() {
    pswd_eye_1.classList.add('hide');
    pswd_eye_slash_1.classList.add('show');
    if (pass_1.getAttribute("type") === "password") {
        pass_1.setAttribute("type", "text");
    }
})

const pswd_eye_slash_1 = document.querySelector('#sign_up .password-group-1 .fa-eye-slash');
pswd_eye_slash_1.addEventListener('click', function() {
    pswd_eye_slash_1.classList.remove('show');
    pswd_eye_1.classList.remove('hide');
    if (pass_1.getAttribute("type") === "text") {
        pass_1.setAttribute("type", "password");
    }
})

const pswd_eye_2 = document.querySelector('#sign_up .password-group-2 .fa-eye');
pswd_eye_2.addEventListener('click', function() {
    pswd_eye_2.classList.add('hide');
    pswd_eye_slash_2.classList.add('show');
    if (pass_2.getAttribute("type") === "password") {
        pass_2.setAttribute("type", "text");
    }
})

const pswd_eye_slash_2 = document.querySelector('#sign_up .password-group-2 .fa-eye-slash');
pswd_eye_slash_2.addEventListener('click', function() {
    pswd_eye_slash_2.classList.remove('show');
    pswd_eye_2.classList.remove('hide');
    if (pass_2.getAttribute("type") === "text") {
        pass_2.setAttribute("type", "password");
    }
})

// New password
const pswdo = document.querySelector('#pswd_1');

pswdo.addEventListener('keyup', () => {

    const ALPHABET_UPPER = /[A-Z]/g;
    const ALPHABET_LOWER = /[a-z]/g;
    const NUMBERS = /[0-9]/g;
    const SPECIAL_CHARS = /[*-?]/g;

    // Validate uppercase, lowecase, number and length
    if (pswdo.value.match(ALPHABET_UPPER) && pswdo.value.match(ALPHABET_LOWER) && pswdo.value.match(NUMBERS)) {
        sign_up_message.innerHTML = "";
        sign_up_message.classList.remove('form-warning-animated');
        if (pswdo.value.length >= 8) {
            sign_up_message.innerHTML = "";
            sign_up_message.classList.remove('form-warning-animated');
        } else {
            sign_up_message.innerHTML = "Password must contain at least 8 or more characters!";
            sign_up_message.classList.add('form-warning-animated');
        }
    } else {
        sign_up_message.innerHTML = "Password must contain at least one number, <br> one uppercase, and one lowercase letter!";
        sign_up_message.classList.add('form-warning-animated');
    }
})