
<!-- Start Footer -->
<div class="container-fluid bg-main text-light footer pt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{explode("/",$info->location)[0]}}</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{explode("/",$info->location)[1]}}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$info->number}}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Contact@Niptoon.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn-link" href="/#About"><i class="fas fa-angle-right me-3"></i> About Us</a>
                <a class="btn-link" href="/#Contact"><i class="fas fa-angle-right me-3"></i> Contact Us</a>
                <a class="btn-link" href="/#Services"><i class="fas fa-angle-right me-3"></i> Our Services</a>
                <a class="btn-link" href="{{route('shipments.tracking')}}"><i class="fas fa-angle-right me-3"></i> Track Shipments</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Overview</h4>
                <p>Niptoon is a leading logistics provider specializing in reliable shipping solutions. With a
                    commitment to excellence and customer satisfaction, we offer a range of services, including air,
                    ocean, and road freight. Our experienced team ensures that every shipment is handled with care
                    and efficiency, making us your trusted partner in logistics.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="imgs/icon-white.png" width="90" alt="icon-Niptoon.png">
                <p class="text-light mb-4">© 2024 Niptoon. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Footer -->

<!-- Start Loader & Back To Top -->
<div id="preloader"></div>
<a href="#header" class="back-to-top">
    <i class="fas fa-arrow-up"></i></a>
<!-- End Loader & Back To Top -->
