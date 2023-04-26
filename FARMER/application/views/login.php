
    <script src="../../assets/js/login/login"></script>
       
       <div class="container-fluid mt-15">

        <div class="row2 row justify-content-center align-items-center"> 
				<div class="col-lg-9 text-center mt-5" >
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<h1 class="heading" data-aos="fade-up">로그인</h1>
					<br>
                    <br>
					<form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3 text-center" data-aos="fade-up" data-aos-delay="200">
						<input type="text" id="userIdData" class="form-control px-4" width="5px" maxlength="15" placeholder="아이디를 입력해주세요.">
					</form>
                    <br>
                    <br>
					<form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
						<input type="password" id="userpwData"  class="form-control px-4"   placeholder="비밀번호를 입력해주세요.">		
					</form>
					<br>
					<button type="button" id="loginCheckAjax" class="btn btn-primary" style="width:10em" >로그인</button>
					<br>
					<br>
					<br>
				</div>
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