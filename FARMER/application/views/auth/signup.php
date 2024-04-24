<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
    <title>회원가입</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>회원가입</title>
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
    <link rel="stylesheet" href="../../../assets/css/login.css">
    <!-- css -->

    <!-- JS -->
    <script src="../../../assets/js/base/base.js?ver=33"></script>
    <script src="../../../assets/js/base/common.js?ver=33"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- JS -->


  <script>
  window.console = window.console || function(t) {};
</script>
  
</head>

<!--JS, CSS 캐시 방지처리 .js?ver=1111 -->
<script src="../../../assets/js/join/join.js?ver=33"></script>

<body translate="no">
  <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">

                <div class="col-lg-12 login-key">    
                </div>
                
                <div class="col-lg-12 login-title">
                    <p style="font-size: 40px;">회원가입</p>
                </div>
                </br>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>

                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">이름 [한글로 작성해주세요^^]</label>
                                <input type="text" id="nm" class="form-control" maxlength="10" oninput="this.value=this.value.replace(/[^ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/g,'');" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">별명</label>
                                <input type="text" id="nickName" class="form-control" maxlength="10" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">비밀번호 [ 8~30자 영문,숫자,특수문자!@#$%^*,./ ]</label>
                                <input type="password" id="pw" class="form-control" i="" maxlength="30" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">비밀번호 확인</label>
                                <input type="password" id="pwc" class="form-control" i="" maxlength="30"  required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">휴대폰번호</label>
                                <input type="text" id="pno" class="form-control" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            
                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-btm login-button">
                                        <button type="button" id="pnoCheck" class="btn btn-outline-primary">중복확인</button>
                                        <input type="hidden" id="pnoCheckFlag"/>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">메일주소</label>
                                <input type="text" id="userId" class="form-control" required>

                                <!-- <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-btm login-button ">
                                        <button type="button" id="emailPushAjax" class="btn btn-outline-primary">인증번호 발송</button>
                                    </div>
                                </div> -->

                                <label class="form-control-label" style="font-size: 20px;">인증번호</label>
                                <input type="text" id="userCode" class="form-control" required>
                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-btm login-button ">
                                        <button type="button" id="checkCode" class="btn btn-outline-primary">인증번호 확인</button>       
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-control-label" style="font-size: 20px;">주소</label>
                                <input type="text" id="branchCode" class="form-control"  maxlength="50" required>
                            </div>
                            <br>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-12 login-btm login-button">
                                    <button type="button" id="join_ajax" class="btn btn-outline-primary" style="width:100%">회원가입</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="col-lg-12 login-key">    
                </div>

            </div>

            
        </div>
    </div>
</body>
</html>