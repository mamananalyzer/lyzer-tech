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
            <div class="col-md-6 col-lg-5 mb-md-0 mb-4">
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
            <div class="col-md-6 col-lg-7 mb-0">
                <div class="card">
                  <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th class="cell-fit">Paid By</th>
                          <th class="cell-fit">Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Henry Barnes</a>
                                <small class="text-truncate text-muted">jok@puc.co.uk</small>
                              </div>
                            </div>
                          </td>
                          <td>$459.65</td>
                          <td><span class="badge bg-label-success"> Paid </span></td>
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
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/20.png" alt="Avatar" class="rounded-circle"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Hallie Warner</a>
                                <small class="text-truncate text-muted">hellie@war.co.uk</small>
                              </div>
                            </div>
                          </td>
                          <td>$93.81</td>
                          <td><span class="badge bg-label-warning"> Pending </span></td>
                          <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
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
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Gerald Flowers</a>
                                <small class="text-truncate text-muted">initus@odemi.com</small>
                              </div>
                            </div>
                          </td>
                          <td>$934.35</td>
                          <td><span class="badge bg-label-warning"> Pending </span></td>
                          <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
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
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">John Davidson</a>
                                <small class="text-truncate text-muted">jtum@upkesja.gov</small>
                              </div>
                            </div>
                          </td>
                          <td>$794.97</td>
                          <td><span class="badge bg-label-success"> Paid </span></td>
                          <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
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
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><span class="avatar-initial rounded-circle bg-label-warning">JH</span></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Jayden Harris</a>
                                <small class="text-truncate text-muted">wipare@tin.com</small>
                              </div>
                            </div>
                          </td>
                          <td>$19.49</td>
                          <td><span class="badge bg-label-success"> Paid </span></td>
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
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center">
                              <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Rena Ferguson</a>
                                <small class="text-truncate text-muted">nur@kaomor.edu</small>
                              </div>
                            </div>
                          </td>
                          <td>$636.27</td>
                          <td><span class="badge bg-label-danger"> Failed </span></td>
                          <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
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
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 col-lg-7 mb-0">
                <div class="card">
                    <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="cell-fit">Paid By</th>
                            <th class="cell-fit">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Henry Barnes</a>
                                <small class="text-truncate text-muted">jok@puc.co.uk</small>
                                </div>
                            </div>
                            </td>
                            <td>$459.65</td>
                            <td><span class="badge bg-label-success"> Paid </span></td>
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
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/20.png" alt="Avatar" class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Hallie Warner</a>
                                <small class="text-truncate text-muted">hellie@war.co.uk</small>
                                </div>
                            </div>
                            </td>
                            <td>$93.81</td>
                            <td><span class="badge bg-label-warning"> Pending </span></td>
                            <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
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
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Gerald Flowers</a>
                                <small class="text-truncate text-muted">initus@odemi.com</small>
                                </div>
                            </div>
                            </td>
                            <td>$934.35</td>
                            <td><span class="badge bg-label-warning"> Pending </span></td>
                            <td><img src="../../assets/img/icons/payments/visa-light.png" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
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
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">John Davidson</a>
                                <small class="text-truncate text-muted">jtum@upkesja.gov</small>
                                </div>
                            </div>
                            </td>
                            <td>$794.97</td>
                            <td><span class="badge bg-label-success"> Paid </span></td>
                            <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
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
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><span class="avatar-initial rounded-circle bg-label-warning">JH</span></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Jayden Harris</a>
                                <small class="text-truncate text-muted">wipare@tin.com</small>
                                </div>
                            </div>
                            </td>
                            <td>$19.49</td>
                            <td><span class="badge bg-label-success"> Paid </span></td>
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
                        <tr>
                            <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-2"><img src="../../assets/img/avatars/8.png" alt="Avatar" class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column">
                                <a href="pages-profile-user.html" class="text-body text-truncate fw-medium">Rena Ferguson</a>
                                <small class="text-truncate text-muted">nur@kaomor.edu</small>
                                </div>
                            </div>
                            </td>
                            <td>$636.27</td>
                            <td><span class="badge bg-label-danger"> Failed </span></td>
                            <td><img src="../../assets/img/icons/payments/paypal-light.png" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
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
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection