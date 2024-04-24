
<script src="../../assets/js/main/main.js?ver=12"></script><!-- php 오류 JS파일이 수정후에도 그래로면 버전을 바꿔준다 ?ver=1 숫자는 아무거나 -->

    <div class="container-fluid mt-15">

<!------------------------------------------------달력-------------------------------------------------------->      
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





<!-- list zone --><!-- list zone --><!-- list zone --><!-- list zone --><!-- list zone --><!-- list zone --><!-- list zone --><!-- list zone -->

            <div id='todayDiaryListZone' class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="card mb-15">
                        <div class="card-header bg-transparent py-15 text-center" style="font-size:50px"><b>오늘의 일지</b></div>
                        <div class="card-header py-8 text-center"></div>

                            <div id="todayDiaryList">
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



        </div>
    </div>



<!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ -->





    <!-- calendar head tmpl -->
    <div class="calendar">
        <ul id="weekNode" class="weekdays" style='display:none;'>
            <li class="sun">일요일</li>
            <li class="mon">월요일</li>
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

            <li id='calendarDayNode' class="day" data-datenum="">
                <div class="calendarDay dayNum">일자</div>
                <div>
                    <img src="" class="daySky" style="max-width:30px; max-height:30px;">  
                    <span class="mdi mdi-arrow-down font-2xl dayTmn" style="color:#2E9AFE;">/ 0</span>
                    <span class="mdi mdi-arrow-up font-2xl dayTmx" style="color:#FA5858;">0</span>
                </div>
                <div class="diaryLevel">
                <!-- tmpl zone -->
                <!-- tmpl zone -->
                <!-- tmpl zone -->
                <!-- tmpl zone -->
                <!-- tmpl zone -->
                </div>
            </li>

        </ul>
    </div>

    
    <!--END day tmpl -->

    <!--diary warning tmpl -->
    <span class="badge bg-warning easyNode badgeList" style='display:none;'>보통</span>
    <!--END warning tmpl -->

    <!--diary nomal tmpl -->
    <span class="badge bg-success nomalNode badgeList" style='display:none;'>중요</span>
    <!--END nomal tmpl -->

    <!--diary danger tmpl -->
    <span class="badge bg-danger hardNode badgeList" style='display:none;'>매우중요</span>
    <!--END danger tmpl -->





    
    <!--today list tmpl --> <!--today list tmpl --> <!--today list tmpl --> <!--today list tmpl -->  <!--today list tmpl -->
    <div id="diaryNode" class="todayList" style="display:none;">
        <div class="card-body">
            <div class="mb-15">
                <div class="d-flex">
                    <div class="flex-fill"> 

                        <div class="difficultyLevel">
                            <!-- tmpl zone -->
                            <!-- tmpl zone -->
                            <!-- tmpl zone -->
                        </div>

                        <div class="float-right mt-10 way">
                            <input type='hidden' class='did' value=/>
                            <input type='hidden' class='uy' value=/>
                            
                            <small class="text-muted diaryDate">년월일</small>


                            <button class="useYn">일정 진행여부</button>
                        </div>

                        <div>
                            <b><h5 class="my-3 title">제목</h5></b>
                        </div>
                        <br>

                        <div style='max-width:300px; overflow:hidden; word-wrap:break-word;'>
                            <small class="text-muted contents" >일정내용</small>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header py-8 text-center"></div>
    </div>    
    <!--END today list tmpl -->



    <!--list warning tmpl -->
    <h5 id='easyBand'><span class="badge bg-warning" style='display:none;'>보통</span></h5>
    <!--END warning tmpl -->

    <!--list nomal tmpl -->
    <h5 id='nomalBand'><span class="badge bg-success" style='display:none;'>중요</span></h5>
    <!--END nomal tmpl -->

    <!--list danger tmpl -->
    <h5 id='hardBand'><span class="badge bg-danger" style='display:none;'>매우중요</span></h5>
    <!--END danger tmpl -->


<!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ --><!-- templ -->

    


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

    <div id="topGo" style="display: flex; align-items: center; justify-content: center; width: 64px; height: 64px; background: rgb(95, 127, 255); color: white; border-radius: 32px; position: fixed; left: 18px; bottom: 18px; box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 8px; z-index: 9999; cursor: pointer; font-weight: 600; transition: all 0.25s ease 0s; transform: scale(1);">
        <img src="/assets/images/dodam.jpg" alt="top" style="height: 36px; width: 36px; margin: 0; padding: 0;">
    </div>
  



</body>

</html>