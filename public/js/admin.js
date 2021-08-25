/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
var board = document.querySelectorAll('.board');
var tap = document.querySelectorAll('.tap');
tap.forEach(function (e, i) {
  e.onclick = function () {
    tap.forEach(function (e) {
      return e.classList.replace('bg-gray-100', 'bg-white');
    });
    e.classList.replace('bg-white', 'bg-gray-100');
    board.forEach(function (e) {
      return e.classList.replace('block', 'hidden');
    });
    board[i].classList.replace('hidden', 'block');
  };
});
var sectionItems = document.querySelectorAll('.section-items'); // sectionItems.forEach(e => {
//     e.querySelector('button').onclick = (button) => {
//         popUpEdit(e);
//     }
// });

var popup = document.querySelector('.popup');
var popup_clouse = document.querySelector('.popup_clouse');

function popUpEdit() {
  popup.classList.replace('hidden', 'flex');
}

var copy_num = document.querySelectorAll('.copy_num');
var message_part = document.querySelectorAll('.message_part');
var show_message = document.querySelector('.show_message');
var clouse_message = document.querySelector('.clouse_message');

function cuteString() {
  copy_num.forEach(function (ele) {
    return ele.onclick = function (ev) {
      navigator.clipboard.writeText(ele.parentElement.parentElement.parentElement.querySelector('p').innerText);
      alert('تم النسخ');
    };
  });

  clouse_message.onclick = function (e) {
    show_message.classList.add('hidden');
    show_message.classList.remove('fixed');
  };

  message_part.forEach(function (ele) {
    var message = ele.querySelector('p').innerText;

    if (message.length > 59) {
      ele.querySelector('p').innerText = message.substring(0, 60) + ' . . .';
    }

    ele.onclick = function (ev) {
      show_message.classList.remove('hidden');
      show_message.classList.add('fixed');
      show_message.querySelector('p').innerText = message;
    };
  });
}

cuteString();
window.addEventListener('reply', function (event) {
  cuteString();
});
setInterval(function () {}, 2000);
/******/ })()
;