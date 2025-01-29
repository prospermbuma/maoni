/* ==================================================
# Get form inputs
===================================================*/
const form = document.querySelector('#sign_in form'),
    username = form.querySelector('#username'),
    password = form.querySelector('#password');
const message = document.querySelector('#sign_in .message');

/* === on Form Submit  === */
form.onsubmit = (e) => {
    /* === Preventing form from submitting === */
    e.preventDefault();

    // Create new XMLHttpRequest Object
    const xhr = new XMLHttpRequest();

    // Open connection
    xhr.open('POST', '../pages/process_login.php', true);

    xhr.onreadystatechange = function () {
        console.log('Ready State: ', xhr.readyState);
        if (this.status === 200 && this.readyState === 4) {
            let response = xhr.response;
            if (response.indexOf("Incorrect Credentials") != -1 || response.indexOf("Fatal error") != -1) {
                message.classList.add('form-warning-animated');
                message.classList.remove('form-success-animated');
                message.innerText = response;
            } else {
                setTimeout(() => {
                    /* === Show and hide success message  === */
                    message.classList.remove('form-warning-animated');
                    message.classList.remove('form-success-animated');
                    message.innerText = "";
                    /* === Clear inputs  === */
                    username.value = "";
                    password.value = "";
                }, 3000);

                /* === Redirect to view_data page  === */
                window.location.href = 'view_data.php';
            }
            /* === Calling the check inputs function  === */
            checkInputs();
        }
    }
    /* === Calling the check inputs function  === */
    checkInputs();
    // Creating new formData object. This object is used to send form data.
    let formData = new FormData(form);

    // Send the request (form data)
    xhr.send(formData);

}

/* === Form Validation  === */
/* === Check inputs function  === */
function checkInputs() {

    if (username.value.trim() === "" || password.value.trim() === "") {
        message.innerText = "Fields cannot be blank";
        message.classList.add('form-warning-animated');
        message.classList.remove('form-success-animated');
    }
}

/* ==================================================
# User Password And Eyes
===================================================*/
const pass_word = document.querySelector('#sign_in #password');

const pswd_eye = document.querySelector('#sign_in .password-group .fa-eye');
pswd_eye.addEventListener('click', function () {
    pswd_eye.classList.add('hide');
    pswd_eye_slash.classList.add('show');
    if (pass_word.getAttribute("type") === "password") {
        pass_word.setAttribute("type", "text");
    }
})

const pswd_eye_slash = document.querySelector('#sign_in .password-group .fa-eye-slash');
pswd_eye_slash.addEventListener('click', function () {
    pswd_eye_slash.classList.remove('show');
    pswd_eye.classList.remove('hide');
    if (pass_word.getAttribute("type") === "text") {
        pass_word.setAttribute("type", "password");
    }
})

/* ==================================================
# Change forms
===================================================*/

const sign_in_form = document.querySelector('#sign_in');
const sign_up_form = document.querySelector('#sign_up');
const sign_in_link = document.querySelector('#sign_in_link');
const sign_up_link = document.querySelector('#sign_up_link');

sign_up_link.addEventListener('click', function () {
    sign_up_form.style.display = "block";
    sign_in_form.style.display = "none";
    sign_up_form.classList.add('show-form');
})
sign_in_link.addEventListener('click', function () {
    sign_up_form.style.display = "none";
    sign_in_form.style.display = "block";
    sign_in_form.classList.add('show-form');
})