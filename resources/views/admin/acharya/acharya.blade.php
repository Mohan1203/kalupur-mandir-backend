@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid  ">
        <div class="d-flex flex-column">
        <div class="">
            <form action="{{ route('handle.saveAcharya') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                    <div class="row">
                        <div class="col-12 my-2">
                            <h5 class="card-title">Acharya</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>There were some problems with your input:</strong>
                                    <ul class="mb-0 mt-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="row pasadi-darshan-row">
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Acharya Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter acharya name">

                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="image" class="form-label">Acharya Image<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image"
                                            >

                                        </div>
                                        <div class="">
                                            <label for="description" class="form-label">Acharya Description<span class="text-danger">*</span></label>
                                             <textarea id="description" name="description"></textarea>

                                        </div>

                                    </div>
                                    <input type="hidden" name="isCurrentAcharya" id="hiddenAcharya" value="false">
                                      <div class="d-flex align-items-center mt-3 gap-2">
                                            <div class="form-check m-0 p-0 d-flex align-items-center gap-2">
                                                <input class="form-check-input m-0" type="checkbox" id="currentAcharya" >
                                                <label class="form-check-label mb-0" for="currentAcharya">
                                                Is current acharya
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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

                            @foreach ($acharyas as $key => $acharya)
                                <tr data-id="{{ $acharya['id'] }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $acharya['name'] }}</td>
                                    <td>
                                        <img src="{{ asset(env('APP_URL').  '/' . $acharya['image']) }}" width="50"
                                            height="50" alt="Acharya Image">
                                    </td>
                                    {{-- <td>{{ $acharya['description'] }}</td> --}}
                                    <td>
                                        <a href="/editacharya/{{ $acharya['id'] }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('handle.deleteAcharya', $acharya['id']) }}" method="post"
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

<script>
  const checkbox = document.getElementById('currentAcharya');
  const hiddenInput = document.getElementById('hiddenAcharya');
  checkbox.addEventListener('change', function () {
    hiddenInput.value = this.checked ? 'true' : 'false';
  });
</script>

<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#description',
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
