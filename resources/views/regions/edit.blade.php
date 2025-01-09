@extends('layouts.master')

@section('title')
Niptoon | Edit Region
@endsection

@section('content')

<header class="example-header text-center bg-grey-400 p-3 mt-3">
    <h2 class="mt-1 color-dark">Shipment Id</h2>
    <p class="mb-1 h5 color-main">{{$region->shipment->code_id}}</p>
    <p class="mb-1 mt-2 h5 color-main"><a href="{{route('shipments.index')}}" class="un-active-link">Al Shipments</a> / <a href="#" class="active-link">Edit Track</a></p>
</header>
<!--Form Add Region-->
<section class="py-5" id="features">
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="fw-bolder mb-0 color-main">Edit Regions Main</h2>
                <p class="text-gray mt-3 mb-4">
                    Add the main regions of the tracing line
                </p>
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
                <form action="{{route('regions.update', $region)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <input type="text" name="first_name" id="name-region" class="input-elem" value="{{$region->first_name}}"
                            placeholder="Enter Name Region" autocomplete="off" required/>
                        <label for="name-region">Name Region</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="second_name" id="sec-name" class="input-elem" value="{{$region->second_name}}"
                            placeholder="Enter Secondary Name Of The Region" autocomplete="off" required/>
                        <label for="sec-name">Secondary Name Of The Region</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="location_link" id="sec-name" class="input-elem" value="{{$region->location_link}}"
                            placeholder="Paste Location Link" autocomplete="off" />
                        <label for="sec-name">Locatin On Map</label>
                    </div>
                    <button class="btn btn-register bg-gradient">Edit Region</button>
                </form>
            </div>
            <div class="col-md-5">
                <!-- Start Last Regions Progress Widget -->
                <div class="last-regions">
                    <h2>Last Regions Added :</h2>
                    <ul>
                        @foreach ($region->shipment->regions as $region )
                        <li>
                            <div class="region-info">
                                <h6>{{$region->first_name}}</h6>
                                <p> {{$region->second_name}} </p>
                                <a href="{{route('actions.create',$region)}}"><i class="fas fa-plus-circle"></i> Add Action</a>

                                <a href="{{route('regions.edit',$region)}}" style="cursor: pointer" class="edit-region"><i class="far fa-edit"></i> Edit</a>

                                <form action="{{route('regions.destroy',$region)}}" method="POST" style="display: inline;" onsubmit="return confirmDeletion();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-region"><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End Last Regions Progress Widget -->
            </div>
        </div>
    </div>
</section>
@endsection
