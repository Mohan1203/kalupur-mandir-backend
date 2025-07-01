@extends('layout.layout')

@section('content')

 <div class="container-fluid  ">
    <div class="">
        <div class="row">
            <form enctype="multipart/form-data" method="POST" action={{ route('handle.saveSettings') }}>
                @csrf
                <div class="col-12 my-2 p-0">
                    <h5 class="card-title">Setting</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                        @if (!empty($setting->logo))
                                                    <div class="mt-2">
                                                        <img src="{{ config('app.url').'/'.$setting->logo }}" alt="Setting Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                                    </div>
                                        @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="6" >{{$setting->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection
