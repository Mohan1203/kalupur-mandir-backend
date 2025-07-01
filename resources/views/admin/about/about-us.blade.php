@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid  ">
        <div class="">
            <div class="row">
                <form enctype="multipart/form-data" method="POST" action={{ route('handle.saveAboutus') }}>
                    @csrf
                    <div class="col-12 my-2 p-0">
                        <h2 class="card-title">Opening Hours</h2>
                        <div class="card">
                            <div class="card-body">
                                {{-- Day Range --}}
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="start_day" class="form-label">Start Day</label>
                                        <select class="form-select" id="start_day" name="start_day">
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_day" class="form-label">End Day</label>
                                        <select class="form-select" id="end_day" name="end_day">
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Time Range --}}
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="start_time" class="form-label">Start Time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_time" class="form-label">End Time</label>
                                        <input type="time" class="form-control" id="end_time" name="end_time">
                                    </div>
                                </div>
                                {{-- Submit --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                 <div class="mt-3">
                     <h2 class="card-title">Gallery Main Photos</h2>

                <table id="product-table" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        <tbody id="product-list">
                            @foreach ($aboutus as $key => $row)
                                <tr data-id="{{ $row['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row['start_day'] . "-" . $row['end_day'] }}</td>
                                    <td>
                                        {{ $row['start_time'] . "-" . $row['end_time'] }}
                                    <td>
                                        <a href="/edittimerange/{{ $row['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('handle.deleteTimerange', $row['id']) }}" method="post"
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

            <div class="mt-4">
                <h2 class="card-title">Address</h2>
                   <div class="card">
                     <div class="card-body">
                        <form method="POST" action="{{ route('handle.saveAddress') }}">
                            @csrf
                                <div >
                                     <div class="my-3 row">
                                        <div class="col-md-6 ">
                                        <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email ?? '' }}" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ $setting->contact_number ?? '' }}" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class=" col-12  p-0 mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea id="address" name="address" class="form-control" placeholder="Address">{{ $setting->address ?? '' }}</textarea>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

</div>
<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#address',
            height: 600,
            menubar: 'file edit view insert format tools table help',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code image help wordcount imagetools link',
            toolbar: 'undo redo | styleselect  | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
            image_dimensions: true,
            image_advtab: true,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,

        });
        tinymce.init({
            selector: '#yagna-editor',
            height: 600,
            menubar: 'file edit view insert format tools table help',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code image help wordcount imagetools link',
            toolbar: 'undo redo | styleselect  | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
            image_dimensions: true,
            image_advtab: true,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,

        });
    </script>
@endsection
