// Register touch event handlers
someElement.addEventListener("touchstart", process_touchstart, false);
someElement.addEventListener("touchmove", process_touchmove, false);
someElement.addEventListener("touchcancel", process_touchcancel, false);
someElement.addEventListener("touchend", process_touchend, false);

// touchstart handler
function process_touchstart(ev) {
    // Use the event's data to call out to the appropriate gesture handlers
    switch (ev.touches.length) {
        case 1:
            handle_one_touch(ev);
            break;
        case 2:
            handle_two_touches(ev);
            break;
        case 3:
            handle_three_touches(ev);
            break;
        default:
            gesture_not_supported(ev);
            break;
    }
}

// Create touchstart handler
someElement.addEventListener(
    "touchstart",
    (ev) => {
        // Iterate through the touch points that were activated
        // for this element and process each event 'target'
        for (let i = 0; i < ev.targetTouches.length; i++) {
            process_target(ev.targetTouches[i].target);
        }
    },
    false
);

// touchmove handler
function process_touchmove(ev) {
    // Set call preventDefault()
    ev.preventDefault();
}

// references
// https://developer.mozilla.org/en-US/docs/Web/API/Touch_events/Using_Touch_Events