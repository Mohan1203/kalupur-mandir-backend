@extends('layout.layout')

@section('content')
    <div class="container-fluid px-4 py-3">
        <!-- Add New Testimonial Form -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-plus-circle text-primary me-2"></i>
                    Add SEO details
                </h5>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong><i class="fas fa-exclamation-triangle me-1"></i>There were some problems with your
                            input:</strong>
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

                <form method="POST" enctype="multipart/form-data" action="{{ route('handle.saveseo') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label for="page_name" class="form-label fw-semibold">
                                <i class="fas fa-list me-1 text-primary"></i>
                                Select Page
                            </label>
                            <select class="form-select " id="page_name" name="page_name">
                                <option value="">-- Choose a page --</option>
                                <option value="home">Home</option>
                                <option value="about">About Us</option>
                                <option value="acharya">Acharyas</option>
                                <option value="booking">Booking</option>
                                <option value="contact-us">Contact Us</option>
                                <option value="cookie-policy">Cookie Policy</option>
                                <option value="support-our-mission">Support Our Mission</option>
                                <option value="events">Events</option>
                                <option value="out-history">Our History & Heritage</option>
                                <option value="privacy-policy">Privacy Policy</option>
                                <option value="terms&condition">Terms & Conditions</option>
                                <option value="video-gallery">Video Gallery</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="title" class="form-label fw-semibold">
                                <i class="fas fa-file me-1 text-primary"></i>
                                Page Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title"
                                placeholder="Enter page name" required>
                        </div>


                        <div class="mb-3 col-md-3">
                            <label for="keywords" class="form-label fw-semibold">
                                <i class="fas fa-tags me-1 text-primary"></i>
                                Keywords<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="keywords" name="keywords"
                                placeholder="Enter Keywords">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="schema_markup" class="form-label fw-semibold">
                                <i class="fas fa-code me-1 text-primary"></i>
                                Schema Merkup<span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg" id="schema_markup" name="schema_markup" rows="4"
                                placeholder="Enter schema markup"></textarea>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="description" class="form-label fw-semibold">
                                <i class="fas fa-quote-left me-1 text-primary"></i>
                                Description<span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg" id="description" name="description" rows="4"
                                placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-1"></i>Add SEO
                        </button>
                        <button type="reset" class="btn btn-outline-warning btn-lg">
                            <i class="fas fa-undo me-1"></i>Reset Form
                        </button>
                    </div>
                </form>

            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div>
                            <h5 class="mb-1 fw-bold text-dark">
                                <i class="fas fa-list text-primary me-2"></i>
                                SEO page List
                            </h5>
                            <small class="text-muted">Total {{ count($seoDetails) }} item(s)</small>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" class="form-control" id="searchPrasadi"
                                    placeholder="Search prasadi darshan..." style="border-right: none; height: 38px;" />
                                <button class="btn" type="button"
                                    style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
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
                                        <small class="fw-bold text-uppercase text-muted">Page</small>
                                    </th>
                                    <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                        <small class="fw-bold text-uppercase text-muted">Title</small>
                                    </th>
                                    <th class="border-0 px-3 py-3  " style="width: 300px;">
                                        <small class="fw-bold text-uppercase text-muted">Keywords</small>
                                    </th>
                                    <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                        <small class="fw-bold text-uppercase text-muted">Description</small>
                                    </th>
                                    <th class="border-0 px-3 py-3 text-center" style="width: 120px;">
                                        <small class="fw-bold text-uppercase text-muted">Actions</small>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($seoDetails as $key => $row)
                                    <tr class="border-bottom" data-id="{{ $row['id'] }}">
                                        <td class="px-3 py-3 text-center">
                                            <span class="badge text-white rounded-pill"
                                                style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <div class="fw-semibold text-dark">{{ $row['page_name'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <div class="fw-semibold text-dark">{{ $row['title'] }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-3 py-3  text-center">
                                            <div class="d-flex align-items-center text-center">
                                                <div class="flex-grow-2">
                                                    <div class="fw-semibold text-dark d-flex  text-center">
                                                        {{ implode(', ', $row['keywords']) }}</div>
                                                </div>
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
                                                <a href="/seo/{{ $row['id'] }}/edit"
                                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('handle.deleteseo', $row['id']) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
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
                                                <h6 class="text-muted">No SEO Page found</h6>
                                                <p class="text-muted small mb-0">Add first SEO page above.</p>
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
    @endsection
