document.addEventListener("DOMContentLoaded", function () {
    // ELEMENTS
    const modal = document.getElementById("auth-modal");
    const openBtn = document.getElementById("open-modal-btn");
    const closeBtn = document.getElementById("close-modal-btn");

    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    const switchToRegister = document.getElementById("switch-to-register");
    const switchToLogin = document.getElementById("switch-to-login");

    const loginError = document.getElementById("login-error");

    // ============================
    // BUKA / TUTUP MODAL
    // ============================

    openBtn.addEventListener("click", () => {
        modal.classList.add("open");
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.remove("open");
    });

    // Klik background → tutup modal
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("open");
            loginError.style.display = "none";
        }
    });

    // ============================
    // SWITCH LOGIN ↔ REGISTER
    // ============================

    switchToRegister.addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.style.display = "none";
        registerForm.style.display = "block";
        loginError.style.display = "none";
    });

    switchToLogin.addEventListener("click", (e) => {
        e.preventDefault();
        registerForm.style.display = "none";
        loginForm.style.display = "block";
    });

    // ============================
    // CSRF TOKEN GETTER
    // ============================

    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    // ============================
    // LOGIN AJAX
    // ============================

    loginForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        const email = loginForm.querySelector("#email").value;
        const password = loginForm.querySelector("#password").value;

        const response = await fetch("/login", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ email, password }),
        });

        const result = await response.json();

        if (result.redirect) {
            loginError.style.display = "none";
            modal.classList.remove("open");

            // Arahkan ke halaman diabetes
            window.location.href = result.redirect;
        } else {
            loginError.textContent = result.message;
            loginError.style.display = "block";
        }
    });

    // ============================
    // REGISTER AJAX
    // ============================

    registerForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(registerForm);

        const response = await fetch("/register", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
            },
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            alert("Akun berhasil dibuat! Silakan login.");

            registerForm.reset();

            registerForm.style.display = "none";
            loginForm.style.display = "block";
        } else {
            alert(result.message);
        }
    });
});
