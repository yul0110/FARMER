(function() {
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		this.clickEvent(); // bind form submit event\
		this.callDayWeather();
		//this.callTimeWeather();
	}
	
	//공공API로 날씨 데이터를 불러옴
	yul.page.prototype.callDayWeather = function() {
		
		var xhr = new XMLHttpRequest();
		var url = 'http://apis.data.go.kr/1360000/AsosDalyInfoService/getWthrDataList'; /*URL*/
		var queryParams = '?' + encodeURIComponent('serviceKey') + '='+'6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		queryParams += '&' + encodeURIComponent('pageNo') + '=' + encodeURIComponent('1'); /**/
		queryParams += '&' + encodeURIComponent('numOfRows') + '=' + encodeURIComponent('10'); /**/
		queryParams += '&' + encodeURIComponent('dataType') + '=' + encodeURIComponent('JSON'); /**/
		queryParams += '&' + encodeURIComponent('dataCd') + '=' + encodeURIComponent('ASOS'); /**/
		queryParams += '&' + encodeURIComponent('dateCd') + '=' + encodeURIComponent('DAY'); /**/
		queryParams += '&' + encodeURIComponent('startDt') + '=' + encodeURIComponent('20230413'); /**/
		queryParams += '&' + encodeURIComponent('endDt') + '=' + encodeURIComponent('20230413'); /**/
		queryParams += '&' + encodeURIComponent('stnIds') + '=' + encodeURIComponent('90'); /**/
		xhr.open('GET', url + queryParams);
		xhr.onreadystatechange = function () {
			if (this.readyState == 4) {
				$('#location').html(JSON.parse(this.responseText).response.body.items.item[0].stnNm);
				$('#minTa').html(' ' + JSON.parse(this.responseText).response.body.items.item[0].minTa);
				$('#maxTa').html(' ' + JSON.parse(this.responseText).response.body.items.item[0].maxTa);
			}
		};
		
		xhr.send('');

	}

	//공공API로 날씨 데이터를 불러옴
	yul.page.prototype.callTimeWeather = function() {
		
		var xhr = new XMLHttpRequest();
		var url = 'http://apis.data.go.kr/1360000/AsosHourlyInfoService/getWthrDataList'; /*URL*/
		var queryParams = '?' + encodeURIComponent('serviceKey') + '='+'6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		queryParams += '&' + encodeURIComponent('pageNo') + '=' + encodeURIComponent('1'); /**/
		queryParams += '&' + encodeURIComponent('numOfRows') + '=' + encodeURIComponent('10'); /**/
		queryParams += '&' + encodeURIComponent('dataType') + '=' + encodeURIComponent('JSON'); /**/
		queryParams += '&' + encodeURIComponent('dataCd') + '=' + encodeURIComponent('ASOS'); /**/
		queryParams += '&' + encodeURIComponent('dateCd') + '=' + encodeURIComponent('HR'); /**/
		queryParams += '&' + encodeURIComponent('startDt') + '=' + encodeURIComponent('20100101'); /**/
		queryParams += '&' + encodeURIComponent('startHh') + '=' + encodeURIComponent('01'); /**/
		queryParams += '&' + encodeURIComponent('endDt') + '=' + encodeURIComponent('20100601'); /**/
		queryParams += '&' + encodeURIComponent('endHh') + '=' + encodeURIComponent('01'); /**/
		queryParams += '&' + encodeURIComponent('stnIds') + '=' + encodeURIComponent('108'); /**/
		xhr.open('GET', url + queryParams);
		xhr.onreadystatechange = function () {
			if (this.readyState == 4) {
				console.log(this.responseText);
			}
		};

		xhr.send('');

	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {
		
		$(document).on('click', '.card-body', function(){
			
		})

		// //로그인 Ajax
		// $('#loginCheckAjax').on('click', function(e) {
	 	// 	e.preventDefault();
		 		
	 	// 	var userId		= $('#userIdData').val();
	 	// 	var pw 			= $('#userpwData').val();
	 		
	 	// 	//아이디 정규식 체크와 빈값 체크
	 	// 	if(userId == ""){
		// 		alert("아이디를 작성해주세요."); 		
		// 		return false;
		// 	}
		// 	if(userId.search(idR) != 0){ 
		// 		alert("아이디는 8~15 영문 소문자와 숫자를 혼합하여 입력해주세요.");
		// 		return false; 		
		// 	}	
						
	 	// 	//비밀번호 정규식 체크와 빈값 체크
	 	// 	if(pw == ""){
		// 		alert("비밀번호를 작성해주세요.");
		// 		return false;		
		// 	}
				
		// 	var userDataJson 	= {};
	
		// 	userDataJson.userId 	= userId;
		// 	userDataJson.pw 		= pw;
							
		// 	//에이작스 통신을 위한 객체 생성
		//     const xhr = new XMLHttpRequest();
		    
		//     //전송방식과 통신 할 경로 설정
		//     xhr.open("post", "/loginAjax");
		    
		//     //전송 할 헤더에 전송 데이터타입, 문자타입 설정
		//     xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8;");
		    
		//     //받는 데이터 타입 설정
		//     xhr.responseType = "json";
		    
		//     //ajax 작동중 이벤트
		//     xhr.onprogress = function () {
		// 	    //데이터 리턴 직전에 발동
		// 	    //프로그래스바 실행
		// 	};
			
		// 	//ajax 작동완료
		//     xhr.onload = function(e) {
				
		// 		if(e.currentTarget.status == 200){
		// 			//성공콜백 함수
		// 			if(e.currentTarget.response.result != 0){ 
		// 				alert("로그인 성공");
		// 				//페이지 이동
		// 				location.href = '/';
		// 			}else{
		// 				alert("아이디와 비밀번호를 확인해주세요.");
		// 			}												
		// 	       	//return callback(e.currentTarget.response);
		// 		}else{
		// 			console.log('서버와통신에 실패 하였습니다. error-code : ' + e.currentTarget.status)
		// 		}				        
		//     };
		//     //전송할 데이터 json 타입으로 변동후 전달
		//     xhr.send(JSON.stringify(userDataJson));	
		// });
	 };
	 
	 $(function() {
	 	yul.page = new yul.page();
	 });
	 
	 return yul.page;
})();