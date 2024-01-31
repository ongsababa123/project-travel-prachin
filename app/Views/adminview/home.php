<title>หน้าหลัก</title>

<style>
    .col-lg-custome {
        -ms-flex: 0 0 16.666667%;
        flex: 1 0 19.666667%;
        max-width: 20.666667%;
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>หน้าหลัก
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a>หน้าหลัก</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">ยอดเข้าชมบทความ</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">ยอดเข้าชมตามประเภท</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart_type"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">ยอดเข้าชมข่าวสาร</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart_news"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <script src="<?= base_url('plugins/chart.js/Chart.min.js') ?>"></script>
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        var data_type_travel = <?php echo json_encode($data_type_travel); ?>;
        var data_article = <?php echo json_encode($data_article); ?>;
        var data_news = <?php echo json_encode($data_news); ?>;
    </script>
    <script>
        $(function () {
            var areaChartData_article = {
                labels: ['ยอดเข้าชม'],
                datasets: []
            };

            data_article.forEach(element => {
                var dataset_article = {
                    label: element.topic,
                    backgroundColor: getRandomColor(),
                    borderColor: getRandomColor(),
                    pointRadius: false,
                    pointColor: getRandomColor(),
                    pointStrokeColor: getRandomColor(),
                    pointHighlightFill: getRandomColor(),
                    pointHighlightStroke: getRandomColor(),
                    data: [element.view_count]
                };
                areaChartData_article.datasets.push(dataset_article);
            });

            var areaChartData_type = {
                labels: ['ยอดเข้าชม'],
                datasets: []
            };
            data_type_travel.forEach(element => {
                var dataset_type = {
                    label: element.name_travel,
                    backgroundColor: getRandomColor(),
                    borderColor: getRandomColor(),
                    pointRadius: false,
                    pointColor: getRandomColor(),
                    pointStrokeColor: getRandomColor(),
                    pointHighlightFill: getRandomColor(),
                    pointHighlightStroke: getRandomColor(),
                    data: [element.count_view_type]
                };
                areaChartData_type.datasets.push(dataset_type);
            });

            var areaChartData_new = {
                labels: ['ยอดเข้าชม'],
                datasets: []
            };
            data_news.forEach(element => {
                var dataset_new = {
                    label: element.topic_news,
                    backgroundColor: getRandomColor(),
                    borderColor: getRandomColor(),
                    pointRadius: false,
                    pointColor: getRandomColor(),
                    pointStrokeColor: getRandomColor(),
                    pointHighlightFill: getRandomColor(),
                    pointHighlightStroke: getRandomColor(),
                    data: [element.view_count]
                };
                areaChartData_new.datasets.push(dataset_new);
            });

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartCanvas_type = $('#barChart_type').get(0).getContext('2d')
            var barChartCanvas_news = $('#barChart_news').get(0).getContext('2d')

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            min: 0
                        }
                    }]
                }
            };

            new Chart(barChartCanvas, {
                type: 'bar',
                data: areaChartData_article,
                options: barChartOptions
            })

            new Chart(barChartCanvas_type, {
                type: 'bar',
                data: areaChartData_type,
                options: barChartOptions
            })

            new Chart(barChartCanvas_news, {
                type: 'bar',
                data: areaChartData_new,
                options: barChartOptions
            })

        })
    </script>