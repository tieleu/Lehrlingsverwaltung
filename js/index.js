$(document).ready(function(){
	$('#space-shuttle').click(function(){
		var space = $('#space-shuttle');
		run2();
		run3();
		run4();
		run5();
		run6();
		for (var i = 0; i < 10000; i++) {
			if (i%1000==0) {
				run6();
			}
		 
			
		space.animate({top: 200});
//		space.removeClass("fa-rotate-270");
		space.animate({left: 1600}, "slow");
//		space.addClass("fa-rotate-90");
		space.animate({top: 800});
//		space.removeClass("fa-rotate-90").addClass("fa-rotate-180");
		space.animate({left: 500});
		space.animate({top: 400});
		space.animate({left: 600});


	}
	}
	);



	function run2(){
		var space2 = $('#space-shuttle2');
		
		for(var i = 0; i<10000;i++){
		space2.animate({left: -1000});
		space2.animate({left: 1900});
	}
	}



	function run3(){
		var space3 = $('#space-shuttle3');
		
		for(var i = 0; i<10000;i++){
		space3.animate({top: -1000});
		space3.animate({top: 1040});
	}

	}

	function run4(){
		var space4 = $('#space-shuttle4');
		
		for(var i = 0; i<10000;i++){
		space4.animate({left: 0});
		space4.animate({left: 1900}, "slow");
	}

	}

	function run5(){
		var space5 = $('#space-shuttle5');
		
		for(var i = 0; i<10000;i++){
		space5.animate({left: 100});
		space5.animate({top: 100});
		space5.animate({left: 500});
		space5.animate({top: 500});
		space5.animate({left: 860});
		space5.animate({top: 527});

	}

	}
		function run6(){
		var dotr = $('#dotr');
		

		dotr.animate({left: 100});
		dotr.animate({top: 100});
		dotr.animate({width : '240px'});
		dotr.animate({height : '240px'});
		dotr.animate({left: 1000}, "slow");
		dotr.animate({top: -50});
		dotr.animate({width : '20px'});
		dotr.animate({height : '20px'});

	}
});
