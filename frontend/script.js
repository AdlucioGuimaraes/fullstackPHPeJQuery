function enviarDados() {
    var email = $("#email").val();
    var senha = $("#senha").val();

    $.ajaxSetup({
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    });
    $.ajax({
        type: "POST",
        url: "http://localhost/projectphp/backend/api.php",
        contentType: "application/json",
        data: JSON.stringify({ "email": email, "senha": senha }),
        success: function () {
            alert (email);
            
        },
        error: function (erro) {
            console.error("Erro na requisição AJAX:", erro);
        }
    });
}
