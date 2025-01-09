@extends('layouts.master')

@section('title')
Niptoon | Recent Shipment
@endsection

@section('content')
<span id="page" page="recship"></span>
<!-- Start Recent Shipments section-->
<section class="py-5" id="features">
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
    <div class="container">
        <div class="row justify-content-center">


                @foreach ($shipments as $shipment )
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <form action="{{route('shipments.destroy',$shipment)}}" method="POST" style="display: inline;" onsubmit="return confirmDeletion();">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete" title="Delete"><i class="fas fa-trash mb-2"></i></button>
                            </form>
                        </div>
                        <p class="mt-3">Booking Type : {{$get_booking_type[$shipment->type]}}</p>
                        <div class="info-between">
                            <p style="color:#768390;">Create a route for the shipment .</p>
                        </div>
                        <div class="icon text-center">
                            <img decoding="async" src="{{asset('imgs/icon-Niptoon.png')}}"  height="75px" alt="" />
                        </div>
                        <div class="name-ship">{{$shipment->code_id}}</div>
                        <div class="info-between">
                            <span>{{$shipment->created_at->format('Y/m/d')}}</span>
                            <a href="{{route('regions.create',$shipment->id)}}" class="a-file">Create Track</a>
                        </div>
                    </div>
                </div>
                @endforeach


        </div>
    </div>
</section>
<!-- End Recent Shipments section-->


@endsection
