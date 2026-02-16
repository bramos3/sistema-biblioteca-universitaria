$(document).ready(function () {
    $("#logout").click(function () {
        localStorage.removeItem("usuarioLogeado");

        window.location.href = "public/index.php";
    });
});
