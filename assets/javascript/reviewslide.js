let sIndex = 1;
showSlides(sIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(sIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(sIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("review_slide");
    if (n > slides.length) { sIndex = 1 }
    if (n < 1) { sIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
            console.log(slides);

        slides[i].classList.remove("active");
    }
    slides[sIndex - 1].classList.add("active");
}