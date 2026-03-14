function showImage(src) {
  var expanded_img_element = document.getElementById("expanded_img");
  var single_image_display = document.getElementById("single_image_display");
  var image_content = document.querySelector(".image_content img");

  single_image_display.style.display = "block";
  image_content.src = src;
}

function closeImage() {
  var single_image_display = document.getElementById("single_image_display");
  single_image_display.style.display = "none";
}
