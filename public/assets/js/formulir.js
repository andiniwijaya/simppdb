document.addEventListener("DOMContentLoaded", function() {

    // =============================
    // TAB NAVIGATION
    // =============================
    const tabSiswa = document.querySelector('[data-bs-target="#tabSiswa"]');
    const tabOrtu  = document.querySelector('[data-bs-target="#tabOrtu"]');
    const tabWali  = document.querySelector('[data-bs-target="#tabWali"]');

    function switchTab(tabButton){
        if(tabButton){
            tabButton.click();
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    }

    window.switchToSiswa = () => switchTab(tabSiswa);
    window.switchToOrtu  = () => switchTab(tabOrtu);
    window.switchToWali  = () => switchTab(tabWali);

    // =============================
    // VALIDASI & ALERT SEMUA FORM
    // =============================
    document.querySelectorAll(".formPendaftar").forEach(form => {

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

            // ❌ masih ada kosong
            if(empty){
                alert("Masih ada kolom wajib yang kosong.");
                e.preventDefault();
                return;
            }

            // =============================
            // ALERT SIMPAN / UPDATE
            // =============================
            const mode = form.querySelector('[name="mode"]');

            if(mode && mode.value === "update"){
                alert("✅ Data berhasil diupdate!");
            } else {
                alert("✅ Data berhasil disimpan!");
            }
        });

    });

    // =============================
    // HAPUS INVALID SAAT DIKETIK
    // =============================
    document.querySelectorAll("input, select, textarea").forEach(el => {
        el.addEventListener("input", () => {
            el.classList.remove("is-invalid");
        });
    });

});
