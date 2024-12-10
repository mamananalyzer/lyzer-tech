@extends('base.1layout')

@section('title', 'Monitoring')

@section('link')
    <script src="vendor/echarts.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="sneat/assets/vendor/libs/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="sneat/assets/vendor/css/pages/app-calendar.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/jstree/jstree.css">

    <link rel="stylesheet" href="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

@endsection

@section('zone-link')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="sneat/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="sneat/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="sneat/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="sneat/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="sneat/assets/vendor/libs/jstree/jstree.js"></script>
    <script src="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>


    <!-- Page JS -->
    <script src="sneat/assets/js/app-user-list.js"></script>
    <script src="sneat/assets/js/extended-ui-treeview.js"></script>
    <script src="sneat/assets/js/extended-ui-perfect-scrollbar.js"></script>
@endsection

@section('content')

    <style>
        #scrollable-card {
            /* width: 300px;
                height: 200px; */
            overflow: hidden;
            /* Ensures content is hidden if it overflows */
            position: relative;
            cursor: grab;
            /* The cursor will show grab icon */
        }

        #scrollable-card:active {
            cursor: grabbing;
            /* The cursor will show grabbing when dragging */
        }

        .content {
            width: 600px;
            /* Adjust width of content to make it horizontally scrollable */
            height: 400px;
            /* Adjust height of content for vertical scroll */
        }
    </style>
    <div class="flex-grow-1 container-p-y container-fluid">

        {{-- Facility --}}
        <div class="card mb-6">
            <div class="row row-bordered g-0">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <label for="exampleFormControlSelect1" class="form-label" hidden>Example select</label>
                                <select class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    @foreach ($Metering_Facility as $Facility)
                                        {{-- <option selected="">Open this select menu</option> --}}
                                        <option value="1">{{ $Facility->facility }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="card-body px-xl-9" style="position: relative;">
                        <button type="button" class="btn btn-text-primary">Main System Diagram</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Measurement --}}
        <div class="row">
            <div class="col-xxl-3 mb-6 order-0">
                <div class="card">
                    <div class="d-flex align-items-start row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">List Devices</h5>
                                <div id="jstree">
                                </div>

                                <form method="post" action="{{ route('Monitoring.selectedDevice') }}"
                                    enctype="multipart/form-data"
                                    class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                    id="getSelectedForm">
                                    @csrf <!-- CSRF protection -->
                                    @method('POST')

                                    <script>
                                        $(document).ready(function() {
                                            $('#jstree').jstree({
                                                'core': {
                                                    "themes": {
                                                        "dots": false, // Disable the dots
                                                    },
                                                    'data': {!! $treeData !!} // Pass the tree data from the controller
                                                },
                                                'plugins': ['checkbox'], // Enable checkbox plugin
                                                'checkbox': {
                                                    'keep_selected_style': false, // Avoid default styling for selected nodes
                                                    'three_state': true, // Checkbox for parent affects children
                                                    'cascade': 'down+undetermined' // Propagate changes
                                                },
                                            });

                                            // Capture form submission
                                            $('#getSelectedForm').on('submit', function(e) {
                                                const selectedDevices = [];
                                                const selectedNodes = $('#jstree').jstree("get_checked", true);

                                                selectedNodes.forEach(function(node) {
                                                    if (node.id.startsWith('device_')) { // Collect only device nodes
                                                        selectedDevices.push(node.text); // Use the node's text
                                                    }
                                                });

                                                // Add the selected devices to the hidden input
                                                $('#selectedDevicesInput').val(JSON.stringify(selectedDevices));
                                            });
                                        });
                                    </script>


                                    <input type="hidden" name="selectedDevices" id="selectedDevicesInput">
                                    <button type="submit" class="mt-4 btn btn-sm btn-label-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-lg-12 col-md-10 order-1">
                <div id="scrollable-card" class="row perfect-scrollbar">
                    <div class="col-12 scrollable-card">
                        <div class="card overflow-hidden mb-6" style="height: 66vh;">
                            <div class="card-body ps ps--active-x ps--active-y" id="both-scrollbars-example">
                                <div class="d-flex" id="scrollbars">
                                    @foreach ($Metering_Data as $data)
                                        <div class="col-lg-4 col-md-12 col-6 mb-6">
                                            <div class="card card-border-shadow-primary h-100">
                                                <div class="card-body pb-4">
                                                    <h4 class="card-title mb-0">{{ $data->device }}</h4>
                                                    @php
                                                        $attributes = [
                                                            'device_model' => [
                                                                'label' => 'device_model',
                                                                'value' => $data->device_model,
                                                                'unit' => '',
                                                            ],
                                                            'device_name' => [
                                                                'label' => 'device_name',
                                                                'value' => $data->device_name,
                                                                'unit' => '',
                                                            ],
                                                            'timestamp' => [
                                                                'label' => 'timestamp',
                                                                'value' => \Carbon\Carbon::createFromTimestamp(
                                                                    $data->timestamp,
                                                                )->format('d-M H:i:s'),
                                                                // $data->timestamp,
                                                                'unit' => '',
                                                            ],
                                                            'online' => [
                                                                'label' => 'online',
                                                                'value' => $data->online,
                                                                'unit' => '',
                                                            ],
                                                            'F' => [
                                                                'label' => 'F',
                                                                'value' => $data->F,
                                                                'unit' => 'Hz',
                                                            ],
                                                            'U1' => [
                                                                'label' => 'U1',
                                                                'value' => $data->U1,
                                                                'unit' => 'V',
                                                            ],
                                                            'U2' => [
                                                                'label' => 'U2',
                                                                'value' => $data->U2,
                                                                'unit' => 'V',
                                                            ],
                                                            'U3' => [
                                                                'label' => 'U3',
                                                                'value' => $data->U3,
                                                                'unit' => 'V',
                                                            ],
                                                            'Uavg' => [
                                                                'label' => 'Uavg',
                                                                'value' => $data->Uavg,
                                                                'unit' => 'V',
                                                            ],
                                                            'U12' => [
                                                                'label' => 'U12',
                                                                'value' => $data->U12,
                                                                'unit' => 'V',
                                                            ],
                                                            'U23' => [
                                                                'label' => 'U23',
                                                                'value' => $data->U23,
                                                                'unit' => 'V',
                                                            ],
                                                            'U31' => [
                                                                'label' => 'U31',
                                                                'value' => $data->U31,
                                                                'unit' => 'V',
                                                            ],
                                                            'Ulavg' => [
                                                                'label' => 'Ulavg',
                                                                'value' => $data->Ulavg,
                                                                'unit' => 'V',
                                                            ],
                                                            'IL1' => [
                                                                'label' => 'IL1',
                                                                'value' => $data->IL1,
                                                                'unit' => 'A',
                                                            ],
                                                            'IL2' => [
                                                                'label' => 'IL2',
                                                                'value' => $data->IL2,
                                                                'unit' => 'A',
                                                            ],
                                                            'IL3' => [
                                                                'label' => 'IL3',
                                                                'value' => $data->IL3,
                                                                'unit' => 'A',
                                                            ],
                                                            'Iavg' => [
                                                                'label' => 'Iavg',
                                                                'value' => $data->Iavg,
                                                                'unit' => 'A',
                                                            ],
                                                            'In' => [
                                                                'label' => 'In',
                                                                'value' => $data->In,
                                                                'unit' => 'A',
                                                            ],
                                                            'Pa' => [
                                                                'label' => 'Pa',
                                                                'value' => $data->Pa,
                                                                'unit' => 'kW',
                                                            ],
                                                            'Pb' => [
                                                                'label' => 'Pb',
                                                                'value' => $data->Pb,
                                                                'unit' => 'kW',
                                                            ],
                                                            'Pc' => [
                                                                'label' => 'Pc',
                                                                'value' => $data->Pc,
                                                                'unit' => 'kW',
                                                            ],
                                                            'Psum' => [
                                                                'label' => 'Psum',
                                                                'value' => $data->Psum,
                                                                'unit' => 'kW',
                                                            ],
                                                            'Qa' => [
                                                                'label' => 'Qa',
                                                                'value' => $data->Qa,
                                                                'unit' => 'kvar',
                                                            ],
                                                            'Qb' => [
                                                                'label' => 'Qb',
                                                                'value' => $data->Qb,
                                                                'unit' => 'kvar',
                                                            ],
                                                            'Qc' => [
                                                                'label' => 'Qc',
                                                                'value' => $data->Qc,
                                                                'unit' => 'kvar',
                                                            ],
                                                            'Qsum' => [
                                                                'label' => 'Qsum',
                                                                'value' => $data->Qsum,
                                                                'unit' => 'kvar',
                                                            ],
                                                            'Sa' => [
                                                                'label' => 'Sa',
                                                                'value' => $data->Sa,
                                                                'unit' => 'kVA',
                                                            ],
                                                            'Sb' => [
                                                                'label' => 'Sb',
                                                                'value' => $data->Sb,
                                                                'unit' => 'kVA',
                                                            ],
                                                            'Sc' => [
                                                                'label' => 'Sc',
                                                                'value' => $data->Sc,
                                                                'unit' => 'kVA',
                                                            ],
                                                            'Ssum' => [
                                                                'label' => 'Ssum',
                                                                'value' => $data->Ssum,
                                                                'unit' => 'kVA',
                                                            ],
                                                            'PFa' => [
                                                                'label' => 'PFa',
                                                                'value' => $data->PFa,
                                                                'unit' => '',
                                                            ],
                                                            'PFb' => [
                                                                'label' => 'PFb',
                                                                'value' => $data->PFb,
                                                                'unit' => '',
                                                            ],
                                                            'PFc' => [
                                                                'label' => 'PFc',
                                                                'value' => $data->PFc,
                                                                'unit' => '',
                                                            ],
                                                            'PFsum' => [
                                                                'label' => 'PFsum',
                                                                'value' => $data->PFsum,
                                                                'unit' => '',
                                                            ],
                                                            'U_unbl' => [
                                                                'label' => 'U_unbl',
                                                                'value' => $data->U_unbl,
                                                                'unit' => '%',
                                                            ],
                                                            'I_unbl' => [
                                                                'label' => 'I_unbl',
                                                                'value' => $data->I_unbl,
                                                                'unit' => '%',
                                                            ],
                                                            'LCR' => [
                                                                'label' => 'LCR',
                                                                'value' => $data->LCR,
                                                                'unit' => '',
                                                            ],
                                                            'P_Dmd' => [
                                                                'label' => 'P_Dmd',
                                                                'value' => $data->P_Dmd,
                                                                'unit' => 'kW',
                                                            ],
                                                            'Q_Dmd' => [
                                                                'label' => 'Q_Dmd',
                                                                'value' => $data->Q_Dmd,
                                                                'unit' => 'kvar',
                                                            ],
                                                            'S_Dmd' => [
                                                                'label' => 'S_Dmd',
                                                                'value' => $data->S_Dmd,
                                                                'unit' => 'kVA',
                                                            ],
                                                            'I1_Dmd' => [
                                                                'label' => 'I1_Dmd',
                                                                'value' => $data->I1_Dmd,
                                                                'unit' => 'A',
                                                            ],
                                                            'I2_Dmd' => [
                                                                'label' => 'I2_Dmd',
                                                                'value' => $data->I2_Dmd,
                                                                'unit' => 'A',
                                                            ],
                                                            'I3_Dmd' => [
                                                                'label' => 'I3_Dmd',
                                                                'value' => $data->I3_Dmd,
                                                                'unit' => 'A',
                                                            ],
                                                            'Ep_Imp' => [
                                                                'label' => 'Ep_Imp',
                                                                'value' => $data->Ep_Imp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Ep_Exp' => [
                                                                'label' => 'Ep_Exp',
                                                                'value' => $data->Ep_Exp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Eq_Imp' => [
                                                                'label' => 'Eq_Imp',
                                                                'value' => $data->Eq_Imp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eq_Exp' => [
                                                                'label' => 'Eq_Exp',
                                                                'value' => $data->Eq_Exp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Ep_sum' => [
                                                                'label' => 'Ep_sum',
                                                                'value' => $data->Ep_sum,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Ep_net' => [
                                                                'label' => 'Ep_net',
                                                                'value' => $data->Ep_net,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Eq_sum' => [
                                                                'label' => 'Eq_sum',
                                                                'value' => $data->Eq_sum,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eq_net' => [
                                                                'label' => 'Eq_net',
                                                                'value' => $data->Eq_net,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Es' => [
                                                                'label' => 'Es',
                                                                'value' => $data->Es,
                                                                'unit' => 'kVAh',
                                                            ],
                                                            'Epa_Imp' => [
                                                                'label' => 'Epa_Imp',
                                                                'value' => $data->Epa_Imp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Epa_Exp' => [
                                                                'label' => 'Epa_Exp',
                                                                'value' => $data->Epa_Exp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Epb_Imp' => [
                                                                'label' => 'Epb_Imp',
                                                                'value' => $data->Epb_Imp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Epb_Exp' => [
                                                                'label' => 'Epb_Exp',
                                                                'value' => $data->Epb_Exp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Epc_Imp' => [
                                                                'label' => 'Epc_Imp',
                                                                'value' => $data->Epc_Imp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Epc_Exp' => [
                                                                'label' => 'Epc_Exp',
                                                                'value' => $data->Epc_Exp,
                                                                'unit' => 'kWh',
                                                            ],
                                                            'Eqa_Imp' => [
                                                                'label' => 'Eqa_Imp',
                                                                'value' => $data->Eqa_Imp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eqa_Exp' => [
                                                                'label' => 'Eqa_Exp',
                                                                'value' => $data->Eqa_Exp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eqb_Imp' => [
                                                                'label' => 'Eqb_Imp',
                                                                'value' => $data->Eqb_Imp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eqb_Exp' => [
                                                                'label' => 'Eqb_Exp',
                                                                'value' => $data->Eqb_Exp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eqc_Imp' => [
                                                                'label' => 'Eqc_Imp',
                                                                'value' => $data->Eqc_Imp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Eqc_Exp' => [
                                                                'label' => 'Eqc_Exp',
                                                                'value' => $data->Eqc_Exp,
                                                                'unit' => 'kvarh',
                                                            ],
                                                            'Esa' => [
                                                                'label' => 'Esa',
                                                                'value' => $data->Esa,
                                                                'unit' => 'kVAh',
                                                            ],
                                                            'Esb' => [
                                                                'label' => 'Esb',
                                                                'value' => $data->Esb,
                                                                'unit' => 'kVAh',
                                                            ],
                                                            'Esc' => [
                                                                'label' => 'Esc',
                                                                'value' => $data->Esc,
                                                                'unit' => 'kVAh',
                                                            ],
                                                            'PhsAngV2toV1' => [
                                                                'label' => 'PhsAngV2toV1',
                                                                'value' => $data->PhsAngV2toV1,
                                                                'unit' => 'deg',
                                                            ],
                                                            'PhsAngV3toV1' => [
                                                                'label' => 'PhsAngV3toV1',
                                                                'value' => $data->PhsAngV3toV1,
                                                                'unit' => 'deg',
                                                            ],
                                                            'PhsAngI1toV1' => [
                                                                'label' => 'PhsAngI1toV1',
                                                                'value' => $data->PhsAngI1toV1,
                                                                'unit' => 'deg',
                                                            ],
                                                            'PhsAngI2toV1' => [
                                                                'label' => 'PhsAngI2toV1',
                                                                'value' => $data->PhsAngI2toV1,
                                                                'unit' => 'deg',
                                                            ],
                                                            'PhsAngI3toV1' => [
                                                                'label' => 'PhsAngI3toV1',
                                                                'value' => $data->PhsAngI3toV1,
                                                                'unit' => 'deg',
                                                            ],
                                                            // Add other fields you want to display here
                                                        ];
                                                    @endphp
                                                    <table class="table table-striped">
                                                        @foreach ($attributes as $attribute)
                                                            <tr>
                                                                <td class="col-5 p-1"><span
                                                                        class="d-block fw-medium mb-1">{{ $attribute['label'] }}</span>
                                                                </td>
                                                                <td class="col-1 p-1"><span
                                                                        class="d-block fw-medium mb-1 d-flex justify-content-start p-0">:</span>
                                                                </td>
                                                                <td class="col-5 p-1"><span
                                                                        class="d-block fw-medium mb-1 d-flex justify-content-end p-0">{{ $attribute['value'] }}</span>
                                                                </td>
                                                                <td class="col-1 p-1"><span
                                                                        class="d-block fw-medium mb-1 d-flex justify-content-end p-0">{{ $attribute['unit'] }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        const container = document.getElementById('scrollable-card');
                        const image = document.getElementById('scrollbars');

                        let isDragging = false;
                        let startX, startY;
                        let offsetX = 0,
                            offsetY = 0;

                        container.addEventListener('mousedown', (e) => {
                            isDragging = true;
                            startX = e.clientX - offsetX;
                            startY = e.clientY - offsetY;
                            container.style.cursor = 'grabbing';
                        });

                        container.addEventListener('mousemove', (e) => {
                            if (!isDragging) return;
                            offsetX = e.clientX - startX;
                            offsetY = e.clientY - startY;
                            image.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
                        });

                        container.addEventListener('mouseup', () => {
                            isDragging = false;
                            container.style.cursor = 'grab';
                        });

                        container.addEventListener('mouseleave', () => {
                            isDragging = false;
                            container.style.cursor = 'grab';
                        });
                    </script>


                    {{-- <div class="col-md-6 col-sm-12">
                        <div class="card overflow-hidden mb-6" style="height: 300px;">
                            <h5 class="card-header">Horizontal Scrollbar</h5>
                            <div class="card-body ps" id="horizontal-example">
                                <img src="{{ asset('img/logo/18.jpg') }}" alt="scrollbar-image">
                            </div>
                        </div>
                    </div> --}}

                    {{-- @foreach ($Metering_Data as $data)
                        <div class="col-lg-4 col-md-12 col-6 mb-6">
                            <div class="card card-border-shadow-primary h-100">
                                <div class="card-body pb-4">
                                    <h4 class="card-title mb-0">{{ $data->device }}</h4>
                                    @php
                                        $attributes = [
                                            'device_model' => [
                                                'label' => 'device_model',
                                                'value' => $data->device_model,
                                                'unit' => '',
                                            ],
                                            'device_name' => [
                                                'label' => 'device_name',
                                                'value' => $data->device_name,
                                                'unit' => '',
                                            ],
                                            'timestamp' => [
                                                'label' => 'timestamp',
                                                'value' => \Carbon\Carbon::createFromTimestamp(
                                                    $data->timestamp,
                                                )->format('d-M H:i:s'),
                                                // $data->timestamp,
                                                'unit' => '',
                                            ],
                                            'online' => ['label' => 'online', 'value' => $data->online, 'unit' => ''],
                                            'F' => ['label' => 'F', 'value' => $data->F, 'unit' => 'Hz'],
                                            'U1' => ['label' => 'U1', 'value' => $data->U1, 'unit' => 'V'],
                                            'U2' => ['label' => 'U2', 'value' => $data->U2, 'unit' => 'V'],
                                            'U3' => ['label' => 'U3', 'value' => $data->U3, 'unit' => 'V'],
                                            'Uavg' => ['label' => 'Uavg', 'value' => $data->Uavg, 'unit' => 'V'],
                                            'U12' => ['label' => 'U12', 'value' => $data->U12, 'unit' => 'V'],
                                            'U23' => ['label' => 'U23', 'value' => $data->U23, 'unit' => 'V'],
                                            'U31' => ['label' => 'U31', 'value' => $data->U31, 'unit' => 'V'],
                                            'Ulavg' => ['label' => 'Ulavg', 'value' => $data->Ulavg, 'unit' => 'V'],
                                            'IL1' => ['label' => 'IL1', 'value' => $data->IL1, 'unit' => 'A'],
                                            'IL2' => ['label' => 'IL2', 'value' => $data->IL2, 'unit' => 'A'],
                                            'IL3' => ['label' => 'IL3', 'value' => $data->IL3, 'unit' => 'A'],
                                            'Iavg' => ['label' => 'Iavg', 'value' => $data->Iavg, 'unit' => 'A'],
                                            'In' => ['label' => 'In', 'value' => $data->In, 'unit' => 'A'],
                                            'Pa' => ['label' => 'Pa', 'value' => $data->Pa, 'unit' => 'kW'],
                                            'Pb' => ['label' => 'Pb', 'value' => $data->Pb, 'unit' => 'kW'],
                                            'Pc' => ['label' => 'Pc', 'value' => $data->Pc, 'unit' => 'kW'],
                                            'Psum' => ['label' => 'Psum', 'value' => $data->Psum, 'unit' => 'kW'],
                                            'Qa' => ['label' => 'Qa', 'value' => $data->Qa, 'unit' => 'kvar'],
                                            'Qb' => ['label' => 'Qb', 'value' => $data->Qb, 'unit' => 'kvar'],
                                            'Qc' => ['label' => 'Qc', 'value' => $data->Qc, 'unit' => 'kvar'],
                                            'Qsum' => ['label' => 'Qsum', 'value' => $data->Qsum, 'unit' => 'kvar'],
                                            'Sa' => ['label' => 'Sa', 'value' => $data->Sa, 'unit' => 'kVA'],
                                            'Sb' => ['label' => 'Sb', 'value' => $data->Sb, 'unit' => 'kVA'],
                                            'Sc' => ['label' => 'Sc', 'value' => $data->Sc, 'unit' => 'kVA'],
                                            'Ssum' => ['label' => 'Ssum', 'value' => $data->Ssum, 'unit' => 'kVA'],
                                            'PFa' => ['label' => 'PFa', 'value' => $data->PFa, 'unit' => ''],
                                            'PFb' => ['label' => 'PFb', 'value' => $data->PFb, 'unit' => ''],
                                            'PFc' => ['label' => 'PFc', 'value' => $data->PFc, 'unit' => ''],
                                            'PFsum' => ['label' => 'PFsum', 'value' => $data->PFsum, 'unit' => ''],
                                            'U_unbl' => ['label' => 'U_unbl', 'value' => $data->U_unbl, 'unit' => '%'],
                                            'I_unbl' => ['label' => 'I_unbl', 'value' => $data->I_unbl, 'unit' => '%'],
                                            'LCR' => ['label' => 'LCR', 'value' => $data->LCR, 'unit' => ''],
                                            'P_Dmd' => ['label' => 'P_Dmd', 'value' => $data->P_Dmd, 'unit' => 'kW'],
                                            'Q_Dmd' => ['label' => 'Q_Dmd', 'value' => $data->Q_Dmd, 'unit' => 'kvar'],
                                            'S_Dmd' => ['label' => 'S_Dmd', 'value' => $data->S_Dmd, 'unit' => 'kVA'],
                                            'I1_Dmd' => ['label' => 'I1_Dmd', 'value' => $data->I1_Dmd, 'unit' => 'A'],
                                            'I2_Dmd' => ['label' => 'I2_Dmd', 'value' => $data->I2_Dmd, 'unit' => 'A'],
                                            'I3_Dmd' => ['label' => 'I3_Dmd', 'value' => $data->I3_Dmd, 'unit' => 'A'],
                                            'Ep_Imp' => [
                                                'label' => 'Ep_Imp',
                                                'value' => $data->Ep_Imp,
                                                'unit' => 'kWh',
                                            ],
                                            'Ep_Exp' => [
                                                'label' => 'Ep_Exp',
                                                'value' => $data->Ep_Exp,
                                                'unit' => 'kWh',
                                            ],
                                            'Eq_Imp' => [
                                                'label' => 'Eq_Imp',
                                                'value' => $data->Eq_Imp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eq_Exp' => [
                                                'label' => 'Eq_Exp',
                                                'value' => $data->Eq_Exp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Ep_sum' => [
                                                'label' => 'Ep_sum',
                                                'value' => $data->Ep_sum,
                                                'unit' => 'kWh',
                                            ],
                                            'Ep_net' => [
                                                'label' => 'Ep_net',
                                                'value' => $data->Ep_net,
                                                'unit' => 'kWh',
                                            ],
                                            'Eq_sum' => [
                                                'label' => 'Eq_sum',
                                                'value' => $data->Eq_sum,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eq_net' => [
                                                'label' => 'Eq_net',
                                                'value' => $data->Eq_net,
                                                'unit' => 'kvarh',
                                            ],
                                            'Es' => ['label' => 'Es', 'value' => $data->Es, 'unit' => 'kVAh'],
                                            'Epa_Imp' => [
                                                'label' => 'Epa_Imp',
                                                'value' => $data->Epa_Imp,
                                                'unit' => 'kWh',
                                            ],
                                            'Epa_Exp' => [
                                                'label' => 'Epa_Exp',
                                                'value' => $data->Epa_Exp,
                                                'unit' => 'kWh',
                                            ],
                                            'Epb_Imp' => [
                                                'label' => 'Epb_Imp',
                                                'value' => $data->Epb_Imp,
                                                'unit' => 'kWh',
                                            ],
                                            'Epb_Exp' => [
                                                'label' => 'Epb_Exp',
                                                'value' => $data->Epb_Exp,
                                                'unit' => 'kWh',
                                            ],
                                            'Epc_Imp' => [
                                                'label' => 'Epc_Imp',
                                                'value' => $data->Epc_Imp,
                                                'unit' => 'kWh',
                                            ],
                                            'Epc_Exp' => [
                                                'label' => 'Epc_Exp',
                                                'value' => $data->Epc_Exp,
                                                'unit' => 'kWh',
                                            ],
                                            'Eqa_Imp' => [
                                                'label' => 'Eqa_Imp',
                                                'value' => $data->Eqa_Imp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eqa_Exp' => [
                                                'label' => 'Eqa_Exp',
                                                'value' => $data->Eqa_Exp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eqb_Imp' => [
                                                'label' => 'Eqb_Imp',
                                                'value' => $data->Eqb_Imp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eqb_Exp' => [
                                                'label' => 'Eqb_Exp',
                                                'value' => $data->Eqb_Exp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eqc_Imp' => [
                                                'label' => 'Eqc_Imp',
                                                'value' => $data->Eqc_Imp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Eqc_Exp' => [
                                                'label' => 'Eqc_Exp',
                                                'value' => $data->Eqc_Exp,
                                                'unit' => 'kvarh',
                                            ],
                                            'Esa' => ['label' => 'Esa', 'value' => $data->Esa, 'unit' => 'kVAh'],
                                            'Esb' => ['label' => 'Esb', 'value' => $data->Esb, 'unit' => 'kVAh'],
                                            'Esc' => ['label' => 'Esc', 'value' => $data->Esc, 'unit' => 'kVAh'],
                                            'PhsAngV2toV1' => [
                                                'label' => 'PhsAngV2toV1',
                                                'value' => $data->PhsAngV2toV1,
                                                'unit' => 'deg',
                                            ],
                                            'PhsAngV3toV1' => [
                                                'label' => 'PhsAngV3toV1',
                                                'value' => $data->PhsAngV3toV1,
                                                'unit' => 'deg',
                                            ],
                                            'PhsAngI1toV1' => [
                                                'label' => 'PhsAngI1toV1',
                                                'value' => $data->PhsAngI1toV1,
                                                'unit' => 'deg',
                                            ],
                                            'PhsAngI2toV1' => [
                                                'label' => 'PhsAngI2toV1',
                                                'value' => $data->PhsAngI2toV1,
                                                'unit' => 'deg',
                                            ],
                                            'PhsAngI3toV1' => [
                                                'label' => 'PhsAngI3toV1',
                                                'value' => $data->PhsAngI3toV1,
                                                'unit' => 'deg',
                                            ],
                                            // Add other fields you want to display here
                                        ];
                                    @endphp
                                    <table class="table table-striped">
                                        @foreach ($attributes as $attribute)
                                            <tr>
                                                <td class="col-5 p-1"><span
                                                        class="d-block fw-medium mb-1">{{ $attribute['label'] }}</span></td>
                                                <td class="col-1 p-1"><span
                                                        class="d-block fw-medium mb-1 d-flex justify-content-start p-0">:</span>
                                                </td>
                                                <td class="col-5 p-1"><span
                                                        class="d-block fw-medium mb-1 d-flex justify-content-end p-0">{{ $attribute['value'] }}</span>
                                                </td>
                                                <td class="col-1 p-1"><span
                                                        class="d-block fw-medium mb-1 d-flex justify-content-end p-0">{{ $attribute['unit'] }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>


    </div>
@endsection
