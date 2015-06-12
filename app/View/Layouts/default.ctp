<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('utf-8'); ?>
	<title>
		<?php echo $title_layout; ?> | <?php echo site_name; ?>
	</title>
	<link href="<?php echo $this->base ?>/css/enhance.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $this->base ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->base ?>/css/component.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->base ?>/css/categ.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->base ?>/css/font.css" />
	<link href="<?php echo $this->base ?>/css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo $this->base ?>/css/ratestar.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo $this->base ?>/css/modal.css" type="text/css" rel="stylesheet" media="all">
	<!--web-font-->
	<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> -->
	<!--//web-font-->
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta property="fb:app_id" content="<?php echo fb_app; ?>" />
    <meta property="og:title" content="<?php echo @$og_title; ?>">
    <meta property="og:type" content="article">
    <meta property="og:description" content="<?php echo @$og_description; ?>">
    <meta property="og:url" content="<?php echo @$og_url; ?>">
    <meta property="og:image" content="<?php echo @$og_image; ?>">
    <meta property="og:site_name" content="<?php echo site_name; ?>">

	<?php     echo $this->Html->meta('icon', 'favicon.ico'); ?>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700' rel='stylesheet' type='text/css'>-->
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="<?php echo $this->base ?>/js/jquery.min.js"></script>
	<!-- //js -->	
	<!-- start-smoth-scrolling-->
	<script type="text/javascript" src="<?php echo $this->base ?>/js/handle.js"></script>
	
	<script type="text/javascript" src="<?php echo $this->base ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->base ?>/js/easing.js"></script>	
	<script type="text/javascript" src="<?php echo $this->base ?>/js/js5star.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->base ?>/js/modernizr.custom.53451.js"></script>
	<script type="text/javascript" src="<?php echo $this->base ?>/js/move-top.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			function isMobile(){
				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) return true;
				return false;
			}
	</script>
	<!--//end-smoth-scrolling-->
	<script src="<?php echo $this->base ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
	    $(document).ready(function () {
	        $('#horizontalTab').easyResponsiveTabs({
	            type: 'default', //Types: default, vertical, accordion           
	            width: 'auto', //auto or any width like 600px
	            fit: true   // 100% fit in a container
	        });
	    });
	</script>
