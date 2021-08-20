/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/section_manager.js ***!
  \*****************************************/
{
  var copy_num = document.querySelectorAll('.copy_num');
  var message_part = document.querySelectorAll('.message_part');
  var show_message = document.querySelector('.show_message');
  var clouse_message = document.querySelector('.clouse_message');
  copy_num.forEach(function (ele) {
    return ele.onclick = function (ev) {
      navigator.clipboard.writeText(ele.parentElement.parentElement.parentElement.querySelector('p').innerText);
      alert('تم النسخ');
    };
  });

  clouse_message.onclick = function (e) {
    show_message.classList.add('hidden');
    show_message.classList.remove('absolute');
  };

  message_part.forEach(function (ele) {
    var message = ele.querySelector('p').innerText;
    console.log(ele);

    if (message.length > 59) {
      ele.querySelector('p').innerText = message.substring(0, 60) + ' . . .';
    }

    ele.onclick = function (ev) {
      show_message.classList.remove('hidden');
      show_message.classList.add('absolute');
      show_message.querySelector('p').innerText = message;
    };
  });
}
/******/ })()
;