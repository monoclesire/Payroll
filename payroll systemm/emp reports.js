const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

new DataTable('#reports');

$(document).ready(function () {
    $('#reports').DataTable();
});
