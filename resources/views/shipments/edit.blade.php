@extends('layouts.master')

@section('title')
Niptoon | Edit Shipment
@endsection

@section('head')
<style>
    .feature {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 1rem;
    }

    .feature .h5 {
        font-size: 0.6rem;
    }
</style>
@endsection

@section('content')
<section class="py-5" id="features">

    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <!-- Start Notifications -->
                @session('success')
                <div class="success mb-4">
                    <p class="msg-success">{{session('success')}}</p>
                </div>
                @endsession
                @session('errors')
                <div class="false mb-4">
                    <p class="msg-false">Something Went Wrong</p>
                    <p class="msg-false">{{session('errors')}}</p>
                </div>
                @endsession


                <!-- End Notifications -->
                <form action="{{route('shipments.update',$shipment)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="name" id="shipment-name" class="input-elem"
                                    value="{{$shipment->name}}" placeholder="Enter Shipment Name" autocomplete="off" />
                                <label for="shipment-name">Shipment Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="code_id" id="shipment-id" class="input-elem"
                                    value="{{$shipment->code_id}}" placeholder="Enter Shipment Id" autocomplete="off" />
                                <label for="shipment-id">Shipment Id</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <select style="background-color :#f4f4f4;color:#1f1a17;" id="num" name="type"
                                    class="input-elem">
                                    <option @if($shipment->type=="ocean") selected @endif value="ocean">Ocean Cargo</option>
                                    <option @if($shipment->type=="air") selected @endif value="air">Air Cargo</option>
                                    <option @if($shipment->type=="lcl") selected @endif value="lcl">Land Shipping TR</option>
                                </select>
                                <label for="num">Select Booking Type :</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="datetime-local" name="start_date" id="start-date" class="input-elem" required
                                    value="{{$shipment->start_date}}" autocomplete="off" />
                                <label for="start-date">Starting Date (2024/01/01 12:00 AM)</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="datetime-local" name="end_date" id="date-of-arrival" class="input-elem" required
                                    value="{{$shipment->end_date}}" autocomplete="off" />
                                <label for="date-of-arrival">Expected Arrival Date (2024/03/01 12:00 PM)</label>
                            </div>
                        </div>

                        <div class="col-md-12" >
                            <textarea name="notes" class="area-text mt-3 mb-3" placeholder="Enter Some Details ...">{{$shipment->notes}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-register">Edit Shipment</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 mt-3">
                <div class="row gx-5 row-cols-2 row-cols-md-3 ">
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white text-center rounded-3 mb-3"><i
                                class="fas fa-box-open"></i></div>
                        <h2 class="h6">Shipment</h2>
                        <p class="mb-0">{{$shipment->code_id}}</p>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-arrow-up"></i>
                        </div>
                        <h2 class="h6">From</h2>
                        <p class="mb-0">{{ optional($shipment->regions()->first())->first_name}}</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-arrow-down"></i>
                        </div>
                        <h2 class="h6">To</h2>
                        <p class="mb-0">{{ optional($shipment->regions()->latest()->first())->first_name }}</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-shapes"></i>
                        </div>
                        <h2 class="h6">Booking Type</h2>
                        <p class="mb-0">{{$get_booking_type[$shipment->type]}}</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i
                                class="far fa-calendar-alt"></i>
                        </div>
                        <h2 class="h6">Estimated Arrival Date</h2>
                        <p class="mb-0">{{$shipment->end_date}}</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-info"></i>
                        </div>
                        <h2 class="h6">Info</h2>
                        <p class="mb-0">{{$shipment->notes}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
