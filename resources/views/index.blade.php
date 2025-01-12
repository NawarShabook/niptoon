@extends('layouts.app')

@section('title')
Niptoon Company | Main
@endsection

@section('content')

<span id="page" page="home"></span>

<!-- Start Header -->
<div class="header-track2 pt-5" id="header">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="color-secondry text-center mb-4 fw-bold">Niptoon Company</h1>
            <h1 class="text-white text-center fw-bold mb-1">Shipment &amp; Container Tracking</h1>
        </div>
        <div class="row align-items-center p-3">
            <div class="col-lg-6 pb-4 pb-lg-0">
                <img class="img-fluid w-100" src="{{asset('imgs/Port-Niptoon.png')}}" alt="Port-Niptoon.png">
            </div>
            <div class="col-lg-6">
                <h3 class="active text-uppercase fw-bold">Welcome</h3>
                <h4 class="mb-2 fw-bold color-main">Trusted &amp; Faster Logistic Service Provider</h4>
                <p class="mb-4 fw-bold text-white">We are a specialized shipping company providing reliable and fast
                    shipping services
                    that meet our customers' needs. With our professional team, we ensure that your shipments arrive
                    safely and on time.</p>
                <a class="more mb-3" href="{{route('shipments.tracking')}}">Enter Tracking Id <i
                        class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->

<!-- Start About Services -->
<section id="Services" class="about">
    <div class="container ">
        <div class="row gy-4">
            <div class="image col-xl-5"></div>
            <div class="col-xl-7">
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="fw-bold color-secondry">Our Services</h3>
                    <p class="color-main fw-bold">Explore Our Comprehensive Range of Professional Shipping Services
                        :</p>
                    <div class="row gy-4 mt-3">
                        <div class="col-md-6 icon-box">
                            <i class="fas fa-ship my-icon"></i>
                            <h4 class="color-main fw-bold">Reliable International Shipping</h4>
                            <p>We offer international shipping services via modern vessels, ensuring that your
                                shipments reach global destinations safely and on time.</p>
                        </div>
                        <div class="col-md-6 icon-box">
                            <i class="fas fa-thumbtack my-icon"></i>
                            <h4 class="color-main fw-bold">Shipment Tracking</h4>
                            <p>You can easily track your shipments using your tracking number, giving you peace of
                                mind and the ability to know the status of your shipment at any time.</p>
                        </div>
                        <div class="col-md-6 icon-box">
                            <i class="fas fa-money-bill my-icon"></i>
                            <h4 class="color-main fw-bold">Competitive Prices</h4>
                            <p>We offer competitive pricing for all our shipping services, allowing you to manage
                                your logistics budget effectively while ensuring quality and reliability in every
                                shipment.</p>
                        </div>
                        <div class="col-md-6 icon-box">
                            <i class="fas fa-comments my-icon"></i>
                            <h4 class="color-main fw-bold">Logistics Consulting</h4>
                            <p>We provide specialized logistics consulting to help you choose the best solutions for
                                shipping your goods, considering both cost and time.</p>
                        </div>
                        <div class="col-md-6 icon-box">
                            <i class="fas fa-headset my-icon"></i>
                            <h4 class="color-main fw-bold">24/7 Customer Support</h4>
                            <p>Our team is available 24/7 to meet your needs and answer your inquiries, ensuring you
                                have a smooth and efficient shipping experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Services -->

<!-- Start Services -->
<div class="container-xxl mb-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{asset('imgs/service-1.jpg')}}" alt="service-1.jpg">
                    </div>
                    <h4 class="mb-3 color-main fw-bold">Air Freight</h4>
                    <p>Our air freight services provide fast and reliable air freight services to ensure your
                        shipments reach their destination swiftly and securely.</p>
                    <a href="#Contact" class="more w-100 text-center">MORE</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{asset('imgs/service-2.jpg')}}" alt="service-2.jpg">
                    </div>
                    <h4 class="mb-3 color-main fw-bold">Ocean Freight</h4>
                    <p>Our ocean freight services offer cost-effective solutions for shipping large volumes of goods
                        internationally, ensuring safe and timely delivery.</p>
                    <a href="#Contact" class="more w-100 text-center">MORE</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{asset('imgs/service-3.jpg')}}" alt="service-3.jpg">
                    </div>
                    <h4 class="mb-3 color-main fw-bold">Road Freight</h4>
                    <p>We offer efficient road freight services for domestic transportation, providing flexible and
                        timely delivery options for your shipments.</p>
                    <a href="#Contact" class="more w-100 text-center">MORE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services -->

