@extends('layout.layout')

@php
    use App\Helpers\CountriesHelper;
@endphp

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Edit Testimonial Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-edit text-primary me-2"></i>
                    Edit Testimonial
                </h5>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('handle.updateTestimonial', $testimonial->id) }}" enctype="multipart/form-data">
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

                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="testimonail_name" class="form-label fw-semibold">
                            <i class="fas fa-user me-1 text-primary"></i>
                            Name<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="testimonail_name" 
                               name="testimonail_name"
                               placeholder="Enter testimonial person's name"
                               value="{{ old('testimonail_name', $testimonial->name) }}"
                               required>
                    </div>
                    
                    <div class="mb-4 col-md-6">
                        <label for="testimonail_country" class="form-label fw-semibold">
                            <i class="fas fa-globe me-1 text-primary"></i>
                            Country<span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-control-lg" 
                                id="testimonail_country" 
                                name="testimonail_country"
                                required>
                            {!! CountriesHelper::generateCountryOptions(old('testimonail_country', $testimonial->country)) !!}
                        </select>
                    </div>
                    
                    <div class="mb-4 col-12">
                        <label for="testimonail_description" class="form-label fw-semibold">
                            <i class="fas fa-quote-left me-1 text-primary"></i>
                            Testimonial Description<span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" 
                                  id="testimonail_description"
                                  name="testimonail_description" 
                                  rows="8"
                                  placeholder="Enter the testimonial description"
                                  required>{{ old('testimonail_description', $testimonial->description) }}</textarea>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Write the testimonial feedback or review
                        </small>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Update Testimonial
                    </button>
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
.form-control-lg,
.form-select {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-lg:focus,
.form-select:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
    transform: translateY(-1px);
}

/* Select Dropdown Styling */
.form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
}

.form-select:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%235d1a1e' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
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
});

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
