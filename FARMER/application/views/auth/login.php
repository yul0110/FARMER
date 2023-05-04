<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
    <title>로그인</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>로그인</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    
    <!-- css -->
    <link rel="stylesheet" href="../../assets/css/login.css">
    <!-- css -->

    <!-- JS -->
    <script src="../../assets/js/base/base.js"></script>
    <script src="../../assets/js/base/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- JS -->

  <script>
  window.console = window.console || function(t) {};
</script>
  
</head>
<script src="../../assets/js/login/login.js"></script>

<body translate="no">
  <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-2">
            </div>

            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    <h1>로그인</h1>
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>

                            <div class="form-group">
                                <label class="form-control-label">메일</label>
                                <input type="text" id="userId" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control-label">비밀번호</label>
                                <input type="password" id="pw" class="form-control" i="">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-12 login-btm login-button">
                                    <button type="button" id="login_ajax" class="btn btn-outline-primary" style="width:100%">로그인</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-lg-12 loginbttm">

                    <div class="col-lg-12 login-btm2">
                        <button type="button" class="btn btn-outline-primary">아이디찾기</button>
                        <input type="hidden" id="idCheckFlag"/>
                        <button type="button" id="emailCheck" class="btn btn-outline-primary">비밀번호찾기</button>
                        <input type="hidden" id="pwCheckFlag"/>
                    </div>
                    </br>
                    </br>
                </div>

            </div> 

        </div>
    </div>
</body>
</html>