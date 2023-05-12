
<script src="../../assets/js/main/main.js"></script>

    <div class="container-fluid mt-15">

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">

            <div class="col col-lg-4">
                <div class="card mb-15">
                    <div class="card-body">
                        <span class="badge bg-success float-right">온도</span>
                        <h6 id="" class="card-title text-muted mb-10"></h6>
                        <p class="text-muted mb-0">최고온도
                            <span class="float-right"> <i id="maxTa" class="fas fa-angle-up text-success"></i></span>
                        </p>
                        <p class="text-muted mb-0">최저온도
                            <span class="float-right"> <i id="minTa" class="fas fa-angle-down text-success"></i></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col col-lg-4">
                <div class="card mb-15">
                    <div class="card-body">
                        <h6 id="" class="card-title text-muted mb-10"></h6>
                        <p class="text-muted mb-0">강수량
                            <span class="float-right"></span>
                        </p>
                        <p class="text-muted mb-0">습도
                            <span class="float-right"></span>
                        </p>
                        <p class="text-muted mb-0">풍속
                            <span class="float-right"></span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    
<!-- 달력 ----------------------------------------------------------------------------------------------------------->      
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card mb-15">

                        <div id="calendar-wrap">
                            <header class="text-center">
                                <h1><span class="badge bg-primary">3월</span></h1>
                            </header>
                            <div id="calendar">
                                <ul class="weekdays">
                                    <li>Sunday</li>
                                    <li>Monday</li>
                                    <li>Tuesday</li>
                                    <li>Wednesday</li>
                                    <li>Thursday</li>
                                    <li>Friday</li>
                                    <li>Saturday</li>
                                </ul>

                                <!-- Days from previous month -->

                                <ul class="days">
                                    <li class="day other-month">
                                        <div class="date">27</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">28</div>
                                        <div class="event">
                                            <div class="event-desc">
                                                HTML 5 lecture with Brad Traversy from Eduonix
                                            </div>
                                            <div class="event-time">
                                                1:00pm to 3:00pm
                                            </div>
                                        </div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">29</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">30</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">31</div>    					
                                    </li>

                                    <!-- Days in current month -->

                                    <li class="day">
                                        <div class="date">1</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">2</div>
                                        <div class="event">
                                            <div class="event-desc">
                                                Career development @ Community College room #402
                                            </div>
                                            <div class="event-time">
                                                2:00pm to 5:00pm
                                            </div>
                                        </div>     					
                                    </li>
                                </ul>

                                    <!-- Row #2 -->

                                <ul class="days">
                                    <li class="day">
                                        <div class="date">3</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">4</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">5</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">6</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">7</div>
                                        <div class="event">
                                            <div class="event-desc">
                                                Group Project meetup
                                            </div>
                                            <div class="event-time">
                                                6:00pm to 8:30pm
                                            </div>
                                        </div>     					
                                    </li>
                                    <li class="day">
                                        <div class="date">8</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">9</div>    					
                                    </li>
                                </ul>

                                    <!-- Row #3 -->

                                <ul class="days">
                                    <li class="day">
                                        <div class="date">10</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">11</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">12</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">13</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">14</div><div class="event">
                                            <div class="event-desc">
                                                Board Meeting
                                            </div>
                                            <div class="event-time">
                                                1:00pm to 3:00pm
                                            </div>
                                        </div>     					
                                    </li>
                                    <li class="day">
                                        <div class="date">15</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">16</div>    					
                                    </li>
                                </ul>

                                    <!-- Row #4 -->

                                <ul class="days">
                                    <li class="day">
                                        <div class="date">17</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">18</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">19</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">20</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">21</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">22</div>
                                        <div class="event">
                                            <div class="event-desc">
                                                Conference call
                                            </div>
                                            <div class="event-time">
                                                9:00am to 12:00pm
                                            </div>
                                        </div>     					
                                    </li>
                                    <li class="day">
                                        <div class="date">23</div>    					
                                    </li>
                                </ul>

                                        <!-- Row #5 -->

                                <ul class="days">
                                    <li class="day">
                                        <div class="date">24</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">25</div>
                                        <div class="event">
                                            <div class="event-desc">
                                                Conference Call
                                            </div>
                                            <div class="event-time">
                                                1:00pm to 3:00pm
                                            </div>
                                        </div>     					
                                    </li>
                                    <li class="day">
                                        <div class="date">26</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">27</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">28</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">29</div>    					
                                    </li>
                                    <li class="day">
                                        <div class="date">30</div>    					
                                    </li>
                                </ul>

                                <!-- Row #6 -->

                                <ul class="days">
                                    <li class="day">
                                        <div class="date">31</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">1</div> <!-- Next Month -->    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">2</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">3</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">4</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">5</div>    					
                                    </li>
                                    <li class="day other-month">
                                        <div class="date">6</div>    					
                                    </li>
                                </ul>

                            </div><!-- /. calendar -->
                        </div><!-- /.calendar wrap -->
                    </div>         
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8 col-md-12">

                    <div class="card mb-15">
                            <div class="card-header bg-transparent py-15 text-center" style="font-size:50px"><b>농부 일정 리스트</b></div>

                            <div class="table-responsive">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>날짜</th>
                                            <th>날씨</th>
                                            <th>제목</th>
                                            <th>일정</th>
                                            <th>중요도</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                2023-04-13 10:10:10 AM
                                            </td>

                                            <td>
                                                햇님
                                            </td>

                                            <td>
                                                고구마밭 
                                            </td>

                                            <td>
                                                비닐 씌우기
                                            </td>

                                            <td>
                                                <span class="badge bg-danger">별이 다섯개</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <button class="btn btn-default btn-sm btn-icon btn-transparent font-xl"
                                                        type="button" id="d350ad" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="d350ad">
                                                            <a class="dropdown-item" href="#">View</a>
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Detele</a>
                                                        </div>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>
                                                2023-04-13 10:10:10 AM
                                            </td>

                                            <td>
                                                햇님
                                            </td>

                                            <td>
                                                고구마밭 
                                            </td>

                                            <td>
                                                비닐 씌우기
                                            </td>

                                            <td>
                                                <span class="badge bg-info">중요</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <button class="btn btn-default btn-sm btn-icon btn-transparent font-xl"
                                                        type="button" id="d350ad" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="d350ad">
                                                            <a class="dropdown-item" href="#">View</a>
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Detele</a>
                                                        </div>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>
                                                2023-04-13 10:10:10 AM
                                            </td>

                                            <td>
                                                햇님
                                            </td>

                                            <td>
                                                고구마밭 
                                            </td>

                                            <td>
                                                비닐 씌우기
                                            </td>

                                            <td>
                                                <span class="badge bg-warning">낮음</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <button class="btn btn-default btn-sm btn-icon btn-transparent font-xl"
                                                        type="button" id="d350ad" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="d350ad">
                                                            <a class="dropdown-item" href="#">View</a>
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Detele</a>
                                                        </div>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                </table>

                                </table>
                            </div>
                        </div>   
                    </div>


                <div class="col-lg-4 col-md-12">

                    <div class="card mb-15">
                        <div class="card-header bg-transparent py-15"  style="font-size:30px"><b>이번달 대표일정</b></div>

                        <div class="card-body">
                            <div class="mb-15">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="float-right mt-10">
                                            <button class="btn btn-outline-primary btn-sm">보러가기</button>
                                        </div>
                                        <h6 class="my-3">율이 맛있는거 사주기</h6>
                                        <small class="text-muted">족발</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>


            <!-- <div id="modal-download" tabindex="-1" role="dialog" aria-labelledby="BottomRightLabel" class="modal fade"
                aria-hidden="true">
                <div class="modal-dialog modal-bottom-right" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="card border-0 mb-0">
                                <img class="card-img" src="https://i.imgur.com/gWYKl5Fm.png">

                                <div class="card-body">
                                    Need to download the source files?
                                </div>
                            </div>
                            <div class="mb-15">
                                <a target="_blank"
                                    href="https://github.com/Morioh-Lab/morioh"
                                    class="btn btn-primary btn-block">
                                    Download
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div> -->


        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/highcharts@8.0.0/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.11/dist/jquery.knob.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sparkline@2.4.0/jquery.sparkline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/peity@3.3.0/jquery.peity.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50750921-19"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-50750921-19');
    </script>



    <script src="../../js/morioh.js"></script>

    <script>

        $(function () {

            $('#modal-download').modal('show');




            $(".bar").peity("bar");


            // knob

            $(".knob").knob();


            // sparkline bar
            $('.sparkline-bar').sparkline('html', {
                type: 'bar',
                barWidth: 10,
                height: 65,
                barColor: '#3b73da',
                chartRangeMax: 12
            });

            $('.sparkline-line').sparkline('html', {
                width: 120,
                height: 65,
                lineColor: '#3b73da',
                fillColor: false
            });

            /************** AREA CHARTS ********************/


            $('.sparkline-area').sparkline('html', {
                width: 120,
                height: 65,
                lineColor: '#3b73da',
                fillColor: 'rgba(59, 115, 218,0.2)'
            });


            $('.sparkline').sparkline('html', {
                width: '100%',
                height: 80,
                lineColor: '#3b73da',
                fillColor: 'rgba(59, 115, 218,0.2)'
            });



            Highcharts.chart('hl-pie-ref', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: false
                    }
                },
                series: [{
                    name: 'Referrals',
                    colorByPoint: true,
                    data: [{
                        name: 'Google',
                        y: 30.5,
                        sliced: true,
                        // selected: true
                    }, {
                        name: 'Twiter',
                        y: 25.5
                    }, {
                        name: 'Morioh',
                        y: 16
                    }, {
                        name: 'Facebook',
                        y: 8
                    }, {
                        name: 'Pinterest',
                        y: 4
                    }, {
                        name: 'Other',
                        y: 7.05
                    }]
                }]
            });



            Highcharts.chart('hl-line-main', {

                title: {
                    text: ''//'Stats of last 30 days'
                },

                // subtitle: {
                //     text: 'Source: thesolarfoundation.com'
                // },

                yAxis: {
                    title: {
                        text: 'Traffics of Month'
                    }
                },
                // legend: {
                //     // layout: 'vertical',
                //     // align: 'right',
                //     verticalAlign: 'middle'
                // },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },

                series: [
                    {
                        name: 'Views',
                        data: [8050, 8500, 8600, 8800, 8600, 9000, 9100, 9100, 9500, 9400, 9800, 9900, 10000, 9800, 9600, 9000, 8800, 9600, 9800, 10000, 11000, 11200, 11400, 11400]
                    },
                    {
                        name: 'Orders',
                        data: [1000, 1100, 1210, 1110, 1150, 1200, 1400, 1500, 1350, 1300, 1200, 1250, 1260, 1390, 1289, 1120, 1200, 1300, 1310, 1350, 1350, 1400, 1300, 1400]
                    }, {
                        name: 'Members',
                        data: [3000, 3200, 4000, 3000, 3500, 6000, 5000, 3450, 5460, 7000, 6000, 6500, 5500, 8000, 7000, 9000, 8000, 7000, 8000, 9000, 9100, 9200, 9300, 9400]
                    }, {
                        name: 'Income',
                        data: [1000, 2200, 2300, 3000, 2500, 2300, 3000, 3200, 2600, 2800, 2700, 2650, 2600, 2800, 2500, 2500, 3000, 3100, 3300, 3000, 3200, 3000, 3200, 3300]
                    }],

                responsive: {
                    rules: [{
                        // condition: {
                        //     maxWidth: 500
                        // },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        })

    </script>


</body>

</html>