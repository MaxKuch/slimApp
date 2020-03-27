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
            dataType: "json",
            data:{
                username: username,
                email: email,
                password: password
            },
            error: function(jqXHR){
                $('.errors').html('')
                $('.error').html('')
                if(jqXHR.responseJSON){
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
    let username = $('.login-form input[name="username"]').val()
    let password = $('.login-form input[name="password"]').val()
    //alert($('.login-form').valid())
    if($('.login-form').valid()){
        $.ajax({
            url: '/auth/login',
            type: 'POST',
            dataType: "json",
            data:{
                username: username,
                password: password
            },
            error: function(jqXHR){
                $('.errors').html('')
                $('.error').html('')
                if(jqXHR.responseJSON){
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

$('#sign-out-btn-profile').click(function(e){
    e.preventDefault()
    $.ajax({
        url: '/auth/logout',
        success: function(){
            document.location.reload()
        }
    })
})