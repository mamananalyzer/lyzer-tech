@extends('base.0layout')

@section('title', 'Product')

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
<div class="flex-grow-1 container-p-y container-fluid">
  <div class="row mt-4">
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
                          <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddProduct">
                              <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                  <span class="d-none d-sm-inline-block">Add New Product</span>
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
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Spek 1</th>
                        <th>Spek 2</th>
                        <th>Spek 3</th>
                        <th>Price</th>
                        <th>Discount</th>
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
                      @foreach ( $product as $p)
                        <tr>
                            <td><span class="badge bg-label-success"> {{ $p->brand }} </span></td>
                            <td><a href="pages-profile-user.html" class="text-body text-truncate fw-medium">{{ $p->type }}</a></td>
                            <td>
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="/storage/{{ $p->image }}" alt="Avatar" class="rounded-circle"></div>
                              </div>
                            </td>
                            <td> {{ $p->category }} </span></td>
                            <td> {{ $p->spek1 }} </span></td>
                            <td> {{ $p->spek2 }} </span></td>
                            <td> {{ $p->spek3 }} </span></td>
                            <td> Rp.{{ number_format($p->price, 2, '.', ',') }}</td>
                            <td> {{ $p->diskon }}% </span></td>
                            <td>
                                @if($p->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @elseif($p->status == 2)
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

  <!-- Offcanvas to add new customer -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddProduct" aria-labelledby="offcanvasAddUserLabel">
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