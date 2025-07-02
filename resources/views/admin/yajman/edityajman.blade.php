@extends('layout.layout')

@section('content')
    <div class="container-fluid">
        <div>
            <h1 class="cart-title">Yajman</h1>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" method="POST" action={{ route('handle.updateYajman',$yajman->id) }}>
                        @method('PUT')
                        @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Yajman Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter Image Title" value="{{ $yajman->name }}" >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="image" class="form-label">Yajman Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" name="image"
                            >
                             @if (isset($yajman->image_path))
                                <div class="mt-2">
                                    <img src="{{ config('app.url').'/'.$yajman->image_path }}" alt="Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $yajman->event_date }}"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                  <div>

            </div>
        </div>
    </div>
@endsection
