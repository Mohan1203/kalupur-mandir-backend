@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid  ">
        <div class="">
            <form enctype="multipart/form-data" method="POST" action={{ route('handle.saveEventGallery') }}>
                @csrf
                <div class="row">
                     <h5 class="card-title">Event Gallery Images</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="mb-3 col-md-6">
                                            <label for="title" class="form-label">Image Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Image Title">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image"
                                            >
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                </div>
            </form>
            <form method="POST" enctype="multipart/form-data" action={{ route('handle.saveEventSubPhotos') }}>
                @csrf
                <div class="row mt-4">
                        <h5 class="card-title">Sub Event Gallery Images</h5>
                        <div class="card">
                                    <div class="card-body">
                                        <div class="row ">
                                            <div class="mb-3 col-md-6">
                                                <label for="title" class="form-label">Select Parent Image</label>
                                                <select class="form-select" id="category" name="image_id" required>
                                                    <option value="">Select Parent Title</option>
                                                    @foreach ($eventImages as $image)
                                                        <option value="{{ $image->id }}">{{ $image->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="title" class="form-label">Image Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter Image Title">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="image" name="image"
                                                >
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="mt-3">
        <h2>Event Gallery Main Photos</h2>
        <table id="product-table" class="table table-bordered ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tbody id="product-list">
                    @foreach ($eventImages as $key => $image)
                        <tr data-id="{{ $image['id'] }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $image['description'] }}</td>
                            <td>
                            <img src="{{ asset(env('APP_URL').  '/' . $image['image_path']) }}" width="50"
                                            height="50" alt="Image">
                            </td>
                            <td>
                                <a href="/editeventgallery/{{ $image['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('handle.deleteEventGallery', $image['id']) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
        <div class="mt-3">
        <h2>Event Gallery Child Photos</h2>
        <table id="product-table" class="table table-bordered ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Parent Image ID</th>
                    <th>Image Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tbody id="product-list">
                    @foreach ($subEventImages as $key => $subimage)
                        <tr data-id="{{ $subimage['id'] }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{$subimage['image_id']}}</td>
                            <td>{{ $subimage['description'] }}</td>
                            <td>
                            <img src="{{ asset(env('APP_URL').  '/' . $subimage['image_path']) }}" width="50"
                                            height="50" alt="Image">
                            </td>
                            <td>
                                <a href="/editsubeventgallery/{{ $subimage['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('handle.deletesubphotogallery', $subimage['id']) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        </div>

    </div>
</div>
@endsection
