// 🌿 Navbar Scroll Effect (Changes background color when scrolling)
window.addEventListener("scroll", function () {
    let navbar = document.querySelector("nav");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// 🌿 Mobile Menu Toggle (Opens and closes navbar in mobile view)
document.addEventListener("DOMContentLoaded", function () {
    let menuToggle = document.querySelector(".menu-toggle");
    let navLinks = document.querySelector(".nav-links");

    if (menuToggle && navLinks) {
        menuToggle.addEventListener("click", function () {
            navLinks.classList.toggle("show");
        });
    }
});

// 🌿 Active Link Highlight (Highlights the current page in the navbar)
document.addEventListener("DOMContentLoaded", function () {
    let navItems = document.querySelectorAll(".nav-item");
    let currentPage = window.location.pathname.split("/").pop();

    navItems.forEach(item => {
        if (item.getAttribute("href") === currentPage) {
            item.classList.add("active");
        }
    });
});

// 🌿 Smooth Scroll Behavior
document.documentElement.style.scrollBehavior = "smooth";

// 🌿 Form Validation (Login & Register)
document.addEventListener("DOMContentLoaded", function () {
    let forms = document.querySelectorAll("form");

    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            let inputs = form.querySelectorAll("input");
            let valid = true;

            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    valid = false;
                    input.style.border = "2px solid red";
                } else {
                    input.style.border = "2px solid #ccc";
                }
            });

            if (!valid) {
                alert("Please fill out all fields!");
                event.preventDefault();
            }
        });
    });
});

// 🌿 Update Total Price in Cart Page
document.addEventListener("DOMContentLoaded", function () {
    let totalPriceElement = document.getElementById("total-price");
    if (totalPriceElement) {
        let total = 0;
        document.querySelectorAll(".cart-item-price").forEach(item => {
            total += parseFloat(item.innerText.replace("$", ""));
        });
        totalPriceElement.innerText = `$${total.toFixed(2)}`;
    }
});

// 🌿 Confirm Checkout Before Proceeding
document.addEventListener("DOMContentLoaded", function () {
    let checkoutButton = document.getElementById("checkout-btn");
    if (checkoutButton) {
        checkoutButton.addEventListener("click", function (event) {
            let confirmCheckout = confirm("Are you sure you want to proceed to checkout?");
            if (!confirmCheckout) {
                event.preventDefault();
            }
        });
    }
});

// 🌿 Receipt Download Animation
document.addEventListener("DOMContentLoaded", function () {
    let downloadButton = document.querySelector(".download-btn");
    if (downloadButton) {
        downloadButton.addEventListener("click", function () {
            downloadButton.innerText = "Downloading...";
            setTimeout(() => {
                downloadButton.innerText = "Download PDF";
            }, 3000);
        });
    }
});

