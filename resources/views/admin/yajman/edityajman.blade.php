@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Edit Yajman Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-edit text-primary me-2"></i>
                    Edit Yajman
                </h5>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Back
                </a>
            </div>
        </div>
        <div class="card-body">
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

            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.updateYajman', $yajman->id) }}">
                @method('PUT')
                @csrf
                
                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="title" class="form-label fw-semibold">
                            <i class="fas fa-heading me-1 text-primary"></i>
                            Yajman Title<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="title" 
                               name="title"
                               placeholder="Enter yajman title"
                               value="{{ old('title', $yajman->name) }}"
                               required>
                    </div>
                    
                    <div class="mb-4 col-md-6">
                        <label for="date" class="form-label fw-semibold">
                            <i class="fas fa-calendar me-1 text-primary"></i>
                            Event Date<span class="text-danger">*</span>
                        </label>
                        <input type="date" 
                               class="form-control form-control-lg" 
                               id="date" 
                               name="date" 
                               value="{{ old('date', $yajman->event_date) }}"
                               required>
                    </div>
                    
                    <div class="mb-4 col-md-6">
                        <label for="image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Yajman Image
                        </label>
                        <input type="file" 
                               class="form-control form-control-lg" 
                               id="image" 
                               name="image"
                               accept="image/*">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Upload a new image to replace the current one (JPG, PNG, GIF)
                        </small>
                        
                        @if (isset($yajman->image_path))
                            <div class="mt-3">
                                <label class="form-label fw-semibold text-muted">Current Image:</label>
                                <div class="current-image-container">
                                    <img src="{{ config('app.url').'/'.$yajman->image_path }}" 
                                         alt="Current Yajman Image" 
                                         class="img-thumbnail"
                                         style="max-width: 200px; max-height: 150px; object-fit: cover; cursor: pointer;"
                                         onclick="showImageModal(this.src, 'Current Yajman Image')">
                                </div>
                                <small class="text-muted d-block mt-1">
                                    <i class="fas fa-eye me-1"></i>
                                    Click image to view full size
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Update Yajman
                    </button>
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

/* Image Preview Styling */
.current-image-container {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    padding: 0.75rem;
    background-color: #f8f9fa;
    display: inline-block;
    transition: all 0.3s ease;
}

.current-image-container:hover {
    border-color: #5d1a1e;
    background-color: #fff;
}

.current-image-container img:hover {
    transform: scale(1.05);
    transition: all 0.3s ease;
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

.btn-outline-secondary:hover,
.btn-outline-warning:hover {
    transform: translateY(-1px);
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
    
    .d-flex.gap-2 {
        flex-direction: column;
        align-items: stretch;
    }
    
    .d-flex.gap-2 .btn {
        margin-bottom: 0.5rem;
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

    // File input preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create or update preview
                let previewContainer = document.querySelector('.new-image-preview');
                if (!previewContainer) {
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'new-image-preview mt-3';
                    previewContainer.innerHTML = `
                        <label class="form-label fw-semibold text-success">New Image Preview:</label>
                        <div class="current-image-container">
                            <img class="img-thumbnail" style="max-width: 200px; max-height: 150px; object-fit: cover; cursor: pointer;">
                        </div>
                        <small class="text-success d-block mt-1">
                            <i class="fas fa-check me-1"></i>
                            This image will replace the current one when you save
                        </small>
                    `;
                    document.getElementById('image').parentNode.appendChild(previewContainer);
                }
                
                const img = previewContainer.querySelector('img');
                img.src = e.target.result;
                img.alt = 'New yajman image preview';
                img.onclick = () => showImageModal(e.target.result, 'New Yajman Image');
            };
            reader.readAsDataURL(file);
        }
    });

    // Enhanced form validation
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
                showValidationMessage(this, 'This field is required');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                removeValidationMessage(this);
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                removeValidationMessage(this);
            }
        });
    });

    // Date validation (prevent past dates)
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    // Uncomment below line if you want to prevent past dates
    // dateInput.setAttribute('min', today);
});

// Image modal functionality
function showImageModal(src, title) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModalLabel').textContent = title;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}

// Validation helper functions
function showValidationMessage(element, message) {
    removeValidationMessage(element);
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback';
    feedback.textContent = message;
    element.parentNode.appendChild(feedback);
}

function removeValidationMessage(element) {
    const feedback = element.parentNode.querySelector('.invalid-feedback');
    if (feedback) {
        feedback.remove();
    }
}
</script>

@endsection
