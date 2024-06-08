@extends('base.0layout')

@section('title', 'Hazops')

@section('link')

@endsection

@section('zone-link')
    <!-- Optional: jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="sneat/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Optional: Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')
    <div class="flex-grow-1 container-p-y container-fluid">

        <div class="">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap"> 
                    <div class="btn-group">
                        <button class="btn buttons-collection dropdown-toggle btn-label-primary me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                            <span><i class="bx bx-export me-sm-1"></i> 
                                <span class="d-none d-sm-inline-block">Export</span>
                            </span>
                        </button>
                    </div> 
                    <button class="btn btn-secondary create-new btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        <span><i class="bx bx-plus me-sm-1"></i> 
                            <span class="d-none d-sm-inline-block">Add Hazops</span>
                        </span>
                    </button> 
                </div>
            </div>
        </div>

        <div class="modal fade" id="basicModal" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Belanja</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('Belanja.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewQuotForm">
                        @csrf <!-- CSRF protection -->
                        @method('POST')
                        <div class="card mb-4">
                            {{-- <h5 class="card-header">Belanja</h5> --}}
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
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="berasCheckbox" name="komponen[]" value="Beras">
                                                    <label class="form-check-label" for="berasCheckbox">Beras</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="sayurCheckbox" name="komponen[]" value="Sayur">
                                                    <label class="form-check-label" for="sayurCheckbox">Sayur</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="gulaCheckbox" name="komponen[]" value="Gula">
                                                    <label class="form-check-label" for="gulaCheckbox">Gula</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="minyakCheckbox" name="komponen[]" value="Minyak">
                                                    <label class="form-check-label" for="minyakCheckbox">Minyak</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="airCheckbox" name="komponen[]" value="Air">
                                                    <label class="form-check-label" for="airCheckbox">Air</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="bumbuCheckbox" name="komponen[]" value="Bumbu">
                                                    <label class="form-check-label" for="bumbuCheckbox">Bumbu</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="jajanCheckbox" name="komponen[]" value="Jajan">
                                                    <label class="form-check-label" for="jajanCheckbox">Jajan</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="listrikCheckbox" name="komponen[]" value="Listrik">
                                                    <label class="form-check-label" for="listrikCheckbox">Listrik</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="gasCheckbox" name="komponen[]" value="Gas">
                                                    <label class="form-check-label" for="gasCheckbox">Gas</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="mieCheckbox" name="komponen[]" value="Mie">
                                                    <label class="form-check-label" for="mieCheckbox">Mie</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="susuCheckbox" name="komponen[]" value="Susu">
                                                    <label class="form-check-label" for="susuCheckbox">Susu</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="kopiCheckbox" name="komponen[]" value="Kopi">
                                                    <label class="form-check-label" for="kopiCheckbox">Kopi</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="tehCheckbox" name="komponen[]" value="Teh">
                                                    <label class="form-check-label" for="tehCheckbox">Teh</label>
                                                </div>       
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ongkosCheckbox" name="komponen[]" value="Ongkos">
                                                    <label class="form-check-label" for="ongkosCheckbox">Ongkos</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="kontrakanCheckbox" name="komponen[]" value="Kontrakan">
                                                    <label class="form-check-label" for="kontrakanCheckbox">Kontrakan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col">
                                            <div class="row"> 
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="motorCheckbox" name="komponen[]" value="Motor">
                                                    <label class="form-check-label" for="motorCheckbox">Motor</label>
                                                </div>   
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="komputerCheckbox" name="komponen[]" value="Komputer">
                                                    <label class="form-check-label" for="komputerCheckbox">Komputer</label>
                                                </div>    
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="sabunCheckbox" name="komponen[]" value="Sabun Cuci">
                                                    <label class="form-check-label" for="sabunCheckbox">Sabun Cuci</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="alatMandiCheckbox" name="komponen[]" value="Alat Mandi">
                                                    <label class="form-check-label" for="alatMandiCheckbox">Alat Mandi</label>
                                                </div>
                                                <div class="col-2 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="alatKebersihanCheckbox" name="komponen[]" value="Alat Kebersihan">
                                                    <label class="form-check-label" for="alatKebersihanCheckbox">Alat Kebersihan</label>
                                                </div>         
                                            </div>
                                        </div>
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
              </div>
            </div>
        </div>

        <div class="card card-datatable table-responsive mt-3">
            <table class="table table-bordered" id="HSE_Hazops-table" data-page-length='7'>
                <thead>
                    <tr>
                        <th>Node</th>
                        <th>Deviation</th>
                        <th>Cause</th>
                        <th>Consequence</th>
                        <th>Safeguards</th>
                        <th>Actions</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                // Destroy existing DataTable before re-initializing
                if ($.fn.DataTable.isDataTable('#HSE_Hazops-table')) {
                    $('#HSE_Hazops-table').DataTable().destroy();
                }
        
                // Initialize DataTable
                $('#HSE_Hazops-table').DataTable({
                    serverSide: true,
                    ajax: '{{ route('HSE_Hazops.data') }}',
                    columns: [
                        { data: 'node', name: 'node' },
                        { data: 'deviation', name: 'deviation' },
                        { data: 'cause', name: 'cause' },
                        { data: 'consequence', name: 'consequence' },
                        { data: 'safeguards', name: 'safeguards' },
                        { data: 'actions', name: 'actions' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>        
    </div>
@endsection