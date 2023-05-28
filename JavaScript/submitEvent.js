function logSubmit(event) {
    log.textContent = `Form Submitted! Timestamp: ${event.timeStamp}`;
    event.preventDefault();
}

const form = document.getElementById("postBlog");
const log = document.getElementById("log");
form.addEventListener("submit", logSubmit);
