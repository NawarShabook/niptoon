@extends('layouts.master')

@section('title')
Niptoon | New Action
@endsection

@section('content')

<header class="example-header text-center bg-grey-400 p-3 mt-3">
    <h2 class="mt-1 color-dark">Shipment Id</h2>
    <p class="mb-1 h5 color-main">{{$region->shipment->code_id}}</p>
</header>
<!--Form Add Region-->
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="fw-bolder mb-0 color-main">Add Action</h2>
                <p class="text-gray mt-3 mb-4">
                    Add operations within the region
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

                <div class="input-group">
                    <select style="background-color :#f4f4f4;color:#1f1a17;" id="select-region"
                        name="booking-type" class="input-elem">
                        @foreach ($region->shipment->regions as $_region)
                            <option @if($region->id==$_region->id) selected @endif
                             value="{{ $_region->id }}" data-url="{{ route('actions.create', $_region->id) }}">
                                {{ $_region->first_name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="select-region">Select Region :</label>
                </div>
                <form action="{{route('actions.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="region_id" value={{$region->id}}>
                    <div class="input-group">
                        <input type="text" name="name[]" id="name-action" class="input-elem" required
                            placeholder="Enter Name Action" autocomplete="off" />
                        <label for="name-action">Name Action</label>
                    </div>
                    <div class="input-group">
                        <input type="datetime-local" name="date[]" id="date-of-arrival" class="input-elem" autocomplete="off" required />
                        <label for="date-of-arrival">Expected Arrival Date (2024/01/01) 12:00 PM</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="notes[]" id="note-action" class="input-elem"
                            placeholder="Enter Your Note (Optional)" autocomplete="off" />
                        <label for="note-action">Note</label>
                    </div>
                    <div class="input-group text-center">
                        <a class="btn-copy mb-3 text-center" onclick="openicon()" id="icon-action">Add Icon From
                            Here <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="input-group">
                        <input type="text" name="icon[]" id="input-icon" class="input-elem" required
                            placeholder="Past Icon Here . . . " autocomplete="off" />
                        <label for="input-icon">Icon</label>
                    </div>

                    {{-- include popup icon --}}
                    @include('layouts.popup_icon')

                    <!-- Start Add Button -->
                    <center>
                        <button type="button" onclick="addRow(); return false" class="btn btn-add mb-2"><i
                                class="fas fa-plus"></i></button>
                    </center>
                    <!-- End Add Button -->

                    <!-- Start New Action -->
                    <div id="inRows" class="column">
                    </div>
                    <!-- End New Action -->

                    <button class="btn btn-register bg-gradient">Add Action</button>
                </form>
            </div>
            <div class="col-lg-5 mb-5 mb-lg-0">
                <ul class="timeline timeline-centered ">
                    <!-- Start First Point -->
                    <div class="timeline-item period">
                        <div class="timeline-info"></div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">{{$region->first_name}}</h4><br>
                            <p class="timeline-title-secondry">{{$region->second_name}}</p>
                        </div>
                    </div>
                    <!-- End First Point -->

                    @foreach ($region->actions as $action )

                    <li class="timeline-item">
                        <div class="timeline-info">
                            <span>{{$action->date}}</span>
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <p><i class="{{$action->icon}}"></i></p>
                            <h6 class="timeline-title">{{$action->name}}</h6>
                            <p>{{$action->notes}}</p>
                            <div class="info-between">
                                <form action="{{route('actions.destroy',$action)}}" method="POST" style="display: inline;" onsubmit="return confirmDeletion();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-region"><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>

                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>

@section('script')
<script src="/js/myicon.js"></script>
<script src="/js/input.js"></script>

<script>
    document.getElementById('select-region').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var url = selectedOption.getAttribute('data-url');
        if (url) {
            window.location.href = url;
        }
    });
</script>

@endsection

@endsection
