@extends('layouts.master')

@section('title')
Niptoon | Shipment
@endsection
@section('header')
<style>
    .feature {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 1rem;
    }

    .feature .h5 {
        font-size: 0.6rem;
    }

    .feature:hover {
        background-color: red;
    }
</style>
@endsection

@section('content')

<header class="example-header text-center bg-grey-400 p-3 mt-3">
    <h2 class="mt-1 color-dark">Shipment Id</h2>
    <p class="mb-1 h5 color-main">{{$shipment->code_id}}</p>

    @if ($shipment->published)
        <p class="mb-1 mt-2 h5 color-main"><a href="{{route('shipments.posted-shipments')}}" class="un-active-link">Shipments Posted</a> /
    @else
        <p class="mb-1 mt-2 h5 color-main"><a href="{{route('shipments.index')}}" class="un-active-link">Al Shipments</a> /
    @endif
    <a href="{{route('regions.edit',$shipment->regions()->first())}}" class="un-active-link">Edit Track</a> /
        <a href="{{route('actions.create',$shipment->regions()->first())}}"
    class="un-active-link">Add Action</a> / <a href="#" class="active-link">Show Track</a></p>
</header>
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
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0 mt-3">
                <h4 class="mb-5 mt-0">Shipment Information :</h4>
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
                        <p class="mb-0">{{$shipment->regions()->first()->first_name}}</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-arrow-down"></i>
                        </div>
                        <h2 class="h6">To</h2>
                        <p class="mb-0">{{$shipment->regions()->latest()->first()->first_name}}</p>
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
            <div class="col-lg-6 mb-5 mb-lg-0 mt-3 border-start">
                <h4 class="mb-5 mt-0">Track Shipment :</h4>
                <div class="row gx-5 row-cols-2 row-cols-md-3 text-center">
                    @foreach ($shipment->regions as $region )
                        <div class="col mb-5 h-100">
                            <a class="un-active-link" href="{{route('regions.edit',$region)}}">
                                <div class="feature bg-gradient bg-darken text-white text-center rounded-3 mb-3"><i
                                        class="fas fa-location"></i></div>
                                <h2 class="h6">{{$region->first_name}}</h2>
                                <p>{{$region->second_name}}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <ul class="timeline timeline-centered ">
                @foreach ($shipment->regions as $region )
                    <!-- Start First Point -->
                    <div class="timeline-item period">
                        <div class="timeline-info"></div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">{{$region->first_name}}</h4><br>
                            <p class="timeline-title-secondry">{{$region->second_name}}</p>
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
                                    <form action="{{route('actions.active',$action)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @if ($action->active)
                                            <button class="active-region"><i class="fas fa-bolt done"></i> Inactive</button>
                                        @else
                                            <button class="active-region "><i class="fas fa-bolt"></i> Active</button>
                                        @endif
                                    </form>
                                    <form action="{{route('actions.destroy',$action)}}" method="POST" style="display: inline;" onsubmit="return confirmDeletion();">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-region"><i class="far fa-trash-alt"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <!-- End First Point -->
                @endforeach

            </ul>
            <div class="publish text-center">
                @if ($shipment->published)
                    <a class="btn-unpublish" href="{{route('shipments.publish',$shipment)}}"><i class="fas fa-upload"></i> Un publish</a>
                @else
                    <a class="btn-publish" href="{{route('shipments.publish',$shipment)}}"><i class="fas fa-upload"></i> publish</a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
