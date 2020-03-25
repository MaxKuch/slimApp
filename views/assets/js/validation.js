$('.form').validate()

$('.registration-form .form__button').click(function(e){
    e.preventDefault()
    let username = $('.registration-form input[name="username"]').val()
    let email = $('.registration-form input[name="email"]').val()
    let password = $('.registration-form input[name="password"]').val()
    //alert($('.registration-form').valid())
    if($('.registration-form').valid()){
        $.ajax({
            url: 'auth/registration',
            type: 'POST',
            dataType: 'text',
            data:{
                username: username,
                email: email,
                password: password
            },
            success(data){
                alert(data)
            }
        })
    }
})

$('.login-form .form__button').click(function(e){
    e.preventDefault()
    let login = $('.login-form input[name="username"]').val()
    let password = $('.login-form input[name="password"]').val()
    //alert($('.login-form').valid())
    if($('.login-form').valid()){
        $.ajax({
            url: '/auth/login',
            type: 'POST',
            dataType: 'text',
            data:{
                username: username,
                password: password
            },
            success(data){
                alert(data)
            }
        })
    }
})