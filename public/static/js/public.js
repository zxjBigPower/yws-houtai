$(document).ready(function(){
	
 //Tabel Interlaced background color 2015-04-20 DeathGhost
 $('.Interlaced tr:odd').addClass('trbgcolor');
 //left menu toggle style
 $('.menu-list-title').click(function(){
	   $(this).next('li').toggle('1500');
	  });
 //menu current background color
 $(".menu-children li").click(function(){
	 $(".menu-children li").css({background:'none'});
	 $(this).css({background:'#f35844'});
	});


	$("#del").click(function () {
		$("input[type='checkbox']").prop('checked', $(this).prop('checked'));
	});
	
	$('#myTab li:first-child').addClass('active');

	$('.tdBtn').click(function () {
		// console.log('111');
		$('.search').submit();
	});
	
});



