


<section class="h-[40vh] bg-slate-500 overflow-hidden" >

<div>
<div class="slideshow-container h-[40vh] ">
        <div class="mySlides ">
            <img src="img/carousal/BXGY_2X_PC._CB581582274_.jpg" alt="Slide 1">
        </div>
        <div class="mySlides ">
            <img src="img/carousal/PC_hero_1_2x_1._CB582889946_.jpg" alt="Slide 2">
        </div>
        <div class="mySlides ">
            <img src="img/carousal/slide.jpg" alt="Slide 3">
        </div>
        <div class="mySlides ">
            <img src="img/carousal/slide2.jpg" alt="Slide 4">
        </div>
    </div>
</div>

<script>

let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("mySlides");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].classList.remove("fade-in");
    }

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    slides[slideIndex - 1].classList.add("fade-in");

    setTimeout(showSlides, 3000); // Change slide every 3 seconds
}


</script>
</section>