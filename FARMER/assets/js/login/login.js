(function() {
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		this.clickEvent(); 
	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {
		
		$(document).on('click', '#login_ajax', function(){
			

			var email	= $('#email').val();
			var pw 		= $('#pw').val();
			
			//이메일 빈값 체크
			if(email == ""){
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
                    "email" : email,
					"pw" 	: pw,
                },
                dataType: "json",
                url : '/auth/login_ajax',
                success : function(d){       
					if(d.result == true){
						alert("어서오세요");
						//location.href = '/farm_list';
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