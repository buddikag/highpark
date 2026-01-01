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

// Gallery Lightbox
document.addEventListener("DOMContentLoaded", () => {
  const galleryItems = document.querySelectorAll(".gallery-item");
  const lightbox = document.getElementById("lightbox");
  const lightboxImage = document.getElementById("lightbox-image");
  const lightboxClose = document.querySelector(".lightbox-close");
  const lightboxPrev = document.querySelector(".lightbox-prev");
  const lightboxNext = document.querySelector(".lightbox-next");
  
  let currentImageIndex = 0;
  const images = Array.from(galleryItems).map(item => ({
    src: item.querySelector(".gallery-image").src,
    alt: item.querySelector(".gallery-image").alt
  }));

  // Open lightbox
  galleryItems.forEach((item, index) => {
    item.addEventListener("click", () => {
      currentImageIndex = index;
      updateLightboxImage();
      lightbox.classList.add("active");
      document.body.style.overflow = "hidden";
    });
  });

  // Close lightbox
  lightboxClose.addEventListener("click", closeLightbox);
  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (lightbox.classList.contains("active")) {
      if (e.key === "Escape") {
        closeLightbox();
      } else if (e.key === "ArrowLeft") {
        prevImage();
      } else if (e.key === "ArrowRight") {
        nextImage();
      }
    }
  });

  // Navigation functions
  function updateLightboxImage() {
    lightboxImage.src = images[currentImageIndex].src;
    lightboxImage.alt = images[currentImageIndex].alt;
  }

  function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    updateLightboxImage();
  }

  function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    updateLightboxImage();
  }

  function closeLightbox() {
    lightbox.classList.remove("active");
    document.body.style.overflow = "auto";
  }

  // Navigation buttons
  lightboxNext.addEventListener("click", (e) => {
    e.stopPropagation();
    nextImage();
  });

  lightboxPrev.addEventListener("click", (e) => {
    e.stopPropagation();
    prevImage();
  });
});