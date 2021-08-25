var board = document.querySelectorAll('.board');
var tap = document.querySelectorAll('.tap');

tap.forEach((e, i) => {
    e.onclick = () => {
        tap.forEach(e => e.classList.replace('bg-gray-100', 'bg-white'))
        e.classList.replace('bg-white', 'bg-gray-100')
        board.forEach(e => e.classList.replace('block', 'hidden'))
        board[i].classList.replace('hidden', 'block')
    }
})

var sectionItems = document.querySelectorAll('.section-items');

// sectionItems.forEach(e => {
//     e.querySelector('button').onclick = (button) => {
//         popUpEdit(e);
//     }
// });

var popup = document.querySelector('.popup');

var popup_clouse = document.querySelector('.popup_clouse');




function popUpEdit() {
    popup.classList.replace('hidden', 'flex')

}


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
        show_message.classList.remove('fixed')
    }
    message_part.forEach(ele => {


        let message = ele.querySelector('p').innerText;


        if (message.length > 59) {
            ele.querySelector('p').innerText = message.substring(0, 60) + ' . . .'
        }

        ele.onclick = ev => {
            show_message.classList.remove('hidden')
            show_message.classList.add('fixed')
            show_message.querySelector('p').innerText = message;

        }
    })
}
cuteString()

window.addEventListener('reply', event => {
    cuteString()

})


setInterval(() => {

}, 2000);