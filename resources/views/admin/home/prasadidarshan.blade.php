@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Add Prasadi Darshan Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-plus-circle text-primary me-2"></i>
                Add Prasadi Darshan
            </h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('handle.savePrasadidarshan') }}" enctype="multipart/form-data">
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
                        <label for="prasadi_image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Prasadi Image<span class="text-danger">*</span>
                        </label>
                        <input type="file" 
                               class="form-control form-control-lg" 
                               id="prasadi_image" 
                               name="prasadi_image"
                               accept="image/*"
                               required>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Upload an image for Prasadi Darshan (JPG, PNG, GIF)
                        </small>
                    </div>
                    
                    <div class="mb-4 col-md-6">
                        <label for="heading" class="form-label fw-semibold">
                            <i class="fas fa-heading me-1 text-primary"></i>
                            Heading<span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="heading" 
                               name="heading"
                               placeholder="Enter heading for Prasadi Darshan"
                               required>
                    </div>
                    
                    <div class="mb-4 col-12">
                        <label for="description" class="form-label fw-semibold">
                            <i class="fas fa-align-left me-1 text-primary"></i>
                            Description<span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" 
                                  id="description"
                                  name="description" 
                                  rows="6"
                                  placeholder="Enter detailed description for Prasadi Darshan"
                                  required></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Save Prasadi Darshan
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Prasadi Darshan List -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-list text-primary me-2"></i>
                        Prasadi Darshan List
                    </h5>
                    <small class="text-muted">Total {{ count($prasadiDarshans) }} item(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchPrasadi" placeholder="Search prasadi darshan..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="prasadiTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 60px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Title</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Image</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 300px;">
                                <small class="fw-bold text-uppercase text-muted">Description</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Actions</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prasadiDarshans as $key => $row)
                            <tr class="border-bottom" data-id="{{ $row['id'] }}">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-eye text-primary me-2"></i>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark">{{ $row['title'] }}</div>
                                            <small class="text-muted">Prasadi Darshan</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="image-container">
                                        <img src="{{ asset(env('APP_URL') .'/'. $row['prasadi_image']) }}" 
                                             alt="Prasadi Image" 
                                             class="rounded-circle"
                                             style="width: 50px; height: 50px; object-fit: cover; cursor: pointer; border: 2px solid #dee2e6;"
                                             onclick="showImageModal(this.src, '{{ $row['title'] }}')">
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="description-content">
                                        <div class="description-text" style="max-height: 60px; overflow: hidden;">
                                            {{ $row['description'] }}
                                        </div>
                                        @if (strlen($row['description']) > 100)
                                            <button class="btn btn-link p-0 text-primary btn-sm mt-1 expand-btn" 
                                                    onclick="toggleDescription(this)">
                                                <small>Show more</small>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="/editprasadidarshan/{{ $row['id'] }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deletePrasadiDarshan', $row['id']) }}" 
                                              method="post" 
                                              style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this Prasadi Darshan?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-eye fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No Prasadi Darshan found</h6>
                                        <p class="text-muted small mb-0">Add your first Prasadi Darshan above.</p>
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

/* Image Styling */
.image-container img:hover {
    transform: scale(1.1);
    transition: all 0.3s ease;
    border-color: #5d1a1e !important;
}

/* Description Styling */
.description-text {
    transition: max-height 0.3s ease;
}

.description-text.expanded {
    max-height: none !important;
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
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchPrasadi');
    const tableRows = document.querySelectorAll('#prasadiTable tbody tr');

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
    document.querySelector('form').addEventListener('submit', function(e) {
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

    // File input preview functionality
    document.getElementById('prasadi_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create preview if it doesn't exist
                let previewContainer = document.querySelector('.image-preview');
                if (!previewContainer) {
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'image-preview mt-3';
                    previewContainer.innerHTML = `
                        <label class="form-label fw-semibold text-success">Image Preview:</label>
                        <div class="border rounded p-2" style="display: inline-block;">
                            <img class="img-thumbnail" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                        </div>
                    `;
                    document.getElementById('prasadi_image').parentNode.appendChild(previewContainer);
                }
                
                const img = previewContainer.querySelector('img');
                img.src = e.target.result;
                img.alt = 'Prasadi image preview';
            };
            reader.readAsDataURL(file);
        }
    });
});

// Image modal functionality
function showImageModal(src, title) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModalLabel').textContent = title;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}

// Description toggle functionality
function toggleDescription(button) {
    const descriptionText = button.parentNode.querySelector('.description-text');
    const isExpanded = descriptionText.classList.contains('expanded');
    
    if (isExpanded) {
        descriptionText.classList.remove('expanded');
        descriptionText.style.maxHeight = '60px';
        button.innerHTML = '<small>Show more</small>';
    } else {
        descriptionText.classList.add('expanded');
        descriptionText.style.maxHeight = 'none';
        button.innerHTML = '<small>Show less</small>';
    }
}
</script>

@endsection
