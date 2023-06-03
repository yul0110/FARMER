
(function() {	
	yul.page = function() {
		this.init();
	};
	
	yul.page.prototype.init = function() {
		this.getList() 
		this.clickEvent();
	}
	
	//이전달, 다음달 클릭 이벤트 
	yul.page.prototype.clickEvent = function() {

		$(document).on('click', '.btnMove', function(){

			var moveNum		= $(this).data('cm'); 
			var moveYear	= Number($('#nowYear').val());

			if(moveNum < 1){
				moveYear = moveYear - 1;
				$('#nowYear').data(moveYear);
			}

			if(moveNum > 12){
				moveYear = moveYear + 1;
				$('#nowYear').data(moveYear);
			}
			//console.log(moveNum);
			//getList();
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
					var cpm 				= Number(cnm) - 1; 	//이전달 
					var cnem 				= Number(cnm) + 1;	//다음달 
					var calendarList 		= d.calendarArray;     
					var weekNodeCopy 		= $('#weekNode').clone();
					var calendarNodeCopy 	= $('#calendarNode').clone();
					var calendarDayNodeCopy	= $('#calendarDayNode').clone();
					
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

					//달력을 생성해주는 for문
					for(var i=0; i<calendarList.length; i++){		
						
						//calendarList배열을 이용해 날짜를 채워준다
						var calendarDate		= calendarList[i].st_date; //20230528
						var calendarIconCode	= calendarList[i].icon_code;
						var dayIcon				= $('.daySky');
						var frontMonth			= calendarDate[4]; //0
						var backMonth			= calendarDate[5]; //5
						var frontDay			= calendarDate[6]; //2
						var lastDay				= calendarDate[7]; //8

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

						//ul이 생길때 li생성
						let calendarDayItem = calendarDayNodeCopy.clone();
						calendarDayItem.attr('style', '');
						calendarDayItem.attr('id', '');
						
						//해당 월이 이번달과 같지 않으면 일자 앞에 몇월인지 붙여준다 ex)05/31
						if(Number(monthNum) == Number(cnm)){ 
							calendarDayItem.find('.dayNum').html(dayNum);
						}else{
							calendarDayItem.find('.dayNum').html(monthNum + '/' + dayNum);
						}

						//icon 넣어주기 
						console.log(calendarIconCode);
						if(calendarIconCode === ''){
							// 날씨 데이터가 없는 경우
							dayIcon.attr("src","/assets/images/icons/noForecast.png");

						}else if(calendarIconCode === 'S'){
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
							dayIcon.attr("src", "/assets/images/icons/snow.png");
						}

						$('.ul'+ulNum).append(calendarDayItem);
						dayIcon.removeClass('daySky'); //$('.daySky') 비워줌

					}

					$.each(calendarList, function( i, item ) {
					});
	
				}else{
					alert("실패");
				}
			}
		})

	}	
	
	$(function() {
		yul.page = new yul.page();
	});
	 
	return yul.page;
})();