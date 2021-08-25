let copy_num = document.querySelectorAll('.copy_num')
let message_part = document.querySelectorAll('.message_part')
let show_message = document.querySelector('.show_message')
let clouse_message = document.querySelector('.clouse_message')


function cuteString() {
    copy_num.forEach(ele => ele.onclick = ev => {
        navigator.clipboard.writeText(ele.parentElement.parentElement.parentElement.querySelector('p').innerText)
        alert('تم النسخ')
    })
    clouse_message.onclick = e => {
        show_message.classList.add('hidden')
        show_message.classList.remove('absolute')
    }
    message_part.forEach(ele => {


        let message = ele.querySelector('p').innerText;


        if (message.length > 59) {
            ele.querySelector('p').innerText = message.substring(0, 60) + ' . . .'
        }

        ele.onclick = ev => {
            show_message.classList.remove('hidden')
            show_message.classList.add('absolute')
            show_message.querySelector('p').innerText = message;

        }
    })
}

cuteString()