$(document).ready(function () {
    const usuario = JSON.parse(localStorage.getItem("usuarioLogeado"));

    if (usuario) {
        $("#user").text(usuario.user);
        $("#hola").text("Bienvenido " + usuario.user);
    } else {
        window.location.href = "login.blade.php";
    }
});