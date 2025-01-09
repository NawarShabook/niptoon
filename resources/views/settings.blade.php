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
                    <form action="{{route('settings.update')}}", method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" name="location" id="Location" class="input-elem"
                                        placeholder="Enter New Location" autocomplete="off" />
                                    <label for="Location">Location</label>
                                </div>
                                <button class="btn btn-register">Edit</button>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="input-group">
                                    <input type="number" name="number" id="number-company" class="input-elem"
                                        placeholder="Enter New Number" autocomplete="off" />
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
