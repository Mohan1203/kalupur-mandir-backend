@extends('layout.layout')

@section('content')

<div class="container-fluid px-4 py-3">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Donations Management</h5>
                    <small class="text-muted" id="donationCount">Total {{ count($donations) }} donation(s)</small>
                </div>
                <div class="d-flex gap-2">
                   
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email, amount..." style="border-right: none; height: 38px;" />
                        <button class="btn" type="button" style="background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%); color: white; border: 1px solid #5d1a1e; border-left: none; height: 38px; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
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
                            <th class="border-0 px-3 py-3" style="min-width: 150px;">
                                <small class="fw-bold text-uppercase text-muted">Donor</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 180px;">
                                <small class="fw-bold text-uppercase text-muted">Contact</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="min-width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Amount</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 150px;">
                                <small class="fw-bold text-uppercase text-muted">Location</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 120px;">
                                <small class="fw-bold text-uppercase text-muted">Donation Type</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Mandir</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">PAN</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="min-width: 200px; max-width: 300px;">
                                <small class="fw-bold text-uppercase text-muted">Note</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donations as $key => $donation)
                            <tr class="border-bottom donation-row">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill" style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1 searchable text-break">{{ $donation->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="small">
                                        <div class="text-dark mb-1">
                                            <i class="fas fa-envelope text-muted me-1"></i>
                                            <span class="searchable text-break">{{ $donation->email }}</span>
                                        </div>
                                        <div class="text-muted">
                                            <i class="fas fa-phone text-muted me-1"></i>
                                            <span class="searchable">{{ $donation->phone }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <span class="fw-bold text-success fs-6 searchable">₹{{ number_format($donation->amount, 2) }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="small">
                                        <div class="fw-semibold text-dark searchable">{{ $donation->city }}</div>
                                        <div class="text-muted searchable">{{ $donation->state }}, {{ $donation->country }}</div>
                                        <div class="text-muted">PIN: <span class="searchable">{{ $donation->pincode }}</span></div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    @php
                                        $donationTypes = [
                                            'donation-to-trust-fund' => ['name' => 'Trust Fund', 'color' => '#5d1a1e'],
                                            'mahapuja' => ['name' => 'Mahapuja', 'color' => '#7d2428'],
                                            'mandir-nirman' => ['name' => 'Mandir Nirman', 'color' => '#9d343a'],
                                            'yagna' => ['name' => 'Yagna', 'color' => '#bd444c'],
                                            'dharmado' => ['name' => 'Dharmado', 'color' => '#dd545e']
                                        ];
                                        $type = $donationTypes[$donation->donation_type] ?? ['name' => ucfirst(str_replace('-', ' ', $donation->donation_type)), 'color' => '#6c757d'];
                                    @endphp
                                    <span class="badge text-white searchable" style="background-color: {{ $type['color'] }}">
                                        {{ $type['name'] }}
                                    </span>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="text-dark fw-semibold searchable text-break">{{ $donation->mandir }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    @if($donation->pan_number && strlen($donation->pan_number) <= 15)
                                        <code class="bg-light text-dark px-2 py-1 rounded small searchable">{{ $donation->pan_number }}</code>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3">
                                    @if($donation->note)
                                        <div class="note-content">
                                            @if(strlen($donation->note) > 100)
                                                <div class="note-preview">
                                                    <span class="searchable text-break">{{ Str::limit($donation->note, 100) }}</span>
                                                    <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-more">
                                                        Show more
                                                    </button>
                                                </div>
                                                <div class="note-full d-none">
                                                    <span class="searchable text-break">{{ $donation->note }}</span>
                                                    <button type="button" class="btn btn-link btn-sm p-0 ms-1 text-primary show-less">
                                                        Show less
                                                    </button>
                                                </div>
                                            @else
                                                <span class="text-dark searchable text-break">{{ $donation->note }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">No note</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr id="noResultsRow" style="display: none;">
                                <td colspan="9" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-search fa-2x text-muted mb-3"></i>
                                        <h6 class="text-muted">No matching donations</h6>
                                        <p class="text-muted small mb-0">Try adjusting your search criteria</p>
                                    </div>
                                </td>
                            </tr>
                            <tr id="emptyStateRow">
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
    width: 100%;
    margin-bottom: 0;

}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    max-width: 100%;
}

.table th {
    font-weight: 600;
    background-color: #f8f9fa !important;
    border-top: 1px solid #dee2e6;
    white-space: nowrap;
}

.table td {
    border-left: none;
    border-right: none;
    border-top: none;
    vertical-align: middle;
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

.text-break {
    word-break: break-word !important;
    word-wrap: break-word !important;
}

/* Improved mobile responsiveness */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.8rem;
        margin: 0 -15px;  /* Negative margin to allow full width scrolling */
    }
    
    .table th, .table td {
        padding: 0.75rem 0.5rem;
        min-width: auto !important;
    }
    
    .note-content {
        max-width: 200px;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        width: 100%;
    }
    
    .input-group {
        width: 100% !important;
    }

    .card {
        margin: 0 -15px;  /* Negative margin to allow full width on mobile */
        border-radius: 0;
    }

    .px-4 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }
}

/* Highlight search matches */
.search-highlight {
    background-color: rgba(93, 26, 30, 0.1);
    padding: 0.1em 0;
}

/* Improved note toggle buttons */
.note-content .btn-link {
    font-size: 0.8rem;
    color: #5d1a1e;
    text-decoration: none;
    transition: all 0.2s ease;
}

.note-content .btn-link:hover {
    color: #7d2428;
    text-decoration: underline;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const donationRows = document.querySelectorAll('.donation-row');
    const noResultsRow = document.getElementById('noResultsRow');
    const emptyStateRow = document.getElementById('emptyStateRow');
    const countElement = document.getElementById('donationCount');

    // Improved search functionality
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        donationRows.forEach(row => {
            const searchableElements = row.querySelectorAll('.searchable');
            let found = false;

            searchableElements.forEach(element => {
                const text = element.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    found = true;
                    // Highlight matching text
                    const regex = new RegExp(`(${searchTerm})`, 'gi');
                    element.innerHTML = element.textContent.replace(
                        regex,
                        '<span class="search-highlight">$1</span>'
                    );
                }
            });

            row.style.display = found ? '' : 'none';
            if (found) visibleCount++;
        });

        // Update count and show/hide empty states
        countElement.textContent = `Total ${visibleCount} donation(s)${searchTerm ? ' found' : ''}`;
        noResultsRow.style.display = (searchTerm && visibleCount === 0) ? '' : 'none';
        emptyStateRow.style.display = (!searchTerm && visibleCount === 0) ? '' : 'none';
    }

    // Debounce search for better performance
    let searchTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 300);
    });

    // Improved note toggle functionality
    document.querySelectorAll('.note-content').forEach(noteContent => {
        const preview = noteContent.querySelector('.note-preview');
        const full = noteContent.querySelector('.note-full');
        
        if (preview && full) {
            noteContent.querySelector('.show-more').addEventListener('click', () => {
                preview.classList.add('d-none');
                full.classList.remove('d-none');
            });

            noteContent.querySelector('.show-less').addEventListener('click', () => {
                preview.classList.remove('d-none');
                full.classList.add('d-none');
            });
        }
    });
});
</script>

@endsection




