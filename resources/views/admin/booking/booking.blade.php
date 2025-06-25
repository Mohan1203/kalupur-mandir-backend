@extends('layout.layout')

@section('content')
<div>
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <form action="{{ route('handle.saveBookingdetail') }}" method="POST">
                 @csrf
                  <div class="row">
                      <div class="col-12 my-2">
                            <h5 class="card-title">Pooja Description</h5>
                            <textarea id="pooja-editor" name="pooja_description">{{ old('pooja_description', $booking->pooja_description ?? '') }}</textarea>

                    </div>
                </div>
                <div class="row">
                  <div class="col-12 my-2">
                        <h5 class="card-title">Yagna Description</h5>
                        <textarea id="yagna-editor" name="yagna_description">{{ old('yagna_description', $booking->yagna_description ?? '') }}</textarea>

                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

 <script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#pooja-editor',
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




