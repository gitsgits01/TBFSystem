<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Hotels</title>
    <link href="https://fonts.google.com/icons?query=poppins">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky top">
        <div class="container-fluid">
          <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{route('dashboard')}}">Travel Together</a>
          <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Rooms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Facilities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Contact Us</a>
              </li>
            </ul>
            <div class="d-flex">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
          </div>
        </div> 
      </nav>
      


    <!--check availability form-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="Font-weight:500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div> 
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="Font-weight:500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div> 
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="Font-weight:500;">Adult</label>
                             <select class="form-select shadow-none" >
\                               <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div> 
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="Font-weight:500;">children</label>
                             <select class="form-select shadow-none" >
                                <option value="0">Zero</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div> 
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-black shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- room cards-->
    <h2 class="mt-5 pt-4 text-center fw-bold">Our Rooms</h2>
    <div class="container">
        <div class="row">
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/download (1).jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/download (1).jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/download (3).jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/images.jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/images.jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/images.jpg" class="card-img-top">
                <div class="card-body">
                  <h5>Simple Room Name</h5>
                  <h6 class="mb-4">Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        2 Bathrooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        1 Balcony
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        WIFI
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Television
                    </span>
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        AC
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    <a href="#" class="btn btn-primary">Book Now</a>
                    <a href="#" class="btn btn-primary">More details</a>

                  </div>
                 
                </div>
              </div>
        </div>

        </div>
       
                   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>