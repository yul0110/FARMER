(function() {
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		this.clickEvent(); 
	}

	// $('#userId, #pw').on('keydown', function(e){
	// 	if (e.code == 'Enter'){
	// 		$('.loginBtn').click();
	// 	}
	// })
	
	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {

		
		$(document).on('click', '#login_ajax', function(){
			

			var userId	= $('#userId').val();
			var pw 		= $('#pw').val();
			
			//이메일 빈값 체크
			if(userId == ""){
			alert("이메일을 작성해주세요."); 		
			return false;
			}

			//비밀번호 빈값 체크
			if(pw == ""){
			alert("비밀번호를 작성해주세요."); 		
			return false;
			}

			$.ajax({
                type : "POST",
                data :
                {
                    "userId": userId,
					"pw" 	: pw
                },
                dataType: "json",
                url : '/auth/login_ajax',
                success : function(d){       
					if(d.result == true){
						alert("어서오세요");
						location.href = '/main';
					}else{
						alert("로그인을 실패하였습니다. 다시시도해주세요.");
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