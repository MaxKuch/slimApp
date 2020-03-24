class Modal{
    constructor(modalBtn, modalWindow){
        this.modalBtn =  $(`#${modalBtn}`)
        this.modalWindow = $(`#${modalWindow}`)
    }
    show(){
        $('.modal').removeClass('active')
        this.modalWindow.addClass('active')
    }
}