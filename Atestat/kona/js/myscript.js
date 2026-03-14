function toggleForm(formId) {
  var form = document.getElementById(formId);
  if (form.style.display === "block") {
    form.style.display = "none";
  } else {
    form.style.display = "block";
  }
}

function toggleTextAndImage(textId, imageId, button) {
  var text = document.getElementById(textId);
  var image = document.getElementById(imageId);
  var allButtons = document.querySelectorAll('.button');
  
  if (text.style.display === "none") {
    text.style.display = "block";
    image.style.display = "none";
    
    // Dezactivăm toate celelalte butoane
    allButtons.forEach(function(btn) {
      btn.disabled = true;
    });
    
    // Activăm butonul curent
    button.disabled = false;
  } else {
    text.style.display = "none";
    image.style.display = "block";
    
    // Activăm toate butoanele
    allButtons.forEach(function(btn) {
      btn.disabled = false;
    });
  }
}
