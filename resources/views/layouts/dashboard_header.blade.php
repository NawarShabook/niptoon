<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('imgs/logo-Niptoon.png')}}" height="75px" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
            aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse text-center" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 main " aria-current="page" href="{{route('dashboard')}}">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 newship" aria-current="page" href="{{route('shipments.create')}}">New Shipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 recship" href="{{route('shipments.recent-shipments')}}">Recent Shipments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 allship" href="{{route('shipments.index')}}">All Shipments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 postship" href="{{route('shipments.posted-shipments')}}">Shipments Posted</a>
                </li>
            </ul>
            <div class="search ps-3 pe-3 d-none d-lg-block">
                <img src="{{asset('imgs/icon-Niptoon.png')}}" width="32" alt="">
            </div>
            <center>
                <a class="more text-white" href="/">My Site</a>
            </center>
        </div>
    </div>
</nav>




<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        page=document.getElementById('page');
        title=page.getAttribute('page');
        document.getElementsByClassName(title)[0].classList.add('active');
    });

</script>
