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
    file_Field = form.querySelector('.file'),
    file_Input = file_Field.querySelector('input'),
    comments_Field = form.querySelector('.comments'),
    comments_Input = comments_Field.querySelector('textarea');
const message = document.querySelector('.message');

/* === On Form Submit === */
form.onsubmit = (e) => {
    e.preventDefault(); // Prevent the default form submission behavior

    // Create new XMLHttpRequest Object
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'pages/save_to_db.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;

            if (response.includes("Tafadhali jaza taarifa zote") || response.includes("Barua pepe au namba ya simu imeshatumika") || response.includes("Fatal error")) {
                console.log(response);
                message.innerText = response;
                message.classList.add('form-warning-animated');
                message.classList.remove('form-success-animated');
            } else {
                message.classList.remove('form-warning-animated');
                message.classList.add('form-success-animated');
                message.innerText = response;

                setTimeout(() => {
                    // Clear inputs
                    name_Input.value = "";
                    name_Input_2.value = "";
                    email_Input.value = "";
                    phone_Input.value = "";
                    file_Input.value = "";
                    comments_Input.value = "";

                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 3000);
                }, 100);
            }

            checkInputs(); // Validate inputs
        }
    };

    checkInputs();

    if (
        !name_Field.classList.contains("error") &&
        !name_Field_2.classList.contains("error") &&
        !email_Field.classList.contains("error") &&
        !phone_Field.classList.contains("error") &&
        !file_Field.classList.contains("error") &&
        !comments_Field.classList.contains("error")
    ) {
        // Creating a FormData object
        let formData = new FormData(form);

        // Validate file input before sending
        const file = file_Input.files[0];
        const allowedExtensions = ['pdf', 'doc', 'docx'];
        const maxFileSize = 5 * 1024 * 1024; // 5MB

        if (file) {
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                message.innerText = "Invalid file type. Allowed: pdf, doc, docx.";
                message.classList.add('form-warning-animated');
                return;
            }

            if (file.size > maxFileSize) {
                message.innerText = "File size exceeds 5MB limit.";
                message.classList.add('form-warning-animated');
                return;
            }
        }

        // Send the form data
        xhr.send(formData);
    }
};

/* === Form Validation === */
function checkInputs() {
    // Validate each field
    if (name_Input.value.trim() === "") {
        name_Field.classList.add('shake', 'error');
    } else {
        name_Field.classList.remove('shake', 'error');
        name_Field.classList.add('success');
    }

    if (name_Input_2.value.trim() === "") {
        name_Field_2.classList.add('shake', 'error');
    } else {
        name_Field_2.classList.remove('shake', 'error');
        name_Field_2.classList.add('success');
    }

    if (email_Input.value.trim() === "") {
        email_Field.classList.add('shake', 'error');
    } else {
        email_Field.classList.remove('shake', 'error');
        email_Field.classList.add('success');
    }

    if (phone_Input.value.trim() === "") {
        phone_Field.classList.add('shake', 'error');
    } else {
        phone_Field.classList.remove('shake', 'error');
        phone_Field.classList.add('success');
    }

    if (!file_Input.files.length) {
        file_Field.classList.add('shake', 'error');
    } else {
        file_Field.classList.remove('shake', 'error');
        file_Field.classList.add('success');
    }

    if (comments_Input.value.trim() === "") {
        comments_Field.classList.add('shake', 'error');
    } else {
        comments_Field.classList.remove('shake', 'error');
        comments_Field.classList.add('success');
    }

    // Remove the shake class after 500ms
    setTimeout(() => {
        name_Field.classList.remove('shake');
        name_Field_2.classList.remove('shake');
        email_Field.classList.remove('shake');
        phone_Field.classList.remove('shake');
        file_Field.classList.remove('shake');
        comments_Field.classList.remove('shake');
    }, 500);
}
