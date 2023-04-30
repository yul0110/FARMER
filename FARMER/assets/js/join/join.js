(function() {

	//정규식
	const pwR = /^(?=.*[a-z])(?=.*[!@#$%^*,./])(?=.*[0-9]).{8,30}$/; // 영문 소문자,숫자, 특수기호!@#$%^*,./ 혼합 8~30자 입력가능	
	const koR = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/; //한글만 입력가능 
	const numR = /^[0-9]+$/; //숫자만 입력가능
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		this.clickEvent(); 
	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {
		
		$(document).on('click', '#join_ajax', function(){
			
			var nm			= $('#nm').val();
			var userId 		= $('#userId').val();
			var pno			= $('#pno').val();
			var pw 			= $('#pw').val();
			var pwc			= $('#pwc').val();
			var email 		= $('#email').val();
			var branchCode	= $('#branchCode').val();
			
			if(nm == ""){
			alert("이름을 작성해주세요."); 		
			return false;
			}
			if(nm.search(koR) != 0){ 
				alert("이름은 한글로 입력해주세요.");
				return false; 		
			}

			if(userId == ""){
			alert("별명을 작성해주세요."); 		
			return false;
			}

			if(pw == ""){
			alert("비밀번호를 작성해주세요."); 		
			return false;
			} 
			if(pw.search(pwR) != 0){
				alert("비밀번호는 8~30 영문 소문자와 숫자,기호를 혼합하여 입력해주세요.");
				return false; 		
			}	

	 		if(pw != pwc){ 
				alert("비밀번호를 알맞게 입력했는지 확인해주세요"); 		
		   }
			if(pwc == ""){ 
				alert("비밀번호를 알맞게 입력했는지 확인해주세요"); 		
		   }
			
			if(pno == ""){
				alert("핸드폰 번호를 작성해주세요."); 		
				return false;
				}
			if(pno.search(numR) != 0){ 
				alert("휴대폰번호를 알맞게 작성해주세요.");
				return false; 		
			}		

			if(email == ""){
			alert("메일 주소를 작성해주세요."); 		
			return false;
			}

			if(branchCode == ""){
			alert("주소를 작성해주세요."); 		
			return false;
			}

//휴대전화,메일 인증작업 해야함 --------------------------------------------------------------------------------------------------------2023.04.30

			$.ajax({
                type : "POST",
                data :
                {
                    "nm"		 : nm,
					"userId" 	 : userId,
					"pw" 		 : pw,
					"pwc" 		 : pwc,
					"pno"		 : pno,
					"email" 	 : email,
					"branchCode" : branchCode,

                },
                dataType: "json",
                url : '/auth/join_ajax',
                success : function(d){       
					if(d.result == true){
						alert("회원가입 되었습니다.^^");
						//location.href = '/main';
					}else{
						alert("회원등록을 실패하였습니다. 다시시도해주세요.");
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