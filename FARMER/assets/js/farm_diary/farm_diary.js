(function() {
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		$('#nowDate').val(new Date().toLocaleDateString());
		this.clickEvent(); 
	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {
		
		$(document).on('click', '#upload_ajax', function(){
			
			var title		= $('#title').val();
			var contents 	= $('#contents').val();
			
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

			$.ajax({
                type : "POST",
                data :
                {
                    "title" : title,
					"contents" : contents,
                },
                dataType: "json",
                url : '/farm_diary/diary_ajax',
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