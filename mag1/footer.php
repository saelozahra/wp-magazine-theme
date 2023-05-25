</main>








<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

          <div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="<?php _e('Close','Magazin1'); ?> (Esc)"></button>

				<button class="pswp__button pswp__button--share" title="<?php _e('Share','Magazin1'); ?>"></button>

				<button class="pswp__button pswp__button--fs" title="<?php _e('Toggle fullscreen','Magazin1'); ?>"></button>

				<button class="pswp__button pswp__button--zoom" title="<?php _e('Zoom in/out','Magazin1'); ?>"></button>

				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
					  <div class="pswp__preloader__cut">
					    <div class="pswp__preloader__donut"></div>
					  </div>
					</div>
				</div>
            </div>


			<!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	            <div class="pswp__share-tooltip">

	            </div>
	        </div>

            <button class="pswp__button pswp__button--arrow--left" title="<?php _e('Previous (arrow left)','Magazin1'); ?>"></button>
            <button class="pswp__button pswp__button--arrow--right" title="<?php _e('Next (arrow right)','Magazin1'); ?>"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>

        </div>


    </div>
    
    





<footer>

	<section class="dm" style="background-image:url('<?php echo get_option('mag_dl_bg_default'); ?>')  ; ">
    	<div class="filter_hover" ></div><!--filter_hover-->
        <img src="<?php bloginfo('template_url'); ?>/img/dmi.png" alt="DMI">
        <h1> <?php _e('new magazine','Magazin1'); ?></h1>
        <h3><?php _e('here is the newest magazin form a new author you get it','Magazin1'); ?> </h3>
        <div class="btn_download"><a download href="<?php echo get_option('mag_dllink'); ?>" title="Download" ><?php _e('Download','Magazin1'); ?></a></div>
        
    </section><!--dm-->
    
    <div class="bgdiv"  style="background-image:url('<?php echo get_option('mag_footer_bg_default'); ?>') !important ; " >
    <div class="over_footer">
	<div class="social">
		<h1><?php _e('follow us on','Magazin1');?></h1>
            <a class="foot_social" href="<?php bloginfo('rss2_url'); ?> " title="1"></a>
            <a class="foot_social" href="<?php echo get_option('mag_Dribble') ?>" title="2"></a>
            <a class="foot_social" href="<?php echo get_option('mag_Pintrest') ?>" title="3"></a>
            <a class="foot_social" href="<?php echo get_option('mag_Linked') ?>" title="4"></a>
            <a class="foot_social" href="<?php echo get_option('mag_Google_plus'); ?>" title="5"></a>
            <a class="foot_social" href="<?php echo get_option('mag_FB') ?>" title="6"></a>
            <a class="foot_social" href="<?php echo get_option('mag_Stumbleupon') ?>" title="7"></a>
            <a class="foot_social" href="<?php echo get_option('mag_vimeo') ?>" title="8"></a>
            <a class="foot_social" href="<?php echo get_option('mag_tumblr') ?>" title="9"></a>
            <a class="foot_social" href="<?php echo get_option('mag_twitter') ?>" title="10"></a>
    </div><!--social-->

    <form class="contact_form container">
    	<h1><?php _e('Contact us','Magazin1'); ?></h1>
		<div class="nesf">
            <input type="text" placeholder="<?php _e('NAME','Magazin1'); ?>" name="name">
            <input type="text" placeholder="<?php _e('EMAIL','Magazin1'); ?>" name="email">
            <input type="text" placeholder="<?php _e('SUBJECT','Magazin1'); ?>" name="subject">
         </div><!--nesf-->
         <div class="nesf">
            <textarea placeholder="<?php _e('TEXT','Magazin1'); ?>" name="text" ></textarea>
            <input type="submit" value="<?php _e('SEND','Magazin1'); ?>">
         </div><!--nesf--> 
         
         
         
         <br class="clear">
         
    </form>
    
    <?php 
            if ( get_option('mag_footer_text') > ""): ?>
     	
        		<div class="copyright"> <div class="container">  <?php echo get_option('mag_footer_text'); ?> </div></div>
	 
	 <?php 
	 	 	else:
				echo "<br style='clear:both;'><br style='clear:both;'>";
            endif	
	 ?>
	</div><!--over_footer-->
	</div> <!--bg div-->
    
    
 
	  <?php
		
            if ($_GET["text"] > ""):
               wp_mail( get_option('admin_email'), $_GET["email"] , $_GET["name"] . " <br>" .  $_GET["subject"] . " <br>" . $_GET["text"] );
			   
			echo '<script>alert("Messege Sended...");</script>';
            endif

     

	  
	    ?>

  
  
  
  
