<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="https://i.morioh.com/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://i.morioh.com/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://i.morioh.com/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://i.morioh.com/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://i.morioh.com/favicon/safari-pinned-tab.svg" color="#262521">
    <link rel="shortcut icon" href="https://i.morioh.com/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#faa700">
    <meta name="msapplication-config" content="https://i.morioh.com/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <meta name="twitter:title" content="Morioh Responsive Template with Bootstrap 4, HTML5 and Vue.js">
    <meta name="twitter:description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta name="twitter:image" content="https://i.imgur.com/gWYKl5F.png">
    <meta property="twitter:card" content="summary_large_image">


    <meta property="og:title" content="Morioh Responsive Template with Bootstrap 4, HTML5 and Vue.js">
    <meta property="og:image" content="https://i.imgur.com/gWYKl5F.png">
    <meta property="og:description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">

    <title>Morioh Responsive Template with Bootstrap 4, HTML5 and Vue.js</title>
    <meta itemprop="description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta itemprop="image" content="https://i.imgur.com/gWYKl5F.png">

    <meta name="description" content="Morioh Theme is Bootstrap responsive template free download">
    <meta name="image" content="https://i.imgur.com/gWYKl5F.png">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@4.7.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.7.2/animate.min.css">

    <link rel="stylesheet" href="../../assets/css/morioh.css">

    <!-- css -->
    <link rel="stylesheet" href="../../assets/css/calendar.css">
    <!-- css -->

    
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="../../assets/js/base/base.js"></script>
    <script src="../../assets/js/base/common.js"></script>
    <!-- js -->

</head>

<body class="menubar-enabled navbar-top-fixed">

    <div class="wrapper">

        <div class="main-navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">

            <button class="btn d-md-none" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>


            <img src="../../assets/images/profile.png" title="Morioh" class="navbar-logo d-md-none"
                style="height: 36px;">


            <button class="btn d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

             <!--상단 메뉴바-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto hidden-sm-down">

                    <li class="nav-item mr-5">
                        <a href="javascript://" class="nav-icon font-2xl" id="navbar-toggler">
                            <!-- <i class="fas fa-bars"></i> -->
                            <!-- <i class="mdi mdi-view-sequential font-2xl"></i> -->

                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                </ul>

                  <!--오른쪽 상단 메뉴바-->
                <ul class="navbar-nav my-2 my-lg-0">

                    <?php
                    if($login_in){
                    ?>
                        <!-- 알림 숫자-->
                        <li class="nav-item mr-10 dropdown">
                            <span class="badge bg-danger">1</span>
                            <a class="nav-icon font-2xl" href="#" id="QBDX05" role="button" data-toggle="dropdown"
                                aria-expanded="false" data-flip="false">
                                <i class="mdi mdi-bell-ring-outline"></i>
                                
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 w-400" 
                                aria-labelledby="QBDX05">
                                
                                <!-- 알림 -->
                                <div class="card mb-15">
                                    <div class="card-header">
                                        <a href="javascript://" class="float-right text-body">
                                            Mask as read
                                        </a>
                                        알림
                                    </div>

                                    <div class="perfect-scrollbar position-relative" style="max-height: 400px;">

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="d-flex">
                                                    <a href="javascript://" class="avatar mr-10">
                                                        <img src="../../assets/images/profile.png" alt="...">
                                                    </a>
                                                    <div class="flex-fill">
                                                        <div><strong>기상 중요알림</strong> 금일 폭염 주의보 </div>
                                                        <span class="text-muted">최고 온도 오후2시 38도 </span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-footer text-center border-0">
                                        <a href="javascript://" class="text-body">
                                            상세보기
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </li>

                        <!-- 마이 페이지 -->
                        <li class="nav-item mr-10 dropdown">
                            <a href="#" class="nav-icon avatar rounded-circle" id="PJXN7R" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/images/dodam.jpg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="PJXN7R">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-account-circle-outline"></i>마이 페이지</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-settings-outline"></i>설정</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/auth/logout"><i class="mdi mdi-exit-to-app"></i>로그아웃</a>
                            </div>
                        </li>

                    <?php
                    }else{
                    ?>    
                        <li class="nav-item mr-10 dropdown">
                            <a href="#" class="nav-icon avatar rounded-circle" id="PJXN7R" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="PJXN7R">
                                <a class="dropdown-item" href="/auth/login">
                                <i class="mdi mdi-exit-to-app"></i>로그인
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/auth/signup">
                                    <i class="mdi mdi-account-circle-outline"></i>회원가입
                                </a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                       
                </ul>

            </div>
        </div>
        <!--왼쪽 사이드 메뉴바-->
        <div class="menubar menubar-dark" id="main-menu">

            <div class="menubar-header text-center bg-primary">
                <a class="menubar-brand" href="/main" style="background-color:#8e352e;">
                    <img src="../../assets/images/dodam.jpg" title="Morioh" class="menubar-logo"
                        style="height: 50px;">
                </a>
            </div>

            <div class="menubar-body">
                 
                <ul class="menu accordion">
                    
                    <li class="menu-item">
                        <a href="/year_calendar" class="menu-link">
                            <!-- <i class="menu-icon fas fa-info"></i> -->
                            <!-- <i class="menu-icon fas fa-seedling"></i> -->
                            <i class="menu-icon mdi mdi-code-braces-box"></i>
                            <span class="menu-label">2023 전체 달력</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/farm_list" class="menu-link">
                            <!-- <i class="menu-icon fas fa-fill-drip"></i> -->

                            <i class="menu-icon mdi mdi-format-size"></i>
                            <!-- <i class="fas fa-heading"></i> -->
                            <span class="menu-label">일지 목록</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/farm_diary" class="menu-link">
                            <!-- <i class="menu-icon fas fa-fill-drip"></i> -->

                            <i class="menu-icon mdi mdi-format-size"></i>
                            <!-- <i class="fas fa-heading"></i> -->
                            <span class="menu-label">일지 쓰러가기</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="photo_album" class="menu-link">
                            <!-- <i class="menu-icon fas fa-magic"></i> -->
                            <i class="menu-icon mdi mdi-view-dashboard"></i>
                            <span class="menu-label">앨범</span>
                            <span class="menu-badge">
                                <span class="badge bg-info">1</span>
                            </span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="menubar-footer bg-dark p-10">
                <a href="https://morioh.com" class="d-block text-truncate">&copy Morioh <span id="version"></span></a>
            </div>

        </div>

        <!-- 메뉴바 끝 -->
