console.log("Login page loaded");


// --------------------
// TOGGLE PASSWORD
// --------------------
const passField = document.getElementById("passField");
const toggle = document.getElementById("togglePass");

toggle.addEventListener("click", () => {

    if(passField.type === "password"){
        passField.type = "text";
        toggle.classList.remove("bi-eye-slash");
        toggle.classList.add("bi-eye");
    }else{
        passField.type = "password";
        toggle.classList.remove("bi-eye");
        toggle.classList.add("bi-eye-slash");
    }

});


// --------------------
// POPUP LOGIN ERROR
// --------------------
const errorBox = document.getElementById("login-error");

if(errorBox){

    if(errorBox.dataset.type === "password"){
        alert("Password salah! Silahkan coba kembali.");
    }

    if(errorBox.dataset.type === "username"){
        alert("Username / NISN tidak ditemukan!");
    }

    // --------------------
// POPUP REGISTER SUCCESS
// --------------------
(function(){

    const urlParams = new URLSearchParams(window.location.search);

    if(urlParams.has("register_ok")){
        alert("Akun berhasil dibuat! Silahkan login 😊");
    }

})();

}
