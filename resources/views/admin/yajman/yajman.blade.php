@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Add New Yajman Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-plus-circle text-primary me-2"></i>
                Add New Yajman
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

            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.saveYajman') }}">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="title" class="form-label fw-semibold">
                            <i class="fas fa-heading me-1 text-primary"></i>
                            Yajman Title<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="title" 
                               name="title"
                               placeholder="Enter yajman title"
                               required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Yajman Image<span class="text-danger">*</span>
                        </label>
                        <input type="file" 
                               class="form-control form-control-lg" 
                               id="image" 
                               name="image"
                               accept="image/*"
                               required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="date" class="form-label fw-semibold">
                            <i class="fas fa-calendar me-1 text-primary"></i>
                            Event Date<span class="text-danger">*</span>
                        </label>
                        <input type="date" 
                               class="form-control form-control-lg" 
                               id="date" 
                               name="date"
                               required>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Add Yajman
                    </button>
                    <button type="reset" class="btn btn-outline-warning btn-lg">
                        <i class="fas fa-undo me-1"></i>Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Yajman List -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-list text-primary me-2"></i>
                    Yajman List
                </h5>
                <span class="badge bg-primary fs-6">{{ count($yajmans) }} Total</span>
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
                                   placeholder="Search yajmans by name or date...">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="yajmanTable">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-bold">
                                <i class="fas fa-hashtag me-1"></i>No.
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-user me-1"></i>Yajman Name
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-image me-1"></i>Image
                            </th>
                            <th class="fw-bold">
                                <i class="fas fa-calendar me-1"></i>Event Date
                            </th>
                            <th class="fw-bold text-center">
                                <i class="fas fa-cogs me-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($yajmans as $key => $yajman)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="fw-semibold text-dark">{{ $yajman['name'] }}</div>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset(env('APP_URL').'/'.$yajman['image_path']) }}" 
                                         alt="Yajman Image" 
                                         class="rounded"
                                         style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                                         onclick="showImageModal('{{ asset(env('APP_URL').'/'.$yajman['image_path']) }}', '{{ $yajman['name'] }}')">
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark fs-6">
                                        <i class="fas fa-calendar-day me-1"></i>
                                        {{ \Carbon\Carbon::parse($yajman['event_date'])->format('M d, Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/edityajman/{{ $yajman['id'] }}" 
                                           class="btn btn-outline-primary btn-sm" 
                                           title="Edit Yajman">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteYajman', $yajman['id']) }}" 
                                              method="post" 
                                              style="display: inline;"
                                              onsubmit="return confirm('Are you sure you want to delete this yajman?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    title="Delete Yajman">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(count($yajmans) == 0)
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No Yajmans Found</h5>
                        <p class="text-muted">Add your first yajman using the form above.</p>
                    </div>
                @endif
            </div>
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
}

.btn-sm:hover {
    transform: translateY(-1px);
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
    const table = document.getElementById('yajmanTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        
        for (let i = 0; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByTagName('td')[1];
            const dateCell = rows[i].getElementsByTagName('td')[3];
            
            if (nameCell && dateCell) {
                const nameText = nameCell.textContent || nameCell.innerText;
                const dateText = dateCell.textContent || dateCell.innerText;
                
                if (nameText.toLowerCase().indexOf(filter) > -1 || 
                    dateText.toLowerCase().indexOf(filter) > -1) {
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
    document.querySelectorAll('.form-control').forEach(input => {
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

// Image modal functionality
function showImageModal(imageSrc, imageTitle) {
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModalLabel').textContent = imageTitle + ' - Image Preview';
    modal.show();
}
</script>

@endsection
