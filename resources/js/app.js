import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {
    let scrollToTopButton = document.getElementById("scrollToTopButton");

    // Показать кнопку, когда пользователь начинает прокручивать вниз
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    });

    // Прокрутить наверх, когда кнопка "наверх" нажата
    scrollToTopButton.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const openModalButton = document.getElementById('modalRegisterForm');

});
