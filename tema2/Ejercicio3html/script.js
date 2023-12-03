
let currentSlide = 0;
const totalSlides = document.querySelectorAll('.carousel-item').length;

function moveSlide(direction) {
    if (direction === 'left') {
        currentSlide = Math.max(currentSlide - 1, 0);
    } else {
        currentSlide = Math.min(currentSlide + 1, totalSlides - 1);
    }
    updateCarousel();
}

function updateCarousel() {
    const slides = document.querySelectorAll('.carousel-item');
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(-${currentSlide * 100}%)`;

        slide.classList.remove('central');

        if (index === currentSlide+1) {
            slide.classList.add('central');
        }
    });
}


window.onload = updateCarousel;
