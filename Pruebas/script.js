document.addEventListener("DOMContentLoaded", function () {
    const altaClienteBtn = document.getElementById("altaClienteBtn");
    const altaClienteForm = document.getElementById("altaClienteForm");

    altaClienteBtn.addEventListener("click", function () {
        altaClienteForm.classList.toggle("hidden");
    });
});
