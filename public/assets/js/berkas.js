document.getElementById("formUpload").addEventListener("submit", e => {

    let f = document.querySelector("input[type=file]");

    if(!f.value){
        alert("File belum dipilih!");
        e.preventDefault();
    }

    if(f.files[0].size > 5000000){
        alert("Ukuran file max 5MB.");
        e.preventDefault();
    }
});
