/* ====================================================
# Get Full Year
=====================================================*/
const today = new Date();
const year = today.getFullYear();
const full_year = document.querySelector("#year");
full_year.innerText = year

/* ====================================================
# Address Dropdown List 
=====================================================*/

window.onload = () => {
    const select_region = document.querySelector('#region');
    select_region.addEventListener('change', () => {
        let selected_Region = document.querySelector('#region option:selected').value;

        // Create XMLHttpsReques Object
        const xhr = new XMLHttpRequest();

        // Open connection
        xhr.open('POST', 'pages/process_address_request.php', true);

        // Onload event
        xhr.addEventListener('load', () => {
            if (this.status === 200 && this.readyState === 4) {
                let response = xhr.response;
                let send_data = new FormData(selected_Region);
                xhr.send(send_data);
                let response_data_center = document.querySelector('#response');
                response_data_center.innerHTML = response;
            }
        })
    })
}

/* ===================== # Address Dropdown List ======================*/
// $(document).ready(function () {
//     $("select#region").change(function () {
//         let selected_Region = $("#region option:selected").val();
//         $.ajax({
//             type: "POST",
//             url: "pages/process_address_request.php",
//             // url: "pages/save_to_db.php",
//             data: {
//                 region: selected_Region
//             }
//         }).done(function (data) {
//             $("#response").html(data);
//         });
//     });
// });