@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Opening Hours Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-clock text-primary me-2"></i>
                Add Opening Hours
            </h5>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.saveAboutus') }}">
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
                
                <!-- Day Range -->
            <div class="row">
                    <div class="mb-3 col-md-3">
                        <label for="start_day" class="form-label fw-semibold">
                            <i class="fas fa-calendar-day me-1 text-primary"></i>
                            Start Day<span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-select-lg" id="start_day" name="start_day" required>
                            <option value="">Select Start Day</option>
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                    
                    <div class="mb-3 col-md-3">
                        <label for="end_day" class="form-label fw-semibold">
                            <i class="fas fa-calendar-day me-1 text-primary"></i>
                            End Day<span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-select-lg" id="end_day" name="end_day" required>
                            <option value="">Select End Day</option>
                                            @foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                    <!-- Time Range -->
                    <div class="mb-3 col-md-3">
                        <label for="start_time" class="form-label fw-semibold">
                            <i class="fas fa-clock me-1 text-primary"></i>
                            Start Time<span class="text-danger">*</span>
                        </label>
                        <input type="time" class="form-control form-control-lg" id="start_time" name="start_time" required>
                                </div>

                    <div class="mb-3 col-md-3">
                        <label for="end_time" class="form-label fw-semibold">
                            <i class="fas fa-clock me-1 text-primary"></i>
                            End Time<span class="text-danger">*</span>
                        </label>
                        <input type="time" class="form-control form-control-lg" id="end_time" name="end_time" required>
                                    </div>
                                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Save Opening Hours
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
                            </div>
                        </div>

    <!-- Opening Hours Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                        Opening Hours Schedule
                    </h5>
                    <small class="text-muted">Total {{ count($aboutus) }} time slot(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchTimeSlots" placeholder="Search time slots..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="timeSlotsTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 60px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Days</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Time</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Actions</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aboutus as $key => $row)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                    </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-calendar-week text-primary me-2"></i>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark">{{ $row['start_day'] }} - {{ $row['end_day'] }}</div>
                                            <small class="text-muted">Weekly Schedule</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock text-success me-2"></i>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark">{{ $row['start_time'] }} - {{ $row['end_time'] }}</div>
                                            <small class="text-muted">Operating Hours</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="/edittimerange/{{ $row['id'] }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteTimerange', $row['id']) }}" 
                                              method="post" 
                                              style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this time slot?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-clock fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No opening hours found</h6>
                                        <p class="text-muted small mb-0">Add your first opening hours above.</p>
                                </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
    </div>
</div>

<style>
/* Form Styling */
.form-control-lg, .form-select-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-lg:focus, .form-select-lg:focus {
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

/* Table Styling */
.table {
    font-size: 0.9rem;
    line-height: 1.5;
}

.table th {
    font-weight: 600;
    background-color: #f8f9fa !important;
    border-top: 1px solid #dee2e6;
}

.table td {
    border-left: none;
    border-right: none;
    border-top: none;
}

.table tbody tr {
    border-bottom: 1px solid #f1f3f4;
}

.table tbody tr:hover {
    background-color: rgba(93, 26, 30, 0.05);
}

.table tbody tr:last-child {
    border-bottom: none;
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

/* Search Input Group Styling */
.input-group {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.input-group:hover {
    box-shadow: 0 4px 12px rgba(93, 26, 30, 0.15);
}

.input-group .form-control {
    border: 1px solid #dee2e6;
    box-shadow: none;
    font-size: 0.9rem;
    padding: 0.5rem 0.75rem;
}

.input-group .form-control:focus {
    border-color: #5d1a1e;
    box-shadow: none;
    z-index: 3;
}

.input-group .btn {
    transition: all 0.3s ease;
    font-weight: 500;
}

.input-group .btn:hover {
    background: linear-gradient(135deg, #7d2428 0%, #9d343a 100%) !important;
    transform: none;
    box-shadow: 0 2px 8px rgba(93, 26, 30, 0.3);
}

/* Alert Styling */
.alert-danger {
    border-left: 4px solid #dc3545;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

/* Icon Styling */
.text-primary {
    color: #5d1a1e !important;
}

/* Badge Styling */
.badge {
    font-size: 0.8rem;
    padding: 0.5rem 0.75rem;
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
        width: 100%;
        align-items: stretch;
    }
    
    .input-group {
        width: 100% !important;
    }
}

/* Form Loading States */
.btn-primary:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}
</style>

    <script>
    // Search functionality for time slots
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchTimeSlots');
        const tableRows = document.querySelectorAll('#timeSlotsTable tbody tr');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let visibleCount = 0;

                tableRows.forEach(row => {
                    if (row.cells.length === 1) return; // Skip empty state row
                    
                    const text = row.textContent.toLowerCase();
                    const isVisible = text.includes(searchTerm);
                    
                    row.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });
            });
        }
    });

    // Form submission handling with loading states
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Saving...';
                
                // Re-enable button after 3 seconds (in case of errors)
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 3000);
            }
        });
    });

    // Enhanced form validation
    document.querySelectorAll('.form-control, .form-select').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });

    // Time validation
    function validateTimeRange() {
        const startTime = document.getElementById('start_time').value;
        const endTime = document.getElementById('end_time').value;
        
        if (startTime && endTime && startTime >= endTime) {
            alert('End time must be after start time');
            document.getElementById('end_time').focus();
            return false;
        }
        return true;
    }

    // Add time validation to form submission
    document.querySelector('form[action*="saveAboutus"]').addEventListener('submit', function(e) {
        if (!validateTimeRange()) {
            e.preventDefault();
        }
        });
    </script>

@endsection
