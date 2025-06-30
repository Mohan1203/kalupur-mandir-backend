@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid ">
        <div class="">
            <div>
                <form method="POST" action="{{ route('handle.addhomepagedata') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 my-2">
                        <h5 class="card-title">Video</h5>
                         <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                        <label for="video_link" class="form-label">Video Link</label>
                                        <input type="text" class="form-control" id="video_link" name="video_link"
                                            placeholder="Enter Video Link" value="{{ $setting->home_video_link}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-2 ">
                        <h5 class="card-title">Prasadi Darshan</h5>
                         <div class="card ">
                            <div class="card-body  extra-prasadi-section">
                            <div class="row pasadi-darshan-row">
                                <div class="mb-3 col-md-6">
                                    <label for="prasadi_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="prasadi_image" name="prasadi_image[]"
                                    >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="heading" class="form-label">Heading</label>
                                        <input type="text" class="form-control" id="heading" name="heading[]"
                                            placeholder="Enter Heading" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description[]" rows='8'></textarea>
                                </div >
                            </div>
                                <div>
                                    <button  class="btn btn-primary add-prasadi-row" id="add-prasadi-section">
                                        <i class="bi bi-plus-circle fs-5" ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                    <h5 class="card-title">Maha Pooja</h5>
                         <div class="card ">
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                        <label for="pooja_image" class="form-label">Maha Pooja Image</label>
                                        <input type="file" class="form-control" id="pooja_image" name="pooja_image"
                                            placeholder="Enter category name" >
                                                @if (!empty($setting->mahapuja_image))
                                                    <div class="mt-2">
                                                        <img src="{{ config('app.url').'/'.$setting->mahapuja_image }}" alt="Maha Pooja Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                                    </div>
                                                @endif
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="yagna_image" class="form-label"> Yagna Image</label>
                                        <input type="file" class="form-control" id="yagna_image" name="yagna_image"
                                            placeholder="Enter category name" >
                                                @if (!empty($setting->yagna_image))
                                                    <div class="mt-2">
                                                        <img src="{{ config('app.url').'/'.$setting->yagna_image }}" alt="Yagna Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                                    </div>
                                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                    <h5 class="card-title">Testimonials</h5>
                         <div class="card ">
                            <div class="card-body extra-testimonial-section">
                            <div class="testimonial-row row">
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="testimonail_name" name="testimonail_name[]"
                                            placeholder="Enter Name" >
                                </div>
                                <div class="mb-3 col-md-6">
                                     <label for="testimonail_country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="testimonail_country" name="testimonail_country[]"
                                            placeholder="Enter Country" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="testimonail_description" class="form-label">Description</label>
                                        <textarea class="form-control" rows='8' name="testimonail_description[]"></textarea>
                                </div>
                            </div>
                                <div>
                                    <button  class="btn btn-primary add-testimonial-row" id="add-prasadi-section">
                                        <i class="bi bi-plus-circle fs-5" ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
