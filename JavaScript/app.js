// Javascript time button that updates to the current time
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function time() {
    var date = new Date();
    var hh = date.getHours();
    var mm = date.getMinutes();
    var ss = date.getSeconds();

    // adding 0 for single digits

    mm = checkTime(mm);
    ss = checkTime(ss);
    document.getElementById('datebtn').innerHTML = hh + ":" + mm + ":" + ss;
}

// Pop up to remind user to enter username and password
function getValue() {
      var retVal = prompt("Enter your name : ", "your name here");
      document.write("You have entered : " + retVal);
    }