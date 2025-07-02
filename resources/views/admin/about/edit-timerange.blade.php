@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Edit Opening Hours Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-clock text-primary me-2"></i>
                    Edit Opening Hours
                </h5>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.updateTimerange', $timerange->id) }}">
                @csrf
                @method('PUT')
                
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

                <!-- Day Range Section -->
                <div class="mb-4">
                    <h6 class="fw-bold text-secondary mb-3">
                        <i class="fas fa-calendar-week me-2"></i>Day Range
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_day" class="form-label fw-semibold">
                                <i class="fas fa-play me-1 text-primary"></i>
                                Start Day<span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-control-lg" id="start_day" name="start_day" required>
                                @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                    <option value="{{ $day }}" {{ isset($timerange) && $timerange->start_day === $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_day" class="form-label fw-semibold">
                                <i class="fas fa-stop me-1 text-primary"></i>
                                End Day<span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-control-lg" id="end_day" name="end_day" required>
                                @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                    <option value="{{ $day }}" {{ isset($timerange) && $timerange->end_day === $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Time Range Section -->
                <div class="mb-4">
                    <h6 class="fw-bold text-secondary mb-3">
                        <i class="fas fa-clock me-2"></i>Time Range
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_time" class="form-label fw-semibold">
                                <i class="fas fa-sun me-1 text-primary"></i>
                                Start Time<span class="text-danger">*</span>
                            </label>
                            <input type="time" 
                                   class="form-control form-control-lg" 
                                   id="start_time" 
                                   name="start_time"
                                   value="{{ isset($timerange) ? $timerange->start_time : '' }}"
                                   required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_time" class="form-label fw-semibold">
                                <i class="fas fa-moon me-1 text-primary"></i>
                                End Time<span class="text-danger">*</span>
                            </label>
                            <input type="time" 
                                   class="form-control form-control-lg" 
                                   id="end_time" 
                                   name="end_time"
                                   value="{{ isset($timerange) ? $timerange->end_time : '' }}"
                                   required>
                        </div>
                    </div>
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Please ensure the end time is after the start time
                    </small>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Update Opening Hours
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
.form-control-lg, .form-select {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-lg:focus, .form-select:focus {
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

/* Section Headers */
.text-secondary {
    color: #6c757d !important;
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

    // Time validation
    document.getElementById('end_time').addEventListener('change', function() {
        const startTime = document.getElementById('start_time').value;
        const endTime = this.value;
        
        if (startTime && endTime && endTime <= startTime) {
            this.classList.add('is-invalid');
            showValidationMessage(this, 'End time must be after start time');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            removeValidationMessage(this);
        }
    });

    // Enhanced form validation
    document.querySelectorAll('.form-control, .form-select').forEach(input => {
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
