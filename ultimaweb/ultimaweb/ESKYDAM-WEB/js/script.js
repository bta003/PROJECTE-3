
let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#user-btn').onclick = () => {
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () => {
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}


var e = document.getElementById('esquis');
var p = document.getElementById('pals');
var b = document.getElementById('botes');

function myFunctionE() {
    e.style.display = 'block';
    p.style.display = 'none';
    b.style.display = 'none';
}

function myFunctionP() {
    p.style.display = 'block';
    b.style.display = 'none';
    e.style.display = 'none';
}

function myFunctionB() {
    p.style.display = 'none';
    b.style.display = 'block';
    e.style.display = 'none';
}

function myFunctionT() {
    p.style.display = 'block';
    b.style.display = 'block';
    e.style.display = 'block';
}
