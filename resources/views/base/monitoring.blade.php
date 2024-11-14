@extends('base.1layout')

@section('title', 'Monitoring')

@section('link')
    <script src="vendor/echarts.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

<<<<<<< Updated upstream
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-8 col-md-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-9 px-2">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-lg-4 pt-1">
                                    <h4>Real-time</h4>
                                </div>
                                <div class="col-lg-8">
                                    <ul class="nav nav-pills" role="tablist" id="tabList"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="tabContent"></div>
                    </div>
                    <div class="col-lg-3 px-2 mt-4">
                        <div class="" id="datepicker">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card text-left">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-lg-4 pt-1">
                            <h4>Energy</h4>
                        </div>
                        <div class="col-lg-8 card card-border-shadow-primary h-100">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card">Today</h5>
                                </div>
                                <div class="col">
                                    <h5 class="card">Week</h5>
                                </div>
                                <div class="col">
                                    <h5 class="card">Month</h5>
                                </div>
                                <div class="col">
                                    <h5 class="card">Year</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="energy" style="width: 60vw; height: 50vh;"></div>
                    </div>
=======
    {{-- <div class="row mb-4 justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card text-center">
                <div class="card-header py-3">
                    <ul class="nav nav-pills" role="tablist" id="tabList"></ul>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
    </div>

    <script>
=======
    </div> --}}
    
    {{-- <script>
>>>>>>> Stashed changes
        // Define your tabs here
        const tabs = [
            { id: 'F', label: 'Freq' },
            { id: 'U1', label: 'V1' },
            { id: 'U2', label: 'V2' },
            { id: 'U3', label: 'V3' },
            { id: 'U12', label: 'V12' },
            { id: 'U23', label: 'V23' },
            { id: 'U31', label: 'V31' },
            { id: 'IL1', label: 'I1' },
            { id: 'IL2', label: 'I2' },
            { id: 'IL3', label: 'I3' },
            // Add more tabs as needed
        ];

        const tabList = document.getElementById('tabList');
        const tabContent = document.getElementById('tabContent');

        // Loop to create tabs and corresponding content panes
        tabs.forEach((tab, index) => {
            // Create <li> wrapper
            const listItem = document.createElement('li');
            listItem.className = 'nav-item';
            listItem.role = 'presentation';

            // Create tab button
            const tabButton = document.createElement('button');
            tabButton.type = 'button';
            tabButton.className = `nav-link ${index === 0 ? 'active' : ''}`;
            tabButton.setAttribute('data-bs-toggle', 'tab');
            tabButton.setAttribute('data-bs-target', `#navs-pills-${tab.id}`);
            tabButton.innerText = tab.label;

            listItem.appendChild(tabButton); // Append button to <li>
            tabList.appendChild(listItem);   // Append <li> to the tab list

            // Create content pane
            const contentPane = document.createElement('div');
            contentPane.className = `tab-pane fade ${index === 0 ? 'show active' : ''}`;
            contentPane.id = `navs-pills-${tab.id}`;
            contentPane.innerHTML = `
                <div class="d-flex justify-content-center">
                    <div id="${tab.id}" style="width: 45vw; height: 50vh;"></div>
                </div>
            `;
            tabContent.appendChild(contentPane); // Append pane to tab content
        });
<<<<<<< Updated upstream
    </script>

=======
    </script> --}}
    
