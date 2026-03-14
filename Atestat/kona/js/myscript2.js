function afiseazaTabel(idTabel) {
    var tabel = document.getElementById(idTabel);
    
    // Ascunde toate celelalte tabele care nu sunt cea specificată
    var toateTabelele = document.querySelectorAll('.tabel');
    toateTabelele.forEach(function(tabelAlt) {
        if (tabelAlt !== tabel) {
            tabelAlt.style.display = "none";
            tabelAlt.classList.remove("highlight");
        }
    });

    // Verifică dacă tabelul specificat este deja afișat
    var esteAfișat = tabel.style.display !== "none";

    // Afișează sau ascunde tabelul specificat în funcție de starea sa curentă
    if (!esteAfișat) {
        tabel.style.display = "block";
        tabel.classList.add("highlight");
    } else {
        tabel.style.display = "none";
    }
}

  
  function afiseazaButoaneleSuplimentare() {
    var butoaneSuplimentare = document.getElementById("butoaneSuplimentare");
    if (butoaneSuplimentare.classList.contains("ascuns")) {
        butoaneSuplimentare.classList.remove("ascuns");
    } else {
        butoaneSuplimentare.classList.add("ascuns");
    }
  }
  
  function redirectPagina(url) {
    window.location.href = url;
  }
  
  function redirectPaginaPrincipala() {
    window.location.href = 'paginap.html'; 
  }
  
  // Adaugă o funcție pentru fiecare buton suplimentar
  document.getElementById("butonConfigurare").addEventListener("click", function() {
      redirectPagina('Configurarepagina.html');
  });
  
  document.getElementById("butonCautAntrenor").addEventListener("click", function() {
      redirectPagina('OrarAntrenori.php');
  });
  
  document.getElementById("butonCautPartenerAntrenament").addEventListener("click", function() {
      redirectPagina('OrarAntrenament.php');
  });
  

  