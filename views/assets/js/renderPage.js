if(session.login_flag){
    let userStatus = session.login_flag ? 'loggined' : 'not loggined'
    $('.main-content').removeClass('authorization');
    $('.main-content').html(`
        <div class = "container"><h1>Hello, ${userData.name}</h1>
        <h3>Your email: ${userData.email}</h3>
        <h3>Your phone: ${userData.phone}</h3>
        <h3>Your status: ${userStatus}</h3>
    `)
    $('.auth-btns').html(`<button class="auth-btn sign-out-btn" id = "sign-out-btn-profile">Sign out</button>`)
}