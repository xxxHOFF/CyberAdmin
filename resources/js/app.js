import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {

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
});