>>>>>>> Stashed changes

    <div class="row mb-4 g-6 justify-content-center">
        <div class="col-lg-10 col-md-12 order-3 order-lg-4 mb-4 mb-lg-0">
            <div class="card text-center">
                <div class="card-header py-3">
                    <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-F" aria-controls="navs-pills-F" aria-selected="true">Freq</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-U1" aria-controls="navs-pills-U1" aria-selected="false" tabindex="-1">V1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-U2" aria-controls="navs-pills-U2" aria-selected="false" tabindex="-1">V2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-U3" aria-controls="navs-pills-U3" aria-selected="false" tabindex="-1">V3</button>
                    </li>
                    </ul>
                </div>
                <div class="tab-content pt-0">
                    <div class="tab-pane fade active show" id="navs-pills-F" role="tabpanel">
                        <div class="d-flex justify-content-center">
                            <div id="F" style="width: 75vw; height: 50vh;"></div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">Highest Reading</h5>
                                    </div>
                                    <p class="mb-2" id="highestFValue">No data available</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-U1" role="tabpanel">
                        <div class="d-flex justify-content-center">
                            <div id="U1" style="width:75vw; height: 50vh;"></div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">Highest Reading</h5>
                                    </div>
                                    <p class="mb-2" id="highestU1Value">No data available</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-U2" role="tabpanel">
                        <div class="d-flex justify-content-center">
                            <div id="U2" style="width:75vw; height: 50vh;"></div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">Highest Reading</h5>
                                    </div>
                                    <p class="mb-2" id="highestU2Value">No data available</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-U3" role="tabpanel">
                        <div class="d-flex justify-content-center">
                            <div id="U3" style="width:75vw; height: 50vh;"></div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">Highest Reading</h5>
                                    </div>
                                    <p class="mb-2" id="highestU3Value">No data available</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-border-shadow-primary h-100">
                                  <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                      <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck bx-lg"></i></span>
                                      </div>
                                      <h5 class="mb-0">42</h5>
                                    </div>
                                    <p class="mb-2">On route vehicles</p>
                                    <p class="mb-0">
                                      <span class="text-heading fw-medium me-2">+18.2%</span>
                                      <span class="text-muted">than last week</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row mb-12 g-6">
        <div class="col-lg-3 col-md-6">
            <div id="F" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U1" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U2" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U3" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U12" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U23" style="width: 450px; height: 200px;"></div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div id="U31" style="width: 450px; height: 200px;"></div>
        </div>
    </div> --}}

    <script type="text/javascript">
        // Helper function to add only available data points, skipping gaps
        function fillMissingData(data, intervalMinutes) {
            const filledData = [];
            const intervalMillis = intervalMinutes * 60 * 1000; // Convert minutes to milliseconds

            for (let i = 0; i < data.length - 1; i++) {
                filledData.push(data[i]);

                const currentTime = new Date(data[i].name).getTime();
                const nextTime = new Date(data[i + 1].name).getTime();

                // Only push data points without inserting null values for gaps
                if (nextTime - currentTime <= intervalMillis) {
                    filledData.push(data[i + 1]);
                }
            }

            // Add the last data point
            filledData.push(data[data.length - 1]);
            return filledData;
        }

        function renderChart(containerId, titleText, yAxisName, dataKey, unit) {
            var dom = document.getElementById(containerId);
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });

            fetch('http://127.0.0.1:8000/api/v1/metering')
                .then(response => response.json())
                .then(data => {
                    // Extract updated_at and specified dataKey values for the chart without modifying seconds
                    let chartData = data.map(item => ({
                        name: item.updated_at,
                        value: [item.updated_at, item[dataKey]]
                    }));
<<<<<<< Updated upstream

                    // Process data to exclude nulls for gaps over the interval
                    let filledData = fillMissingData(chartData, 5); // 5-minute interval

=======
    
                    // Fill missing data with nulls to break the line
                    let filledData = fillMissingData(chartData, 1); // 1-minute interval

                    // Extract U1 values from the data
                    let freqValues = data.map(item => item.F); 
                    let u1Values = data.map(item => item.U1);
                    let u2Values = data.map(item => item.U2);
                    let u3Values = data.map(item => item.U3);
                    let u12Values = data.map(item => item.U12);
                    let u23Values = data.map(item => item.U23);
                    let u31Values = data.map(item => item.U31);

                    // Find the highest U1 value
                    let highestF = Math.max(...freqValues);
                    let highestU1 = Math.max(...u1Values);
                    let highestU2 = Math.max(...u2Values);
                    let highestU3 = Math.max(...u3Values);
                    let highestU12 = Math.max(...u12Values);
                    let highestU23 = Math.max(...u23Values);
                    let highestU31 = Math.max(...u31Values);

                    document.getElementById('highestFValue').textContent = highestF + ' Hz';
                    document.getElementById('highestU1Value').textContent = highestU1 + ' V';
                    document.getElementById('highestU2Value').textContent = highestU2 + ' V';
                    document.getElementById('highestU3Value').textContent = highestU3 + ' V';
                    document.getElementById('highestU12Value').textContent = highestU12 + ' V';
                    document.getElementById('highestU23Value').textContent = highestU23 + ' V';
                    document.getElementById('highestU31Value').textContent = highestU31 + ' V';

                    // console.log("Highest U1 value:", highestU1);
    
>>>>>>> Stashed changes
                    var option = {
                        title: {
                            text: titleText
                        },
                        tooltip: {
                            trigger: 'axis',
                            formatter: function (params) {
                                params = params[0];
                                let date = new Date(params.name);
                                return (
                                    date.getHours().toString().padStart(2, '0') + ':' +
                                    date.getMinutes().toString().padStart(2, '0') + ':' +
                                    date.getSeconds().toString().padStart(2, '0') +
                                    ' : ' + (params.value[1] !== null ? params.value[1] + ' ' + unit : 'No Data')
                                );
                            },
                            axisPointer: {
                                animation: false
                            }
                        },
                        xAxis: {
                            type: 'time',
                            splitLine: {
                                show: false
                            },
                            min: new Date(new Date().setHours(0, 0, 0, 0)).toISOString(),
                            max: new Date(new Date().setHours(23, 59, 59, 999)).toISOString()
                        },
                        yAxis: {
                            type: 'value',
                            boundaryGap: [0, '100%'],
                            splitLine: {
                                show: false
                            },
                            name: yAxisName
                        },

                        dataZoom: [
                            {
                                type: 'inside',
                                start: 0,
                                end: 100
                            },
                            {
                                start: 0,
                                end: 100
                            }
                        ],

                        series: [
                            {
                                name: titleText,
                                type: 'line',
                                showSymbol: true,
                                connectNulls: false, // Do not connect gaps, show breaks instead
                                data: filledData
                            }
                        ]
                    };

                    myChart.setOption(option);
                })
                .catch(error => console.error('Error fetching data:', error));

            window.addEventListener('resize', myChart.resize);
        }

        // Render the charts without modifying timestamps
        renderChart('F', 'Frequency Over Time', 'Frequency (Hz)', 'F', 'Hz');
        renderChart('U1', 'U1 Over Time', 'Voltage (V)', 'U1', 'V');
        renderChart('U2', 'U2 Over Time', 'Voltage (V)', 'U2', 'V');
        renderChart('U3', 'U3 Over Time', 'Voltage (V)', 'U3', 'V');
        renderChart('U12', 'U12 Over Time', 'Voltage (V)', 'U12', 'V');
        renderChart('U23', 'U23 Over Time', 'Voltage (V)', 'U23', 'V');
        renderChart('U31', 'U31 Over Time', 'Voltage (V)', 'U31', 'V');
        renderChart('IL1', 'IL1 Over Time', 'Current (A)', 'IL1', 'A');
        renderChart('IL2', 'IL2 Over Time', 'Current (A)', 'IL2', 'A');
        renderChart('IL3', 'IL3 Over Time', 'Current (A)', 'IL3', 'A');
    </script>


    {{-- Energy --}}
    <script>
        // Sample JSON data
        var jsonData = [
            { created_at: "2024-11-12T10:30:00Z", Ep_sum: 150 },
            { created_at: "2024-11-12T14:30:00Z", Ep_sum: 200 },
            { created_at: "2024-11-13T09:30:00Z", Ep_sum: 300 },
            // Add more data as needed
        ];

        // Step 1: Define days of the week
        var daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var dataByDay = { 'Sun': 0, 'Mon': 0, 'Tue': 0, 'Wed': 0, 'Thu': 0, 'Fri': 0, 'Sat': 0 };

        // Step 2: Group data by day of the week and sum Ep_sum for each day
        jsonData.forEach(entry => {
            const day = daysOfWeek[new Date(entry.created_at).getUTCDay()]; // Get day name
            dataByDay[day] += entry.Ep_sum;
        });

        // Step 3: Prepare data array in the correct order for the chart
        var activeEnergyByDay = daysOfWeek.map(day => dataByDay[day]);
        var reactiveEnergyByDay = daysOfWeek.map(day => dataByDay[day]);

        // Step 4: Configure the chart
        var chartDom = document.getElementById('energy');
        var myChart = echarts.init(chartDom);
        var option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: { type: 'shadow' }
            },
            legend: {},
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{ type: 'category', data: daysOfWeek }],
            yAxis: [{ type: 'value' }],
            series: [
                { name: 'Active Energy', type: 'bar', stack: 'Ad', emphasis: { focus: 'series' }, data: activeEnergyByDay },
                { name: 'Reactive Energy', type: 'bar', stack: 'Ad', emphasis: { focus: 'series' }, data: reactiveEnergyByDay },
            ]
        };

        myChart.setOption(option);

    </script>

    {{-- Calendar --}}
    <script>
        // Initialize Flatpickr with inline option enabled
        flatpickr("#datepicker", {
            inline: true,           // Enable inline display
            onOpen: function() {     // Trigger animation on open
            document.querySelector(".flatpickr-calendar").classList.add("animate");
            },
            onClose: function() {    // Reset animation when closed
            document.querySelector(".flatpickr-calendar").classList.remove("animate");
            }
        });
    </script>


</div>
@endsection
