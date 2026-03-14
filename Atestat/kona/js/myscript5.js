// Funcția pentru afișarea sau ascunderea butoanelor suplimentare
function afiseazaButoaneleSuplimentare1() {
    var butoaneSuplimentare = document.getElementById("butoaneSuplimentare");
    if (butoaneSuplimentare.classList.contains("ascuns")) {
        butoaneSuplimentare.classList.remove("ascuns");
    } else {
        butoaneSuplimentare.classList.add("ascuns");
    }
}

// Funcția pentru redirecționarea paginii către un URL specificat
function redirectPagina1(url) {
    console.log("redirecting to URL");
    window.location.href = url;
}

// Funcția pentru redirecționarea paginii către pagina principală
function redirectPaginaPrincipala() {
    window.location.href = 'paginap.html'; 
}

// Adaugă un eveniment de clic pentru fiecare buton suplimentar pentru a redirecționa către pagini diferite
//document.getElementById("butonConfigurare").addEventListener("click", function() {
//    log('buton configurare');
//   redirectPagina1('Configurareprofil.php');

//});

//document.getElementById("butonpaginaprofil").addEventListener("click", function() {
  //  redirectPagina1('pagina_profil.html');
//});

