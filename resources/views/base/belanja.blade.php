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
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span>Bulan Sekarang</span>
                    <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">Rp. {{ number_format($totalBelanja, 2, '.', ',') }}</h4>
                    <small class="text-success">(+{{ $session }}%)</small>
                    </div>
                    <p class="mb-0">Total Belanja</p>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-primary">
                    <i class="bx bx-user bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span>Paid Users</span>
                    <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">4,567</h4>
                    <small class="text-success">(+18%)</small>
                    </div>
                    <p class="mb-0">Last week analytics </p>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-danger">
                    <i class="bx bx-user-check bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span>Active Users</span>
                    <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">19,860</h4>
                    <small class="text-danger">(-14%)</small>
                    </div>
                    <p class="mb-0">Last week analytics</p>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-success">
                    <i class="bx bx-group bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span>Pending Users</span>
                    <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">237</h4>
                    <small class="text-success">(+42%)</small>
                    </div>
                    <p class="mb-0">Last week analytics</p>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-warning">
                    <i class="bx bx-user-voice bx-sm"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('Belanja.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewQuotForm">
        @csrf <!-- CSRF protection -->
        @method('POST')
        <div class="card mb-4">
            <h5 class="card-header">Belanja</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="jenisBelanja" class="form-label">Jenis Belanja</label>
                    <select class="form-select" id="jenisBelanja" aria-label="Default select example" name="jenisBelanja">
                        <option selected="">Open this select menu</option>
                        <option value="1">Harian</option>
                        <option value="2">Bulanan</option>
                        <option value="3">Barang Mewah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keteranganBarang" class="form-label">Komponen yang dibeli</label>
                    <div class="row gy-3">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="berasCheckbox" name="komponen[]" value="Beras">
                                    <label class="form-check-label" for="berasCheckbox">Beras</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sayurCheckbox" name="komponen[]" value="Sayur">
                                    <label class="form-check-label" for="sayurCheckbox">Sayur</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="gulaCheckbox" name="komponen[]" value="Gula">
                                    <label class="form-check-label" for="gulaCheckbox">Gula</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="minyakCheckbox" name="komponen[]" value="Minyak">
                                    <label class="form-check-label" for="minyakCheckbox">Minyak</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="airCheckbox" name="komponen[]" value="Air">
                                    <label class="form-check-label" for="airCheckbox">Air</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="bumbuCheckbox" name="komponen[]" value="Bumbu">
                                    <label class="form-check-label" for="bumbuCheckbox">Bumbu</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="jajanCheckbox" name="komponen[]" value="Jajan">
                                    <label class="form-check-label" for="jajanCheckbox">Jajan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sabunCheckbox" name="komponen[]" value="Sabun Cuci">
                                    <label class="form-check-label" for="sabunCheckbox">Sabun Cuci</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="gasCheckbox" name="komponen[]" value="Gas">
                                    <label class="form-check-label" for="gasCheckbox">Gas</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="mieCheckbox" name="komponen[]" value="Mie">
                                    <label class="form-check-label" for="mieCheckbox">Mie</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="susuCheckbox" name="komponen[]" value="Susu">
                                    <label class="form-check-label" for="susuCheckbox">Susu</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kopiCheckbox" name="komponen[]" value="Kopi">
                                    <label class="form-check-label" for="kopiCheckbox">Kopi</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tehCheckbox" name="komponen[]" value="Teh">
                                    <label class="form-check-label" for="tehCheckbox">Teh</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="alatMandiCheckbox" name="komponen[]" value="Alat Mandi">
                                    <label class="form-check-label" for="alatMandiCheckbox">Alat Mandi</label>
                                </div>
                            </div>
                        <div class="col"></div>
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="alatKebersihanCheckbox" name="komponen[]" value="Alat Kebersihan">
                                    <label class="form-check-label" for="alatKebersihanCheckbox">Alat Kebersihan</label>
                                </div>            
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ongkosCheckbox" name="komponen[]" value="Ongkos">
                                    <label class="form-check-label" for="ongkosCheckbox">Ongkos</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kontrakanCheckbox" name="komponen[]" value="Kontrakan">
                                    <label class="form-check-label" for="kontrakanCheckbox">Kontrakan</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="listrikCheckbox" name="komponen[]" value="Listrik">
                                    <label class="form-check-label" for="listrikCheckbox">Listrik</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="komputerCheckbox" name="komponen[]" value="Komputer">
                                    <label class="form-check-label" for="komputerCheckbox">Komputer</label>
                                </div>
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="motorCheckbox" name="komponen[]" value="Motor">
                                    <label class="form-check-label" for="motorCheckbox">Motor</label>
                                </div>          
                                <div class="col-md form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="lainLainCheckbox" name="komponen[]" value="Lain-lain">
                                    <label class="form-check-label" for="lainLainCheckbox">Lain-lain</label>
                                </div>      
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="totalBelanja" class="col-md-2 col-form-label">Total Belanja</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" value="" placeholder="Rp. 1.000.000" id="totalBelanja" name="totalBelanja">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        <input type="hidden">
    </form>
</div>
   
@endsection