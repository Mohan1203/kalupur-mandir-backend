@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Back Button -->
    <div class="mb-3">
        <a href="/acharya" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Acharyas
        </a>
    </div>

    <!-- Edit Acharya Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit Acharya - {{ $acharya->name }}
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('handle.updateAcharya',$acharya->id) }}" method="POST" enctype="multipart/form-data">
                @method("put")
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong><i class="fas fa-exclamation-triangle me-1"></i>There were some problems with your input:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="name" class="form-label fw-semibold">
                            <i class="fas fa-user me-1 text-primary"></i>
                            Acharya Name<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="name" 
                               name="name"
                               placeholder="Enter acharya name" 
                               value="{{ $acharya->name }}"
                               required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Acharya Image
                        </label>
                        <input type="file" 
                               class="form-control form-control-lg" 
                               id="image" 
                               name="image"
                               accept="image/*">
                        
                        @if (!empty($acharya->image))
                            <div class="mt-3">
                                <label class="form-label fw-semibold text-muted">Current Image:</label>
                                <div class="current-image-container">
                                    <img src="{{ config('app.url').'/'.$acharya->image }}" 
                                         alt="Current Acharya Image" 
                                         class="img-thumbnail border shadow-sm"
                                         style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #dee2e6 !important;">
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-12 mb-4">
                        <label for="description" class="form-label fw-semibold">
                            <i class="fas fa-align-left me-1 text-primary"></i>
                            Acharya Description<span class="text-danger">*</span>
                        </label>
                        <div class="editor-container">
                            <textarea id="description" 
                                      name="description" 
                                      required>{{ old('description', $acharya->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Current Acharya Toggle -->
                    <div class="col-12 mb-4">
                        <div class="card bg-light border-0">
                            <div class="card-body py-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <label class="form-label fw-semibold mb-1">
                                            <i class="fas fa-star me-1 text-warning"></i>
                                            Current Acharya Status
                                        </label>
                                        <p class="text-muted small mb-0">Set this acharya as the current active acharya</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="currentAcharya"
                                               name="isCurrentAcharya"
                                               value="1"
                                               {{ $acharya->is_current_acharya ? 'checked' : '' }}
                                               style="transform: scale(1.3);">
                                        <label class="form-check-label fw-semibold" for="currentAcharya">
                                            Is Current Acharya
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Update Acharya
                    </button>
                    <a href="/acharya" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-times me-1"></i>Cancel
                    </a>
                    <button type="reset" class="btn btn-outline-warning btn-lg">
                        <i class="fas fa-undo me-1"></i>Reset Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Form Styling */
.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-lg:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
    transform: translateY(-1px);
}

.form-label {
    color: #495057;
    margin-bottom: 0.75rem;
}

.form-label i {
    width: 16px;
}

/* Current Image Styling */
.current-image-container {
    display: inline-block;
    position: relative;
    border-radius: 0.5rem;
    overflow: hidden;
}

.current-image-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(93, 26, 30, 0.1) 50%, transparent 60%);
    pointer-events: none;
}

/* Card Styling */
.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}

/* Form Switch Styling */
.form-check-input:checked {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

.form-check-input:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
}

/* Button Styling */
.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(93, 26, 30, 0.3);
}

.btn-outline-secondary:hover {
    transform: translateY(-1px);
}

.btn-outline-warning:hover {
    transform: translateY(-1px);
}

/* Alert Styling */
.alert-danger {
    border-left: 4px solid #dc3545;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

/* Editor Container */
.editor-container {
    border-radius: 0.5rem;
    overflow: hidden;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.editor-container:focus-within {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .btn-lg {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
    }
    
    .d-flex.gap-2 .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

/* Loading State */
.btn-primary:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}

/* Hover Effects */
.card:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
    transition: box-shadow 0.3s ease;
}

.current-image-container:hover img {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}
</style>

<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
<script>
    // Initialize TinyMCE with modern styling
    tinymce.init({
        selector: '#description',
        height: 400,
        menubar: 'file edit view insert format tools table help',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code image help wordcount imagetools link',
        toolbar: 'undo redo | styleselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
        block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
        image_dimensions: true,
        image_advtab: true,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        skin: 'oxide',
        content_css: 'default',
        branding: false,
        promotion: false,
        setup: function (editor) {
            // Add custom styling to editor
            editor.on('init', function () {
                editor.getContainer().style.borderRadius = '0.5rem';
            });
        }
    });

    // Form submission handling
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Updating...';
        
        // Re-enable button after 3 seconds (in case of errors)
        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-1"></i>Update Acharya';
        }, 3000);
    });

    // File input preview
    document.getElementById('image').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const currentImageContainer = document.querySelector('.current-image-container');
                if (currentImageContainer) {
                    const img = currentImageContainer.querySelector('img');
                    img.src = e.target.result;
                    img.style.border = '2px solid #5d1a1e';
                }
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Enhanced form validation
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });
</script>

@endsection
