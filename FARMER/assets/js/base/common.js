 /**	(function() { })(); 사용하는 이유
 *		IIFE(Immediately-invoked function expression: 즉시 작동하는 함수식)
 *		"이 안에 들어있는 코드를 바로 실행해라" 라는 표현으로 이해하시면 되겠습니다.
 */	  
 (function() {
	
	
 	yul.common = function() {
		//공통메소드 생성
	};

	yul.common.callbackData = function(d) {			
	}
	
	//공통 검증
	yul.common.valid = function(type, checkTaget, msg, rule) {
		/*공통 함수 type
		lenMax 	-- 최대길이 검증
		lenMin 	-- 최소길이 검증
		kor		-- 한글검증
		*/
		
		//init 오류메세지 초기화
		$('.errorMsg').text('');
		
		//한글 정규식
		const regExp = /[ㄱ-ㅎㅏ-ㅣ가-힣]/g;
		
				
		//데이터가 빈값이거나 필수값인 경우
		if(checkTaget.val() == undefined || checkTaget.val().trim() == ''){
			
			let errorMsgSelect = checkTaget.attr('id'); 
			let errorMsgClass  = '#'+errorMsgSelect+'Error';
			$(errorMsgClass).children('strong').text("필수값 입니다.");	
			checkTaget.focus();
			throw "값이 비었습니다."
		}
		
		if(type == "lenMax"){
			//글자수가 최대값보다 큰경우 메소드를 중지
			if(checkTaget.val().length > rule){
				
				let errorMsgSelect = checkTaget.attr('id'); 
				let errorMsgClass  = '#'+errorMsgSelect+'Error';
				$(errorMsgClass).children('strong').text(msg);
				checkTaget.focus();
				throw msg
			}		
		}else if(type == "lenMin"){
			//글자수가 최소값보다 작은경우 메소드를 중지
			if(checkTaget.val().length < rule){
				
				let errorMsgSelect = checkTaget.attr('id'); 
				let errorMsgClass  = '#'+errorMsgSelect+'Error';
				$(errorMsgClass).children('strong').text(msg);
				
				checkTaget.focus();
				throw msg
			}
		}else if(type == "kor"){
			//한글이 있는경우 메소드를 중지
			if(regExp.test(checkTaget.val())){
				
				let errorMsgSelect = checkTaget.attr('id'); 
				let errorMsgClass  = '#'+errorMsgSelect+'Error';
				$(errorMsgClass).children('strong').text(msg);
				
				checkTaget.focus();
				throw msg
		    }
		}else if(type == "password"){
			//매칭
			if(!checkTaget){			
			}		
		}else{
			return;
		}	
	}
	
	//ajax 퓨터/바닐라 자바스크립트 구현
	yul.common.baseAjax = function(url, sendData, method, callback) {
		
	 	console.log("ajax/XMLHttpRequest 객체 생성");
		var type = method == undefined || method == '' ? 'post' : method;		 	
	 	
	 	//1. 전송객체 생성
	    const xhr = new XMLHttpRequest();
	    
	    //2. init setting
	    xhr.open(type, url);
	    
	    //3. 데이터 전송 타입 그리고 문자 setting
	    xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8;");
	    
	    //3-1.응답타입 setting
	    xhr.responseType = "json";
	    
	    //ajax 작동중 이벤트
	    xhr.onprogress = function () {
		    //데이터 리턴 직전에 발동
		};
		//ajax 작동완료
	    xhr.onload = function(e) {
			
			if(e.currentTarget.status == 200){
				//성공콜백 함수
		       	return callback(e.currentTarget.response);
			}else{
				alert('서버와통신에 실패 하였습니다. error-code : ' + e.currentTarget.status)
			}		        
	    };
	    //전송할 데이터 json 타입으로 변동후 전달
	    xhr.send(JSON.stringify(sendData));
	}
	
})();