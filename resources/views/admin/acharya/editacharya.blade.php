@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid ">
          <div class="">
              <form action="{{ route('handle.updateAcharya',$acharya->id) }}" method="POST" enctype="multipart/form-data">
                @method("put")
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
                                            placeholder="Enter acharya name" value="{{ $acharya->name }}">

                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="image" class="form-label">Acharya Image<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image"
                                            >
                                             @if (!empty($acharya->image))
                                                    <div class="mt-2">
                                                        <img src="{{ config('app.url').'/'.$acharya->image }}" alt="Acharya Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ddd;">
                                                    </div>
                                                @endif

                                        </div>
                                        <div class="">
                                            <label for="description" class="form-label">Acharya Description<span class="text-danger">*</span></label>
                                            <textarea id="description" name="description">{{ old('description', $acharya->description) }}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="isCurrentAcharya" value="0">
                                    <div class="d-flex align-items-center mt-3 gap-2">
                                        <div class="form-check m-0 p-0 d-flex align-items-center gap-2">
                                            <input
                                                class="form-check-input m-0"
                                                type="checkbox"
                                                id="currentAcharya"
                                                name="isCurrentAcharya"
                                                value="1"
                                                {{ old('isCurrentAcharya', $acharya->is_current_acharya) ? 'checked' : '' }}>
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
