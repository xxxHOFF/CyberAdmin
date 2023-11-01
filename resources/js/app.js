import './bootstrap';
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css';
document.addEventListener("DOMContentLoaded", function () {

    flatpickr(".flatpickr-input", {
        enableTime: true, // Включить выбор времени
        noCalendar: false, // Показать календарь
        minuteIncrement: 10, // Шаг времени в минутах
        time_24hr: true,
        position: "below right",
    });

    let scrollToTopButton = document.getElementById("scrollToTopButton");
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    });
    scrollToTopButton.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    function formatCreatedAtDate(createdAt) {
        const date = new Date(createdAt);
        return date.toLocaleDateString('ru-RU', { year: 'numeric', month: 'long', day: 'numeric' });
    }

    function getRoleFromLevel(level) {
        switch (level) {
            case 0:
                return "Пользователь";
            case 1:
                return "Администратор";
            case 2:
                return "Старший администратор";
            case 3:
                return "Руководитель";
            default:
                return "Неизвестная роль";
        }
    }

    function fetchUserInfo() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/user-info', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.responseText);
                document.getElementById('userInfo_name').textContent = data.name;
                document.getElementById('userInfo_email').textContent = data.email;
                document.getElementById('userInfo_address').textContent = data.address;
                document.getElementById('userInfo_level').textContent = getRoleFromLevel(data.level);
                document.getElementById('userInfo_createdAt').textContent = formatCreatedAtDate(data.created_at);
            }
        };

        xhr.send();
    }
    let openProfile = document.getElementById('openProfile');
    openProfile.addEventListener('shown.bs.offcanvas', fetchUserInfo);

    // Находим все элементы кнопок увеличения и уменьшения количества продуктов
    const incrementButtons = document.querySelectorAll('[id^="increment_"]');
    const decrementButtons = document.querySelectorAll('[id^="decrement_"]');

    // Находим элемент для отображения итоговой стоимости
    const totalPriceElement = document.getElementById('totalPrice');

    // Обработчик клика на кнопку увеличения количества продукта
    function incrementQuantity(productId) {
        const quantityElement = document.getElementById(`product_qty_${productId}`);
        const price = parseInt(quantityElement.getAttribute('data-quantity')) + 1;
        quantityElement.setAttribute('data-quantity', price);
        quantityElement.innerText = price;

        // Вызываем функцию для обновления итоговой стоимости
        updateTotalPrice();
    }

    // Обработчик клика на кнопку уменьшения количества продукта
    function decrementQuantity(productId) {
        const quantityElement = document.getElementById(`product_qty_${productId}`);
        const price = parseInt(quantityElement.getAttribute('data-quantity'));
        if (price > 0) {
            quantityElement.setAttribute('data-quantity', price - 1);
            quantityElement.innerText = price - 1;

            // Вызываем функцию для обновления итоговой стоимости
            updateTotalPrice();
        }
    }

    // Функция для обновления итоговой стоимости
    function updateTotalPrice() {
        let total = 0;
        // Проходим по всем элементам с количеством продуктов и ценой
        const quantityElements = document.querySelectorAll('.product-quantity');
        quantityElements.forEach((element) => {
            const quantity = parseInt(element.getAttribute('data-quantity'));
            const price = parseInt(element.parentElement.parentElement.getAttribute('data-price'));
            total += quantity * price;
        });

        // Обновляем отображение итоговой стоимости
        totalPriceElement.innerText = total;
    }

    // Добавляем обработчики клика к кнопкам увеличения и уменьшения
    incrementButtons.forEach((button) => {
        const productId = button.id.split('_')[1];
        button.addEventListener('click', () => incrementQuantity(productId));
    });

    decrementButtons.forEach((button) => {
        const productId = button.id.split('_')[1];
        button.addEventListener('click', () => decrementQuantity(productId));
    });


    const saleForm = document.getElementById('saleForm');
    const productsDataInput = document.getElementById('productsData');

    saleForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Создайте массив для хранения выбранных товаров
        const selectedProducts = [];

        // Получите все элементы списка товаров
        const productItems = document.querySelectorAll('.product-list');

        productItems.forEach(function(item) {
            const quantityElement = item.querySelector('.product-quantity');
            if (quantityElement) {
                const quantity = parseInt(quantityElement.textContent);

                if (quantity > 0) {
                    const name = item.querySelector('.product-name').textContent;
                    const price = parseFloat(item.getAttribute('data-price'));

                    // Добавьте выбранный товар в массив
                    selectedProducts.push({
                        name: name,
                        price: price,
                        quantity: quantity,
                    });
                }
            }
        });

        // Заполните поле с данными о продаже перед отправкой формы
        productsDataInput.value = JSON.stringify(selectedProducts);

        // Отправьте форму на сервер
        saleForm.submit();
    });
});
