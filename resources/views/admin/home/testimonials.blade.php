@extends('layout.layout')

@section('content')
    <div class="container-fluid ">
        <div class="d-flex flex-column">
            <h5 class="card-title">Prasadi Darshan</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('handle.saveTestimonial') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="testimonial-row row">
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="testimonail_name" name="testimonail_name"
                                            placeholder="Enter Name" >
                                </div>
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="testimonail_country" name="testimonail_country"
                                            placeholder="Enter Country" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="testimonail_description" class="form-label">Description</label>
                                        <textarea class="form-control" rows='8' name="testimonail_description"></textarea>
                                </div>
                            </div>
                                <div>
                                    <button  class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>
                    </form>
                    </div>

            </div>
             <table id="product-table" class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Testimonial Name</th>
                                <th>Country</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">
                            @foreach ($testimonials as $key => $row)
                                <tr data-id="{{ $row['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row['name'] }}</td>
                                    <td>{{ $row['country'] }}</td>
                                    <td>{{ $row['description'] }}</td>
                                    <td>
                                        <a href="/edittestimonials/{{ $row['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                        {{-- <form action="{{ route('handle.deletePrasadiDarshan', $row['id']) }}" method="post"
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
</div>
@endsection
