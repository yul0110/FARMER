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
			var nickName 	= $('#nickName').val();
			var pw 			= $('#pw').val();
			var pwc			= $('#pwc').val();
			var pno 		= $('#pno').val();
			var userId 		= $('#userId').val();
			var branchCode	= $('#branchCode').val();
			
			
			if(nm == ""){
			alert("이름을 작성해주세요."); 		
			return false;
			}
			if(nm.search(koR) != 0){ 
				alert("이름은 한글로 입력해주세요.");
				return false; 		
			}

			if(nickName == ""){
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

			if(userId == ""){
			alert("메일 주소를 작성해주세요."); 		
			return false;
			}

			// if(!yul.scFlag){
			// 	alert("이메일 인증을 해주세요."); 		
			// 	return false;
			// }

			if(branchCode == ""){
			alert("주소를 작성해주세요."); 		
			return false;
			}

			$.ajax({
                type : "POST",
                data :
                {
                    "nm"		 : nm,
					"nickName" 	 : nickName,
					"pw" 		 : pw,
					"pno"		 : pno,
					"userId" 	 : userId,
					"branchCode" : branchCode,
                },
                dataType: "json",
                url : '/auth/join_ajax',
                success : function(d){       
					if(d.result){
						alert("회원가입 되었습니다.^^");
						//location.href = '/main';
					}else{
						alert("회원등록을 실패하였습니다. 다시시도해주세요.");
					}
                }
            })

		});

		$(document).on('click', '#emailPushAjax', function(){
			
			var userId 		= $('#userId').val();
			
			//이메일 형식인지 체크해야함

			$.ajax({
                type : "POST",
                data :
                {
					"userId" 	 : userId
                },
                dataType: "json",
                url : '/mail/mail_push_ajax',
                success : function(d){       
					if(d.result){
						//이메일 전송 성공
						alert('메일을 전송하였습니다. 인증번호를 체크해주세요.');
						yul.sc = d.code;
					}else{
						//이메일 전송 실패!
						alert('메일 전송에 실패 했습니다. 관리자에게 문의해 주세요.');
					}
                }
            })

		});

		$(document).on('click', '#checkCode', function(){
			
			var a = $('#userCode').val();
			var b = yul.sc;

			if(a == b){
				//인증번호가 맞는 경우
				alert('인증에 성공 하였습니다 가입을 계속 진행해 주세요.');
				yul.scFlag 	= true;
			}else{
				//인증번호가 틀린 경우
				alert('인증번호가 틀렸습니다. 재시도 해주세요.');
			}
		});

	};
	 
	$(function() {
	 	yul.page = new yul.page();
	});
	 
	return yul.page;
})();