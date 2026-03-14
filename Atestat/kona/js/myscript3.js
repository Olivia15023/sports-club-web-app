// Funcția pentru afișarea sau ascunderea butoanelor suplimentare
function afiseazaButoaneleSuplimentare() {
    var butoaneSuplimentare = document.getElementById("butoaneSuplimentare");
    if (butoaneSuplimentare.classList.contains("ascuns")) {
        butoaneSuplimentare.classList.remove("ascuns");
    } else {
        butoaneSuplimentare.classList.add("ascuns");
    }
}

// Funcția pentru redirecționarea paginii către un URL specificat
function redirectPagina(url) {
    window.location.href = url;
}

// Funcția pentru redirecționarea paginii către pagina principală
function redirectPaginaPrincipala() {
    window.location.href = 'paginap.html'; 
}

// Adaugă un eveniment de clic pentru fiecare buton suplimentar pentru a redirecționa către pagini diferite
document.getElementById("butonConfigurare").addEventListener("click", function() {
    redirectPagina('Configurarepagina.html');
});

document.getElementById("butonCautAntrenor").addEventListener("click", function() {
    redirectPagina('Caut-antrenor.html');
});

document.getElementById("butonCautPartener").addEventListener("click", function() {
    redirectPagina('Caut-partener.html');
});

document.getElementById("butonAntrenament").addEventListener("click", function() {
    redirectPagina('Antrenament.html');
});
