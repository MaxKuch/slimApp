function newModal(btnId, modalId){
    let instance = new Modal(btnId, modalId)
    instance.modalBtn.click(() => {instance.show()})
    return instance;
}

let modalRegistration = newModal("registration-btn", "modal-registration")

let modalLogin = newModal("login-btn", "modal-login")