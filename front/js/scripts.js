/*!
 * Start Bootstrap - Modern Business v5.0.7 (https://startbootstrap.com/template-overviews/modern-business)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-modern-business/blob/master/LICENSE)
 */
// This file is intentionally blank
// Use this file to add JavaScript to your project

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

// Event Listener untuk tombol "Beli Sekarang"
document.addEventListener("DOMContentLoaded", () => {
  const buyButtons = document.querySelectorAll(".btn-buy");

  buyButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const productId = button.dataset.id;
      alert(`Produk dengan ID ${productId} telah ditambahkan ke pembelian.`);
    });
  });
});

// Mengaktifkan Dropdown Navbar
document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
  dropdownToggles.forEach((dropdown) => {
    dropdown.addEventListener("click", function (e) {
      e.preventDefault();
      const menu = this.nextElementSibling;
      if (menu) {
        menu.classList.toggle("show");
      }
    });
  });
});

//Mengatasi Form Newsletter
document.addEventListener("DOMContentLoaded", function () {
  const newsletterButton = document.getElementById("button-newsletter");
  const newsletterInput = document.querySelector(
    "input[placeholder='Email address...']"
  );

  newsletterButton.addEventListener("click", function () {
    if (newsletterInput.value.trim() === "") {
      alert("Mohon masukkan alamat email Anda!");
    } else {
      alert(`Terima kasih telah berlangganan, ${newsletterInput.value}!`);
      newsletterInput.value = ""; // Mengosongkan input setelah submit
    }
  });
});

//Efek Animasi Scroll untuk Navigasi
document.addEventListener("DOMContentLoaded", function () {
  const smoothLinks = document.querySelectorAll('a[href^="#"]');
  smoothLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetID = this.getAttribute("href").slice(1);
      const targetElement = document.getElementById(targetID);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
});

//Peringatan Ketika Mengakses Produk Tanpa Login
document.addEventListener("DOMContentLoaded", function () {
  const buyButtons = document.querySelectorAll(".needlgn");

  buyButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      const userLoggedIn = false; // Ubah logika sesuai dengan status login
      if (!userLoggedIn) {
        alert("Silakan login terlebih dahulu untuk membeli produk!");
        window.location.href = "/tokoonline/back/login.php";
      } else {
        window.open(this.getAttribute("href"), "_blank");
      }
    });
  });
});

//Menambahkan Loader saat Halaman Dimuat
document.addEventListener("DOMContentLoaded", function () {
  const loader = document.createElement("div");
  loader.id = "page-loader";
  loader.style.position = "fixed";
  loader.style.top = "0";
  loader.style.left = "0";
  loader.style.width = "100%";
  loader.style.height = "100%";
  loader.style.backgroundColor = "rgba(255, 255, 255, 0.9)";
  loader.style.zIndex = "9999";
  loader.innerHTML =
    '<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><img src="assets/loader.gif" alt="Loading..."></div>';
  document.body.appendChild(loader);

  window.addEventListener("load", function () {
    loader.style.display = "none";
  });
});
