@extends('base.0layout')

@section('title', 'Users')

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
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Session</span>
                        <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">{{ $totalUsers }}</h4>
                        <small class="text-success">(+{{ $session }}%)</small>
                        </div>
                        <p class="mb-0">Total Users</p>
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


        <div class="card">
            {{-- <div class="card-header border-bottom">
                <h5 class="card-title">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role"><select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option><option value="Admin">Admin</option><option value="Author">Author</option><option value="Editor">Editor</option><option value="Maintainer">Maintainer</option><option value="Subscriber">Subscriber</option></select></div>
                <div class="col-md-4 user_plan"><select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option><option value="Basic">Basic</option><option value="Company">Company</option><option value="Enterprise">Enterprise</option><option value="Team">Team</option></select></div>
                <div class="col-md-4 user_status"><select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option><option value="Pending" class="text-capitalize">Pending</option><option value="Active" class="text-capitalize">Active</option><option value="Inactive" class="text-capitalize">Inactive</option></select></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTable_Table_0_wrapper" class="dataTable_wrapper dt-bootstrap5 no-footer">
                    <div class="row mx-2 my-3">
                        <div class="col-md-2 col-sm-2">
                            <div class="me-3 my-1">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                <div class="dt-buttons my-1">
                                    <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                        <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                            <span class="d-none d-sm-inline-block">Add New User</span>
                                        </span>
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatable-users table border-top dataTable no-footer" id="DataTable_Table_0" aria-describedby="DataTable_Table_0_info">
                        <thead>
                          <tr>
                            <th class="control sorting_disabled" rowspan="1" colspan="1">User</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTable_Table_0" rowspan="1" colspan="1" >Role 
                                <button class="btn-primary" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddRole">
                                    <span class="d-none d-sm-inline-block">+</span>
                                </button>                             
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTable_Table_0" rowspan="1" colspan="1" >Status</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTable_Table_0" rowspan="1" colspan="1" >QR</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTable_Table_0" rowspan="1" colspan="1" >Actions</th>
                        </tr>
                        </thead>
                        <tbody>     
                        @foreach ( $users as $user)
                          <tr class="odd">
                            <td class="control" tabindex="0" style="display: none;"></td>
                            <td class="sorting_1">
                              <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                  <div class="avatar avatar-sm me-3">
                                    <img src="{{asset('storage/'. $user->image)}}" alt="Avatar" class="rounded-circle">
                                  </div>
                                </div>
                                  <div class="d-flex flex-column">
                                    <a href="app-user-view-account.html" class="text-body text-truncate">
                                      <span class="fw-medium">{{ $user->name }}</span></a>
                                      <small class="text-muted">{{ $user->email }}</small>
                                  </div>
                              </div>
                            </td>
                            <td>
                                <span class="text-truncate d-flex align-items-center">
                                <span class="fw-medium">
                                    @if($user->role_id == 1)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class='bx bx-conversation'></i>
                                        </span>
                                        <span class="badge bg-primary">Sales</span>
                                    @elseif($user->role_id == 2)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class='bx bx-purchase-tag-alt'></i>
                                        </span>
                                        <span class="badge bg-primary">Purchasing</span>
                                    @elseif($user->role_id == 3)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class="bx bx-mobile-alt bx-xs"></i>
                                        </span>
                                        <span class="badge bg-primary">IT</span>
                                    @elseif($user->role_id == 4)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class='bx bx-wrench'></i>
                                        </span>
                                        <span class="badge bg-primary">Labs</span>
                                    @elseif($user->role_id == 5)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class="bx bx-package bx-xs"></i>
                                        </span>
                                        <span class="badge bg-primary">Courier</span>
                                    @elseif($user->role_id == 6)
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class='bx bx-building'></i>
                                        </span>
                                        <span class="badge bg-primary">Warehouse</span>
                                    @else
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2">
                                            <i class="bx bx-mobile-alt bx-xs"></i>
                                        </span>
                                        <span class="badge bg-danger">Unknown Status</span>
                                    @endif
                                </span>
                                </span>
                            </td>
                            <td>
                                <span class="fw-medium">
                                    @if($user->is_active == 1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($user->is_active == 2)
                                        <span class="badge bg-danger">Not Active</span>
                                    @else
                                        <span class="badge bg-secondary">Unknown Status</span>
                                    @endif
                                </span>
                            </td>
                            <td class="fw-medium">
                                <img src="/storage/{{ $user->qr }}" width="50px" alt="QR Code">
                            </td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-sm btn-icon">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('users.show', ['id_user' => Hashids::encode($user->id_user)]) }}" class="btn btn-sm btn-icon">
                                        <i class='bx bx-show'></i>
                                    </a>
                                    <form method="POST" action="{{ route('users.destroy', $user->id_user) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon delete-record" onclick="return confirm('Are you sure you want to delete this User?');">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded me-2"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                        <a href="{{ route('users.edit', $user->id_user) }}" class="dropdown-item">Edit</a>
                                        <form method="POST" action="{{ route('users.destroy', $user->id_user) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this User?');">Delete</button>
                                        </form>
                                        <a href="{{ route('users.show', $user->id_user) }}" class="dropdown-item">View</a>
                                        <a href="{{ route('users.suspend', $user->id_user) }}" class="dropdown-item">Suspend</a>
                                    </div>
                                </div>
                            </td>                            
                          </tr>
                        @endforeach  
                        </tbody>
                    </table>
                </div>
            </div> --}}

            <div class="row mx-2 my-3">
                <div class="col-md-2 col-sm-2">
                    <div class="me-3 my-1">
                    </div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                        <div class="dt-buttons my-1">
                            <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddRole">
                                <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                    <span class="d-none d-sm-inline-block">Add New Role</span>
                                </span>
                            </button> 
                            <button class="dt-button add-new btn btn-primary mx-3" tabindex="0" aria-controls="DataTable_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                <span><i class="bx bx-plus me-0 me-sm-1"></i>
                                    <span class="d-none d-sm-inline-block">Add New User</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
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
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-phone">Phone</label>
                        <input type="text" id="add-user-phone" class="form-control" placeholder="08xx xxxx xxxx" aria-label="john.doe@example.com" name="phone">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-address">Address</label>
                        <input type="text" id="add-user-address" class="form-control" placeholder="Jalan Swadarma 1" aria-label="john.doe@example.com" name="address">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-state">state</label>
                        <input type="text" id="add-user-state" class="form-control" placeholder="Jakarta Barat, DKI Jakarta, Indonesia" aria-label="john.doe@example.com" name="state">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-picture">Picture</label>
                        <input class="form-control" type="file" id="formFile" name="image">                    
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="user-role" class="form-select" name="role_id">
                            @foreach($roles as $r)
                            <option value="{{$r->id}}">{{$r->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
                </div>
            </div>

            <!-- Offcanvas to add new role -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddRole" aria-labelledby="offcanvasAddRoleLabel">
                <div class="offcanvas-header">
                <h5 id="offcanvasAddRoleLabel" class="offcanvas-title">Add Role</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                <form method="post" action="{{ route('roles.create') }}" enctype="multipart/form-data" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm">
                    @csrf <!-- CSRF protection -->
                    @method('POST')
                    <div class="mb-3">
                        <label class="form-label" for="user-role">Listed User Role</label>
                        <select id="user-role" class="form-select" name="role_id">
                            @foreach($roles as $r)
                            <option value="{{$r->role}}">{{$r->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-role">New Role</label>
                        <input type="text" class="form-control" id="add-user-role" placeholder="Engineer" name="role" aria-label="Engineer">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    {{-- <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
                </div>
            </div>
        </div>

        <div class="card card-datatable table-responsive mt-3">
            <table class="table table-bordered" id="users-table" data-page-length='7'>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>company</th>
                        <th>role</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                // Destroy existing DataTable before re-initializing
                if ($.fn.DataTable.isDataTable('#users-table')) {
                    $('#users-table').DataTable().destroy();
                }
        
                // Initialize DataTable
                $('#users-table').DataTable({
                    serverSide: true,
                    ajax: '{{ route('users.data') }}',
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'company', name: 'company' },
                        { data: 'role_id', name: 'role_id' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'address', name: 'address' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </div>
@endsection