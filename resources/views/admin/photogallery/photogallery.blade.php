@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid page-body-wrapper ">
        <div class="main-panel">
            <form enctype="multipart/form-data" method="POST" action={{ route('handle.savephotos') }}>
                @csrf
                <div class="row">
                     <h5 class="card-title">Main Photo Gallery Images</h5>
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
            <form method="POST" enctype="multipart/form-data" action={{ route('handle.savesubphotos') }}>
                @csrf
                <div class="row mt-4">
                        <h5 class="card-title">Sub Photo Gallery Images</h5>
                        <div class="card">
                                    <div class="card-body">
                                        <div class="row ">
                                            <div class="mb-3 col-md-6">
                                                <label for="title" class="form-label">Select Parent Image</label>
                                                <select class="form-select" id="category" name="image_id" required>
                                                    <option value="">Select Parent Title</option>
                                                    @foreach ($images as $image)
                                                        <option value="{{ $image->id }}">{{ $image->title }}</option>
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
                    <table id="product-table" class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Acharya Name</th>
                                <th>Image</th>
                                {{-- <th>Description</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">

                            @foreach ($images as $key => $image)
                                <tr data-id="{{ $image['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $image['title'] }}</td>
                                    <td>
                                        <img src="{{ asset(env('APP_URL').  '/' . $image['image']) }}" width="50"
                                            height="50" alt="Image">
                                    </td>
                                    {{-- <td>{{ $acharya['description'] }}</td> --}}
                                    <td>
                                        <a href="/editacharya/{{ $acharya['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                        {{-- <form action="{{ route('hamdle.deleteAcharya', $acharya['id']) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
            </div>
        </div>
</div>
@endsection
