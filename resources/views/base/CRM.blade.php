@extends('base.0layout')

@section('title', 'Users')

@section('link')

    <!-- Icons -->
    <link rel="stylesheet" href="sneat/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="sneat/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="sneat/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <link rel="stylesheet" href="sneat/assets/vendor/libs/datatable-bs5/datatable.bootstrap5.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/datatable-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/datatable-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="sneat/assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
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
                        <th>Task</th>
                        <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $sales as $s)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar me-2">
                                    <img src="/storage/{{ $s->image }}" alt="Avatar" class="rounded-circle">
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-0 text-truncate">{{ $s->name }}</h6><small class="text-truncate text-muted">Sales</small>
                                </div>
                                </div>
                            </td>
                            <td><span class="badge bg-label-primary rounded-pill text-uppercase">Zipcar</span></td>
                            <td><small class="fw-medium">87/135</small></td>
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
            {{-- Quotation --}}
            <div class="col-md-6 col-lg-8 mb-0">
                <div class="card">
                  <div class="card-datatable table-responsive">
                    <div class="row mx-2 my-3">
                      <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                          <div id="DataTable_Table_0_filter" class="dataTable_filter">
                              <label>
                                <input type="search" id="searchInput" class="form-control" placeholder="Search.." aria-controls="DataTable_Table_0">
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
                    <table class="invoice-list-table table">
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

        <div class="row mt-4">
            {{-- Customer List --}}
            <div class="col-md-8 col-lg-9 mb-0">
                <div class="card">
                    <div class="card-datatable table-responsive">
                      <div class="row mx-2 my-3">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTable_Table_0_filter" class="dataTable_filter">
                                <label>
                                  <input type="search" id="searchInput" class="form-control" placeholder="Search.." aria-controls="DataTable_Table_0">
                                </label>
                            </div>
                            <div class="dt-buttons my-1">
                                <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddCustomer">
                                    <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                        <span class="d-none d-sm-inline-block">Add New Customer</span>
                                    </span>
                                </button> 
                            </div>
                        </div>
                      </div>

                      {{-- <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                        <table class="invoice-list-table table">
                          <thead>
                          <tr>
                              <th>Customer</th>
                              <th>Area</th>
                              <th>Phone Number</th>
                              <th>Company</th>
                              <th>Position</th>
                              <th>Status</th>
                              <th class="cell-fit">Actions</th>
                          </tr>
                          </thead>
                        </table>
                      </div> --}}
                      <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 400px;">
                        <table class="invoice-list-table table" id="customer">
                          <thead>
                          <tr>
                              <th>Customer</th>
                              <th>Area</th>
                              {{-- <th>Address</th> --}}
                              <th>Phone Number</th>
                              {{-- <th>Mobile Phone</th> --}}
                              <th>Company</th>
                              <th>Position</th>
                              <th>Status</th>
                              <th class="cell-fit">Actions</th>
                          </tr>
                          </thead>
                          <script>
                              document.getElementById('searchInput').addEventListener('input', function() {
                                  // Get user input
                                  const searchText = this.value.toLowerCase();
                          
                                  // Get all menu items
                                  const menuItems = document.querySelectorAll('#customer tr');
                          
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
                          <tbody class="table-border-bottom-0" >
                            @foreach ( $customer as $c)
                              <tr>
                                  <td>
                                  <div class="d-flex justify-content-start align-items-center">
                                      <div class="avatar-wrapper">
                                      <div class="avatar avatar-sm me-2"><img src="{{ $c->image }}" alt="Avatar" class="rounded-circle"></div>
                                      </div>
                                      <div class="d-flex flex-column">
                                      <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">{{ $c->name }}</a>
                                      <small class="text-truncate text-muted">{{ $c->email }}</small>
                                      </div>
                                  </div>
                                  </td>
                                  <td><span class="badge bg-label-success"> {{ $c->area }} </span></td>
                                  {{-- <td>{{ $c->address }}</td> --}}
                                  <td>{{ $c->phonenumber }}</td>
                                  {{-- <td>{{ $c->mobilephone }}</td> --}}
                                  <td>{{ $c->company }}</td>
                                  <td>
                                      @if($c->position == 1)
                                          <span class="badge bg-primary">Sales</span>
                                      @elseif($c->position == 2)
                                          <span class="badge bg-primary">Purchasing</span>
                                      @elseif($c->position == 3)
                                          <span class="badge bg-primary">IT</span>
                                      @elseif($c->position == 4)
                                          <span class="badge bg-primary">Labs</span>
                                      @elseif($c->position == 5)
                                          <span class="badge bg-primary">Courier</span>
                                      @elseif($c->position == 6)
                                          <span class="badge bg-primary">Warehouse</span>
                                      @else
                                          <span class="badge bg-danger">Unknown Status</span>
                                      @endif
                                  </td>
                                  <td>
                                      @if($c->status == 1)
                                          <span class="badge bg-label-success">Active</span>
                                      @elseif($c->status == 2)
                                          <span class="badge bg-label-warning">Not Active</span>
                                      @else
                                          <span class="badge bg-danger">Unknown Status</span>
                                      @endif
                                  
                                  </td>
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
                            @endforeach
                          </tbody>
                        </table>
                      </div>
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
                        @foreach ( $customer->sortBy('company') as $cust)
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
            <form method="post" action="{{ route('users.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm">
                @csrf <!-- CSRF protection -->
                @method('POST')
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-fullname">Full Name</label>
                    <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-email">Email</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-picture">Picture</label>
                    <input class="form-control" type="file" id="formFile" name="image">                    
                </div>
                <div class="mb-3">
                    <label class="form-label" for="user-role">User Role</label>
                    <select id="user-role" class="form-select" name="role_id">
                        <option value="1">Sales</option>
                        <option value="2">Purchasing</option>
                        <option value="3">IT</option>
                        <option value="4">Labs</option>
                        <option value="5">Courier</option>
                        <option value="6">Warehouse</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                <input type="hidden">
            </form>
            </div>
        </div>
    </div>
@endsection