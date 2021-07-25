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