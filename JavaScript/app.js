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

// Submit event custom event handler
function logSubmit(event) {
  log.textContent = `Form Submitted! Timestamp: ${event.timeStamp}`;
  event.preventDefault();
}

const form = document.getElementById("form");
const log = document.getElementById("log");
form.addEventListener("submit", logSubmit);

// references
// https://developer.mozilla.org/en-US/docs/Web/API/HTMLFormElement/submit_event

// Says to the user that the page is loaded when window is opened in browser
window.addEventListener("load", (event) => {
  alert("page is fully loaded");
});

// references
// https://developer.mozilla.org/en-US/docs/Web/API/Window/load_event

// Change event
element.addEventListener('change', function () {
  // handle change
});

// references
// https://www.javascripttutorial.net/javascript-dom/javascript-change-event/

// Key event handler

document.addEventListener(
  "keyup",
  (event) => {
    const keyName = event.key;

    // As the user releases the Ctrl key, the key is no longer active,
    // so event.ctrlKey is false.
    if (keyName === "Control") {
      alert("Control key was released");
    }
  },
  false
);

// references
// https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent


function displayDate() {
  document.getElementById("demo").innerHTML = Date();
}