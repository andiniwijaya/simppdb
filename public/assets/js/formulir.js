document.addEventListener("DOMContentLoaded", function() {

    // =============================
    // AMBIL TOMBOL TAB
    // =============================
    const tabSiswa = document.querySelector('[data-bs-target="#tabSiswa"]');
    const tabOrtu  = document.querySelector('[data-bs-target="#tabOrtu"]');
    const tabWali  = document.querySelector('[data-bs-target="#tabWali"]');

    function switchTab(tabButton){
        if(tabButton){
            tabButton.click();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }

    window.switchToSiswa = () => switchTab(tabSiswa);
    window.switchToOrtu  = () => switchTab(tabOrtu);
    window.switchToWali  = () => switchTab(tabWali);

    // =============================
    // VALIDASI FORM
    // =============================
    const form = document.getElementById("formPendaftar");

    if(form){
        form.addEventListener("submit", function(e){

            const required = form.querySelectorAll("[required]");
            let empty = false;

            required.forEach(el => {
                if(el.value.trim() === ""){
                    empty = true;
                    el.classList.add("is-invalid");
                } else {
                    el.classList.remove("is-invalid");
                }
            });

            // ❌ JIKA MASIH ADA KOSONG
            if(empty){
                alert("Masih ada kolom wajib yang kosong.");
                e.preventDefault();
                return;
            }

            // ✅ JIKA SEMUA VALID
            alert("✅ Data berhasil disimpan!");
            // form akan tetap dikirim ke server
        });
    }

    // =============================
    // HAPUS INVALID SAAT DIKETIK
    // =============================
    document.querySelectorAll("input, select, textarea").forEach(el => {
        el.addEventListener("input", () => {
            el.classList.remove("is-invalid");
        });
    });

});
