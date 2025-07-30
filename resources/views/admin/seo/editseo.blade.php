@extends('layout.layout')

@section('content')
    <div class="container-fluid px-4 py-3">
        <!-- Edit SEO Details Form -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-edit text-primary me-2"></i>
                    Edit SEO Details
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

                <form method="POST" enctype="multipart/form-data" action="{{ route('handle.updateseo', $seoDetail->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label for="title" class="form-label fw-semibold">
                                <i class="fas fa-file me-1 text-primary"></i>
                                Page Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title"
                                value="{{ old('title', $seoDetail->title) }}" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="keywords" class="form-label fw-semibold">
                                <i class="fas fa-tags me-1 text-primary"></i>
                                Keywords<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="keywords" name="keywords"
                                value="{{ old('keywords', implode(', ', $seoDetail->keywords)) }}" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="schema_markup" class="form-label fw-semibold">
                                <i class="fas fa-code me-1 text-primary"></i>
                                Schema Markup<span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg" id="schema_markup" name="schema_markup" rows="4">{{ old('schema_markup', $seoDetail->schema) }}</textarea>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="description" class="form-label fw-semibold">
                                <i class="fas fa-quote-left me-1 text-primary"></i>
                                Description<span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg" id="description" name="description" rows="4">{{ old('description', $seoDetail->description) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-1"></i>Update SEO
                        </button>
                        <a href="{{ route('seo.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-1"></i>Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
