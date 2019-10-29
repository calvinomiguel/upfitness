const openMenuButton = document.querySelector('.menu-bar');
const closeMenuButton = document.querySelector('.close-menu-button');
const responsiveNavigation = document.querySelector('.responsive-menu');
let docBody = document.querySelector('body');

//Opens responsive menu
openMenuButton.addEventListener('click', function () {
    responsiveNavigation.style.display = 'block';
    responsiveNavigation.style.position = 'fixed';
    docBody.style.overflowY = 'hidden';
}, false);

//Closes responsive menu
closeMenuButton.addEventListener('click', function () {
    responsiveNavigation.style.display = 'none';
    docBody.style.overflowY = 'initial';
}, false);