<!-- Start About Us -->
<div class="bg-white-secondry py-4 pt-0" id="About">
    <div class="container-fluid pt-5 mb-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold color-secondry">About Us</h3>
                <p class="color-main fw-bold">With Years Of Experience, We Streamline Your Shipping For Peace Of
                    Mind :</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative">
                        <div class="position-absolute bg-main d-flex flex-column align-items-center justify-content-center rounded-circle"
                            style="width: 60px; height: 60px; top: 30px; left: 30px;">
                            <img class="rounded-circle" style="width: 40px; height: 40px;"
                                src="{{asset('imgs/icon-Niptoon.png')}}" alt="icon-Niptoon.png">
                        </div>
                        <img class="img-fluid w-100" src="{{asset('imgs/ship-about-us.jpg')}}" alt="ship-about-us.jpg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-main about-us-card" style="padding: 31px;">
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" style="width: 40px; height: 40px;"
                                    src="{{asset('imgs/icon-Niptoon.png')}}" alt="icon-Niptoon.png">
                                <a class="color-secondry fw-bold ml-2" href="">Niptoon</a>
                            </div>
                        </div>
                        <p class="text-white text-uppercase">At Niptoon, we pride ourselves on being a leading
                            logistics provider in the shipping industry. Founded with a vision to deliver
                            excellence, our company has grown to offer a wide range of shipping solutions, including
                            air, ocean, and road freight services.
                            Our team consists of highly skilled professionals committed to ensuring that every
                            shipment is handled with the utmost care and efficiency. We understand the complexities
                            of global logistics and work tirelessly to navigate challenges, providing tailored
                            solutions that meet our customers' specific needs.
                            We prioritize customer satisfaction and transparency, keeping our clients informed
                            throughout the shipping process. With advanced tracking systems and 24/7 support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Us -->

<!-- Start Tracking -->
<div class="container-fluid mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="{{asset('imgs/mobile.jpg')}}" alt="mobile.jpg">
            </div>
            <div class="col-lg-7 py-5 py-lg-0">
                <h3 class="fw-bold color-secondry">Track Shipments</h3>
                <p class="color-main fw-bold">You can easily track your shipments using your tracking number :</p>
                <p class="mb-4">Easily monitor your shipments in real-time using our tracking system. Simply enter
                    your tracking number to check the status and location of your goods, ensuring you stay informed
                    every step of the way.</p>
                <ul class="list-inline">
                    <li>
                        <h6 class="color-main"><i class="far fa-dot-circle color-secondry mr-3"></i>Real-Time
                            Updates</h6>
                    </li>
                    <li>
                        <h6 class="color-main"><i class="far fa-dot-circle color-secondry mr-3"></i>User-Friendly
                            Interface</h6>
                    </li>
                    <li>
                        <h6 class="color-main"><i class="far fa-dot-circle color-secondry mr-3"></i>24/7 Access</h6>
                    </li>
                </ul>
                <a class="more mb-3 mt-3" href="{{route('shipments.tracking')}}">Enter Tracking Id <i
                        class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- End Tracking -->

<!-- Start Contact -->
<div class="container-fluid bg-white-secondry" id="Contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 py-5 py-lg-0">
                <h3 class="fw-bold color-secondry">Contact Us</h3>
                <p class="color-main fw-bold">We’re here to help! If you have any questions or need assistance,<br>
                    please reach out to us through the following channels :</p>
                <ul class="list-inline">
                    <li>
                        <h6 class="color-main"><i
                                class="fas fa-envelope color-secondry mr-3 mt-3"></i>Contact@Niptoon.com</h6>
                    </li>
                    <li>
                        <h6 class="color-main"><i class="fa fa-phone-alt color-secondry mr-3 mt-3"></i>{{$info->number}}
                        </h6>
                    </li>
                    <li>
                        <h6 class="color-main"><i class="fas fa-map-marker-alt color-secondry mr-3 mt-3"></i>{{explode("/",$info->location)[0]}}</h6>
                    </li>
                    <li>
                        <h6 class="color-main"><i class="fas fa-map-marker-alt color-secondry mr-3 mt-3"></i>{{explode("/",$info->location)[1]}}</h6>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="bg-main pt-5 pb-3">
                    <div class="search-form">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Enter Your Name"
                                        style="height: 55px;border-radius: 0;border:0;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Enter Your Email"
                                        style="height: 55px;border-radius: 0;border:0;">
                                </div>
                                <div class="col-12">
                                    <button class="btn more-2 text-white" style="width: 100% !important;"
                                        type="submit">SEND</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->
@endsection
