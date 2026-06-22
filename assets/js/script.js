var fotoIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  console.log(x);
  console.log(x.length);

  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  fotoIndex++;
  if (fotoIndex > x.length) {
    fotoIndex = 1;
  }

  x[fotoIndex - 1].style.display = "block";
  setTimeout(carousel, 5000); //verander foto elke 2 seconden
}
