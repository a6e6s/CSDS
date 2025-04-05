$(document).ready(function() {
	//$('[data-toggle="tooltip"]').tooltip();
	////////////////
	$('.dropdown-menu').click(function (e) {
		e.stopPropagation();
	});
	//////////////////
    new WOW().init();
    ///////header fixed after scroll////////
	$(window).bind('scroll', function(){
		if($(this).scrollTop() > 350) { 
		  $("body").addClass("fixed_nav");
		}else{
			$("body").removeClass("fixed_nav");
		}
	});
    /////////////////
	$('.top_menu_btn').click(function(){
		$('.main_menu ul:first-child').toggleClass('d-none');
		
		return false;
	});
    ///scroll to top
	$(".page_scoll").hide(); // hide on page load
	
	$(window).bind('scroll', function(){
		if($(this).scrollTop() > 200) {
		  $(".page_scoll").fadeIn();
		}else{
			$(".page_scoll").hide();
		}
	});
	$('.page_scoll').each(function(){
		$(this).click(function(){ 
			$('html,body').animate({ scrollTop: 0 }, 100);
			return false; 
		});
	});
    ////////////////////
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            $('.main_menu li').removeClass('active');
            $(this).parent().addClass('active');
            $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - 100 }, 100);
        });
    });
	//////get page lang//////
    var dir = true;
    if($('html').attr('lang')=="en"){
        dir=false;
    };
    ///home doctors
    $('.doctors_slider').slick({
        dots: true,
        arrows:false,
        autoplay:true,
        rtl: dir,
        infinite: true,
        speed: 1200,
        slidesToScroll: 1,
        slidesToShow: 6,
        centerMode: true,
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                slidesToShow: 4,
                
              }
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3,
               
              }
            },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                centerMode: false,
              }
            }
          ]
    });
	
});