</footer>

<div class="totop" title="Scroll Top" >^</div>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.sticky.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js" type="text/javascript" ></script> 
<script src="<?php bloginfo('template_url'); ?>/js/placeholdem.min.js" type="text/javascript" ></script> 
<script src="<?php bloginfo('template_url'); ?>/js/photoswipe.min.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/photoswipe-ui-default.min.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.ticker.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js" type="text/javascript" ></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



<script type="text/javascript">
 
$(document).ready(function(){

	$("#sld1").owlCarousel({
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		responsive:true,
		lazyLoad : true,
		navigation: true,
		pagination:true,
		navigationText: [
			"<img src='<?php bloginfo('template_url'); ?>/img/sld1_btn_left.png' alt='Left' >",
			"<img src='<?php bloginfo('template_url'); ?>/img/sld1_btn_right.png' alt='Right' >"
		]
	});
	
	
	
	
	

$("#nv").owlCarousel({
 
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 3, //10 items above 1000px browser width
	itemsDesktop : [1000,3], //5 items between 1000px and 901px
	itemsDesktopSmall:[800,2], // betweem 900px and 601px
	itemsTablet: [550,2], //2 items between 600 and 0
	itemsMobile: [380,1],
	responsive:true,
	stopOnHover:true,
	lazyLoad : true,
	navigation: true,
	pagination:false,
	navigationText: [
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_h1_right.png' alt='rast' >",
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_h1_left_red.png' alt='left'>"
	]
});




$("#rp,#oa").owlCarousel({
 
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 4, //10 items above 1000px browser width
	itemsDesktop : [1000,4], //5 items between 1000px and 901px
	itemsDesktopSmall:[800,3], // betweem 900px and 601px
	itemsTablet: [500,2], //2 items between 600 and 0
	itemsMobile: [300,1],
	responsive:true,
	lazyLoad : true,
	stopOnHover:true,
	navigation: true,
	pagination:false,
	navigationText: [
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_h1_right_green.png' alt='rast' >",
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_h1_left_green.png' alt='left'>"
	]
});








$(".tsocial").owlCarousel({
 
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 4, //10 items above 1000px browser width
	itemsDesktop : [1000,4], //5 items between 1000px and 901px
	itemsDesktopSmall:[800,3], // betweem 900px and 601px
	itemsTablet: [500,2], //2 items between 600 and 0
	itemsMobile: [300,1],
	responsive:true,
	stopOnHover:true,
	lazyLoad : true,
	navigation: true,
	pagination:false,
	navigationText: [
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_lite_right.png' alt='rast' >",
		"<img src='<?php bloginfo('template_url'); ?>/img/flash_lite_left.png' alt='left'>"
	]
});



});

</script>

<style>
.ticker-swipe,main nav.first-nav ul li.active,main nav.first-nav ul li .sub-menu li:hover,.ln_i .ln_icon,.subscript input[type="submit"],.side .tag a:hover,header nav,.ticker,.ticker-swipe span,.ticker-title,.ticker-content,#commentform input[type="submit"],.share-box .fa:hover,#comments .reply,#main-nav a:hover, #main-nav ul li.current-menu-item a, #main-nav ul li.current_page_ancestor a, #main-nav ul li.current-menu-ancestor a, #main-nav ul li.current_page_item a, #main-nav ul li:hover > a{background-color:<?php echo get_option('mag_color'); ?>;}

main nav.first-nav ul,#commentform > p:last-child,.comment_author_name a,main nav.first-nav ul li .sub-menu li:hover,.red_border,#main-nav ul li ul{border-color:<?php echo get_option('mag_color'); ?>;}

.comment_author_name,.rmh5 a,.rm ,.category .popular li .by,.categories2 ul li:hover,.categories2 ul li:hover a,.rp .sec_head .fa,.m1btn,.m2btn{color:<?php echo get_option('mag_color'); ?>;}
</style>

<?php wp_footer(); ?>

</body>
</html>






