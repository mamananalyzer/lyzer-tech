@extends('base.0layout')

@section('title', 'Labs Label')

@section('link')

@endsection

{{-- @section('zone-link')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="sneat/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="sneat/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="sneat/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="sneat/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="sneat/assets/vendor/libs/moment/moment.js"></script>
    <script src="sneat/assets/vendor/libs/datatable-bs5/datatable-bootstrap5.js"></script>
    <script src="sneat/assets/vendor/libs/select2/select2.js"></script>
    <script src="sneat/assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
    <script src="sneat/assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="sneat/assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="sneat/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="sneat/assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Page JS -->
    <script src="sneat/assets/js/app-user-list.js"></script>
@endsection --}}

@section('content')

<style>
    #printableArea {

    }
    @media print {
        /* Adjust the font size in the print preview */
        #printableArea {
            font-size: 6px; /* Change to your desired font size */
        }
        /* Optional: Hide other content during print preview */
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        #printableArea {
            padding: 0; /* Remove padding */
            border: none; /* Remove border */
            margin: 0; /* Remove margin if needed */
        }
    }
</style>

<button onclick="printArea()">Print Specific Area</button>

<script>
    function printArea() {
        window.print();
    }
</script>

    <div class="flex-grow-1 container-p-y container-fluid" id="printableArea">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator">
                        @php
                            $chunks = $Labs_Label->chunk(5);
                        @endphp

                        @foreach ($chunks as $chunk)
                            <div class="row row-cols-5 gy-4 gy-sm-1">
                                @foreach ($chunk as $Label)
                                    <div class="col-sm col-lg">
                                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                            <div>
                                                <p class="mb-0 small-font">Type : {{ $Label->type }}</p>
                                                <p class="mb-0 small-font">Scale : {{ $Label->scale }}</p>
                                                <p class="mb-0 small-font">Input : {{ $Label->input }}</p>
                                            </div>
                                            <span class="badge bg-label-secondary rounded p-2 me-sm-4 text-right">
                                                {{-- <i class="bx bx-user bx-sm"></i> --}}
                                                <img src="{{ asset('img/logo/aii.png') }}" width="20" alt="">
                                            </span>
                                        </div>
                                        <hr class="d-none d-sm-block d-lg-block me-4">
                                    </div>
                                @endforeach

                                @if ($chunk->count() < 5)
                                    @for ($i = 0; $i < 5 - $chunk->count(); $i++)
                                        <div class="col-sm col-lg">
                                            <!-- Empty placeholder to maintain 5 columns in the row -->
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection