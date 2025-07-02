@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Pages Management -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-dark">
                <i class="fas fa-file-alt text-primary me-2"></i>
                Legal Pages Management
            </h5>
            <p class="text-muted small mb-0 mt-1">Manage your website's legal and policy pages individually</p>
        </div>
        <div class="card-body p-0">
            @if ($errors->any())
                <div class="alert alert-danger m-4">
                    <strong><i class="fas fa-exclamation-triangle me-1"></i>There were some problems with your input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Tab Navigation -->
            <div class="border-bottom">
                <nav class="nav nav-tabs px-4" id="pagesTab" role="tablist">
                    <button class="nav-link active fw-semibold" 
                            id="cookie-policy-tab" 
                            data-bs-toggle="tab" 
                            data-bs-target="#cookie-policy" 
                            type="button" 
                            role="tab" 
                            aria-controls="cookie-policy" 
                            aria-selected="true">
                        <i class="fas fa-cookie-bite me-2"></i>
                        Cookie Policy
                    </button>
                    <button class="nav-link fw-semibold" 
                            id="privacy-policy-tab" 
                            data-bs-toggle="tab" 
                            data-bs-target="#privacy-policy" 
                            type="button" 
                            role="tab" 
                            aria-controls="privacy-policy" 
                            aria-selected="false">
                        <i class="fas fa-shield-alt me-2"></i>
                        Privacy Policy
                    </button>
                    <button class="nav-link fw-semibold" 
                            id="terms-conditions-tab" 
                            data-bs-toggle="tab" 
                            data-bs-target="#terms-conditions" 
                            type="button" 
                            role="tab" 
                            aria-controls="terms-conditions" 
                            aria-selected="false">
                        <i class="fas fa-balance-scale me-2"></i>
                        Terms & Conditions
                    </button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="tab-content p-4" id="pagesTabContent">
                <!-- Cookie Policy Tab -->
                <div class="tab-pane fade show active" 
                     id="cookie-policy" 
                     role="tabpanel" 
                     aria-labelledby="cookie-policy-tab">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-container me-3">
                                <i class="fas fa-cookie-bite fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">Cookie Policy</h5>
                                <p class="text-muted small mb-0">Define how your website uses cookies and tracking technologies</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('handle.saveCookiePolicy') }}" method="POST" class="cookie-policy-form">
                            @csrf
                            <div class="editor-container mb-3">
                                <textarea id="cookie_policy" 
                                          name="cookie_policy" 
                                          class="form-control"
                                          required>{{ $pages->cookie_policy ?? '' }}</textarea>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-1"></i>Save Cookie Policy
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetEditor('cookie_policy')">
                                    <i class="fas fa-undo me-1"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Privacy Policy Tab -->
                <div class="tab-pane fade" 
                     id="privacy-policy" 
                     role="tabpanel" 
                     aria-labelledby="privacy-policy-tab">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-container me-3">
                                <i class="fas fa-shield-alt fa-2x text-success"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">Privacy Policy</h5>
                                <p class="text-muted small mb-0">Explain how you collect, use, and protect user data</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('handle.savePrivacyPolicy') }}" method="POST" class="privacy-policy-form">
                            @csrf
                            <div class="editor-container mb-3">
                                <textarea id="privacy_policy" 
                                          name="privacy_policy" 
                                          class="form-control"
                                          required>{{ $pages->privacy_policy ?? '' }}</textarea>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-save me-1"></i>Save Privacy Policy
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetEditor('privacy_policy')">
                                    <i class="fas fa-undo me-1"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Terms & Conditions Tab -->
                <div class="tab-pane fade" 
                     id="terms-conditions" 
                     role="tabpanel" 
                     aria-labelledby="terms-conditions-tab">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-container me-3">
                                <i class="fas fa-balance-scale fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">Terms & Conditions</h5>
                                <p class="text-muted small mb-0">Set the rules and guidelines for using your website</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('handle.saveTermsConditions') }}" method="POST" class="terms-conditions-form">
                            @csrf
                            <div class="editor-container mb-3">
                                <textarea id="terms_and_conditions" 
                                          name="terms_and_conditions" 
                                          class="form-control"
                                          required>{{ $pages->terms_and_conditions ?? '' }}</textarea>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-save me-1"></i>Save Terms & Conditions
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetEditor('terms_and_conditions')">
                                    <i class="fas fa-undo me-1"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Card Styling */
.card {
    border-radius: 0.75rem;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}

