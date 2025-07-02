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
                    <form enctype="multipart/form-data" method="POST" action={{ route('handle.saveYajman') }}>
                        @csrf
                    <div class="row ">
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Yajman Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter Image Title">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="image" class="form-label">Yajman Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" name="image"
                            >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date" name="date"
                            >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                  <div>

            </div>
        </div>
        <table id="product-table" class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Acharya Name</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            @foreach ($yajmans as $key => $yajman)
                                <tr data-id="{{ $yajman['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $yajman['name'] }}</td>
                                    <td>
                                        <img src="{{ asset(env('APP_URL').  '/' . $yajman['image_path']) }}" width="50"
                                            height="50" alt="Acharya Image">
                                    </td>
                                    <td>{{ $yajman['event_date'] }}</td>
                                    <td>
                                        <a href="/edityajman/{{ $yajman['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('handle.deleteYajman', $yajman['id']) }}" method="post"
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
