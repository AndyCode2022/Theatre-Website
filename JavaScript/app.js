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
