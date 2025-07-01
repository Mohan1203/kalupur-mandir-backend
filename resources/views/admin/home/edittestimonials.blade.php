@extends('layout.layout')

@section('content')
    <div class="container-fluid ">
        <div class="d-flex flex-column">
             <h5 class="card-title">Edit Testimonials</h5>
              <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('handle.updateTestimonial',$testimonial->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="testimonial-row row">
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="testimonail_name" name="testimonail_name"
                                            placeholder="Enter Name" value="{{ $testimonial->name }}" >
                                </div>
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="testimonail_country" name="testimonail_country"
                                            placeholder="Enter Country" value="{{ $testimonial->country }}" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="testimonail_description" class="form-label">Description</label>
                                        <textarea class="form-control" rows='8' name="testimonail_description">{{$testimonial->description}}</textarea>
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
        </div>
    </div>
@endsection
