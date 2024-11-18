@extends('base.0layout')

@section('title', 'CRM')

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

        <div class="col-md-12 order-3 order-lg-12 mb-4">
            <div class="card text-center">
              <div class="card-header py-3">
                <ul class="nav nav-pills" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-customer" aria-controls="navs-pills-customer" aria-selected="true">Customer</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-visit" aria-controls="navs-pills-visit" aria-selected="true">Visit Report</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-quot" aria-controls="navs-pills-quot" aria-selected="false" tabindex="-1">Quotation</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-po" aria-controls="navs-pills-po" aria-selected="false" tabindex="-1">PO</button>
                  </li>
                </ul>
              </div>
              <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="navs-pills-customer" role="tabpanel">
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
                                <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddCustomer">
                                    <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                        <span class="d-none d-sm-inline-block">Add New Customer</span>
                                    </span>
                                </button>  
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive text-start">
                        <div class="card card-datatable table-responsive mt-3">
                            <table class="table table-bordered" id="customer-table" data-page-length='7'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                        <th>Phone Number</th>
                                        <th>Mobile Phone</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-visit" role="tabpanel">
                  <div class="table-responsive text-start">
                  </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-quot" role="tabpanel">
                  <div class="table-responsive text-start">
                    {{-- Quotation --}}
                    <div class="card">
                        <div class="card-datatable table-responsive">
                            <div class="row mx-2 my-3">
                                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                    <div id="DataTable_Table_0_filter" class="dataTable_filter">
                                        <label>
                                            <input type="search" id="searchQuot" class="form-control" placeholder="Search.." aria-controls="DataTable_Table_0">
                                        </label>
                                    </div>
                                    <div class="dt-buttons my-1">
                                        <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddQuotation">
                                            <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                                <span class="d-none d-sm-inline-block">Add New Quotation</span>
                                            </span>
                                        </button> 
                                    </div>
                                </div>
                            </div>
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 322px;">
                                <table class="invoice-list-table table" id="quotation">
                                <thead>
                                    <tr>
                                    <th>Quotation Number</th>
                                    <th>Project</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Sales</th>
                                    <th>Status</th>
                                    <th class="cell-fit">Paid By</th>
                                    <th class="cell-fit">Actions</th>
                                    </tr>
                                </thead>
                                <script>
                                    document.getElementById('searchQuot').addEventListener('input', function() {
                                        // Get user input
                                        const searchText = this.value.toLowerCase();
                                
                                        // Get all menu items
                                        const menuItems = document.querySelectorAll('#quotation tr');
                                
                                        // Loop through each menu item and hide/show based on user input
                                        menuItems.forEach(function(item) {
                                            const itemName = item.textContent.toLowerCase();
                                            if (itemName.includes(searchText)) {
                                                item.style.display = 'block';
                                            } else {
                                                item.style.display = 'none';
                                            }
                                        });
                                    });
                                </script>
                                @foreach ($quotation_list as $q_list)
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                        <div class="d-flex flex-column">
                                            <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">{{ $q_list->quotNumber }}</a>
                                        </div>
                                        </div>
                                    </td>
                                    <td>{{ $q_list->project }}</td>
                                    <td>{{ $q_list->customer }}</td>
                                    <td>Rp.{{ number_format($q_list->amount, 2, '.', ',') }}</td>
                                    <td>{{ $q_list->sales }}</td>
                                    <td><span class="badge bg-label-success"> {{ $q_list->status }} </span></td>
                                    <td><img src="../../assets/img/icons/payments/master-light.png" class="img-fluid" width="50" alt="masterCard" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png"></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                            <a href="javascript:;" class="dropdown-item">Duplicate</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-po" role="tabpanel">
                  <div class="table-responsive text-start">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Country</th>
                          <th>Visits</th>
                          <th class="w-50">Data In Percentage</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-us rounded-circle fs-3 me-2"></i>
                              <span>USA</span>
                            </div>
                          </td>
                          <td>87.24k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 89.12%" aria-valuenow="89.12" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">89.12%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-br rounded-circle fs-3 me-2"></i>
                              <span>Brazil</span>
                            </div>
                          </td>
                          <td>62.68k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 78.23%" aria-valuenow="78.23" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">78.23%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-in rounded-circle fs-3 me-2"></i>
                              <span>India</span>
                            </div>
                          </td>
                          <td>52.58k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 69.82%" aria-valuenow="69.82" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">69.82%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-au rounded-circle fs-3 me-2"></i>
                              <span>Australia</span>
                            </div>
                          </td>
                          <td>44.13k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 59.90%" aria-valuenow="59.90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">59.90%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-de rounded-circle fs-3 me-2"></i>
                              <span>Germany</span>
                            </div>
                          </td>
                          <td>32.21k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 57.11%" aria-valuenow="57.11" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">57.11%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-fr rounded-circle fs-3 me-2"></i>
                              <span>France</span>
                            </div>
                          </td>
                          <td>37.87k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 41.23%" aria-valuenow="41.23" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">41.23%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-pt rounded-circle fs-3 me-2"></i>
                              <span>Portugal</span>
                            </div>
                          </td>
                          <td>20.29k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 37.11%" aria-valuenow="37.11" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">37.11%</small>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <i class="fis fi fi-cn rounded-circle fs-3 me-2"></i>
                              <span>China</span>
                            </div>
                          </td>
                          <td>12.21k</td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 17.61%" aria-valuenow="17.61" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-medium">17.61%</small>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
            {{-- Team Member --}}
            <div class="col-md-6 col-lg-4 mb-md-0 mb-4">
                <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Team Members</h5>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                    </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Task (%)</th>
                        <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $task as $result)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar me-2">
                                    {{-- <img src="/storage/{{ $s->image }}" alt="Avatar" class="rounded-circle"> --}}
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-0 text-truncate">{{ $result->name }}</h6><small class="text-truncate text-muted">Sales</small>
                                </div>
                                </div>
                            </td>
                            <td><span class="badge bg-label-primary rounded-pill text-uppercase">Zipcar</span></td>
                            <td><small class="fw-medium">{{ $result->task }}/{{ $totaltask }} ({{ number_format($result->task / $totaltask * 100, 2) }}%)</small></td>
                            <td>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-primary shadow-none" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    <div class="progress-bar bg-success shadow-none" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                    <div class="progress-bar bg-danger shadow-none" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <!-- Offcanvas to add new quotation -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddQuotation" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
            <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Quotation</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
            <form method="post" action="{{ route('quot.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewQuotForm">
                @csrf <!-- CSRF protection -->
                @method('POST')
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-project">Project</label>
                    <input type="text" class="form-control" id="add-user-project" placeholder="PLN Jawa Bali" name="project" aria-label="John Doe">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-customer">Customer</label>
                    <select id="add-user-customer" class="form-select" name="customer">
                        <option>Default select</option>
                        @foreach ( $custom->sortBy('company') as $cust)
                        <option value="{{ $cust->company }}">{{ $cust->company }}</option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-sales">Sales</label>
                    <select id="add-user-sales" class="form-select" name="sales">
                        <option>Default select</option>
                        @foreach ( $sales_quot->sortBy('name') as $sales_q)
                        <option value="{{ $sales_q->name }}">{{ $sales_q->name }}</option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="Quot">Quot</option>
                        <option value="Issue">Issue</option>
                        <option value="Technical">Technical</option>
                        <option value="Pending">Pending</option>
                        <option value="Loss">Loss</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="paidby">PaidBy</label>
                    <select id="paidby" class="form-select" name="paidby">
                        <option value="CBD">CBD</option>
                        <option value="DP 50%, 100% CBD">DP 50%, 100% CBD</option>
                        <option value="PreOrder">PreOrder</option>
                    </select>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-brand">Brand</label>
                    <select id="add-user-brand" class="form-select" name="brand">
                        <option>Default select</option>
                        @foreach ( $product->sortBy('brand') as $brand_q)
                        <option value="{{ $brand_q->brand }}">{{ $brand_q->brand }}</option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-type">Type</label>
                    <select id="add-user-type" class="form-select" name="type">
                        <option>Default select</option>
                        @foreach ( $product->sortBy('type') as $type_q)
                        <option value="{{ $type_q->type }}">{{ $type_q->type }} Rp.{{ $type_q->price }}</option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-qty">Quantity</label>
                    <input type="number" class="form-control" id="add-user-qty" placeholder="quantity" name="qty" aria-label="qty">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                <input type="hidden">
            </form>
            </div>
        </div>

        <!-- Offcanvas to add new customer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCustomer" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
            <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Customer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
            <form method="post" action="{{ route('customers.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm">
                @csrf <!-- CSRF protection -->
                @method('POST')
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-fullname">Full Name</label>
                    <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-email">Email</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-picture">Picture</label>
                    <input class="form-control" type="file" id="formFile" name="image">                    
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-area">Area</label>
                    <input type="text" class="form-control" id="add-user-area" placeholder="Jakarta" name="area" aria-label="Jakarta">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-address">Address</label>
                    <input type="text" class="form-control" id="add-user-address" placeholder="Blok N15-16" name="address" aria-label="Blok N15-16">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-phonenumber">Phone Number</label>
                    <input type="text" class="form-control" id="add-user-phonenumber" placeholder="+62888 8888 8888" name="phonenumber" aria-label="Jakarta">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-mobilephone">Mobile Phone</label>
                    <input type="text" class="form-control" id="add-user-mobilephone" placeholder="+62888 8888 8888" name="mobilephone" aria-label="Jakarta">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-company">Company</label>
                    <input type="text" class="form-control" id="add-user-company" placeholder="PT. LyZer" name="company" aria-label="LyZer Tech">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-position">Position</label>
                    <input type="text" class="form-control" id="add-user-position" placeholder="PT. LyZer" name="position" aria-label="LyZer Tech">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                <input type="hidden">
            </form>
            </div>
        </div>

        
        
        <script type="text/javascript">
            $(document).ready(function() {
                // Destroy existing DataTable before re-initializing
                if ($.fn.DataTable.isDataTable('#customer-table')) {
                    $('#customer-table').DataTable().destroy();
                }
        
                // Initialize DataTable
                $('#customer-table').DataTable({
                    serverSide: true,
                    ajax: '{{ route('CRM.data') }}',
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'area', name: 'area' },
                        { data: 'phonenumber', name: 'phonenumber' },
                        { data: 'mobilephone', name: 'mobilephone' },
                        { data: 'company', name: 'company' },
                        { data: 'status', name: 'status' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>        
    </div>
@endsection