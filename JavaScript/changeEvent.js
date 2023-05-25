const selectElement = document.querySelector(".joker");
const result = document.querySelector(".result");

selectElement.addEventListener("change", (event) => {
    result.textContent = `You like ${event.target.value}`;
});