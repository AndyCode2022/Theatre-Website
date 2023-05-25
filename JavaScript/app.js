// Pop up event to remind user to enter username and password
function getValue() {
      var retVal = prompt("Enter your name : ", "your name here");
      document.write("You have entered : " + retVal);
    }

// references
// https://brightspace.uhi.ac.uk/d2l/le/content/310944/viewContent/2360097/View

// cookies

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

    // end of hamburger icon



// Says to the user that the page is loaded when window is opened in browser
// window.addEventListener("load", (event) => {
//   alert("page is fully loaded");
// });

// references
// https://developer.mozilla.org/en-US/docs/Web/API/Window/load_event


// Date event
function displayDate() {
  document.getElementById("demo").innerHTML = Date();
}

