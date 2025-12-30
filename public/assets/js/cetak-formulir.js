document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("btnCetak");

    if (btn) {
        btn.addEventListener("click", function () {
            window.print();
        });
    }
});
