@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Opening Hours Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center">
            <i class="fas fa-clock text-primary me-2"></i>
            <h5 class="mb-0 fw-bold text-dark">Add Opening Hours</h5>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.saveAboutus') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Festival Toggle -->
                <div class="mb-4">
                    <div class="festival-toggle d-flex align-items-center">
                        <label class="mb-0 me-2" for="isFestival">Festival Days Timing :-</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isFestival" name="is_festival" value="1">
                        </div>
                    </div>
                    <div class="text-muted small mt-1">
                        <i class="fas fa-info-circle me-1"></i>
                        Enable this for special festival day timings
                    </div>
                </div>

                <div class="row g-3">
                    <!-- Start Day and End Day (hidden when festival) -->
                    <div class="col-md-6 regular-days">
                        <div class="form-group">
                            <label class="form-label">Start Day<span class="text-danger">*</span></label>
                            <select class="form-select" name="start_day" required>
                                <option value="">Select Start Day</option>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 regular-days">
                        <div class="form-group">
                            <label class="form-label">End Day<span class="text-danger">*</span></label>
                            <select class="form-select" name="end_day" required>
                                <option value="">Select End Day</option>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Time Fields -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label time-label">Opening Time<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="start_time" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label time-label">Closing Time<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="end_time" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Opening Hours Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Opening Hours Schedule</h5>
                        <small class="text-muted">Total {{ count($aboutus) }} time slot(s)</small>
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control" id="searchTimeSlots" placeholder="Search time slots...">
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0" id="timeSlotsTable">
                    <thead>
                        <tr>
                            <th class="ps-3">#</th>
                            <th>Type</th>
                            <th>Days</th>
                            <th>Time</th>
                            <th class="text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aboutus as $key => $row)
                            <tr>
                                <td class="ps-3">{{ $key + 1 }}</td>
                                <td>
                                    @if($row['is_festival'])
                                        <span class="badge bg-info">Festival Days</span>
                                    @else
                                        <span class="badge bg-success">Regular Days</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row['is_festival'])
                                        Festival Days
                                    @else
                                        {{ $row['start_day'] }} - {{ $row['end_day'] }}
                                    @endif
                                </td>
                                <td>{{ $row['start_time'] }} - {{ $row['end_time'] }}</td>
                                <td class="text-end pe-3">
                                    <a href="/edittimerange/{{ $row['id'] }}" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('handle.deleteTimerange', $row['id']) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-clock text-muted d-block mb-2"></i>
                                    <p class="text-muted mb-0">No opening hours found</p>
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
/* Card Styling */


.form-switch .form-check-input{
    margin: 0px !important;
    position: relative !important;
    width: 4rem !important;
}

.card {
    border-radius: 8px;
}

.card-header {
    background-color: #fff !important;
}

/* Form Controls */
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

/* Table Styling */
.table {
    font-size: 0.9rem;
}

.table th {
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #dee2e6;
}

.table td {
    vertical-align: middle;
    color: #212529;
}

/* Badge Styling */
.badge {
    font-weight: 500;
    padding: 0.4em 0.8em;
}

/* Search Box */
.search-box .form-control {
    width: 250px;
    padding-right: 2rem;
}

/* Button Styling */
.btn-primary {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

.btn-primary:hover {
    background-color: #4a1518;
    border-color: #4a1518;
}

.btn-outline-primary {
    color: #5d1a1e;
    border-color: #5d1a1e;
}

.btn-outline-primary:hover {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .search-box .form-control {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isFestivalToggle = document.getElementById('isFestival');
    const regularDaysFields = document.querySelectorAll('.regular-days');
    const timeLabels = document.querySelectorAll('.time-label');

    function updateFields() {
        const isFestival = isFestivalToggle.checked;
        
        regularDaysFields.forEach(field => {
            field.style.display = isFestival ? 'none' : 'block';
            field.querySelector('select').required = !isFestival;
        });

        timeLabels.forEach(label => {
            label.textContent = isFestival ? 'Festival ' + label.textContent : label.textContent.replace('Festival ', '');
        });
    }

    isFestivalToggle.addEventListener('change', updateFields);
    updateFields(); // Initial state

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!validateTimeRange()) {
            e.preventDefault();
        }
    });

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

    // Search functionality for time slots
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
});
</script>

@endsection
