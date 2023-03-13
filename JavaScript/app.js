// Pop up to remind user to enter username and password
function getValue() {
      var retVal = prompt("Enter your name : ", "your name here");
      document.write("You have entered : " + retVal);
    }

// Clock
function updateClock() {
    let now = new Date();
    let clock = document.getElementById('clock');
    clock.innerText = now.toLocaleTimeString();
}

setInterval(updateClock, 1000);

// Darkmode

function functionDark() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}
