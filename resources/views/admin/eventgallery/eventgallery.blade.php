@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Add Main Event Gallery Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-images text-primary me-2"></i>
                Add Main Event Gallery Image
            </h5>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.saveEventGallery') }}">
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
                
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="title" class="form-label fw-semibold">
                            <i class="fas fa-tag me-1 text-primary"></i>
                            Image Title<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Enter Image Title" required>
                    </div>
                    
                    <div class="mb-3 col-md-4">
                        <label for="slug" class="form-label fw-semibold">
                            <i class="fas fa-link me-1 text-primary"></i>
                            Image Slug<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg" id="slug" name="slug" placeholder="Enter Image slug" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="image" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Main Image<span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*" required>
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Save Main Image
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Sub Event Gallery Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-layer-group text-primary me-2"></i>
                Add Sub Event Gallery Image
            </h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('handle.saveEventSubPhotos') }}">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="category" class="form-label fw-semibold">
                            <i class="fas fa-folder me-1 text-primary"></i>
                            Select Parent Image<span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-select-lg" id="category" name="image_id" required>
                            <option value="">Select Parent Title</option>
                            @foreach ($eventImages as $image)
                                <option value="{{ $image->id }}">{{ $image->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="sub_title" class="form-label fw-semibold">
                            <i class="fas fa-tag me-1 text-primary"></i>
                            Image Title<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg" id="sub_title" name="title" placeholder="Enter Image Title" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="image_sub" class="form-label fw-semibold">
                            <i class="fas fa-image me-1 text-primary"></i>
                            Sub Image<span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control form-control-lg" id="image_sub" name="image" accept="image/*" required>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-1"></i>Save Sub Image
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Event Gallery Images -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-images text-primary me-2"></i>
                        Main Event Gallery Images
                    </h5>
                    <small class="text-muted">Total {{ count($eventImages) }} main image(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchMainImages" placeholder="Search main images..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="mainImagesTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 50px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Image Title</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Image</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Sub Images</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Actions</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventImages as $key => $image)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $image['description'] }}</div>
                                            <small class="text-muted">Main Gallery Image</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="image-container">
                                        <img src="{{ asset(env('APP_URL').  '/' . $image['image_path']) }}" 
                                             class="rounded border shadow-sm" 
                                             width="60" height="60" 
                                             alt="Event Image"
                                             style="object-fit: cover; border: 2px solid #dee2e6; cursor: pointer;"
                                             onclick="showImageModal('{{ asset(env('APP_URL').  '/' . $image['image_path']) }}', '{{ $image['description'] }}')">
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    @php
                                        $subCount = $subEventImages->where('image_id', $image['id'])->count();
                                    @endphp
                                    <span class="badge bg-info text-white">{{ $subCount }} sub image(s)</span>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="/editeventgallery/{{ $image['id'] }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteEventGallery', $image['id']) }}" 
                                              method="post" 
                                              style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this image?')">
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
                                        <i class="fas fa-images fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No main images found</h6>
                                        <p class="text-muted small mb-0">No main gallery images available.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sub Event Gallery Images -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-layer-group text-primary me-2"></i>
                        Sub Event Gallery Images
                    </h5>
                    <small class="text-muted">Total {{ count($subEventImages) }} sub image(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchSubImages" placeholder="Search sub images..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="subImagesTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 50px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 180px;">
                                <small class="fw-bold text-uppercase text-muted">Parent Image</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Image Title</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Image</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Actions</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subEventImages as $key => $subimage)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    @php
                                        $parentImage = $eventImages->where('id', $subimage['image_id'])->first();
                                    @endphp
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $parentImage ? $parentImage['description'] : 'Unknown' }}</div>
                                            <small class="text-muted">ID: {{ $subimage['image_id'] }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="fw-semibold text-dark">{{ $subimage['description'] }}</div>
                                    <small class="text-muted">Sub Gallery Image</small>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="image-container">
                                        <img src="{{ asset(env('APP_URL').  '/' . $subimage['image_path']) }}" 
                                             class="rounded border shadow-sm" 
                                             width="60" height="60" 
                                             alt="Sub Event Image"
                                             style="object-fit: cover; border: 2px solid #dee2e6; cursor: pointer;"
                                             onclick="showImageModal('{{ asset(env('APP_URL').  '/' . $subimage['image_path']) }}', '{{ $subimage['description'] }}')">
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="/editsubeventgallery/{{ $subimage['id'] }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('handle.deleteSubEventGallery', $subimage['id']) }}" 
                                              method="post" 
                                              style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this sub image?')">
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
                                        <i class="fas fa-layer-group fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No sub images found</h6>
                                        <p class="text-muted small mb-0">No sub gallery images available.</p>
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
                <img id="modalImage" src="" alt="" class="img-fluid rounded" style="max-height: 70vh;">
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

/* Image Styling */
.image-container img:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Auto-generate slug from title
    const titleInput = document.getElementById("title");
    const slugInput = document.getElementById("slug");

    if (titleInput && slugInput) {
        titleInput.addEventListener("input", function () {
            let slug = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-zA-Z0-9\s-]/g, '')  // remove special chars
                .replace(/\s+/g, '-')             // replace spaces with hyphens
                .replace(/-+/g, '-');             // remove multiple hyphens

            slugInput.value = slug;
        });
    }

    // Search functionality for main images
    const searchMainInput = document.getElementById('searchMainImages');
    const mainTableRows = document.querySelectorAll('#mainImagesTable tbody tr');

    if (searchMainInput) {
        searchMainInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;

            mainTableRows.forEach(row => {
                if (row.cells.length === 1) return;
                
                const text = row.textContent.toLowerCase();
                const isVisible = text.includes(searchTerm);
                
                row.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });
        });
    }

    // Search functionality for sub images
    const searchSubInput = document.getElementById('searchSubImages');
    const subTableRows = document.querySelectorAll('#subImagesTable tbody tr');

    if (searchSubInput) {
        searchSubInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;

            subTableRows.forEach(row => {
                if (row.cells.length === 1) return;
                
                const text = row.textContent.toLowerCase();
                const isVisible = text.includes(searchTerm);
                
                row.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });
        });
    }
});

// Image modal function
function showImageModal(imageSrc, imageTitle) {
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModalLabel').textContent = imageTitle;
    modal.show();
}
</script>

@endsection
