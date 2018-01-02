<!-- Note remember to include carousel.css and carousel.js -->
    <!-- Slideshow container -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      @foreach ($images as $image)
          <div class="mySlides fade-carousel">
            <div class="numbertext">1 / 3</div>
            <img src="{{$image}}" style="width:100%">
            <div class="text">{{$captions[$loop->index]}}</div>
          </div>
      @endforeach

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
      @foreach ($images as $image)
          <span class="dot" onclick="currentSlide({{$loop->index}})"></span> 
      @endforeach
    </div>
