
$('#registration-form').validate()

$('#login-form').validate()

$.validator.addMethod("laxEmail", function(value, element) {
    // allow any non-whitespace characters as the host part
    return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter valid email');
$.validator.addMethod("laxNumber", function(value, element) {
    return this.optional( element ) || /^[\d\+][\d\(\)\ -]{4,17}[\d\ ]$/.test( value );
}, 'Please enter valid phone number');

$('#registration-form input[name="name"]').rules("add", {
    minlength: 2
});

$('#registration-form input[name="email"]').rules("add", {
    minlength: 8,
    laxEmail: true
});

$('#login-form input[name="email"]').rules("add", {
    minlength: 8,
    laxEmail: true
});

$('#registration-form input[name="phone"]').rules("add", {
    minlength: 8,
    laxNumber: true
});

$('#registration-form input[name="password"]').rules("add", {
    minlength: 6,
});

$('#login-form input[name="password"]').rules("add", {
    minlength: 6,
});
