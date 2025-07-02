@extends('layout.layout')

@section('content')


<div class="container-fluid px-4 py-3">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Donations Management</h5>
                    <small class="text-muted">Total {{ count($donations) }} donation(s)</small>
                </div>
                <div class="d-flex gap-2">
                    <div class="input-group" style="width: 280px;">
                        <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Search donations..." />
                        <span class="input-group-text bg-light">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="donationTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-3 py-3 text-center" style="width: 50px;">
                                <small class="fw-bold text-uppercase text-muted">#</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 180px;">
                                <small class="fw-bold text-uppercase text-muted">Donor</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Contact</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Amount</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 180px;">
                                <small class="fw-bold text-uppercase text-muted">Location</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="width: 200px;">
                                <small class="fw-bold text-uppercase text-muted">Donation Type</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Mandir</small>
                            </th>
                            <th class="border-0 px-3 py-3 " style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">PAN</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 300px;">
                                <small class="fw-bold text-uppercase text-muted">Note</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donations as $key => $donation)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge bg-light text-dark rounded-pill">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $donation->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="small">
                                        <div class="text-dark mb-1">
                                            <i class="fas fa-envelope text-muted me-1"></i>
                                            <span style="word-break: break-all;">{{ $donation->email }}</span>
                                        </div>
                                        <div class="text-muted">
                                            <i class="fas fa-phone text-muted me-1"></i>
                                            {{ $donation->phone }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <span class="fw-bold text-success fs-6">₹{{ number_format($donation->amount, 2) }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="small">
                                        <div class="fw-semibold text-dark">{{ $donation->city }}</div>
                                        <div class="text-muted">{{ $donation->state }}, {{ $donation->country }}</div>
                                        <div class="text-muted">PIN: {{ $donation->pincode }}</div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    @php
                                        $typeColors = [
                                            'donation-to-trust-fund' => 'primary',
                                            'mahapuja' => 'success',
                                            'mandir-nirman' => 'warning',
                                            'yagna' => 'danger',
                                            'dharmado' => 'info'
                                        ];
                                        $color = $typeColors[$donation->donation_type] ?? 'secondary';
                                        $typeName = ucfirst(str_replace('-', ' ', $donation->donation_type));
                                    @endphp
                                    <span class="badge bg-{{ $color }} bg-gradient text-white">{{ $typeName }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="text-dark fw-semibold">{{ $donation->mandir }}</span>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    @if($donation->pan_number && strlen($donation->pan_number) <= 15)
                                        <code class="bg-light text-dark px-2 py-1 rounded small">{{ $donation->pan_number }}</code>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3">
                                    @if($donation->note)
                                        <div class="note-content">
                                            @if(strlen($donation->note) > 100)
                                                <div class="note-preview">
                                                    {{ Str::limit($donation->note, 100) }}
                                                    <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-more" onclick="toggleNote(this)">
                                                        Show more
                                                    </button>
                                                </div>
                                                <div class="note-full d-none">
                                                    {{ $donation->note }}
                                                    <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-less" onclick="toggleNote(this)">
                                                        Show less
                                                    </button>
                                                </div>
                                            @else
                                                <span class="text-dark">{{ $donation->note }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">No note</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No donations found</h6>
                                        <p class="text-muted small mb-0">No donation records available.</p>
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
    background-color: rgba(13, 110, 253, 0.03);
}

.table tbody tr:last-child {
    border-bottom: none;
}

.avatar {
    font-size: 0.875rem;
    line-height: 1;
}

.note-content {
    max-width: 200px;
    line-height: 1.4;
    word-wrap: break-word;
}

.note-content .btn-link {
    font-size: 0.8rem;
    text-decoration: none;
    line-height: 1;
}

.note-content .btn-link:hover {
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

.form-control:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Responsive Design */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .table th, .table td {
        padding: 0.5rem 0.25rem;
    }
    
    .avatar {
        width: 30px !important;
        height: 30px !important;
        font-size: 0.75rem;
    }
    
    .note-content {
        max-width: 150px;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        width: 100%;
    }
    
    .input-group {
        width: 100% !important;
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
    const tableRows = document.querySelectorAll('#donationTable tbody tr');

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
            countElement.textContent = `Total ${visibleCount} donation(s)${searchTerm ? ' found' : ''}`;
        }
    });
});

// Toggle note function
function toggleNote(button) {
    console.log('Toggle note clicked!'); // Debug log
    const noteContent = button.closest('.note-content');
    const preview = noteContent.querySelector('.note-preview');
    const full = noteContent.querySelector('.note-full');
    
    if (button.classList.contains('show-more')) {
        preview.classList.add('d-none');
        full.classList.remove('d-none');
    } else {
        preview.classList.remove('d-none');
        full.classList.add('d-none');
    }
}
</script>

@endsection




