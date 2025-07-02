@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Add New Acharya Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-user-tie text-primary me-2"></i>
                Add New Acharya
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('handle.saveAcharya') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <strong>There were some problems with your input:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label fw-semibold">Acharya Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter acharya name">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="image" class="form-label fw-semibold">Acharya Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    
                    <div class="col-12">
                        <label for="description" class="form-label fw-semibold">Acharya Description<span class="text-danger">*</span></label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Save Acharya
                    </button>
                    <button type="reset" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Acharyas List -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-users text-primary me-2"></i>
                        Acharyas Management
                    </h5>
                    <small class="text-muted">Total {{ count($acharyas) }} acharya(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search acharyas..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="acharyaTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 50px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 180px;">
                                <small class="fw-bold text-uppercase text-muted">Acharya</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 80px;">
                                <small class="fw-bold text-uppercase text-muted">Image</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 300px;">
                                <small class="fw-bold text-uppercase text-muted">Description</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 150px;">
                                <small class="fw-bold text-uppercase text-muted">Current Acharya</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Actions</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($acharyas as $key => $acharya)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $acharya->name }}</div>
                                            <small class="text-muted">Acharya</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="avatar-container">
                                        <img src="{{ asset(env('APP_URL').  '/' . $acharya->image) }}" 
                                             class="rounded-circle border" 
                                             width="50" height="50" 
                                             alt="Acharya Image"
                                             style="object-fit: cover; border: 2px solid #dee2e6;">
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="description-content">
                                        @if(strlen(strip_tags($acharya->description)) > 100)
                                            <div class="description-preview">
                                                {!! Str::limit(strip_tags($acharya->description), 100) !!}
                                                <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-more" onclick="toggleDescription(this)">
                                                    Show more
                                                </button>
                                            </div>
                                            <div class="description-full d-none">
                                                {!! $acharya->description !!}
                                                <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-less" onclick="toggleDescription(this)">
                                                    Show less
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-dark">{!! $acharya->description !!}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input current-acharya-toggle" 
                                               type="checkbox" 
                                               data-acharya-id="{{ $acharya->id }}"
                                               {{ $acharya->is_current_acharya ? 'checked' : '' }}
                                               style="transform: scale(1.2);">
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="/editacharya/{{ $acharya->id }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteAcharya', $acharya->id) }}" 
                                              method="post" 
                                              style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this acharya?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-user-tie fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No acharyas found</h6>
                                        <p class="text-muted small mb-0">No acharya records available.</p>
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
/* Clean Table Styles */
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

.description-content {
    max-width: 300px;
    line-height: 1.4;
    word-wrap: break-word;
}

.description-content .btn-link {
    font-size: 0.8rem;
    text-decoration: none;
    line-height: 1;
}

.description-content .btn-link:hover {
    text-decoration: underline;
}

.badge {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.35em 0.65em;
}

.card {
    border-radius: 0.5rem;
    overflow: hidden;
}

.card-header {
    background-color: #fff !important;
}

/* Form Switch Styling */
.form-check-input:checked {
    background-color: #5d1a1e;
    border-color: #5d1a1e;
}

.form-check-input:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
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

.input-group .form-control::placeholder {
    color: #6c757d;
    font-style: italic;
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

/* Responsive Design */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .table th, .table td {
        padding: 0.5rem 0.25rem;
    }
    
    .description-content {
        max-width: 200px;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        width: 100%;
        align-items: stretch;
    }
    
    .input-group {
        width: 100% !important;
    }
    
    .d-flex.gap-2 .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
    
    .table {
        font-size: 0.75rem;
    }
}

/* Custom scrollbar */
.table-responsive::-webkit-scrollbar {
    height: 6px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#acharyaTable tbody tr');

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;

        tableRows.forEach(row => {
            // Skip the empty state row
            if (row.cells.length === 1) return;
            
            const text = row.textContent.toLowerCase();
            const isVisible = text.includes(searchTerm);
            
            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        // Update count
        const countElement = document.querySelector('.card-header small');
        if (countElement) {
            countElement.textContent = `Total ${visibleCount} acharya(s)${searchTerm ? ' found' : ''}`;
        }
    });

    // Current Acharya Toggle - Only one can be active
    const toggles = document.querySelectorAll('.current-acharya-toggle');
    
    toggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                // Uncheck all other toggles
                toggles.forEach(otherToggle => {
                    if (otherToggle !== this) {
                        otherToggle.checked = false;
                    }
                });
                
                // Here you can add AJAX call to update the database
                updateCurrentAcharya(this.dataset.acharyaId);
            }
        });
    });
});

// Toggle description function
function toggleDescription(button) {
    const descriptionContent = button.closest('.description-content');
    const preview = descriptionContent.querySelector('.description-preview');
    const full = descriptionContent.querySelector('.description-full');
    
    if (button.classList.contains('show-more')) {
        preview.classList.add('d-none');
        full.classList.remove('d-none');
    } else {
        preview.classList.remove('d-none');
        full.classList.add('d-none');
    }
}

// Function to update current acharya in database
function updateCurrentAcharya(acharyaId) {
    // Add AJAX call here to update the database
    fetch('/update-current-acharya', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            acharya_id: acharyaId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            console.log('Current acharya updated successfully');
        }
    })
    .catch(error => {
        console.error('Error updating current acharya:', error);
    });
}
</script>

<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#description',
        height: 400,
        menubar: 'file edit view insert format tools table help',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code image help wordcount imagetools link',
        toolbar: 'undo redo | styleselect  | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
        block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
        image_dimensions: true,
        image_advtab: true,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
    });
</script>
@endsection
