@extends('layouts.master')

@section('title')
Niptoon | New Shipment
@endsection

@section('content')
<span id="page" page="newship"></span>
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="banar">
                    <h4 class="text-start color-dark my-3">Add New Shipment</h4>
                    <div class="pp text-start my-3">
                        <p class="mt-1 mb-3">
                            Note :
                            This information is general to the shipment .
                        </p>
                    </div>
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
                    <hr class="mt-1 mb-4 mx-4 v-divider theme--light">
                    <form action="{{route('shipments.store')}}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="name" id="shipment-name" class="input-elem" required
                                        placeholder="Enter Shipment Name" autocomplete="off" />
                                    <label for="shipment-name">Shipment Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="code_id" id="shipment-id" class="input-elem" required
                                        placeholder="Enter Shipment Id" autocomplete="off" />
                                    <label for="shipment-id">Shipment Id</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <select style="background-color :#f4f4f4;color:#1f1a17;" id="num" required
                                        name="type" class="input-elem">
                                        <option value="ocean">Ocean Cargo</option>
                                        <option value="air">Air Cargo</option>
                                        <option value="lcl">Land Shipping TR</option>
                                    </select>
                                    <label for="num">Select Booking Type :</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="datetime-local" name="start_date" id="start-date" class="input-elem" required
                                        autocomplete="off" />
                                    <label for="start-date">Starting Date (2024/01/01 12:00 AM)</label>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="input-group">
                                    <input type="time" name="start_hour" id="hour-start" class="input-elem"
                                        autocomplete="off" />
                                    <label for="hour-start">Departure Hour (12:00 AM)</label>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="datetime-local" name="end_date" id="date-of-arrival" class="input-elem" required
                                        autocomplete="off" />
                                    <label for="date-of-arrival">Expected Arrival Date (2024/03/01 12:00 PM)</label>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="input-group">
                                    <input type="time" name="end_hour" id="hour-arrival" class="input-elem"
                                        autocomplete="off" />
                                    <label for="hour-arrival">Arrival Hour (12:00 PM)</label>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <textarea class="area-text mt-3 mb-3" name="notes"
                                    placeholder="Enter Some Details ..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-register">Add New Shipment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
