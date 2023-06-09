
(function() {	
	yul.page = function() {
		this.init();
	};
	
	yul.page.prototype.init = function() {
		this.clickEvent();
	}
	
	//일정 진행 상태 클릭 이벤트 
	yul.page.prototype.clickEvent = function() {

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
	
	$(function() {
		yul.page = new yul.page();
	});
	 
	return yul.page;
})();