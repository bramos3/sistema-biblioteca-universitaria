$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        const user = $("#user").val().trim();
        const pass = $("#password").val().trim();

        $.getJSON("db.json", function (data) {
            const usuarioValido = data.registros.find(
                u => u.user === user && u.password === pass
            );

            if (usuarioValido) {
                localStorage.setItem("usuarioLogeado", JSON.stringify(usuarioValido));
                window.location.href = "resources/views/plantilla/principal.blade.php";
            } else {
                alert("Usuario o contraseña incorrectos");
            }
        }).fail(function () {
            alert("No se pudo cargar el archivo JSON");
        });
    });
});