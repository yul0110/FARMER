(function() {
	
	var imgNum = 1;
	var imgConfirm = false;

	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		this.clickEvent();
		this.chageEvent(); 
	}

	yul.page.prototype.chageEvent = function() {

		$(document).on('change', '#file_upload', function(){
			
			var imgCount = $('.imgPreview').length; 
			
			//이미지 갯수 벨리데이션
			if(imgCount >= 5){
				alert('리스트 이미지는 최대 5개까지 등록할수있습니다.');
				return false;
			}
			yul.page.imgUploadEvent(this);
			
			//카운트 ++
			imgNum = imgNum +1;
			
			//초기화
			this.value= '';	//같은 이미지가 연속 선택되어도 가져올수있다.
		})
	}
	
	yul.page.prototype.imgUploadEvent = function(node) {
		
		var formData  = new FormData(); //FormData 객체 생성
		var files 	  = node.files;
		//files : 선택한 모든 파일을 나열하는 FileList 객체입니다.
        //multiple 특성을 지정하지 않았다면 두 개 이상의 파일을 포함하지 않습니다.
		console.log(files);			
		
		//add file data to formdata
		for(var i=0; i<files.length; i++){
			formData.append("uploadFile",files[i]); //키,값으로 append 
		}
		$.ajax({
			url			:'common/file_upload',
			processData : false,  //ajax 통신을 통해 데이터를 전송할 때, 기본적으로 key와 value값을 Query String으로 변환해서 보냅니다.
			contentType : false,  // multipart/form-data타입을 사용하기위해 false 로 지정
			type		: 'post',
			data		: formData,
			dataType	: 'json',
			success: function(data){
				//전송에 성공하면 실행될 코드;
				
				nodeDetailCopy	= $('#imgTemple').clone();
				nodeDetailCopy.attr('id', "");
				nodeDetailCopy.find('#previewImg').attr('src', data.path);
				nodeDetailCopy.addClass("deletImg");
				nodeDetailCopy.find('#previewImg').attr('style', "width: 100px; height: 100px;");
				nodeDetailCopy.find('#imgPath').attr('class', "imgPreview");
				nodeDetailCopy.find('#imgPath').val(data.path);
				nodeDetailCopy.find('#imgPath').attr('id', "");
				
				$('#previewZone').append(nodeDetailCopy);
				
			},
			fail: function(error) {
				alert('업로드 실패');
			  return false;
			}
		}); //ajax End
	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {

		//이미지 삭제 클릭 이벤트
		$(document).on('click', '.deletImg', function(){
			
			if(confirm("이미지를 삭제하시겠습니까?")){
				$(this).remove();
			}
		})
		
		//일지 등록 클릭 이벤트
		$(document).on('click', '#upload_ajax', function(){
			
			var diaryDate	= $('#diaryDate').val();
			var diaryInfo	= $('input[name="diaryInfo"]:checked').val(); //checked value
			var title		= $('#title').val();
			var contents 	= $('#contents').val();
			var imgPathArr	= $('.imgPreview'); //이미지 node 배열

			//날짜 빈값 체크
			if(diaryDate == ""){
				alert("날짜를 선택해주세요."); 		
				return false;
			}

			//중요도 빈값 체크		
			if(diaryInfo == undefined){
				alert('중요도를 체크해주세요');                       
				return false;
			}

			//제목 빈값 체크
			if(title == ""){
				alert("제목을 작성해주세요."); 		
				return false;
			}

			//일지내용 빈값 체크
			if(contents == ""){
				alert("내용을 작성해주세요."); 		
				return false;
			}

			//이미지를 넣지 않은경우
			if(imgPathArr.length <= 0){
				//이미지를 깜박했을때  confirm = true(확인버튼)
				if(confirm('이미지를 함께 등록하시겠습니까?')){
					return false;
				}
			}
			
		 	//이미지 배열만들기
			var pathImgArr = new Array();

			for(i=0;i<imgPathArr.length;i++){
				pathImgArr.push(imgPathArr[i].value);
			}

			$.ajax({
                type : "POST",
                data :
                {
					"diaryDate"		: diaryDate,
					"diaryInfo"		: diaryInfo,
                    "title"			: title,
					"contents" 		: contents,
					"imgPathArr"	: pathImgArr
                },
                dataType: "json",
                url : '/farm_diary/diary_insert_ajax',
                success : function(d){       
					if(d.result == true){
						alert("일지가 등록되었어요^^");
						location.href = '/farm_list';
					}else{
						alert("일지등록을 실패하였습니다. 다시시도해주세요.");
					}
                }
            })

		});

	};
	 

	$(function() {
	 	yul.page = new yul.page();
	});
	 
	return yul.page;
})();