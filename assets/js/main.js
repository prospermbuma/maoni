/* ====================================================
# Get Full Year
=====================================================*/
const today = new Date();
const year = today.getFullYear();
const full_year = document.querySelector("#year");
full_year.innerText = year