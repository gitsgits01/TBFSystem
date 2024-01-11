<!doctype html>
<html lang="en">
  <head>
    <title>Travel Together</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Add these lines to the <head> section of your HTML file or Blade layout -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <header>
        <nav>
            <div class="navbar">
                <div id="travel">
                    TRAVEL <i class="fa-solid fa-people-group"></i> TOGETHER 
                </div>
                <div class="me">
                    <input tye="checkbox" id="check"> <!-- this is the button-->
                    <label for ="check" class="checkbtn" >
                        <i class="fas fa-bars"></i>
                    </label>
                </div>
                <div class="section_nav">
                <ul>
                    <li><a href="#aboutcontent">About Us</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('signup')}}">SignUp</a></li>
                  <li><a href="" id="home"><i class="fa-solid fa-house"></i> Home</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
    <div class="container">
        <div class="text-container">
            <p>Discover  Connect  Explore</p>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('photos/man2.jpg') }}" alt="Image 1"></div>
                <div class="swiper-slide"><img src="{{ asset('photos/kha2.jpg') }}" alt="Image 2"></div>
                <div class="swiper-slide"><img src="{{asset('photos/backgroundpkr.jpg')}}" alt="Fewa Lake"></div>
                <!-- Add more slides as needed -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!--<div class="slider-container">
        <ul class="slider">
            <li><img src="{{asset('photos/background.jpg')}}" alt="Mystic Mountain Range"/></li>
            <li><img src="{{asset('photos/man2.jpg')}}" alt="Mesmerizing Manang"/></li>
            <li><img src="{{asset('photos/kha2.jpg')}}" alt="Greenish Khaptad"/></li>
        </ul>
        <button class="prev">Previous</button>
        <button class="next">Next</button>
    </div>-->

    <div id="aboutcontent">
        @include('aboutus')
    </div>
    </main>
    <footer>
        <div class="footer_section">
                <div>
                    <ul class="social_media">
                     <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="text_footer">
            <p>2023 TRAVEL TOGETHER<br/>&hearts; Gitima & Anita </P>
        </div>
    </footer>
    <script src="{{asset('js/index.js')}}"></Script>
    <script src="{{asset('js/aboutus.js')}}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>