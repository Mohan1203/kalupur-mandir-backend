@extends('layout.layout')

@section('content')
    <div class="container-fluid px-4 py-3">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">
                        Bookings
                    </h5>
                    <small class="text-muted">Total {{ count($poojaBookings) }} booking(s)</small>
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
                            <th class="border-0 px-3 py-3" style="width: 150px;">
                                <small class="fw-bold text-uppercase text-muted">Date</small>
                            </th>
                            <th class="border-0 px-3 py-3 " style="width: 140px;">
                                <small class="fw-bold text-uppercase text-muted">First Name</small>
                            </th>
                            <th class="border-0 px-3 py-3" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Last Name</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Village</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Location</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">phone_number</small>
                            </th>
                            <th class="border-0 px-3 py-3 text-center" style="width: 100px;">
                                <small class="fw-bold text-uppercase text-muted">Way to contact</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($poojaBookings as $key => $booking)
                            <tr class="border-bottom">
                                <td class="px-3 py-3 text-center">
                                    <span class="badge text-white rounded-pill"
                                        style="background-color: #5d1a1e;">{{ $key + 1 }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->booking_date }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex ">
                                        <div class="">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->first_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->last_name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->village }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->location }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-dark mb-1">{{ $booking->way_of_contact }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="px-3 py-3 text-center">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="/editacharya/{{ $acharya->id }}"
                                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('handle.deleteAcharya', $acharya->id) }}"
                                                    method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this acharya?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td> --}}
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
    </div>


    <style>
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

            .table th,
            .table td {
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
@endsection
