(function() {
	
	yul.page = function() {
		 this.init();
	};
	
	//init
	yul.page.prototype.init = function() {
		
	}
	

	//작동할 이벤트를 프로토 타입으로 세팅
	yul.page.prototype.clickEvent = function() {
		
		$(document).on('click', '.card-body', function(){
			
		})

	
	 };
	 
	 $(function() {
	 	yul.page = new yul.page();
	 });
	 
	 return yul.page;
})();