const navbar = document.querySelector("nav");

// menambahkan event listener pada setiap elemen navbar
navbar.querySelectorAll("a").forEach((navItem) => {
    navItem.addEventListener("click", () => {
        // menghapus kelas 'active' dari semua elemen navbar
        navbar.querySelectorAll("a").forEach((navItem) => {
            navItem.classList.remove("active");
        });
        // menambahkan kelas 'active' ke elemen navbar yang sesuai dengan halaman yang sedang dibuka
        navItem.classList.add("active");
    });
});
