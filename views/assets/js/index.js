function newModal(btnId, modalId, closeBtn){
    let instance = new Modal(btnId, modalId, closeBtn)
    instance.modalBtn.click(() => {instance.show()})
    instance.closeBtn.click(() => {instance.hide()})
    return instance;
}

let modalRegistration = newModal("registration-btn", "modal-registration", "modal-registration-close")

let modalLogin = newModal("login-btn", "modal-login", "modal-login-close")

$('#admin_users-table').DataTable();
$('#admin_sessions-table').DataTable();

var userData = {}
var session = {}
