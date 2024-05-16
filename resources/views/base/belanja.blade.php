@extends('base.0layout')

@section('title', 'Belanja')

@section('link')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullCalendar Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" integrity="sha256-5ZfT5rkfZ4K8CNx3vRy+YzcOBf0aOFaP6P0p9uCqlJ4=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oKp1rEu8NHd3ZtqBvVbV1/3mY46ccqV7JvGd5EG9c3E=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha256-j/4tV9lX4x1pLIl50ecZ9FktG17s6cj94eEa3vjZxFQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js" integrity="sha256-VoBMsT5IeA2F5r9dBjTf1N1kvgdl7GGvwjXWfS5gC2M=" crossorigin="anonymous"></script>


    <script src="sneat/assets/vendor/js/template-customizer.js"></script>

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

<div class="flex-grow-1 container-p-y container-fluid">
    <div class="card mb-4">
        <h5 class="card-header">Belanja</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="jenisBelanja" class="form-label">Jenis Belanja</label>
                <select class="form-select" id="jenisBelanja" aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    <option value="1">Harian</option>
                    <option value="2">Bulanan</option>
                    <option value="3">Barang Mewah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keteranganBarang" class="form-label">Komponen yang dibeli</label>
                <textarea class="form-control" id="keteranganBarang" rows="3"></textarea>
            </div>
            <div class="mb-3 row">
                <label for="totalBelanja" class="col-md-2 col-form-label">Total Belanja</label>
                <div class="col-md-10">
                    <input class="form-control" type="number" value="" placeholder="Rp. 1.000.000" id="totalBelanja">
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection