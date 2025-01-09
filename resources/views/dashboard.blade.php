@extends('layouts.master')

@section('title')
Niptoon | Dashboard
@endsection

@section('content')

<!-- Features section-->
<span id="page" page="main"></span>
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row gx-5 row-cols-2 row-cols-md-4 ">
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white text-center rounded-3 mb-3"><i
                                class="fas fa-box-open"></i></div>
                        <h2 class="h6 color-dark">New Shipment</h2>
                        <a href="{{route('shipments.create')}}" class="h5 btn-dashboard"><i class="fas fa-plus-square"></i>
                            Add</a>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i
                                class="fas fa-map-marked-alt"></i>
                        </div>
                        <h2 class="h6 color-dark">Recent Shipments</h2>
                        <a href="{{route('shipments.recent-shipments')}}" class="h5 btn-dashboard"><i class="fas fa-plus-square"></i>
                            Go</a>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-shapes"></i>
                        </div>
                        <h2 class="h6 color-dark">All Shipments (unPosted)</h2>
                        <a href="{{route('shipments.index')}}" class="h5 btn-dashboard"><i class="fas fa-plus-square"></i>
                            Go</a>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fas fa-cubes"></i>
                        </div>
                        <h2 class="h6 color-dark">Shipments Posted</h2>
                        <a href="{{route('shipments.posted-shipments')}}" class="h5 btn-dashboard"><i class="fas fa-plus-square"></i>
                            Go</a>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-0 mb-3"><i class="fas fa-edit"></i>
                        </div>
                        <h2 class="h6 color-dark">Info</h2>
                        <a href="{{route('settings.create')}}" class="h5 btn-dashboard"><i class="fas fa-plus-square"></i>
                            Go</a>
                    </div>

                    <div class="col mb-5 h-100">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fa fa-sign-out"></i>
                        </div>
                        <h2 class="h6 color-dark">{{ __('Logout') }}</h2>
                        <a class="h5 btn-dashboard" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-plus-square"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                        </form>
                     </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
