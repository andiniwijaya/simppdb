document.querySelectorAll(".kelembagaan-nav li").forEach(tab => {

    tab.addEventListener("click", () => {

        // REMOVE ACTIVE NAV
        document.querySelectorAll(".kelembagaan-nav li")
        .forEach(x => x.classList.remove("active"));

        tab.classList.add("active");

        // HIDE ALL PAGES
        document.querySelectorAll(".kelembagaan-page")
        .forEach(page => page.classList.remove("show"));

        // TARGET PAGE
        let id = tab.getAttribute("data-target");
        document.getElementById(id).classList.add("show");

    });

});
