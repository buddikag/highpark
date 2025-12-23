const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");
const header = document.getElementById("mainHeader");

// Mobile menu toggle
menuToggle.addEventListener("click", () => {
  menuToggle.classList.toggle("active");
  navMenu.classList.toggle("active");
});

// Header scroll effect
window.addEventListener("scroll", () => {
  if (window.scrollY > 80) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// Move to top button
const moveToTopBtn = document.getElementById("moveToTop");

window.addEventListener("scroll", () => {
  if (window.scrollY > 500) {
    moveToTopBtn.style.display = "block";
  } else {
    moveToTopBtn.style.display = "none";
  }
});

moveToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Reveal animations
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(
    ".reveal, .reveal-left, .reveal-right"
  );

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    },
    { threshold: 0.15 }
  );

  elements.forEach((el) => observer.observe(el));
});
