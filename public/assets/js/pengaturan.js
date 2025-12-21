document.querySelectorAll(".pengaturan-nav li").forEach(li => {
    li.addEventListener("click", function(){

        document.querySelector(".pengaturan-nav li.active").classList.remove("active");
        this.classList.add("active");

        let target = this.dataset.target;

        document.querySelector(".pengaturan-page.show").classList.remove("show");
        document.getElementById(target).classList.add("show");

    });
});
