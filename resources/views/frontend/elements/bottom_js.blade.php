<script type="text/javascript" src="{{asset('frontend/js/universal/jquery.js')}}"></script> 
<script src="{{asset('frontend/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('frontend/js/masterslider/jquery.easing.min.js')}}"></script> 
<script src="{{asset('frontend/js/masterslider/masterslider.min.js')}}"></script> 
<script type="text/javascript">
(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');
	
	slider.setup('masterslider' , {
		 width:1600,    // slider standard width
		 height:630,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true,
		 view:"parallaxMask"
	});

})(jQuery);
</script> 
<script src="{{asset('frontend/js/mainmenu/customeUI.js')}}"></script>  
<script src="{{asset('frontend/js/owl-carousel/owl.carousel.js')}}"></script> 
<script src="{{asset('frontend/js/owl-carousel/custom.js')}}"></script> 
<script src="{{asset('frontend/js/tabs/assets/js/responsive-tabs.min.js')}}" type="text/javascript"></script> 
<script type="text/javascript" src="{{asset('frontend/js/tabs/smk-accordion.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/tabs/custom.js')}}"></script> 
<script src="{{asset('frontend/js/scrolltotop/totop.js')}}"></script> 
<script src="{{asset('frontend/js/mainmenu/jquery.sticky.js')}}"></script> 
 
<script type="text/javascript" src="{{asset('frontend/js/smart-forms/jquery.form.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/js/smart-forms/jquery.validate.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/js/smart-forms/additional-methods.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/js/smart-forms/smart-form.js')}}"></script> 
<script src="{{asset('frontend/js/scripts/functions.js')}}" type="text/javascript"></script>
</body>
</html>
