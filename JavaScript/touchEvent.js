// Touch controls that appear when a user touches the screen with their finger
// Touch controls for touch start, move, and end

document.addEventListener("touchstart", e => {
    alert("touchstart");
})

document.addEventListener("touchstart", f => {
    alert("Move");
})

document.addEventListener("touchstart", h => {
    alert("touchend");
})

// references
// https://www.youtube.com/watch?v=TaPdgj8mucI&ab_channel=WebDevSimplified