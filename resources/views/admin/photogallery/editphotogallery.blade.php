@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Back Button -->
    <div class="mb-3">
        <a href="/photogallery" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Photo Gallery
        </a>
    </div>

    <!-- Edit Main Photo Gallery Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit Main Photo Gallery Image - {{ $image->title }}
            </h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('handle.updatephotogallery', $image->id) }}">
                @method('PUT')
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
                        <label for="title" class="form-label fw-semibold">
                            <i class="fas fa-tag me-1 text-primary"></i>
                            Image Title<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="title" 
                               name="title"
                               placeholder="Enter Image Title" 
                               value="{{ $image->title }}"
                               required>
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Photo Image
                        </label>
                        <input type="file" 
                               class="form-control form-control-lg" 
                               id="image" 
                               name="image"
                               accept="image/*">
                        
                        @if (!empty($image->image))
                            <div class="mt-3">
                                <label class="form-label fw-semibold text-muted">Current Image:</label>
                                <div class="current-image-container">
                                    <img src="{{ config('app.url').'/'.$image->image }}" 
                                         alt="Current Photo Image" 
                                         class="img-thumbnail border shadow-sm"
                                         style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #dee2e6 !important; cursor: pointer;"
                                         onclick="showImageModal('{{ config('app.url').'/'.$image->image }}', '{{ $image->title }}')">
                                </div>
                                <small class="text-muted mt-1 d-block">Click image to view full size</small>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Image Statistics -->
                    <div class="col-12 mb-4">
                        <div class="card bg-light border-0">
                            <div class="card-body py-3">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <div class="stat-item">
                                            <h4 class="fw-bold text-primary mb-1">
                                                <i class="fas fa-images me-1"></i>
                                                ID: {{ $image->id }}
                                            </h4>
                                            <small class="text-muted">Image ID</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stat-item">
                                            <h4 class="fw-bold text-success mb-1">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $image->created_at->format('M d, Y') }}
                                            </h4>
                                            <small class="text-muted">Created Date</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stat-item">
                                            <h4 class="fw-bold text-info mb-1">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $image->updated_at->format('M d, Y') }}
                                            </h4>
                                            <small class="text-muted">Last Updated</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Update Image
                    </button>
                    <a href="/photogallery" class="btn btn-outline-secondary btn-lg">
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

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid rounded" style="max-height: 70vh;">
            </div>
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

.current-image-container:hover img {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

/* Card Styling */
.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}

/* Statistics Styling */
.stat-item {
    padding: 1rem 0;
}

.stat-item h4 {
    font-size: 1.1rem;
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
    
    .stat-item h4 {
        font-size: 1rem;
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
</style>

<script>
    // Image modal function
    function showImageModal(imageSrc, imageTitle) {
        const modal = new bootstrap.Modal(document.getElementById('imageModal'));
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModalLabel').textContent = imageTitle;
        modal.show();
    }

    // Form submission handling
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Updating...';
        
        // Re-enable button after 3 seconds (in case of errors)
        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-1"></i>Update Image';
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
