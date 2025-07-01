@extends('layout.layout')

@section('content')
                    <form    method="POST" action="{{ route('handle.updatePrasadiDarshan',$prasadiDarshan->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                         <div class="col-12 my-2 p-0 ">

                            <div class="row pasadi-darshan-row">
                                <div class="mb-3 col-md-6">
                                    <label for="prasadi_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="prasadi_image" name="prasadi_image"
                                    >
                                    @if (!empty($prasadiDarshan->prasadi_image))
                                            <div class="mt-2">
                                                <img src="{{ config('app.url').'/'.$prasadiDarshan->prasadi_image }}" alt="Acharya Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                            </div>
                                    @endif
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="heading" class="form-label">Heading</label>
                                        <input type="text" class="form-control" id="heading" name="heading"
                                            placeholder="Enter Heading"  value="{{ $prasadiDarshan->title ?? '' }}" >
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows='8'>{{$prasadiDarshan->description}}</textarea>
                                </div >
                            </div>
                                <div>
                                    <button  class="btn btn-primary" type="submit" >
                                       submit
                                    </button>
                                </div>
                        </div>
                    </form>
@endsection
