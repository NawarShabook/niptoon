@extends('layouts.master')

@section('title')
Niptoon | Info Company
@endsection

@section('content')

<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="banar">
                    <h4 class="text-start color-dark my-3">Info Company Nawares</h4>
                    <hr class="mt-1 mb-4 mx-4 v-divider theme--light">
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
                    <form action="{{route('settings.update')}}", method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <span style="font-size: 12px;color: #dd9127;">put(/)between several loaction ex:(location1/location2)</span>
                                <div class="input-group">
                                    <input type="text" name="location" id="Location" class="input-elem" value="{{$settings->location}}"
                                        placeholder="Enter New Location" autocomplete="off" required/>
                                    <label for="Location">Location</label>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="number" name="number" id="number-company" class="input-elem" value="{{$settings->number}}"
                                        placeholder="Enter New Number" autocomplete="off" required/>
                                    <label for="number-company">Number Company</label>
                                </div>
                                <button type="submit" class="btn btn-register">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
