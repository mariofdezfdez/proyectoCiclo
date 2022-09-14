$(document).ready(function(){

    // Registro
    $('#password, #cpassword').on('keyup', function () {
        if ($('#password').val() == $('#cpassword').val()) {
            $('#message').html("");
        } else {
            $('#message').html('Las contraseñas no coinciden').css('color', 'red');
        }
    });
});


