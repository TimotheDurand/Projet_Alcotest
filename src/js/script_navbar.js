const burger = document.getElementById("burger");
const navLinks = document.getElementById("navLinks");

if (burger && navLinks) {
    burger.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });
}
