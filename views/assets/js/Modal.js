class Modal{
    constructor(modalBtn, modalWindow, closeBtn){
        this.closeBtn = $(`#${closeBtn}`)
        this.modalBtn =  $(`#${modalBtn}`)
        this.modalWindow = $(`#${modalWindow}`)
    }
    show(){
        $('.modal').removeClass('active')
        this.modalWindow.addClass('active')
    }
    hide(){
        this.modalWindow.removeClass('active');
    }
}