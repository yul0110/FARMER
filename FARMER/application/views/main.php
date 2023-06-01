
<script src="../../assets/js/main/main.js?ver=7"></script><!-- php 오류 JS파일이 수정후에도 그래로면 버전을 바꿔준다 ?ver=1 숫자는 아무거나 -->

    <div class="container-fluid mt-15">

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">

            <div class="col col-lg-4">
                <div class="card mb-15">
                    <div class="card-body">
                        <span class="badge bg-success float-right">온도</span>
                        <h6 id="" class="card-title text-muted mb-10">2023.5.18</h6>
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
                                <h1>                                
                                    <button id='btnPrev' type="button" class="btn btn-outline-danger btnMove" data-cm=0>
                                        <i class="mdi mdi-chevron-left"></i>
                                    </button>
                                    &nbsp;&nbsp;
                                    <span id='calendarMonth' class="badge month" style="background-color:#8e352e;">0월</span>
                                    <input id='nowYear' type="hidden" value=0 />
                                    <input id='nowMonth' type="hidden" value=0 />
                                    <input id='updateMonth' type="hidden" value=0/>
                                    &nbsp;&nbsp;
                                    <button id='btnNext' type="button" class="btn btn-outline-danger btnMove" data-cm=0>
                                        <i class="mdi mdi-chevron-right"></i>
                                    </button>
                                </h1>
                                
                            </header>
                            <div id="calendar">
                                <!-- tmpl zone -->
                                <!-- tmpl zone -->
                                <!-- tmpl zone -->
                                <!-- tmpl zone -->
                                <!-- tmpl zone -->
                            </div>
                        </div>
                    </div>         
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8 col-md-12">

                    <div class="card mb-15">
                            <div class="card-header bg-transparent py-15 text-center" style="font-size:50px"><b>일정 리스트</b></div>

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
        </div>
    </div>

<!----------------------------------------------------------------- templ --------------------------------------------------------------->

    <!-- calendar head tmpl -->
    <div class="calendar">
        <ul id="weekNode" class="weekdays" style='display:none;'>
            <li class="sun">일요일</li>
            <li class="mon" >월요일</li>
            <li class="tue">화요일</li>
            <li class="wed">수요일</li>
            <li class="thur">목요일</li>
            <li class="fri">금요일</li>
            <li class="sat">토요일</li>
        </ul>
    </div>
    <!--END calendar head tmpl -->

    <!-- day pool tmpl -->
    <ul id='calendarNode' class="days" style='display:none;'>

    </ul>
    <!--END day pool tmpl -->

    <!-- day tmpl -->
    <div class="calendar">
        <ul class="days" style='display:none;'>

            <li id='calendarDayNode' class="day">
                <div class="calendarDay dayNum">27</div>
                <div>
                    <img src="assets/images/cloudy.png" class="daySky" style="max-width:30px; max-height:30px;">  
                    <i class="mdi mdi-arrow-down font-2xl" class="dayTmn" style="color:#2E9AFE;"></i>15 / 
                    <i class="mdi mdi-arrow-up font-2xl" class="dayTMX" style="color:#FA5858;"></i>35 
                </div>
            </li>

        </ul>
    </div>
    <!--END day tmpl -->


<!-- templ  -->

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/dist/perfect-scrollbar.min.js"></script>
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

</body>

</html>