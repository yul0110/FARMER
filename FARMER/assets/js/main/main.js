
(function() {	
	yul.page = function() {
		this.init();
	};
	
	//this.init();안에 세팅
	yul.page.prototype.init = function() {
		this.getList();
		this.getDiaryList();
		this.clickEvent();
	}
	
	//이전달, 다음달 클릭 이벤트 
	yul.page.prototype.clickEvent = function() {

		$(document).on('click', '.btnMove', function(){

			var moveNum		= $(this).data('cm'); 
			var moveYear	= Number($('#nowYear').val());

			//년도 변경 및 달 설정
			if(moveNum < 1){
				moveYear = moveYear - 1;
				$('#nowYear').data(moveYear.toString());
				$('#updateMonth').val("12");
			}else if(moveNum > 12){
				moveYear = moveYear + 1;
				$('#nowYear').data(moveYear.toString());
				$('#updateMonth').val("01");
			}else{
				if(Number(moveNum) < 10){
					$('#updateMonth').val('0' + moveNum);
				}else{
					$('#updateMonth').val(moveNum);
				}
			}

			yul.page.getList();
		})

		$(document).on('click', '.day', function(){
			let dateNum		= $(this).data('datenum');
			location.href 	= "/day_list?dateNum="+dateNum;
		})

		$(document).on('click', '.way', function(){

			let diaryIdValue 	= $(this).find('.did');
			let diaryuseYnValue	= $(this).find('.uy');
			let useYnNode		= $(this).find('.useYn');

			$.ajax({
				type : "POST",
				data :
				{
					"diaryId" 	: diaryIdValue.val(),
					"useYn" 	: diaryuseYnValue.val()
				},
				dataType: "json",
				url : '/day_list/useYn_update_ajax',
				success : function(d){			
	
					//DB 데이터update를 성공한 후에 화면 데이터를 수정해준다
					if(diaryuseYnValue.val() == 'Y'){					
						diaryuseYnValue.val('N');
						useYnNode.removeClass();
						useYnNode.addClass('btn btn-outline-warning useYn');
						useYnNode.html('종료');
					}else{
						diaryuseYnValue.val('Y');
						useYnNode.removeClass();
						useYnNode.addClass('btn btn-outline-success useYn');
						useYnNode.html('진행중');
					}

				}
			})
			
		})
	}

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.getList = function() {
	
		var nowMonth		= $('#nowMonth').val();
		var updateMonth 	= $('#updateMonth').val();
		var nowYear 		= $('#nowYear').val();

		$.ajax({
			type : "POST",
			data :
			{
				"nowYear"		: nowYear,
				"nowMonth" 		: nowMonth,
				"updateMonth" 	: updateMonth
			},
			dataType: "json",
			url : '/main/calendar_ajax',
			success : function(d){

				if(d.result){  //result값은 정수로 내려온다. 

					var monthNum			= '';				//월
					var dayNum				= '';				//일
					var ulNum 				= 0;
					var cnm 				= d.toMonth; 		//이번달
					var calendarList 		= d.calendarArray;     
					var weekNodeCopy 		= $('#weekNode').clone();
					var calendarNodeCopy 	= $('#calendarNode').clone();
					var calendarDayNodeCopy	= $('#calendarDayNode').clone();		

					var cpm 				= Number(cnm) - 1; 	//이전달 
					var cnem 				= Number(cnm) + 1;	//다음달 


					if(Number(d.toMonth) >= 12){
						cpm 				= 11; 	//이전달 
						cnem 				= 1;	//다음달 
					}else if(Number(d.toMonth) <= 1){
						cpm 				= 12; 	//이전달 
						cnem 				= 2;	//다음달 
					}
					
					//정적데이터 세팅
					$('#calendarMonth').html(Number(d.toMonth) + '월');
					$('#nowYear').val(d.toYear);
					$('#nowMonth').val(d.toMonth);
					$('#updateMonth').val(d.toMonth);
					$('#btnPrev').data('cm', cpm);
					$('#btnNext').data('cm', cnem);

					//init 초기화
					$('#calendar').html('');
					weekNodeCopy.attr('style', '');
					$('#calendar').append(weekNodeCopy); //요일생성

					//달력을 생성해주는 for문-------------------------------------------------------------------------------------------------------
					for(var i=0; i<calendarList.length; i++){		
						
						//calendarList배열을 이용해 날짜를 채워준다
						let calendarDate		= calendarList[i].st_date; //20230528
						let calendarWeatherArr	= calendarList[i].weather_data;
						let calendarIconCode	= calendarList[i].icon_code;
						let calendardiaryArr	= calendarList[i].diary_data;
						let frontMonth			= calendarDate[4]; //0
						let backMonth			= calendarDate[5]; //5
						let frontDay			= calendarDate[6]; //2
						let lastDay				= calendarDate[7]; //8

						if(frontMonth == 0){ 
							//해당 월이 한자리수
							monthNum = backMonth;
						}else{
							//해당 월이 두자릿수
							monthNum = frontMonth + backMonth;
						}

						if(frontDay == 0){
							//해당 일자가 한자리수
							dayNum = lastDay;
						}else{
							//해당 일자가 두자리수
							dayNum = frontDay + lastDay;
						}

						if(i%7===0){ // ul이 생겨야함
							ulNum = i+7;
							let calendarItem = calendarNodeCopy.clone();
							calendarItem.attr('style', '');
							calendarItem.attr('id', '');
							calendarItem.addClass('ul'+ulNum);
							$('#calendar').append(calendarItem);
						}

						//ul이 생길때 li생성------------li----------------li----------------li------------------li-----------------li-----------------li
						let calendarDayItem = calendarDayNodeCopy.clone();
						
						//오늘은다르게 처리해줌
						if(calendarList[i].todayFlag == 'Y'){
							calendarDayItem.attr('style', 'border:5px solid #5ACCFF');
						}else{
							calendarDayItem.attr('style', '');
						}
						calendarDayItem.attr('id', '');
						calendarDayItem.data('datenum', calendarDate);

						//해당 월이 이번달과 같지 않으면 일자 앞에 몇월인지 붙여준다 ex)05/31
						if(Number(monthNum) == Number(cnm)){ 
							calendarDayItem.find('.dayNum').html(dayNum);
						}else{
							calendarDayItem.find('.dayNum').html(monthNum + '/' + dayNum);
						}

						//템플릿 복사본 들어갈 위치
						let dayIcon		= calendarDayItem.find('.daySky');
						let dayTmn	 	= calendarDayItem.find('.dayTmn');
						let dayTmx		= calendarDayItem.find('.dayTmx');
						let daydiary	= calendarDayItem.find('.diaryLevel'); 

						//icon 넣어주기-------------icon-------------icon--------------icon-----------------icon------------------icon--------------icon
						if(calendarIconCode === 'S'){
							// 	S	: 맑음
							dayIcon.attr("src", "/assets/images/icons/sunny.png");

						}else if(calendarIconCode === 'CM'){
							// 	CM	: 구름많음	
							dayIcon.attr("src", "/assets/images/icons/cloudy.png");

						}else if(calendarIconCode === 'C'){
							// 	C	: 흐림
							dayIcon.attr("src", "/assets/images/icons/cloudyAndRain.png");

						}else if(calendarIconCode === 'R'){
							// 	R	: 비
							dayIcon.attr("src", "/assets/images/icons/rain.png");

						}else if(calendarIconCode === 'RS'){
							// 	RS	: 비/눈
							dayIcon.attr("src", "/assets/images/icons/rainSnow.png");
						}else if(calendarIconCode === 'SN'){
							// 	SN	: 눈
							dayIcon.attr("src", "/assets/images/icons/snowman.png");
						}else{
							// 날씨 데이터가 없는 경우
							dayIcon.attr("src","/assets/images/icons/noForecast.png");
						}
						
						//dayTmn 최저기온 dayTMX 최고기온 --------------dayTmn------------------dayTMX-------------------dayTmn---------------------dayTMX
						if(calendarWeatherArr != undefined && calendarWeatherArr != '' && calendarWeatherArr != null){
							for(t=0; t<calendarWeatherArr.length; t++){

								if(calendarWeatherArr[t]['category'] == 'TMN'){ //최저기온
									dayTmn.html(calendarWeatherArr[t]['fcstValue']+' / ');
								}
								if(calendarWeatherArr[t]['category'] == 'TMX'){ //최고기온
									dayTmx.html(calendarWeatherArr[t]['fcstValue']);
								}
							}
						}else{
							dayTmn.remove();
							dayTmx.remove();
						}

						//일정 중요도 표시-----------diary-----------diary------------diary-----------diary-----------diary-----------diary-----------diary
						if(calendardiaryArr != undefined && calendardiaryArr != '' && calendardiaryArr != null){

							for(q=0; q<calendardiaryArr.length; q++){

								if(calendardiaryArr[q]['difficultyLevel'] == '1'){

									let easyNodeCopy = $('.easyNode').clone();

									daydiary.append(easyNodeCopy);
									daydiary.append(' ');
									easyNodeCopy.attr('style', '');
									easyNodeCopy.removeClass('easyNode');
								}

								if(calendardiaryArr[q]['difficultyLevel'] == '2'){	

									let nomalNodeCopy = $('.nomalNode').clone();	

									daydiary.append(nomalNodeCopy);
									daydiary.append(' ');
									nomalNodeCopy.attr('style', '');
									nomalNodeCopy.removeClass('nomalNode');
								}
								
								if(calendardiaryArr[q]['difficultyLevel'] == '3'){

									let hardNodeCopy = $('.hardNode').clone();

									daydiary.append(hardNodeCopy); //템플릿방식으로 작업하기 때문에 복사본을 붙여준다
									daydiary.append(' ');
									hardNodeCopy.attr('style', '');
									hardNodeCopy.removeClass('hardNode');  //복사본의 class를 지우지 않으면 그 전 작업이 또 복사됨.
								}
							}
						}

						//append---------------append---------------append-------------------append--------------------append---------------append
						
						$('.ul'+ulNum).append(calendarDayItem); 
						dayIcon.removeClass('daySky'); //$('.daySky') 비워줌
						dayTmn.removeClass('dayTmn'); //$('.dayTmn') 비워줌
						dayTmx.removeClass('dayTmx'); //$('.dayTmx') 비워줌
						daydiary.removeClass('diaryLevel'); //$('.diaryLevel') 비워줌
						//append---------------append---------------append-------------------append--------------------append---------------append
					}

					$.each(calendarList, function( i, item ) {
					});
	
				}else{
					alert("실패");
				}
			}
		})
	}//getList event
	

	//getDiaryList
	yul.page.prototype.getDiaryList = function() {
		
		$.ajax({
			type : "POST",
			data :{},
			dataType: "json",
			url : '/main/today_list_ajax',
			success : function(d){

				if(d.result){  //result값은 정수로 내려온다.  0빼고는 전부 참이다

					//변수
					let todayList 	= d.todayListArr; 
					let toDate 		= d.today;  
					
					//NodeCopy
					let listNodeCopy 	= $('#diaryNode').clone();
					
					//일지 리스트를 생성해주는 for문
					for(var y=0; y<todayList.length; y++){		
						
						let listNodeCopyIn = listNodeCopy.clone();

						//todayList배열을 이용해 리스트를 채워준다
						let diaryId			= todayList[y].id;
						let diaryLevel		= todayList[y].difficultyLevel;
						let diaryTitle		= todayList[y].title;
						let diaryContents	= todayList[y].contents;
						let diaryRegDate	= todayList[y].updateDt;
						let diaryYn			= todayList[y].useYn;
					
						//템플릿 복사본 들어갈 위치
						let diaryDid 		= listNodeCopyIn.find('.did');
						let diaryUy 		= listNodeCopyIn.find('.uy');
						let diarytit 		= listNodeCopyIn.find('.title');
						let diaryDt 		= listNodeCopyIn.find('.diaryDate'); 
						let diaryCotents 	= listNodeCopyIn.find('.contents');
						let diaryBand 		= listNodeCopyIn.find('.difficultyLevel');
						let diaryUse 		= listNodeCopyIn.find('.useYn');
						
						//todayListNode clone
						listNodeCopyIn.attr('style', '');
						listNodeCopyIn.attr('id', '');
						$('#todayDiaryList').append(listNodeCopyIn);

						
						//딱지
						let bandCopy = '';
						if(diaryLevel == '1'){
							//이지
							bandCopy = $('#easyBand').clone();
							bandCopy.attr('id', '');
						}else if(diaryLevel == '2'){
							//노말
							bandCopy = $('#nomalBand').clone();
							bandCopy.attr('id', '');
						}else{ // 3
							//하드
							bandCopy = $('#hardBand').clone();
							bandCopy.attr('id', '');
						}
												
						diaryBand.append(bandCopy);
						diaryDid.val(diaryId);
						diaryUy.val(diaryYn);
						diaryDt.html(diaryRegDate);

						//진행&종료 버튼
						if(diaryYn == 'Y'){
							//Y
							diaryUse.removeClass();
							diaryUse.addClass('btn btn-outline-success useYn');
							diaryUse.html('진행중');
						}else{
							//N
							diaryUse.removeClass();
							diaryUse.addClass('btn btn-outline-warning useYn');
							diaryUse.html('종료');
						}

						diarytit.html(diaryTitle);
						diaryCotents.html(diaryContents);

					}
	
				}
			}
		})
	}//End getDiaryList 

	
	//즉시 실행 함수
	$(function() {
		yul.page = new yul.page(); //객체 생성 후 위에서 세팅해두었던 이벤트들을 실행해!!
	});
	 
	return yul.page;
})();