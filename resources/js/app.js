require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const form = document.querySelector('#form');
form.method = 'post';
form.action = '/loginyyy';




alert('asds')