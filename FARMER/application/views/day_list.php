
<script src="../../assets/js/day_list/day_list.js?ver=20"></script>

<div class="container-fluid mt-15">

    <div class="row">
        <div class="col-lg-11 col-md-12">

            <div class="card mb-15">
                <div class="card-header bg-transparent py-15 text-center" style="font-size:50px"><b>오늘의 일지</b></div>
                <div class="card-header bg-transparent py-15 text-center" style="font-size:20px"><b><?=$yyyy?>년 <?=$mm?>월 <?=$dd?>일</b></div>
                <div class="card-header py-8 text-center"></div>

                <?php 
                $today_list = sizeof($today_list_arr);
                for($i=0; $i<$today_list; $i++){
                ?>
                    <div class="card-body">
                        <div class="mb-15">
                            <div class="d-flex">
                                <div class="flex-fill"> 

                                <?php
                                if($today_list_arr[$i]['difficultyLevel'] == 1){
                                ?>
                                    <b><h5><span class="badge bg-warning"><?='낮음'?></span></h5></b>
                                <?php
                                }
                                ?>

                                <?php
                                if($today_list_arr[$i]['difficultyLevel'] == 2){
                                ?>
                                    <b><h5><span class="badge bg-success"><?='중요'?></span></h5></b>
                                <?php
                                }
                                ?>

                                <?php
                                if($today_list_arr[$i]['difficultyLevel'] == 3){
                                ?>
                                    <b><h5><span class="badge bg-danger"><?='매우중요'?></span></h5></b>
                                <?php
                                }
                                ?>
                                
                                <div class="float-right mt-10">
                                    <div class="way">
                                    <small class="text-muted"><?=substr($today_list_arr[$i]['updateDt'],0,10)?></small>
                                    <br>
                                    <br>
                                        <input type='hidden' class='did' value='<?=$today_list_arr[$i]['id']?>' />
                                        <input type='hidden' class='uy' value='<?=$today_list_arr[$i]['useYn']?>' />
                                            
                                        <?php
                                        if($today_list_arr[$i]['useYn'] == 'Y'){
                                        ?>
                                            <button class="btn btn-outline-success useYn">일정 진행중</button>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if($today_list_arr[$i]['useYn'] == 'N'){
                                        ?>
                                            <button class="btn btn-outline-warning useYn">&nbsp;일정 종료&nbsp;</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
    
                                <div>
                                    <b><h5 class="my-3"><?=$today_list_arr[$i]['title']?></h5></b>
                                </div>
                                <br>

                                <div style='max-width:300px; overflow:hidden; word-wrap:break-word;'>
                                    <small class="text-muted"><?=$today_list_arr[$i]['contents']?></small>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header py-8 text-center"></div>
                <?php
                    }
                ?>

                </div>
            </div>
        </div>

    </div>
</div>


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