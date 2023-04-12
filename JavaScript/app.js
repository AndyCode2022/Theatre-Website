// Pop up event to remind user to enter username and password
function getValue() {
      var retVal = prompt("Enter your name : ", "your name here");
      document.write("You have entered : " + retVal);
    }

// Darkmode
function functionDark() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}

// Navbar

const navbar = document.querySelectorAll(".navbar");

// Hamburger Icon

function toggleIcon() {
  var icon = document.querySelector('.navbar-toggler-icon');
  icon.classList.toggle('fa-bars');
  icon.classList.toggle('fa-times');
}

var navbarToggler = document.querySelector('.navbar-toggler');
var navbarCollapse = document.querySelector('.navbar-collapse');

navbarToggler.addEventListener('click', function () {
    toggleIcon();
    navbarCollapse.classList.toggle('show');
    });