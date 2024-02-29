


<section class="h-[40vh] w-full overflow-hidden " >


<div class="slideshow-container ">

    <div class="mySlides fade">
      <img src="img/carousal/product.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <img src="img/carousal/product (1).jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <img src="img/carousal/product (2).jpg" style="width:100%">
    </div>
    <div class="mySlides fade">
      <img src="img/carousal/product (3).jpg" style="width:100%">
    </div>

  </div>


<script>

let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlides, 3000); // Change image every 3 seconds
    }


</script>
</section>