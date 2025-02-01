document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm")?.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("backend.php?action=register", { method: "POST", body: formData })
            .then(response => response.text())
            .then(data => alert(data));
    });

    document.getElementById("loginForm")?.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("backend.php?action=login", { method: "POST", body: formData })
            .then(response => response.text())
            .then(data => alert(data));
    });
});
