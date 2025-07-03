@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Edit Opening Hours Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-clock text-primary me-2"></i>
                <h5 class="mb-0 fw-bold text-dark">Edit Opening Hours</h5>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back
            </a>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.updateTimerange', $timerange->id) }}">
                @csrf
                @method('PUT')
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
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

                <!-- Festival Toggle -->
                <div class="mb-4">
                    <div class="festival-toggle d-flex align-items-center">
                        <label class="mb-0 me-2" for="isFestival">Festival Days Timing :-</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isFestival" name="is_festival" value="1" {{ $timerange->is_festival ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="text-muted small mt-1">
                        <i class="fas fa-info-circle me-1"></i>
                        Enable this for special festival day timings
                    </div>
                </div>

                <!-- Day Range Section -->
                <div class="regular-days">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="start_day" class="form-label">
                                Start Day<span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="start_day" name="start_day" required>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}" {{ $timerange->start_day === $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="end_day" class="form-label">
                                End Day<span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="end_day" name="end_day" required>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}" {{ $timerange->end_day === $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Time Range Section -->
                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <label for="start_time" class="form-label time-label">
                            Opening Time<span class="text-danger">*</span>
                        </label>
                        <input type="time" 
                               class="form-control" 
                               id="start_time" 
                               name="start_time"
                               value="{{ $timerange->start_time }}"
                               required>
                    </div>
                    <div class="col-md-6">
                        <label for="end_time" class="form-label time-label">
                            Closing Time<span class="text-danger">*</span>
                        </label>
                        <input type="time" 
                               class="form-control" 
                               id="end_time" 
                               name="end_time"
                               value="{{ $timerange->end_time }}"
                               required>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Update Changes
                    </button>
                    <button type="reset" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Card Styling */
.card {
    border-radius: 8px;
}

.card-header {
    background-color: #fff !important;
}

/* Form Controls */

/* Form Controls */
.form-switch .form-check-input{
    margin: 0px !important;
    position: relative !important;
    width: 4rem !important;
}
.form-control, .form-select {
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 0.5rem 0.75rem;
    font-size: 0.9rem;
}

.form-control:focus, .form-select:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.2rem rgba(93, 26, 30, 0.15);
}

/* Festival Toggle Switch Styling */
.festival-toggle {
    position: relative;
}

.festival-toggle label {
    font-size: 0.95rem;
    color: #212529;
    cursor: pointer;
    min-width: fit-content;
}

.form-check.form-switch {
    padding: 0;
    margin: 0;
    height: 24px;
    display: flex;
    align-items: center;
}

.form-check-input {
    width: 40px;
    height: 24px;
    margin: 0;
    cursor: pointer;
    background-color: #e9ecef;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='white'/%3e%3c/svg%3e");
    border: 1px solid #dee2e6;
    border-radius: 24px;
}

.form-check-input:checked {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

.form-check-input:focus {
    box-shadow: none;
    border-color: #dee2e6;
}

.form-check-input:checked:focus {
    border-color: #5d1a1e;
}

/* Form Labels */
.form-label {
    color: #495057;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

/* Button Styling */
.btn {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

.btn-primary {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

.btn-primary:hover {
    background-color: #4a1518;
    border-color: #4a1518;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    border-color: #6c757d;
}

/* Alert Styling */
.alert {
    font-size: 0.9rem;
    border-radius: 6px;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>

@endsection
