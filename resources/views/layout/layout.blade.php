<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
    <!-- Custom Primary Color Theme -->
    <style>
        :root {
            --primary-color: #5d1a1e;
            --primary-hover: #7d2428;
            --primary-light: rgba(93, 26, 30, 0.1);
            --primary-shadow: rgba(93, 26, 30, 0.25);
        }
        
        /* Primary Buttons */
        .btn-primary, .btn-primary:focus {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
            box-shadow: 0 2px 8px var(--primary-shadow);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-hover) 0%, #9d343a 100%) !important;
            border-color: var(--primary-hover) !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px var(--primary-shadow);
        }
        
        /* Outline Primary Buttons */
        .btn-outline-primary {
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }
        
        /* Form Controls */
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 0.25rem var(--primary-shadow) !important;
        }
        
        /* Links */
        a {
            color: var(--primary-color);
        }
        
        a:hover {
            color: var(--primary-hover);
        }
        
        /* Badges Primary */
        .badge.bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        /* Text Primary */
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        /* Active States */
        .nav-pills .nav-link.active {
            background-color: var(--primary-color) !important;
        }
        
        /* Pagination */
        .page-link {
            color: var(--primary-color);
        }
        
        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Progress Bars */
        .progress-bar {
            background-color: var(--primary-color);
        }
        
        /* Switch/Toggle */
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css') }}" async>
    {{-- <link rel="stylesheet" href="{{ asset('/assets/fonts/font-awesome.min.css') }}" async /> --}}
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}" async>
    <link rel="stylesheet" href="{{ asset('jquery-toast-plugin/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('color-picker/color.min.css') }}" async>

    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}" async>
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ekko-lightbox.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap-table/bootstrap-table.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-table/fixed-columns.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-table/reorder-rows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.tagsinput.min.css') }}">

    {{-- <link rel="shortcut icon" href="{{asset(config('global.LOGO_SM')) }}" /> --}}
    <link rel="shortcut icon" href="{{ url(Storage::url(env('FAVICON'))) }}" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('index.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('select2/select2.min.js') }}"></script>

    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/ekko-lightbox.min.js') }}"></script>


    <script src="{{ asset('bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/bootstrap-table-mobile.js') }}"></script>
    <script src="{{ asset('bootstrap-table/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/fixed-columns.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/tableExport.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/jspdf.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/jspdf.plugin.autotable.js') }}"></script>
    <script src="{{ asset('bootstrap-table/jquery.tablednd.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/reorder-rows.min.js') }}"></script>
    <script src="{{ asset('bootstrap-table/loadash.min.js') }}"></script>


    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.repeater.js') }}"></script>

    <script src="{{ asset('color-picker/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('color-picker/color.min.js') }}"></script>
    <script src="{{ asset('js/custom/function.js') }}"></script>
    <script src="{{ asset('js/custom/formatter.js') }}"></script>
    <script src="{{ asset('js/jquery-additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/custom/custom.js') }}"></script>
    <script src="{{ asset('js/custom/custom-bootstrap-table.js') }}"></script>


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type='text/javascript'>
                $.toast({
                    text: '{{ $error }}',
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                });
            </script>
        @endforeach
    @endif

    @if (Session::has('success'))
        <script>
            $.toast({
                text: '{{ Session::get('success') }}',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right'
            });
        </script>
    @endif

    {{-- <script>
        $(document).on('click', '.deletedata', function() {
            Swal.fire({
                title: "{{ __('delete_title') }}",
                text: "{{ __('confirm_message') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('yes_delete') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response['error'] == false) {
                                showSuccessToast(response['message']);
                                $('#table_list').bootstrapTable('refresh');
                            } else {
                                showErrorToast(response['message']);
                            }
                        }
                    });
                }
            })
        });
    </script> --}}

</head>

<body>
    <!-- Sidebar and Main Layout -->
    <div class="d-flex main-content">
        <!-- Sidebar -->
        <div class="">
            @include('partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-panel w-100 ">
            @include('partials.navbar')
            <div class="content-wrapper container-fluid ">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
