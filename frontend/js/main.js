

document.addEventListener('DOMContentLoaded', function () {
    var mobileNavToggle = document.getElementById('mobileNavToggle');
    var navbarList = document.querySelector('#navbar ul');

    mobileNavToggle.addEventListener('click', function () {
        navbarList.classList.toggle('show');
    });
});



let selectHeader = document.getElementById('header');
let selectTopbar = document.getElementById('topbar');

// Function to handle header scrolling
const headerScrolled = () => {
if (window.scrollY > 100) {
    selectHeader.classList.add('header-scrolled');
    if (selectTopbar) {
        selectTopbar.classList.add('topbar-scrolled');
    }
} else {
    selectHeader.classList.remove('header-scrolled');
    if (selectTopbar) {
        selectTopbar.classList.remove('topbar-scrolled');
    }
}
};

// Event listener for when the page loads
window.addEventListener('load', headerScrolled);

// Event listener for the scroll event
window.addEventListener('scroll', headerScrolled);
