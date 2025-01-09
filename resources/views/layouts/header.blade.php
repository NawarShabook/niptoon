

<!--Start Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-inline" href="#">
            <span class="active fw-bold h1"><img src="{{asset('imgs/logo-Niptoon.png')}}" width="74" alt="logo-Niptoon.png">
                Niptoon</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
            aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse text-center" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 home" aria-current="page" href="/">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 tracking" href="{{route('shipments.tracking')}}">Enter tracking ID</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 services" aria-current="page" href="/#Services">Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 about1" aria-current="page" href="/#About">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 contact" aria-current="page" href="/#Contact">Contact Us</a>
                </li>
            </ul>
            <div class="search ps-3 pe-3 d-none d-lg-block">
                <span><img src="{{asset('imgs/icon-Niptoon.png')}}" alt="icon-Niptoon.png" width="32"></span>
            </div>
            <center>
                <a class="more mb-3 mt-3" href="{{route('shipments.tracking')}}">Enter Tracking Id <i
                        class="fas fa-long-arrow-alt-right"></i></a>
            </center>
        </div>
    </div>
</nav>
<!--End Navbar -->
