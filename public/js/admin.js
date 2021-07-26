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
/******/ })()
;