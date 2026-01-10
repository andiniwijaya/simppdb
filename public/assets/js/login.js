console.log("Login page loaded");

// --------------------
// TOGGLE PASSWORD
// --------------------
const passField = document.getElementById("passField");
const toggle = document.getElementById("togglePass");

if (toggle) {
    toggle.addEventListener("click", () => {
        if (passField.type === "password") {
            passField.type = "text";
            toggle.classList.remove("bi-eye-slash");
            toggle.classList.add("bi-eye");
        } else {
            passField.type = "password";
            toggle.classList.remove("bi-eye");
            toggle.classList.add("bi-eye-slash");
        }
    });
}

// --------------------
// POPUP LOGIN ERROR
// --------------------
const errorBox = document.getElementById("login-error");

if (errorBox) {
    if (errorBox.dataset.type === "password") {
        alert("Password salah! Silakan coba kembali.");
    }

    if (errorBox.dataset.type === "username") {
        alert("Username / NISN tidak ditemukan!");
    }
}

// --------------------
// POPUP LOGIN SUCCESS
// --------------------
const successBox = document.getElementById("login-success");

if (successBox) {
    const nama = successBox.dataset.nama;
    alert(`Selamat datang, ${nama} 👋`);
}