/* Tab Navigation Styling */
.nav-tabs {
    border-bottom: 2px solid #e9ecef;
}

.nav-tabs .nav-link {
    border: none;
    color: #6c757d;
    padding: 1rem 1.5rem;
    margin-bottom: -2px;
    transition: all 0.3s ease;
    border-radius: 0;
    background: transparent;
}

.nav-tabs .nav-link:hover {
    border: none;
    background: rgba(93, 26, 30, 0.1);
    color: #5d1a1e;
}

.nav-tabs .nav-link.active {
    border: none;
    background: transparent;
    color: #5d1a1e;
    border-bottom: 3px solid #5d1a1e;
    font-weight: 600;
}

.nav-tabs .nav-link i {
    opacity: 0.7;
}

.nav-tabs .nav-link.active i {
    opacity: 1;
}

/* Tab Content Styling */
.tab-content {
    min-height: 600px;
}

.icon-container {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(93, 26, 30, 0.1);
}

.editor-container {
    border-radius: 0.5rem;
    overflow: hidden;
}

/* TinyMCE Styling */
.tox-tinymce {
    border-radius: 0.5rem !important;
    border: 2px solid #e9ecef !important;
    transition: all 0.3s ease;
}

.tox-tinymce:focus-within {
    border-color: #5d1a1e !important;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
}

.tox-toolbar-overlord {
    background: #f8f9fa !important;
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

.btn-success:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
}

.btn-warning:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
}

.btn-outline-secondary:hover {
    transform: translateY(-1px);
}

/* Alert Styling */
.alert-danger {
    border-left: 4px solid #dc3545;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-success {
    border-left: 4px solid #198754;
    background-color: #d1e7dd;
    border-color: #badbcc;
}

/* Loading States */
.btn-primary:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}

.btn-success:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}

.btn-warning:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border-color: #6c757d;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .nav-tabs .nav-link {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .btn-lg {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
    }
    
    .d-flex.gap-2 .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .icon-container {
        width: 50px;
        height: 50px;
    }
    
    .icon-container i {
        font-size: 1.5rem !important;
    }
}

/* Enhanced visual feedback */
.nav-link:not(.active):hover {
    transform: translateY(-1px);
}

.tab-pane {
    animation: fadeIn 0.3s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Primary color overrides */
.text-primary {
    color: #5d1a1e !important;
}

.bg-primary {
    background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%) !important;
}
</style>

<script src="{{ asset('javascript/tinymce/tinymce.min.js') }}"></script>
<script>
    let editors = {};

    // Initialize TinyMCE editors
    function initializeEditors() {
        const editorConfig = {
            height: 500,
            menubar: 'file edit view insert format tools table help',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code image help wordcount imagetools link',
            toolbar: 'undo redo | styleselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
            image_dimensions: true,
            image_advtab: true,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            skin: 'oxide',
            content_css: 'default',
            branding: false
        };

        // Initialize each editor
        ['cookie_policy', 'privacy_policy', 'terms_and_conditions'].forEach(editorId => {
            tinymce.init({
                ...editorConfig,
                selector: `#${editorId}`
            }).then(function(editorArray) {
                editors[editorId] = editorArray[0];
            });
        });
    }

    // Reset individual editor
    function resetEditor(editorId) {
        if (confirm('Are you sure you want to reset this content? This action cannot be undone.')) {
            const editor = editors[editorId];
            if (editor) {
                editor.setContent('');
            }
        }
    }

    // Form submission handling
    document.addEventListener('DOMContentLoaded', function() {
        // Handle each form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Saving...';
                    
                    // Sync TinyMCE content with textarea
                    const textarea = this.querySelector('textarea');
                    if (textarea && editors[textarea.id]) {
                        editors[textarea.id].save();
                    }
                    
                    // Re-enable button after 3 seconds (in case of errors)
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }, 3000);
                }
            });
        });
    });

    // Tab switching handling
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
        tab.addEventListener('shown.bs.tab', function(e) {
            const targetTab = e.target.getAttribute('data-bs-target');
            console.log(`Switched to tab: ${targetTab}`);
        });
    });

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initializeEditors();
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl+S to save current active tab
        if (e.ctrlKey && e.key === 's') {
            e.preventDefault();
            
            // Find active tab and submit its form
            const activeTab = document.querySelector('.tab-pane.active');
            if (activeTab) {
                const form = activeTab.querySelector('form');
                if (form) {
                    form.dispatchEvent(new Event('submit'));
                }
            }
        }
    });
</script>

@endsection
