@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('handle.addhomepagedata') }}" enctype="multipart/form-data">
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

                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
                    </div>
                @endif

                <!-- Video Links Section -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-bold text-dark">
                            <i class="fas fa-video text-primary me-2"></i>
                            Video Settings
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="video_link" class="form-label fw-semibold">
                                    <i class="fas fa-home me-1 text-primary"></i>
                                    Home Video Link
                                </label>
                                <input type="url" 
                                       class="form-control form-control-lg" 
                                       id="video_link" 
                                       name="video_link"
                                       placeholder="Enter home video link (YouTube, Vimeo, etc.)" 
                                       value="{{ $setting->home_video_link ?? '' }}">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Enter the full URL of the video for the home page
                                </small>
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="history_video_link" class="form-label fw-semibold">
                                    <i class="fas fa-history me-1 text-primary"></i>
                                    History Video Link
                                </label>
                                <input type="url" 
                                       class="form-control form-control-lg" 
                                       id="history_video_link" 
                                       name="history_video_link"
                                       placeholder="Enter history video link (YouTube, Vimeo, etc.)" 
                                       value="{{ $setting->history_video_link ?? '' }}">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Enter the full URL of the video for the history section
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maha Pooja & Yagna Images Section -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-bold text-dark">
                            <i class="fas fa-images text-primary me-2"></i>
                            Religious Images
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="pooja_image" class="form-label fw-semibold">
                                    <i class="fas fa-pray me-1 text-primary"></i>
                                    Maha Pooja Image
                                </label>
                                <input type="file" 
                                       class="form-control form-control-lg" 
                                       id="pooja_image" 
                                       name="pooja_image"
                                       accept="image/*">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Upload an image for Maha Pooja section (JPG, PNG, GIF)
                                </small>
                                
                                @if (!empty($setting->mahapuja_image))
                                    <div class="mt-3">
                                        <label class="form-label fw-semibold text-muted">Current Image:</label>
                                        <div class="image-preview-container">
                                            <img src="{{ config('app.url').'/'.$setting->mahapuja_image }}" 
                                                 alt="Maha Pooja Image" 
                                                 class="img-thumbnail"
                                                 style="max-width: 200px; max-height: 150px; object-fit: cover; cursor: pointer;"
                                                 onclick="showImageModal(this.src, 'Maha Pooja Image')">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="yagna_image" class="form-label fw-semibold">
                                    <i class="fas fa-fire me-1 text-primary"></i>
                                    Yagna Image
                                </label>
                                <input type="file" 
                                       class="form-control form-control-lg" 
                                       id="yagna_image" 
                                       name="yagna_image"
                                       accept="image/*">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Upload an image for Yagna section (JPG, PNG, GIF)
                                </small>
                                
                                @if (!empty($setting->yagna_image))
                                    <div class="mt-3">
                                        <label class="form-label fw-semibold text-muted">Current Image:</label>
                                        <div class="image-preview-container">
                                            <img src="{{ config('app.url').'/'.$setting->yagna_image }}" 
                                                 alt="Yagna Image" 
                                                 class="img-thumbnail"
                                                 style="max-width: 200px; max-height: 150px; object-fit: cover; cursor: pointer;"
                                                 onclick="showImageModal(this.src, 'Yagna Image')">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg me-2">
                            <i class="fas fa-save me-1"></i>Update Home Page Settings
                        </button>
                        <button type="reset" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-undo me-1"></i>Reset Changes
                        </button>
                    </div>
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
                <img id="modalImage" src="" alt="" class="img-fluid rounded" style="max-height: 500px;">
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

/* Card Styling */
.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
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

/* Image Preview Styling */
.image-preview-container {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    padding: 0.75rem;
    background-color: #f8f9fa;
    display: inline-block;
    transition: all 0.3s ease;
}

.image-preview-container:hover {
    border-color: #5d1a1e;
    background-color: #fff;
}

.image-preview-container img:hover {
    transform: scale(1.05);
    transition: all 0.3s ease;
}

/* Alert Styling */
.alert-danger {
    border-left: 4px solid #dc3545;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    animation: fadeIn 0.5s ease;
}

.alert-success {
    border-left: 4px solid #28a745;
    background-color: #d4edda;
    border-color: #c3e6cb;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Icon Styling */
.text-primary {
    color: #5d1a1e !important;
}

/* Enhanced Hover Effects */
.card:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
    transition: box-shadow 0.3s ease;
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
}

/* Form Loading States */
.btn-primary:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handling with loading states
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Updating...';
            
            // Re-enable button after 5 seconds (in case of errors)
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 5000);
        }
    });

    // Enhanced form validation
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                if (this.value.trim()) {
                    this.classList.add('is-valid');
                }
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });

    // URL validation for video links
    document.querySelectorAll('input[type="url"]').forEach(input => {
        input.addEventListener('blur', function() {
            const value = this.value.trim();
            if (value) {
                try {
                    new URL(value);
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } catch (e) {
                    this.classList.add('is-invalid');
                    // Show validation message
                    let feedback = this.parentNode.querySelector('.invalid-feedback');
                    if (!feedback) {
                        feedback = document.createElement('div');
                        feedback.className = 'invalid-feedback';
                        this.parentNode.appendChild(feedback);
                    }
                    feedback.textContent = 'Please enter a valid URL (e.g., https://www.youtube.com/watch?v=...)';
                }
            }
        });
    });

    // File input preview functionality
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create preview if it doesn't exist
                    let previewContainer = input.parentNode.querySelector('.live-preview');
                    if (!previewContainer) {
                        previewContainer = document.createElement('div');
                        previewContainer.className = 'live-preview mt-3';
                        previewContainer.innerHTML = `
                            <label class="form-label fw-semibold text-success">New Image Preview:</label>
                            <div class="image-preview-container">
                                <img class="img-thumbnail new-preview" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                            </div>
                        `;
                        input.parentNode.appendChild(previewContainer);
                    }
                    
                    const img = previewContainer.querySelector('.new-preview');
                    img.src = e.target.result;
                    img.alt = 'New ' + input.name + ' preview';
                };
                reader.readAsDataURL(file);
            }
        });
    });
});

// Image modal functionality
function showImageModal(src, title) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModalLabel').textContent = title;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}
</script>

@endsection
