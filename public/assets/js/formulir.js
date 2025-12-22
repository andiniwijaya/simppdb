document.addEventListener("DOMContentLoaded", function() {

    // ambil tombol tab
    const tabSiswa = document.querySelector('[data-bs-target="#tabSiswa"]');
    const tabOrtu  = document.querySelector('[data-bs-target="#tabOrtu"]');
    const tabWali  = document.querySelector('[data-bs-target="#tabWali"]');

    //  FUNGSI PINDAH TAB UMUM

    function switchTab(tabButton){
        if(tabButton){
            tabButton.click();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }

    //  FUNGSI PINDAH TAB TERTENTU

    window.switchToSiswa = function(){
        switchTab(tabSiswa);
    }

    window.switchToOrtu = function(){
        switchTab(tabOrtu);
    }

    window.switchToWali = function(){
        switchTab(tabWali);
    }


    //  VALIDASI BASIC FORM CLIENT

    const form = document.getElementById("formPendaftar");

    if(form){
        form.addEventListener("submit", function(e){

            // cari semua input required
            const required = form.querySelectorAll("[required]");

            let empty = false;

            required.forEach(x => {
                if(x.value.trim() === ""){
                    empty = true;
                    x.classList.add("is-invalid");
                } else {
                    x.classList.remove("is-invalid");
                }
            });

            if(empty){
                alert("Masih ada kolom wajib yang kosong.");
                e.preventDefault();
            }
        });
    }


    //  HAPUS INVALID STATE SAAT DIISI

    document.querySelectorAll("input, select, textarea").forEach(el => {

        el.addEventListener("input", () => {
            el.classList.remove("is-invalid");
        });

    });

});