</head>
<body><?php $lang = CakeSession::read('lang');?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 	

	<!--header-->
	<div class="banner">
		<div class="container head-nav">
			<div class="col-md-6 top-nav">
				<div class="menu-bar jmitem">
					<i class="fa fa-bars fa-2x toggle-btn menu jmitem open" data-toggle="collapse" data-target="#menu-content"></i>
					<ul class="nav1 jmitem">
						<li><a  class="jmitem <?php if(@$menu == 'index') echo 'active'; ?>" href="<?php echo $this->base; ?>"><?php echo Message::label('mnu_home'); ?></a></li>
						<li><a  class="jmitem <?php if(@$menu == 'product') echo 'active'; ?>" href="<?php echo $this->base; ?>/products"><?php echo Message::label('mnu_products'); ?></a></li>
						<li><a  class="jmitem <?php if(@$menu == 'contact') echo 'active'; ?>" href="<?php echo $this->base.'/site/contact'; ?>"><?php echo Message::label('mnu_contact'); ?></a></li>
						<li><a  class="jmitem <?php if(@$menu == 'about') echo 'active'; ?>" href="<?php echo $this->base.'/site/about'; ?>"><?php echo Message::label('mnu_about'); ?></a></li>
						<?php
						/*
					$lang = DEFAULT_LANG;

					if(CakeSession::check('lang')) $lang = CakeSession::read('lang');

					 	foreach(Constants::$langs as $key => $value): 
					 		$lang_text = '';
							if($key == $lang) 
								echo '<li class="active mim"><a href="#">'.$value.'</a></li>';
							else {
								$uri = $_SERVER['REQUEST_URI'];
								if(isset($this->request->query)){
									if(isset($this->request->query)){
										if(@$this->request->query['lang'] == 'en')
										{
											$uri = str_replace('lang=en', 'lang=vi', $uri);
										}
										else if(@$this->request->query['lang'] == 'vi'){
											$uri = str_replace('lang=vi', 'lang=en', $uri);	
										}
										else
											$lang_text = '&lang='.$key;
									}
									else{
										$lang_text = '?lang='.$key;
									}
								}
								else{
									$lang_text = '?lang='. $key;	
								}
								echo '<li class="mim"><a href='.$uri.$lang_text.'>'. $value.'</a></li>';
							}
						
					endforeach;*/ ?>
					</ul>	
				</div>
				<!-- script-for-menu -->
				 <script>
					 //   	$( ".menu" ).hover(function() {
					 //   		if(isMobile() == false) {
					 //   			if($(this).hasClass('open')) return false;
						//    		if($(this).hasClass('closed')){
						//    			$( "ul.nav1" ).attr('style', 'top: -100%; overflow: hidden; display: block;');
						// 			$( "ul.nav1" ).animate({
						// 				    top: 0,

						// 			  	}, 400, function() {
						// 			   $(".menu").removeClass('closed').addClass('open');
						// 			   $( "ul.nav1" ).attr('style', 'overflow: hidden; display: block;');
						// 			});
						// 		}
						// 	}
						// });
					 //   	$('.menu, a.jmitem, ul.nav1 li').mouseleave(function(e){
					 //   		if(isMobile() == false) {
					 //   			if($(this).hasClass('closed')) return false;
						//    		var related= false;
						//    		if(e.toElement != null){
						//    			related = e.relatedTarget.className;
						//    			target = e.relatedTarget.nodeName;
						//    		}

						//    		if(related != 'jmitem' && target != 'LI' && target != 'UL'){
						//    			$( "ul.nav1" ).animate({
						// 				    top: '-100%',

						// 				  }, 300, function() {
						// 				   $(".menu").removeClass('open').addClass('closed');
						// 				   $( "ul.nav1" ).attr('style', 'overflow: hidden; display: none;');
						// 			});
						//    		}
						//    	}
					 //   	});
					   
						$( ".menu" ).click(function() {
							//if(isMobile()) {
								$( ".nav1" ).slideToggle( 300, function() {
								 	
								  });
							//}
						 });
				</script>
				<!-- /script-for-menu -->
			</div>
			<div class="col-md-6 langs-nav">
				<!-- <a href="<?php echo $this->base; ?>"><img src="<?php echo $this->base ?>/images/logo_test.png" alt="logo"/></a> -->
				
					<div class="langs">
					<?php
					$lang = DEFAULT_LANG;

					if(CakeSession::check('lang')) $lang = CakeSession::read('lang');

					 foreach(Constants::$langs as $key => $value): 
					 	$lang_text ='';
						if($key == $lang) 
							echo '<span>'.$value.'</span>';
						else {
							$uri = $_SERVER['REQUEST_URI'];
							if($this->request->query){
								if(isset($this->request->query['lang'])){
									if(@$this->request->query['lang'] == 'en')
									{
										$uri = str_replace('lang=en', 'lang=vi', $uri);
									}
									else if(@$this->request->query['lang'] == 'vi'){
										$uri = str_replace('lang=vi', 'lang=en', $uri);	
									}
									else
										$lang_text = '&lang='.$key;
								}
								else{
									$lang_text = '&lang='.$key;
								}
							}

							else{
								$lang_text = '?lang='. $key;	
							}
							echo '<a href='.$uri.$lang_text.'>'. $value.'</a>';
						}
					
					endforeach; ?>
					
					<!-- <ul>	
						<li><a href="#"><span class="twt"> </span></a></li>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="in"> </span></a></li>
						<li><a href="#"><span class="dot"> </span></a></li>
					</ul> -->
					<?php // echo $this->element('search'); ?>
				</div>
			</div>	
		</div>
	</div>
	<div class="container">
		<div class="social-icons">
			 <ul>
				<li><?php echo $this->element('search'); ?></li>
				<li><a href="#"><span class="twt"> </span></a></li>
				<li><a href=""><span class="fb"> </span></a></li>
				<!-- <li><a href="#"><span class="in"> </span></a></li>
				<li><a href="#"><span class="dot"> </span></a></li> -->
			</ul>
		</div>
	</div>
	<?php echo $this->element('searchm'); ?>
	<!--//header-->
	<!--services-->
	<?php echo $this->fetch('content'); ?>
	<!--//testimonials-->
	<div class="footer">
		<div class="container">
			<div class="footer-right">
				<p>© <?php echo date('Y').' '. site_name; ?> . All rights reserved.</a></p>
			</div>
		</div>	
	</div>
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			// setTimeout(function(){
			// 	$( "ul.nav1" ).slideToggle( 300, function() {
			// 		$('span.menu').removeClass('open').addClass('closed');
			// 	});
			// },5000);
		});
	</script>
	<script type="text/javascript" src="<?php echo $this->base; ?>/js/jssor.slider.mini.js"></script>
    <script>
    	 jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 12,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                }
            };

            //Make the element 'slider1_container' visible before initialize jssor slider.
            $("#slider1_container").css("display", "block");
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });   
    </script>
	<a href="#" id="toTop" > <span id="toTopHover" style=""></span></a>
	<!--//smooth-scrolling-of-move-up-->			<?php //echo $this->element('sql_dump'); ?>
	
	
	
</body>
</html>
