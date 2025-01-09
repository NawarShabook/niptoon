@extends('layouts.app')

@section('title')
Niptoon | Tracking
@endsection

@section('head')
{{-- <link rel="stylesheet" href="/css/time.css" /> --}}

@endsection

@section('content')
<span id="page" page="tracking"></span>

@isset($message)

@include('shipments.empty_shipment')

@else


<div class="header-track mb-3">
    <div class="container mb-4 mt-5" >
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
                                <select class="form-select" style="height: 55px;" name="type" required>
                                    <option @if($shipment->type=="ocean") selected @endif value="ocean">Ocean Cargo</option>
                                    <option @if($shipment->type=="air") selected @endif value="air">Air Cargo</option>
                                    <option @if($shipment->type=="lcl") selected @endif value="lcl">Land Shipping TR</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="Enter Your Id Number . . ." name="code_id"
                                    style="height: 55px;border-radius: 0;border:0;" required>
                            </div>
                            <center>
                                <div class="col-12 col-sm-6">
                                    <button class="btn more text-white" style="width: 100% !important;"
                                        type="submit">Track</button>
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
<div class="container" id="print1">
    <div class="row">
        <div class="col-lg-5">
            <!-- Track List Start -->
            <div class="bg-white" style="padding: 30px 30px 0 30px;">

                <h6 class="color-main text-uppercase fw-bolder mb-4"><img src="{{asset('imgs/path.png')}}" width="45px"
                        alt="icon-w.png"> Tracking path for the shipment:</h6>
                <h1 class="mb-4 color-secondry fw-bolder">
                    <i class="fa fa-receipt color-main pr-3"></i> <span>{{$shipment->code_id}}</span>
                </h1>
                <p class="mb-4"><p class="mb-3">{{$shipment->notes}}
                </p>
                </p>
                <!-- Start From -->
                <div class="media mb-4">
                    <img src="{{asset('imgs/from.png')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">From :</h5>
                        <p class="color-main" style="font-weight: 600;">{{$shipment->regions()->first()->first_name}}</p>
                    </div>
                </div>
                <!-- End From -->
                <!-- Start To -->
                <div class="media mb-4">
                    <img src="{{asset('imgs/to.png')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">To :</h5>
                        <p class="color-main" style="font-weight: 600;">{{$shipment->regions()->latest()->first()->first_name}}</p>
                    </div>
                </div>
                <!-- End To -->
                <!-- Start stimated Arrival Date -->
                <div class="media mb-4">
                    <img src="{{asset('imgs/arrival.png')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Estimated Arrival Date :</h5>
                        <p class="color-main" style="font-weight: 600;">{{$shipment->end_date}}</p>
                    </div>
                </div>
                <!-- End stimated Arrival Date -->
                <!-- Start Last Updated -->
                <div class="media mb-4">
                    <img src="{{asset('imgs/last-updat.png')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Last Updated :</h5>
                        @if ($last_updated!='none')
                            <p class="color-main" style="font-weight: 600;">{{$last_updated}}</p>
                        @endif
                    </div>
                </div>
                <!-- End Last Updated -->
                <!-- Start Last location -->
                <div class="media mb-4">
                    <img src="{{asset('imgs/last-location.png')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width:55px;">
                    <div class="media-body">
                        <h5 class="color-secondry fw-bold">Last location :</h5>
                        <p class="color-main" style="font-weight: 600;">
                            @if ($last_location!='none')
                                <p class="mb-3">{{$last_location->region->first_name}}-{{$last_location->name}}</p>
                                <p class="mb-0">{{$last_location->date}}</p>
                            @endif
                        </p>
                    </div>
                </div>
                <!-- End Last location -->

                <div class="media mb-4">
                    <div class="media-body">
                        <a href="#" class="more w-100 text-center" onclick="printPage()"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>

            </div>
            <!-- Path List End -->

        </div>
        <div class="col-md-7" id="print2">
            <div class="bg-white" style="padding: 30px;">
                <ul class="timeline timeline-centered ">
                    @php
                        $i=1;
                    @endphp
                    @foreach ($shipment->regions as $region )
                    <!-- Start First Point -->
                    <div class="timeline-item period">
                        <div class="timeline-info"></div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <p class="my-number">{{$i++}}</p>
                            <h4 class="timeline-title">{{$region->first_name}}</h4><br>
                            <p class="timeline-title-secondry">{{$region->second_name}}</p>
                            <div class="mt-2"><a href="{{$region->location_link}}" target="_blank"
                                class="color-secondry fw-bold">visit location on map</a></div>
                        </div>
                    </div>
                    @foreach ($region->actions as $action )
                        <li
                            @if ($action->active)
                                class="timeline-item done"
                            @else
                                class="timeline-item"
                            @endif
                        >
                            <div class="timeline-info ">
                                    <span>{{$action->date}}</span>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><i class="{{$action->icon}}"></i></p>
                                    <h6 class="timeline-title">{{$action->name}}</h6>
                                    <p>{{$action->notes}}</p>
                                    <div class="info-between">
                                    </div>
                                </div>
                        </li>
                    @endforeach

                @endforeach
                    <!-- End First Point -->
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->
    </div>
</div>

@endisset

@section('script')
<script>
    function printPage()
    {
        body=document.getElementById('body').innerHTML;
        data1=document.getElementById('print1').innerHTML;
        data1='<section class="py-5" id="features"><div class="container px-5 my-5">'+data1+'<div class="row gx-5"></div></div></section>'
        data2=document.getElementById('print2').innerHTML;
        document.getElementById('body').innerHTML=data1+data2;
        window.print();
        document.getElementById('body').innerHTML=body;
    }
</script>
@endsection

@endsection
