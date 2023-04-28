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
		
		$(document).on('click', '#join_ajax', function(){
			
			var nm			= $('#nm').val();
			var userId 		= $('#userId').val();
			var pno			= $('#pno').val();
			var pw 			= $('#pw').val();
			var pwc			= $('#pwc').val();
			var email 		= $('#email').val();
			var branchCode	= $('#branchCode').val();
			
			// if(nm == ""){
			// alert("이름을 작성해주세요."); 		
			// return false;
			// }

			// if(userId == ""){
			// alert("별명을 작성해주세요."); 		
			// return false;
			// }

			// if(pw == ""){
			// alert("비밀번호를 작성해주세요."); 		
			// return false;
			// } 

			// if(pwc == ""){
			// alert("비밀번호를 작성해주세요."); 		
			// return false;
			// }
			
			// if(pno == ""){
			// 	alert("핸드폰 번호를 작성해주세요."); 		
			// 	return false;
			// 	}

			// if(email == ""){
			// alert("메일 주소를 작성해주세요."); 		
			// return false;
			// }

			// if(branchCode == ""){
			// alert("주소를 작성해주세요."); 		
			// return false;
			// }

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
						location.href = '/main';
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