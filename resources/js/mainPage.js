window.addEventListener('scroll', () => {

    setOnInView('.lined', 'opacity')
    setOnInView('.card', 'opacity')

})

setInterval(() => {

    setOnInView('.lined', 'opacity')
    setOnInView('.card', 'opacity')

}, 5000)



function setOnInView(ele, addClass = 'zxc', removeClass = 'zxc') {
    var element = document.querySelectorAll(ele);
    element.forEach(ele => {
        if (ele.getBoundingClientRect().top + 450 < window.innerHeight) {
            ele.classList.add(addClass)

        }
    });
}