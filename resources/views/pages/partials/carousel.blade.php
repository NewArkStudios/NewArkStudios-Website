<!-- Note remember to include carousel.css and carousel.js -->
    <!-- The dots/circles -->

    <!-- Slideshow container -->
    <div class="slideshow-container">
        <div class="slideshow-footer" style="text-align:center">
          @foreach ($images as $image)
              <span class="dot"></span> 
          @endforeach
        </div>
      <!-- Full-width images with number and caption text -->
      @foreach ($images as $image)
          <div class="mySlides fade-carousel-left">
            <img src="{{$image}}" style="width:100%">
            <div class="slideshow-caption">
                <h1 class="slideshow-title">{{$titles[$loop->index]}}</h1>
                <button class="btn btn-primary slideshow-button">{{$buttontext[$loop->index]}}</button>
            </div>
          </div>
      @endforeach

      <!-- Next and previous buttons -->
      <a class="prev" >&#10094;</a>
      <a class="next" >&#10095;</a>
    </div>
    <br>


