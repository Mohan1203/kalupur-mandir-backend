@extends('layout.layout')

@php
    use App\Helpers\CountriesHelper;
@endphp

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Add New Testimonial Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-plus-circle text-primary me-2"></i>
                Add New Testimonial
            </h5>
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

            <form method="POST" action="{{ route('handle.saveTestimonial') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="testimonail_name" class="form-label fw-semibold">
                            <i class="fas fa-user me-1 text-primary"></i>
                            Name<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="testimonail_name" 
                               name="testimonail_name"
                               placeholder="Enter testimonial person's name"
                               required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="testimonail_country" class="form-label fw-semibold">
                            <i class="fas fa-globe me-1 text-primary"></i>
                            Country<span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-control-lg" 
                                id="testimonail_country" 
                                name="testimonail_country"
                                required>
                            {!! CountriesHelper::generateCountryOptions() !!}
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="testimonail_description" class="form-label fw-semibold">
                            <i class="fas fa-quote-left me-1 text-primary"></i>
                            Description<span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" 
                                  id="testimonail_description"
                                  name="testimonail_description" 
                                  rows="4"
                                  placeholder="Enter testimonial description"
                                  required></textarea>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Add Testimonial
                    </button>
                    <button type="reset" class="btn btn-outline-warning btn-lg">
                        <i class="fas fa-undo me-1"></i>Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Testimonials List -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-list text-primary me-2"></i>
                    Testimonials List
                </h5>
                <span class="badge bg-primary fs-6">{{ count($testimonials) }} Total</span>
            </div>
        </div>
        <div class="card-body">
            <!-- Search Section -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="search-container">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" 
                                   class="form-control border-start-0" 
                                   id="searchInput" 
                                   placeholder="Search testimonials by name, country, or description...">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="testimonialsTable">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-bold">
                                <i class="fas fa-hashtag me-1"></i>No.
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-user me-1"></i>Name
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-globe me-1"></i>Country
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-quote-left me-1"></i>Description
                            </th>
                            <th class="fw-bold text-center">
                                <i class="fas fa-cogs me-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $key => $testimonial)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                    
                                        <div>
                                            <div class="fw-semibold text-dark">{{ $testimonial['name'] }}</div>
                                            <small class="text-muted">Testimonial Author</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark fs-6">
                                        <i class="fas fa-flag me-1"></i>
                                        {{ $testimonial['country'] }}
                                    </span>
                                </td>
                                <td>
                                    <div class="description-text">
                                        {{ Str::limit($testimonial['description'], 100, '...') }}
                                        @if(strlen($testimonial['description']) > 100)
                                            <br>
                                            <button class="btn btn-link btn-sm p-0 mt-1" onclick="toggleDescription(this)">
                                                <small>Read More</small>
                                            </button>
                                            <div class="full-description d-none">
                                                {{ $testimonial['description'] }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="" role="group">
                                        <a href="/edittestimonials/{{ $testimonial['id'] }}" 
                                           class="btn btn-outline-primary btn-sm" 
                                           title="Edit Testimonial">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteTestimonial', $testimonial['id']) }}" 
                                              method="post" 
                                              style="display: inline;"
                                              onsubmit="return confirmDelete('{{ $testimonial['name'] }}')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    title="Delete Testimonial">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(count($testimonials) == 0)
                    <div class="text-center py-5">
                        <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No Testimonials Found</h5>
                        <p class="text-muted">Add your first testimonial using the form above.</p>
                    </div>
                @endif
            </div>
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

/* Search Styling */
.search-container .input-group-text {
    background-color: #f8f9fa;
    border-color: #e9ecef;
}

.search-container .form-control {
    border-color: #e9ecef;
}

.search-container .form-control:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
}

/* Table Styling */
.table-hover tbody tr:hover {
    background-color: rgba(93, 26, 30, 0.05);
}

.table th {
    border-top: none;
    color: #495057;
    font-weight: 600;
    padding: 1rem 0.75rem;
}

.table td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
}

/* Avatar Circle */
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.9rem;
}

/* Description Toggle */
.description-text {
    max-width: 300px;
}

.btn-link {
    color: #5d1a1e !important;
    text-decoration: none;
}

.btn-link:hover {
    color: #401317 !important;
    text-decoration: underline;
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

.btn-outline-warning:hover {
    transform: translateY(-1px);
}

.btn-sm {
    transition: all 0.3s ease;
    border-radius: 0.375rem;
    padding: 0.5rem 0.75rem;
}

.btn-sm:hover {
    transform: translateY(-1px);
}

/* Action Button Group Styling */
.btn-group .btn-sm {
    margin-right: 0.25rem;
}

.btn-group .btn-sm:last-child {
    margin-right: 0;
}

.btn-outline-primary:hover {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
    color: white;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
    box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
}

/* Delete button specific styling */
.btn-outline-danger {
    transition: all 0.3s ease;
}

.btn-outline-danger:focus {
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}

/* Badge Styling */
.badge {
    font-weight: 500;
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
    
    .table-responsive {
        font-size: 0.9rem;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .btn-group .btn {
        margin-bottom: 0.25rem;
        border-radius: 0.375rem !important;
    }
    
    .description-text {
        max-width: 200px;
    }
}

/* Loading States */
.btn-primary:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('testimonialsTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        
        for (let i = 0; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByTagName('td')[1];
            const countryCell = rows[i].getElementsByTagName('td')[2];
            const descriptionCell = rows[i].getElementsByTagName('td')[3];
            
            if (nameCell && countryCell && descriptionCell) {
                const nameText = nameCell.textContent || nameCell.innerText;
                const countryText = countryCell.textContent || countryCell.innerText;
                const descriptionText = descriptionCell.textContent || descriptionCell.innerText;
                
                if (nameText.toLowerCase().indexOf(filter) > -1 || 
                    countryText.toLowerCase().indexOf(filter) > -1 ||
                    descriptionText.toLowerCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
        
        // Update counter
        updateResultCounter();
    });

    function updateResultCounter() {
        const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none').length;
        const badge = document.querySelector('.badge.bg-primary');
        badge.textContent = `${visibleRows} Total`;
    }

    // Form submission handling
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Adding...';
            
            // Re-enable button after 5 seconds (in case of errors)
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 5000);
        }
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

    // Country selection enhancement
    const countrySelect = document.getElementById('testimonail_country');
    countrySelect.addEventListener('change', function() {
        if (this.value === 'Other') {
            // You can add a custom input field here if needed
            console.log('Other country selected');
        }
    });
});

// Description toggle functionality
function toggleDescription(button) {
    const fullDescription = button.parentNode.querySelector('.full-description');
    const isShown = !fullDescription.classList.contains('d-none');
    
    if (isShown) {
        fullDescription.classList.add('d-none');
        button.innerHTML = '<small>Read More</small>';
    } else {
        fullDescription.classList.remove('d-none');
        button.innerHTML = '<small>Read Less</small>';
    }
}

// Enhanced delete confirmation with loading state
function confirmDelete(testimonialName) {
    const confirmed = confirm(`Are you sure you want to delete the testimonial by "${testimonialName}"?\n\nThis action cannot be undone.`);
    
    if (confirmed) {
        // Add loading state to the form
        const form = event.target.closest('form');
        const deleteBtn = form.querySelector('button[type="submit"]');
        const originalContent = deleteBtn.innerHTML;
        
        deleteBtn.disabled = true;
        deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        // Re-enable after 10 seconds (in case of errors)
        setTimeout(() => {
            deleteBtn.disabled = false;
            deleteBtn.innerHTML = originalContent;
        }, 10000);
    }
    
    return confirmed;
}
</script>

@endsection
