@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <h4 class="fw-bold text-dark mb-1">
            <i class="fas fa-edit text-primary me-2"></i>
            Booking Descriptions
        </h4>
        <p class="text-muted mb-0">Manage Pooja and Yagna ceremony descriptions</p>
    </div>

    <!-- Alert Messages -->
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

    <!-- Tabbed Interface -->
    <div class="booking-tabs-container">
        <!-- Navigation Tabs -->
        <div class="nav nav-tabs nav-justified" id="bookingTabs" role="tablist">
            <button class="nav-link active" 
                    id="pooja-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#pooja-content" 
                    type="button" 
                    role="tab" 
                    aria-controls="pooja-content" 
                    aria-selected="true">
                <i class="fas fa-pray me-2"></i>
                Pooja Description
            </button>
            <button class="nav-link" 
                    id="yagna-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#yagna-content" 
                    type="button" 
                    role="tab" 
                    aria-controls="yagna-content" 
                    aria-selected="false">
                <i class="fas fa-fire me-2"></i>
                Yagna Description
            </button>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="bookingTabContent">
            <!-- Pooja Description Tab -->
            <div class="tab-pane fade show active" 
                 id="pooja-content" 
                 role="tabpanel" 
                 aria-labelledby="pooja-tab">
                <form action="{{ route('handle.saveBookingdetail') }}" method="POST" id="pooja-form">
                    @csrf
                    <input type="hidden" name="type" value="pooja">
                    
                    <div class="form-section">
                        <div class="section-header mb-4">
                            <i class="fas fa-pray text-primary me-2 fs-5"></i>
                            <h6 class="mb-0 fw-bold text-secondary">Pooja Ceremony Description</h6>
                        </div>
                        
                        <div class="editor-container">
                            <textarea id="pooja-editor" 
                                      name="pooja_description" 
                                      placeholder="Enter detailed description for Pooja ceremony...">{{ old('pooja_description', $booking->pooja_description ?? '') }}</textarea>
                        </div>
                        
                        <small class="form-help text-muted mt-2 d-block">
                            <i class="fas fa-info-circle me-1"></i>
                            Provide a comprehensive description of the Pooja ceremony, rituals, and significance
                        </small>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions mt-4 pt-4">
                        <button type="submit" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-save me-1"></i>Save Pooja Description
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetPoojaEditor()">
                            <i class="fas fa-undo me-1"></i>Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- Yagna Description Tab -->
            <div class="tab-pane fade" 
                 id="yagna-content" 
                 role="tabpanel" 
                 aria-labelledby="yagna-tab">
                <form action="{{ route('handle.saveBookingdetail') }}" method="POST" id="yagna-form">
                    @csrf
                    <input type="hidden" name="type" value="yagna">
                    
                    <div class="form-section">
                        <div class="section-header mb-4">
                            <i class="fas fa-fire text-primary me-2 fs-5"></i>
                            <h6 class="mb-0 fw-bold text-secondary">Yagna Ceremony Description</h6>
                        </div>
                        
                        <div class="editor-container">
                            <textarea id="yagna-editor" 
                                      name="yagna_description" 
                                      placeholder="Enter detailed description for Yagna ceremony...">{{ old('yagna_description', $booking->yagna_description ?? '') }}</textarea>
                        </div>
                        
                        <small class="form-help text-muted mt-2 d-block">
                            <i class="fas fa-info-circle me-1"></i>
                            Provide a comprehensive description of the Yagna ceremony, fire rituals, and benefits
                        </small>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions mt-4 pt-4">
                        <button type="submit" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-save me-1"></i>Save Yagna Description
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetYagnaEditor()">
                            <i class="fas fa-undo me-1"></i>Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Page Header */
.page-header {
    border-bottom: 1px solid #e9ecef;
    padding-bottom: 1rem;
}

/* Booking Tabs Container */
.booking-tabs-container {
    background: white;
    border-radius: 0.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    overflow: hidden;
}

/* Tab Navigation */
.nav-tabs {
    border-bottom: 2px solid #f8f9fa;
    margin-bottom: 0;
    background-color: #fafafa;
}

.nav-tabs .nav-link {
    border: none;
    border-radius: 0;
    color: #6c757d;
    font-weight: 500;
    padding: 1.25rem 2rem;
    transition: all 0.3s ease;
    background: transparent;
}

.nav-tabs .nav-link:hover {
    border-color: transparent;
    color: #5d1a1e;
    background-color: rgba(93, 26, 30, 0.05);
}

.nav-tabs .nav-link.active {
    color: #5d1a1e;
    background-color: white;
    border-color: transparent;
    border-bottom: 3px solid #5d1a1e;
    font-weight: 600;
}

.nav-tabs .nav-link i {
    font-size: 1.1rem;
}

/* Tab Content */
.tab-content {
    background-color: white;
    padding: 2.5rem;
    min-height: 700px;
}

.tab-pane {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Form Section */
.form-section {
    margin-bottom: 2rem;
}

.section-header {
    display: flex;
    align-items: center;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid #f0f0f0;
}

/* Editor Container */
.editor-container {
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    min-height: 600px;
    overflow: hidden;
}

.editor-container:focus-within {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.1);
}

.editor-container textarea {
    width: 100%;
    min-height: 600px;
    border: none;
    padding: 1.5rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 14px;
    line-height: 1.6;
    resize: vertical;
    outline: none;
    background-color: white;
}

/* Form Actions */
.form-actions {
    border-top: 1px solid #f0f0f0;
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

/* Button Styling */
.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #5d1a1e 0%, #4a1318 100%);
    border-color: #5d1a1e;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #4a1318 0%, #5d1a1e 100%);
    border-color: #4a1318;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(93, 26, 30, 0.3);
}

.btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    border-color: #6c757d;
    transform: translateY(-1px);
}

/* Alert Styling */
.alert-danger {
    border-left: 4px solid #dc3545;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    border-radius: 0.5rem;
    animation: fadeIn 0.5s ease;
}

.alert-success {
    border-left: 4px solid #28a745;
    background-color: #d4edda;
    border-color: #c3e6cb;
    border-radius: 0.5rem;
    animation: fadeIn 0.5s ease;
}

/* Text Colors */
.text-primary {
    color: #5d1a1e !important;
}

.text-secondary {
    color: #6c757d !important;
}

.form-help {
    font-size: 0.875rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .tab-content {
        padding: 1.5rem;
    }
    
    .nav-tabs .nav-link {
        padding: 1rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-lg {
        width: 100%;
        margin-right: 0 !important;
    }
}

/* TinyMCE Custom Styling */
.tox .tox-editor-header {
    border-bottom: 1px solid #e9ecef !important;
}

.tox .tox-toolbar {
    background: #f8f9fa !important;
}

.tox .tox-menubar {
    background: #f8f9fa !important;
}
</style>

<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#pooja-editor',
        height: 600,
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
    tinymce.init({
        selector: '#yagna-editor',
        height: 600,
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




