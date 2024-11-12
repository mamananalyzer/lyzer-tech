@extends('base.0layout')

@section('title', 'Labs')

@section('link')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.3/dist/echarts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      <div class="row">
        <div id="Area Chart with Time Axis" style="width: 600px;height:400px;"></div>
        <div id="Stacked Line Chart" style="width: 900px;height:400px;"></div>
        <div id="LineRace" style="width: 900px;height:400px;"></div>

        <script>
            var chartDom = document.getElementById('Area Chart with Time Axis');
            var myChart = echarts.init(chartDom);
            var option;
    
            let base = +new Date(1988, 9, 3);
            let oneDay = 24 * 3600 * 1000;
            let data = [[base, Math.random() * 300]];
            for (let i = 1; i < 20000; i++) {
              let now = new Date((base += oneDay));
              data.push([+now, Math.round((Math.random() - 0.5) * 20 + data[i - 1][1])]);
            }
            option = {
              tooltip: {
                trigger: 'axis',
                position: function (pt) {
                  return [pt[0], '10%'];
                }
              },
              title: {
                left: 'center',
                text: 'Large Ara Chart'
              },
              toolbox: {
                feature: {
                  dataZoom: {
                    yAxisIndex: 'none'
                  },
                  restore: {},
                  saveAsImage: {}
                }
              },
              xAxis: {
                type: 'time',
                boundaryGap: false
              },
              yAxis: {
                type: 'value',
                boundaryGap: [0, '100%']
              },
              dataZoom: [
                {
                  type: 'inside',
                  start: 0,
                  end: 20
                },
                {
                  start: 0,
                  end: 20
                }
              ],
              series: [
                {
                  name: 'Fake Data',
                  type: 'line',
                  smooth: true,
                  symbol: 'none',
                  areaStyle: {},
                  data: data
                }
              ]
            };
    
            option && myChart.setOption(option);
        </script>

        <script>
            var chartDom = document.getElementById('Stacked Line Chart');
            var myChart = echarts.init(chartDom);
            var option;

            option = {
              title: {
                text: 'Stacked Line'
              },
              tooltip: {
                trigger: 'axis'
              },
              legend: {
                data: ['Email', 'Union Ads', 'Video Ads', 'Direct', 'Search Engine']
              },
              grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
              },
              toolbox: {
                feature: {
                  saveAsImage: {}
                }
              },
              xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
              },
              yAxis: {
                type: 'value'
              },
              series: [
                {
                  name: 'Email',
                  type: 'line',
                  stack: 'Total',
                  data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                  name: 'Union Ads',
                  type: 'line',
                  stack: 'Total',
                  data: [220, 182, 191, 234, 290, 330, 310]
                },
                {
                  name: 'Video Ads',
                  type: 'line',
                  stack: 'Total',
                  data: [150, 232, 201, 154, 190, 330, 410]
                },
                {
                  name: 'Direct',
                  type: 'line',
                  stack: 'Total',
                  data: [320, 332, 301, 334, 390, 330, 320]
                },
                {
                  name: 'Search Engine',
                  type: 'line',
                  stack: 'Total',
                  data: [820, 932, 901, 934, 1290, 1330, 1320]
                }
              ]
            };

            option && myChart.setOption(option);
        </script>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
              var chartDom = document.getElementById('LineRace');
              var myChart = echarts.init(chartDom);
              var option;

              // Fetch the data from the local JSON file
              $.get('/data/asset/data/life-expectancy-table.json', function (_rawData) {
                  run(_rawData);
              });

              function run(_rawData) {
                  const countries = [
                      'Finland', 'France', 'Germany', 'Iceland',
                      'Norway', 'Poland', 'Russia', 'United Kingdom'
                  ];

                  const datasetWithFilters = [];
                  const seriesList = [];
                  echarts.util.each(countries, function (country) {
                      var datasetId = 'dataset_' + country;
                      datasetWithFilters.push({
                          id: datasetId,
                          fromDatasetId: 'dataset_raw',
                          transform: {
                              type: 'filter',
                              config: {
                                  and: [
                                      { dimension: 'Year', gte: 1950 },
                                      { dimension: 'Country', '=': country }
                                  ]
                              }
                          }
                      });
                      seriesList.push({
                          type: 'line',
                          datasetId: datasetId,
                          showSymbol: false,
                          name: country,
                          endLabel: {
                              show: true,
                              formatter: function (params) {
                                  return params.value[3] + ': ' + params.value[0];
                              }
                          },
                          labelLayout: { moveOverlap: 'shiftY' },
                          emphasis: { focus: 'series' },
                          encode: {
                              x: 'Year',
                              y: 'Income',
                              label: ['Country', 'Income'],
                              itemName: 'Year',
                              tooltip: ['Income']
                          }
                      });
                  });

                  option = {
                      animationDuration: 10000,
                      dataset: [
                          { id: 'dataset_raw', source: _rawData },
                          ...datasetWithFilters
                      ],
                      title: { text: 'Income of Germany and France since 1950' },
                      tooltip: { order: 'valueDesc', trigger: 'axis' },
                      xAxis: { type: 'category', nameLocation: 'middle' },
                      yAxis: { name: 'Income' },
                      grid: { right: 140 },
                      series: seriesList
                  };

                  myChart.setOption(option);
              }

              option && myChart.setOption(option);
          });
        </script>
      </div>
    </div>
@endsection