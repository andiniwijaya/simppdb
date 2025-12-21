document.getElementById("formBayar").addEventListener("submit", function(e) {

    document.getElementById("btnSubmit").innerText = "Mengupload...";
    document.getElementById("btnSubmit").disabled = true;

    // validasi tambahan
    let file = document.querySelector("input[type='file']").value;

    if(file === ""){
        alert("Silakan pilih file terlebih dahulu.");
        e.preventDefault();
        document.getElementById("btnSubmit").innerText = "Upload Bukti";
        document.getElementById("btnSubmit").disabled = false;
        return;
    }

});
