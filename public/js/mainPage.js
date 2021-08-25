/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/mainPage.js ***!
  \**********************************/
window.addEventListener('scroll', function () {
  setOnInView('.lined', 'opacity');
  setOnInView('.card', 'opacity');
});
setInterval(function () {
  setOnInView('.lined', 'opacity');
  setOnInView('.card', 'opacity');
}, 5000);

function setOnInView(ele) {
  var addClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'zxc';
  var removeClass = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'zxc';
  var element = document.querySelectorAll(ele);
  element.forEach(function (ele) {
    if (ele.getBoundingClientRect().top + 450 < window.innerHeight) {
      ele.classList.add(addClass);
    }
  });
}
/******/ })()
;