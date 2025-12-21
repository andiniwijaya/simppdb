function showTab(event, id){
    
    // sembunyikan semua tab
    document.querySelectorAll(".tab").forEach(e=>{
        e.style.display = "none";
    });

    // tampilkan tab yang dipilih
    document.getElementById(id).style.display = "block";

    // aktifkan nav yang diklik
    document.querySelectorAll(".sidebar nav a").forEach(a=>{
        a.classList.remove("active");
    });

    event.target.classList.add("active");

    // ganti judul halaman atas
    let text = event.target.innerText.trim();
    document.getElementById("judulHalaman").innerHTML = text;
}

console.log("Dashboard siswa loaded!");
s