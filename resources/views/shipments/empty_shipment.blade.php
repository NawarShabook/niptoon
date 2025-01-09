
<style>
    .false {
      background-color: #c40c0c;
      padding: 10px;
      border-radius: 0;
      text-align: center;
      font-size: 15px;
      margin-top: 7px;
    }
    .false .msg-false {
      color: #f8de22;
      margin-bottom: 0;
    }
</style>

<div class="header-track mb-3">
    <div class="container mb-4 mt-5">
        <div class="row justify-content-center">
            <h1 class="color-secondry text-center mb-4 fw-bold">Niptoon Company</h1>
            <h1 class="text-white text-center fw-bold mb-1">Shipment & Container Tracking</h1>

        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="search-form">
                    <form action="{{route('shipments.tracking')}}" method="GET">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select class="form-select" style="height: 55px;" id="num" name="type">
                                    <option value="ocean">Ocean Cargo</option>
                                    <option value="air">Air Cargo</option>
                                    <option value="lcl">Land Shipping TR</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="code_id" class="form-control" placeholder="Enter Your Id Number . . ." value="{{$code_id}}"
                                    style="height: 55px;border-radius: 0;border:0;" required>
                            </div>
                            <center>
                                <div class="col-12 col-sm-6">
                                    <button class="btn more text-white" style="width: 100% !important;"
                                        type="submit">Track</button>
                                    <div class="false mb-4">
                                        <p class="msg-false">{{$message}}</p>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tracking -->
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <!-- Track List Start -->
            <div class="bg-white" style="padding: 30px 30px 0 30px;">

                <h6 class="color-main text-uppercase fw-bolder mb-4"><img src="imgs/path.png" width="45px"
                        alt="icon-w.png"> Tracking path for the shipment:</h6>
                <h1 class="mb-4 color-secondry fw-bolder">
                    <i class="fa fa-receipt color-main pr-3"></i> <span></span>
                </h1>
                <p class="mb-4">
                </p>
                <!-- Start From -->
                <div class="media mb-4">
                    <img src="imgs/from.png" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">From :</h5>
                        <p class="color-main" style="font-weight: 600;"></p>
                    </div>
                </div>
                <!-- End From -->
                <!-- Start To -->
                <div class="media mb-4">
                    <img src="imgs/to.png" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">To :</h5>
                        <p class="color-main" style="font-weight: 600;"></p>
                    </div>
                </div>
                <!-- End To -->
                <!-- Start stimated Arrival Date -->
                <div class="media mb-4">
                    <img src="imgs/arrival.png" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Estimated Arrival Date :</h5>
                        <p class="color-main" style="font-weight: 600;"></p>
                    </div>
                </div>
                <!-- End stimated Arrival Date -->
                <!-- Start Last Updated -->
                <div class="media mb-4">
                    <img src="imgs/last-updat.png" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Last Updated :</h5>
                        <p class="color-main" style="font-weight: 600;"></p>
                    </div>
                </div>
                <!-- End Last Updated -->
                <!-- Start Last location -->
                <div class="media mb-4">
                    <img src="imgs/last-location.png" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Last location :</h5>
                        <p class="color-main" style="font-weight: 600;"></p>
                    </div>
                </div>
                <!-- End Last location -->
                <!-- Start Last location -->
                <div class="media mb-4">
                    <div class="media-body">
                        <a href="#" class="more w-100 text-center"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
                <!-- End Last location -->
            </div>
            <!-- Path List End -->

        </div>
        <div class="col-md-7">
            <div class="bg-white" style="padding: 30px;">
                <ul class="timeline timeline-centered ">
                    <!-- Start First Point -->
                    <div class="timeline-item period">
                        <div class="timeline-info"></div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <p class="my-number">1</p>
                            <h4 class="timeline-title">Main Title</h4><br>
                            <p class="timeline-title-secondry">Secondry Title</p>
                        </div>
                    </div>
                    <!-- End First Point -->
                    <li class="timeline-item done">
                        <div class="timeline-info">
                            <span class="date-action"></span>
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <p><i class="fas fa-shapes my-icon-time"></i></p>
                            <h6 class="timeline-title my-action p-3">Action</h6>
                            <p class="my-note p-3">note</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->
    </div>
</div>

