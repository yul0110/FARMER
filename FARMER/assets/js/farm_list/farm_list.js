
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
			
		})
	}
	
	$(function() {
		yul.page = new yul.page();
	});
	 
	return yul.page;
})();