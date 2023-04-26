
        <script src="../../assets/js/farm_diary/farm_diary.js"></script>

        <div class="container-fluid mt-15">

            <div class="card mb-15">
                <div class="card-body">
                    <h2>농사일지</h2>
                    <br>                  
                    <hr>
                    <br>
                    <div class="form-file">
                        <input id="img" type="file" class="form-file-input" id="customFile">
                        <label class="form-file-label" for="customFile">
                            <span class="form-file-text">이미지</span>
                            <span class="form-file-button">파일 찾기</span>
                        </label>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <br>
                    <form role="form" class="form-horizontal">

                        <div class="mb-15">
                                <label class="col-sm-2 col-form-label" for="date">날짜 선택</label>  
                                    <input type="date" id="nowDate" value="">
                            </div>
                            <br>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label" for="example-input-normal">일지 제목</label>
                            <div class="col-sm-10">
                                <input type="text" id="title" name="example-input-normal"
                                    class="form-control " placeholder="일지 제목을 입력해주세요">
                            </div>
                        </div>
                        <br>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label" for="example-input-normal">내용</label>
                            <div class="col-sm-10">
                                <textarea id="contents" class="form-control" rows="2" placeholder="일지 내용을 입력해주세요"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="mb-15">

                            <button id="upload_ajax" type="button" class="btn btn-block btn-outline-primary">
                                일지 올리기
                            </button>

                        </div>
                        <br>

                    </form>

                </div>
            </div>

        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/dist/perfect-scrollbar.min.js"></script>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-50750921-19');
        </script>

        <script src="../../js/morioh.js"></script>

    </body>
</html>