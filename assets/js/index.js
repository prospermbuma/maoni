/* ====================================================
# Form 
=====================================================*/
const form = document.querySelector('form'),
    name_Field = form.querySelector('.name-1'),
    name_Input = name_Field.querySelector('input'),
    name_Field_2 = form.querySelector('.name-2'),
    name_Input_2 = name_Field_2.querySelector('input'),
    email_Field = form.querySelector('.email'),
    email_Input = email_Field.querySelector('input'),
    phone_Field = form.querySelector('.phone'),
    phone_Input = phone_Field.querySelector('input'),
    calendar_Field = form.querySelector('.calendar'),
    calendar_Input = calendar_Field.querySelector('input'),
    region_Field = form.querySelector('.region'),
    region_select = region_Field.querySelector('select'),
    district_Field = form.querySelector('.district'),
    district_select = district_Field.querySelector('select'),
    comments_Field = form.querySelector('.comments'),
    comments_Input = comments_Field.querySelector('textarea'),
    gender_Field = form.querySelector('.gender'),
    gender_Input = gender_Field.querySelector('input');
const message = document.querySelector('.message');

/* === on Form Submit  === */
form.onsubmit = (e) => {
    /* === Preventing form from submitting === */
    e.preventDefault();

    // Create new XMLHttpRequest Object
    const xhr = new XMLHttpRequest();

    // Open connection
    xhr.open('POST', 'pages/save_to_db.php', true);

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

    xhr.onreadystatechange = function() {
        // Ready State
        // 0 = Unsent
        // 1 = Opened
        // 2 = Received
        // 3 = Loading
        // 4 = Done
        console.log('Ready State: ', xhr.readyState);
        if (this.status === 200 && this.readyState === 4) {
            let response = xhr.response;
            if (response.indexOf("Tafadhali jaza taarifa zote") != -1 || response.indexOf("Barua pepe au namba ya simu imeshatumika") != -1) {
                console.log(response);
                message.innerText = response;
                message.classList.add('form-warning-animated');
                message.classList.remove('form-success-animated');
            } else {
                /* === Show and hide success message  === */
                message.classList.remove('form-warning-animated');
                message.classList.add('form-success-animated');
                message.innerText = response;
                setTimeout(() => {
                    /* === Clear inputs  === */
                    name_Input.value = "";
                    name_Input_2.value = "";
                    email_Input.value = "";
                    phone_Input.value = "";
                    region_select.value = "";
                    district_select.value = "";
                    calendar_Input.value = "";
                    comments_Input.value = "";
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 3000)
                }, 100)
            }
            /* === Calling the check inputs function  === */
            checkInputs();
        }
    }

    /* === Calling the check inputs function  === */
    checkInputs();

    /* === When user filled up proper details  === */
    /* === If error class not contains in email_Field and address_Field then user has entered proper details  === */
    if (!name_Field.classList.contains("error") && !name_Field_2.classList.contains("error") && !email_Field.classList.contains("error") && !phone_Field.classList.contains("error") && !region_Field.classList.contains("error") && !district_Field.classList.contains("error") && !calendar_Field.classList.contains("error") && !comments_Field.classList.contains("error")) {

        // Creating new formData object. This object is used to send form data.
        let formData = new FormData(form);

        // Send the request (form data)
        xhr.send(formData);
    }
}

