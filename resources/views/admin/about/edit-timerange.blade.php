@extends('layout.layout')

@section('content')
    <div class="container-fluid  ">
        <div class="">
            <div class="row">
                  <form enctype="multipart/form-data" method="POST" action={{ route('handle.updateTimerange',$timerange->id) }}>
                    @csrf
                    @method('PUT')
                    <div class="col-12 my-2 p-0">
                        <h5 class="card-title">Opening Hours</h5>
                        <div class="card">
                            <div class="card-body">

                                {{-- Day Range --}}
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="start_day" class="form-label">Start Day</label>
                                        <select class="form-select" id="start_day" name="start_day">
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}" {{ isset($timerange) && $timerange->start_day === $day ? 'selected' : '' }}>
                                                    {{ $day }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_day" class="form-label">End Day</label>
                                        <select class="form-select" id="end_day" name="end_day">
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}" {{ isset($timerange) && $timerange->end_day === $day ? 'selected' : '' }}>
                                                    {{ $day }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Time Range --}}
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="start_time" class="form-label">Start Time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            value="{{ isset($timerange) ? $timerange->start_time : '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_time" class="form-label">End Time</label>
                                        <input type="time" class="form-control" id="end_time" name="end_time"
                                            value="{{ isset($timerange) ? $timerange->end_time : '' }}">
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
