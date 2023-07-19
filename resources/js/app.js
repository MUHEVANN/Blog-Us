import "./bootstrap";

import Alpine from "alpinejs";
const navbar = document.getElementById("navbar");
const navbarItems = navbar.getElementsByTagName("li");

for (let i = 0; i < navbarItems.length; i++) {
    navbarItems[i].addEventListener("click", function () {
        const currentActive = document.querySelector(".navbar-active");
        if (currentActive) {
            currentActive.classList.remove("navbar-active");
        }
        this.classList.add("navbar-active");
    });
}

window.Alpine = Alpine;

Alpine.start();
