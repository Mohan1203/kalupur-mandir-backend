@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-3">
        <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="POST" action="{{ route('handle.saveSettings') }}">
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

                <!-- General Settings Card -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-bold text-dark">
                            <i class="fas fa-cog text-primary me-2"></i>
                            General Settings
                        </h5>
                    </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="logo" class="form-label fw-semibold">
                                    <i class="fas fa-image me-1 text-primary"></i>
                                    Logo
                                </label>
                                <input type="file" 
                                       class="form-control form-control-lg" 
                                       id="logo" 
                                       name="logo" 
                                       accept="image/*">
                                        @if (!empty($setting->logo))
                                    <div class="mt-3">
                                        <label class="form-label fw-semibold text-muted">Current Logo:</label>
                                        <div class="logo-preview-container">
                                            <img src="{{ config('app.url').'/'.$setting->logo }}" 
                                                 alt="Setting Logo" 
                                                 class="img-thumbnail"
                                                 style="max-width: 200px; max-height: 100px; object-fit: cover;">
                                        </div>
                                                    </div>
                                        @endif
                                </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="description" class="form-label fw-semibold">
                                    <i class="fas fa-align-left me-1 text-primary"></i>
                                    Description
                                </label>
                                <textarea class="form-control form-control-lg" 
                                          id="description" 
                                          name="description" 
                                          rows="6" 
                                          placeholder="Enter description">{{ $setting->description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-bold text-dark">
                            <i class="fas fa-address-book text-primary me-2"></i>
                            Contact Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope me-1 text-primary"></i>
                                    Email Address
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg" 
                                       id="email" 
                                       name="email" 
                                       value="{{ $setting->email ?? '' }}" 
                                       placeholder="Enter email address">
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="phone_number" class="form-label fw-semibold">
                                    <i class="fas fa-phone me-1 text-primary"></i>
                                    Phone Number
                                </label>
                                <input type="tel" 
                                       class="form-control form-control-lg" 
                                       id="phone_number" 
                                       name="phone_number" 
                                       value="{{ $setting->contact_number ?? '' }}" 
                                       placeholder="Enter phone number">
                            </div>
                            
                            <div class="mb-4 col-12">
                                <label for="address" class="form-label fw-semibold">
                                    <i class="fas fa-map-marker-alt me-1 text-primary"></i>
                                    Address
                                </label>
                                <textarea id="address" 
                                          name="address" 
                                          class="form-control form-control-lg" 
                                          rows="4"
                                          placeholder="Enter complete address">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            
                            <div class="mb-4 col-12">
                                <label for="iframe_key" class="form-label fw-semibold">
                                    <i class="fas fa-map-marked-alt me-1 text-primary"></i>
                                    Google Maps Embed Code
                                </label>
                                <textarea id="iframe_key" 
                                          name="iframe_key" 
                                          class="form-control form-control-lg" 
                                          rows="4"
                                          placeholder="Paste your Google Maps iframe embed code here (e.g., <iframe src=&quot;https://www.google.com/maps/embed...&quot; ...></iframe>)">{{ $setting->iframe_key ?? '' }}</textarea>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Paste the complete iframe code from Google Maps. Only the src URL will be saved to the database.
                                </small>
                                
                                @if(!empty($setting->iframe_key))
                                    <div class="mt-3">
                                        <label class="form-label fw-semibold text-muted">Current Map Preview:</label>
                                        <div class="map-preview-container">
                                            <iframe src="{{ $setting->iframe_key }}" 
                                                    width="100%" 
                                                    height="250" 
                                                    style="border:0; border-radius: 0.5rem;" 
                                                    allowfullscreen="" 
                                                    loading="lazy" 
                                                    referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                        <small class="text-muted mt-1 d-block">
                                            <i class="fas fa-link me-1"></i>
                                            Saved URL: <code>{{ $setting->iframe_key }}</code>
                                        </small>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg me-2">
                            <i class="fas fa-save me-1"></i>Update Settings
                        </button>
                        <button type="reset" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-undo me-1"></i>Reset Changes
                        </button>
                        </div>
                    </div>
            </form>
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

/* Map Preview Styling */
.map-preview-container {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    padding: 0.5rem;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

.map-preview-container:hover {
    border-color: #5d1a1e;
    background-color: #fff;
}

.map-preview-container iframe {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.map-preview-container iframe:hover {
    box-shadow: 0 6px 20px rgba(93, 26, 30, 0.15);
}

/* Logo Preview Styling */
.logo-preview-container {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    padding: 0.75rem;
    background-color: #f8f9fa;
    display: inline-block;
    transition: all 0.3s ease;
}

.logo-preview-container:hover {
    border-color: #5d1a1e;
    background-color: #fff;
}

/* Live Preview Container */
.live-preview-container {
    border: 2px solid #5d1a1e;
    border-radius: 0.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    margin-top: 1rem;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* URL Display Styling */
.url-display {
    background-color: #f8f9fa !important;
    border: 1px solid #dee2e6 !important;
    border-radius: 0.375rem !important;
}

.url-display code {
    word-wrap: break-word;
    white-space: pre-wrap;
    line-height: 1.4;
    max-height: 100px;
    overflow-y: auto;
}

/* Enhanced Alert Styling */
.alert {
    border-radius: 0.375rem;
}

.alert-success {
    background-color: rgba(25, 135, 84, 0.1);
    border-color: rgba(25, 135, 84, 0.2);
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.1);
    border-color: rgba(220, 53, 69, 0.2);
}

.alert-warning {
    background-color: rgba(255, 193, 7, 0.1);
    border-color: rgba(255, 193, 7, 0.2);
}

/* Code display styling */
code {
    background-color: #f1f3f4;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.85rem;
    color: #5d1a1e;
    border: 1px solid #dee2e6;
}

/* Enhanced textarea styling for iframe input */
#iframe_key {
    font-family: 'Courier New', monospace;
    font-size: 0.85rem;
    line-height: 1.4;
}

#iframe_key:focus {
    border-color: #5d1a1e;
    box-shadow: 0 0 0 0.25rem rgba(93, 26, 30, 0.25);
}

/* Icon Styling */
.text-primary {
    color: #5d1a1e !important;
}

/* Top-level Alert Styling */
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
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Google Maps iframe live preview functionality
    const iframeInput = document.getElementById('iframe_key');
    
    if (iframeInput) {
        // Create live preview container
        const previewDiv = document.createElement('div');
        previewDiv.id = 'livePreviewContainer';
        previewDiv.style.display = 'none';
        iframeInput.parentNode.insertBefore(previewDiv, iframeInput.nextSibling);
        
        // Add input event listener for live preview
        iframeInput.addEventListener('input', function() {
            const iframeCode = this.value.trim();
            
            if (iframeCode) {
                showLivePreview(iframeCode);
            } else {
                hideLivePreview();
            }
        });
        
        // Add paste event listener for better user experience
        iframeInput.addEventListener('paste', function(e) {
            setTimeout(() => {
                const iframeCode = this.value.trim();
                if (iframeCode) {
                    showLivePreview(iframeCode);
                }
            }, 100);
        });
    }
    
    function showLivePreview(iframeCode) {
        const previewContainer = document.getElementById('livePreviewContainer');
        const extractedSrc = extractIframeSrc(iframeCode);
        
        if (extractedSrc && extractedSrc !== iframeCode) {
            // Valid iframe found
            previewContainer.innerHTML = `
                <div class="live-preview-container">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-eye text-success me-2"></i>
                        <h6 class="mb-0 fw-bold text-success">Live Preview</h6>
                    </div>
                    <div class="map-preview-container mb-3">
                        <iframe src="${extractedSrc}" 
                                width="100%" 
                                height="250" 
                                style="border:0; border-radius: 0.5rem;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="alert alert-success border-0 py-2 mb-2">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <div class="flex-grow-1">
                                <strong>Valid Google Maps iframe detected!</strong>
                                <div class="mt-1">
                                    <small class="text-muted">This URL will be saved to database:</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            previewContainer.style.display = 'block';
        } else if (iframeCode.includes('iframe') || iframeCode.includes('src=')) {
            // Looks like iframe but couldn't extract src
            previewContainer.innerHTML = `
                <div class="live-preview-container" style="border-color: #dc3545; background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                        <h6 class="mb-0 fw-bold text-danger">Invalid iframe code</h6>
                    </div>
                    <div class="alert alert-danger border-0 py-2 mb-0">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-times-circle text-danger me-2 mt-1"></i>
                            <div class="flex-grow-1">
                                <strong>Could not extract src URL</strong>
                                <div class="mt-1">
                                    <small>Please check your Google Maps embed code and make sure it contains a valid src attribute.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            previewContainer.style.display = 'block';
        } else {
            // Not iframe-like content
            previewContainer.innerHTML = `
                <div class="live-preview-container" style="border-color: #ffc107; background: linear-gradient(135deg, #fff3cd 0%, #fdeeba 100%);">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-info-circle text-warning me-2"></i>
                        <h6 class="mb-0 fw-bold text-warning">Waiting for iframe code</h6>
                    </div>
                    <div class="alert alert-warning border-0 py-2 mb-0">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-paste text-warning me-2 mt-1"></i>
                            <div class="flex-grow-1">
                                <strong>Paste Google Maps embed code</strong>
                                <div class="mt-1">
                                    <small>Please paste the complete iframe code from Google Maps (e.g., &lt;iframe src="..."&gt;&lt;/iframe&gt;)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            previewContainer.style.display = 'block';
        }
    }
    
    function hideLivePreview() {
        const previewContainer = document.getElementById('livePreviewContainer');
        if (previewContainer) {
            previewContainer.style.display = 'none';
        }
    }
    
    function extractIframeSrc(iframeHtml) {
        // Clean up the input - remove extra whitespace and newlines
        const cleanHtml = iframeHtml.trim().replace(/\s+/g, ' ');
        
        // Try multiple regex patterns to extract src attribute
        const srcPatterns = [
            /src=["\']([^"\']+)["\']/i,      // Standard src="..." or src='...'
            /src=([^\s>]+)/i,                // src=... without quotes
            /src\s*=\s*["\']([^"\']+)["\']/i // src with spaces
        ];
        
        for (const pattern of srcPatterns) {
            const match = cleanHtml.match(pattern);
            if (match && match[1]) {
                let srcUrl = match[1];
                
                // Clean up the URL - remove any trailing characters that aren't part of the URL
                srcUrl = srcUrl.replace(/["\'\s>].*$/, '');
                
                // Validate that it's a Google Maps URL
                if (srcUrl.includes('google.com/maps') || srcUrl.includes('maps.google.com')) {
                    return srcUrl;
                }
            }
        }
        
        // If no src found but looks like a Google Maps URL directly, return as is
        if ((cleanHtml.startsWith('http') || cleanHtml.startsWith('//')) && 
            (cleanHtml.includes('google.com/maps') || cleanHtml.includes('maps.google.com'))) {
            return cleanHtml;
        }
        
        return null;
    }

    // Form submission handling with loading states
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Updating...';
            
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
                if (this.value.trim()) {
                    this.classList.add('is-valid');
                }
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });

    // Phone number formatting
    const phoneInput = document.getElementById('phone_number');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });
    }

    // Enhanced form validation for iframe field
    const iframeField = document.getElementById('iframe_key');
    if (iframeField) {
        iframeField.addEventListener('blur', function() {
            const value = this.value.trim();
            if (value && !value.includes('src=') && !value.startsWith('http')) {
                this.classList.add('is-invalid');
                // Show validation message
                let feedback = this.parentNode.querySelector('.invalid-feedback');
                if (!feedback) {
                    feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    this.parentNode.appendChild(feedback);
                }
                feedback.textContent = 'Please enter a valid Google Maps iframe embed code or URL.';
            } else {
                this.classList.remove('is-invalid');
                if (value) {
                    this.classList.add('is-valid');
                }
                const feedback = this.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.remove();
                }
            }
        });
    }
});
</script>

@endsection