/* === Form Validation  === */
/* === Check inputs function  === */
function checkInputs() {

    inputs_Shake_error();

    function inputs_Shake_error() {

        /* === If firstname is empty === */
        if (name_Input.value.trim() === "") {
            name_Field.classList.add('shake', 'error');
        } else {
            name_Field.classList.remove('success');
        }

        /* === If lastname is empty === */
        if (name_Input_2.value.trim() === "") {
            name_Field_2.classList.add('shake', 'error');
        } else {
            name_Field_2.classList.remove('success');
        }

        /* === If Email is empty === */
        if (email_Input.value.trim() === "") {
            email_Field.classList.add('shake', 'error');
        } else {
            /* === Calling the check email function  === */
            checkEmail();
            email_Field.classList.remove('success');
        }

        /* === If Phone is empty === */
        if (phone_Input.value.trim() === "") {
            phone_Field.classList.add('shake', 'error');
        } else {
            phone_Field.classList.remove('success');
        }

        /* === If region is empty === */
        if (region_select.value.trim() === "") {
            region_Field.classList.add('shake', 'error');
        } else {
            region_Field.classList.remove('success');
        }

        /* === If district is empty === */
        if (district_select.value.trim() === "") {
            district_Field.classList.add('shake', 'error');
        } else {
            district_Field.classList.remove('success');
        }

        /* === If calendar is empty === */
        if (calendar_Input.value.trim() === "") {
            calendar_Field.classList.add('shake', 'error');
        } else {
            calendar_Field.classList.remove('success');
        }

        /* === If comments is empty === */
        if (comments_Input.value.trim() === "") {
            comments_Field.classList.add('shake', 'error');
        } else {
            comments_Field.classList.remove('success');
        }


        /* === Remove shake after 500ms === */
        setTimeout(() => {
            name_Field.classList.remove('shake');
            name_Field_2.classList.remove('shake');
            email_Field.classList.remove('shake');
            phone_Field.classList.remove('shake');
            calendar_Field.classList.remove('shake');
            region_Field.classList.remove('shake');
            district_Field.classList.remove('shake');
            comments_Field.classList.remove('shake');
        }, 500)

    }

    /* ====================================================
    #  Working on input keyup
    =====================================================*/

    /* === First Name on keyup  === */
    name_Input.onkeyup = () => {
        /* === If fisrtname is empty  === */
        if (name_Input.value.trim() === "") {
            name_Field.classList.add('error');
            name_Field.classList.remove('success');
        } else {
            name_Field.classList.remove('error');
            name_Field.classList.add('success');
        }
    }

    /* === Last Name on keyup  === */
    name_Input_2.onkeyup = () => {
        /* === If fisrtname is empty  === */
        if (name_Input_2.value.trim() === "") {
            name_Field_2.classList.add('error');
            name_Field_2.classList.remove('success');
        } else {
            name_Field_2.classList.remove('error');
            name_Field_2.classList.add('success');
        }
    }

    /* === Email on keyup  === */
    email_Input.onkeyup = () => {
        /* === Calling the check email function  === */
        checkEmail();
    }

    /* === Check email function  === */
    function checkEmail() {
        /* === Pattern to validate email  === */
        let pattern = /^[^]+@[^ ]+\.[a-z]{2,3}$/;
        /* === If pattern not matched with user value entered  === */
        if (!email_Input.value.trim().match(pattern)) {
            email_Field.classList.add('error');
            email_Field.classList.remove('success');
            let errorTxt = email_Field.querySelector('.error-txt');
            if (email_Input.value.trim() != "") {
                errorTxt.innerText = "Andika barua pepe iliyo sahihi";
            } else {
                errorTxt.innerText = "Barua pepe inahitajika";
                email_Field.classList.remove('success');
            }
        } else {
            email_Field.classList.remove('error');
            email_Field.classList.add('success');
        }
    }

    /* === Phone on keyup  === */
    phone_Input.onkeyup = () => {
        /* === If phone is empty  === */
        if (phone_Input.value.trim() === "") {
            phone_Field.classList.add('error');
            phone_Field.classList.remove('success');
        } else {
            phone_Field.classList.remove('error');
            phone_Field.classList.add('success');
        }
    }

    /* === Region on keyup  === */
    region_select.onkeyup = () => {
        /* === If region is empty  === */
        if (region_select.value.trim() === "") {
            region_Field.classList.add('error');
            region_Field.classList.remove('success');
        } else {
            region_Field.classList.remove('error');
            region_Field.classList.add('success');
        }
    }

    /* === District on keyup  === */
    district_select.onkeyup = () => {
        /* === If district is empty  === */
        if (district_select.value.trim() === "") {
            district_Field.classList.add('error');
            district_Field.classList.remove('success');
        } else {
            district_Field.classList.remove('error');
            district_Field.classList.add('success');
        }
    }

    /* === Calendar on keyup  === */
    calendar_Input.onkeyup = () => {
        /* === If calendar is empty  === */
        if (calendar_Input.value.trim() === "") {
            calendar_Field.classList.add('error');
            calendar_Field.classList.remove('success');
        } else {
            calendar_Field.classList.remove('error');
            calendar_Field.classList.add('success');
        }
    }

    /* === Comments on keyup  === */
    comments_Input.onkeyup = () => {
        /* === Ifcomments is empty  === */
        if (comments_Input.value.trim() === "") {
            comments_Field.classList.add('error');
            comments_Field.classList.remove('success');
        } else {
            comments_Field.classList.remove('error');
            comments_Field.classList.add('success');
        }
    }
}