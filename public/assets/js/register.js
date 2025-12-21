// ============== CAPTCHA VALIDATION ==============
document.querySelector("form").addEventListener("submit", function(e){

    let response = grecaptcha.getResponse();

    if(response.length === 0){
        e.preventDefault();
        document.getElementById("captcha-msg").classList.remove("d-none");
        document.getElementById("captcha-msg").innerHTML = "Silahkan centang captcha!";
    }

});


// ============== HIDE / SHOW PASSWORD ==============

// untuk password utama
document.getElementById("toggleRegPass").addEventListener("click", function(){

    const pass = document.getElementById("regPass");

    if(pass.type === "password"){
        pass.type = "text";
        this.classList.replace("bi-eye-slash","bi-eye");
    }else{
        pass.type = "password";
        this.classList.replace("bi-eye","bi-eye-slash");
    }

});

// untuk konfirmasi password
document.getElementById("toggleRegPassConfirm").addEventListener("click", function(){

    const pass = document.getElementById("regPassConfirm");

    if(pass.type === "password"){
        pass.type = "text";
        this.classList.replace("bi-eye-slash","bi-eye");
    }else{
        pass.type = "password";
        this.classList.replace("bi-eye","bi-eye-slash");
    }
    // ============== SUCCESS REGISTER ALERT ==============
(function(){

    const urlParams = new URLSearchParams(window.location.search);

    if(urlParams.has("register_ok")){
        alert("Akun berhasil dibuat! Silahkan login 😊");
    }

})();


});
