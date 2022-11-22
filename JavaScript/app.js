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