
$('.registration-form .form__button').click(function(e){
    e.preventDefault()
    let name = $('.registration-form input[name="name"]').val()
    let phone = $('.registration-form input[name="phone"]').val()
    let email = $('.registration-form input[name="email"]').val()
    let password = $('.registration-form input[name="password"]').val()
    //alert($('.registration-form').valid())
    if($('.registration-form').valid()){
        $.ajax({
            url: 'auth/registration',
            type: 'POST',
            dataType: "json",
            data:{
                name: name,
                email: email,
                phone: phone,
                password: password,
                session_hash: session.session_hash
            },
            error: function(jqXHR){
                $('.errors').html('')
                $('.error').html('')
                if(jqXHR.responseJSON){
                    console.log(jqXHR)
                    let error = JSON.parse(jqXHR.responseJSON.exception[0].message)
                     $(`#${error.errorTarget}`).html(error.errorMessage)
                }
                else{
                    document.location.reload()
                }
            }
        })
    }
})

$('.login-form .form__button').click(function(e){
    e.preventDefault()
    let email = $('.login-form input[name="email"]').val()
    let password = $('.login-form input[name="password"]').val()
    //alert($('.login-form').valid())
    if($('.login-form').valid()){
        $.ajax({
            url: '/auth/login',
            type: 'POST',
            dataType: "json",
            data:{
                email: email,
                password: password,
                session_hash: session.session_hash
            },
            error: function(jqXHR){
                $('.errors').html('')
                $('.error').html('')
                if(jqXHR.responseJSON){
                    console.log(jqXHR)
                    let error = JSON.parse(jqXHR.responseJSON.exception[0].message)
                     $(`#${error.errorTarget}`).html(error.errorMessage)
                }
                else{
                    document.location.reload()
                }
            },
        })
    }
})

$('.sign-out-btn').click(function(){
    $.ajax({
        url: '/auth/logout',
        success: function(){
            document.location.reload()
        }
    })
})
