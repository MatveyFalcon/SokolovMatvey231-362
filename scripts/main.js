// Показ дополнительных отзывов
document.getElementById("show-more-reviews").addEventListener("click", function () {
    const extraReviews = document.querySelector(".extra-reviews");
    if (extraReviews.style.display === "none") {
        extraReviews.style.display = "block";
        this.textContent = "Скрыть отзывы";
    } else {
        extraReviews.style.display = "none";
        this.textContent = "Показать больше отзывов";
    }
});

// Слайдер товаров
let slideIndex = 0;
const slides = document.querySelectorAll(".slide");
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? "block" : "none";
    });
}

function nextSlide() {
    slideIndex = (slideIndex + 1) % totalSlides;
    showSlide(slideIndex);
}

// Запуск слайдера с интервалом 3 секунды
showSlide(slideIndex);
setInterval(nextSlide, 3000);

