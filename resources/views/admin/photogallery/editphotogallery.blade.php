@extends('layout.layout')

@section('content')
 <div class="container-fluid  ">
    <div>
        <form method="POST" enctype="multipart/form-data" action={{ route('handle.updatephotogallery',$image->id) }}>
            @method('PUT')
             @csrf
                <div class="row">
                     <h5 class="card-title">Edit Main Photo Gallery Images</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="mb-3 col-md-6">
                                            <label for="title" class="form-label">Image Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Image Title" value="{{ $image->title }}">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image"
                                            >
                                             @if (!empty($image->image))
                                                    <div class="mt-2">
                                                        <img src="{{ config('app.url').'/'.$image->image }}" alt="Acharya Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                                    </div>
                                                @endif

                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                </div>
        </form>
    </div>
</div>
@endsection
