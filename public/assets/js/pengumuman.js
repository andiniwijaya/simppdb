document.addEventListener("DOMContentLoaded", function () {

    const card = document.querySelector(".pengumuman-card");
    if (!card) return;

    // animasi masuk
    card.style.opacity = 0;
    card.style.transform = "translateY(20px)";

    setTimeout(() => {
        card.style.transition = "all .5s ease";
        card.style.opacity = 1;
        card.style.transform = "translateY(0)";
    }, 100);

});
