@extends('layout.layout')


@section('content')
<div>
    <div class="container-fluid ">
        <div class="d-flex flex-column">
            <h5 class="card-title">Prasadi Darshan</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('handle.savePrasadidarshan') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="col-12 my-2 p-0 ">

                            <div class="row pasadi-darshan-row">
                                <div class="mb-3 col-md-6">
                                    <label for="prasadi_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="prasadi_image" name="prasadi_image"
                                    >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="heading" class="form-label">Heading</label>
                                        <input type="text" class="form-control" id="heading" name="heading"
                                            placeholder="Enter Heading" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows='8'></textarea>
                                </div >
                            </div>
                                <div>
                                    <button  class="btn btn-primary" type="submit" >
                                       submit
                                    </button>
                                </div>
                        </div>
                    </form>

                </div>
            </div>
               <table id="product-table" class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            @foreach ($prasadiDarshans as $key => $row)
                                <tr data-id="{{ $row['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row['title'] }}</td>
                                    <td>
                                        <img src="{{ asset(env('APP_URL') .'/'. $row['prasadi_image']) }}" width="50"
                                            height="50" alt="Image">
                                    </td>
                                    <td>{{ $row['description'] }}</td>
                                    <td>
                                        <a href="/editprasadidarshan/{{ $row['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('handle.deletePrasadiDarshan', $row['id']) }}" method="post"
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
</div>
@endsection
