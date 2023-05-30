$(document).ready(function() {
    $('#togglePassword').change(function() {
        var passwordField = $('#clave');
        var passwordFieldType = passwordField.attr('type');

        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });
});