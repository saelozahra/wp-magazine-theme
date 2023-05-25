    	<div id="categories" class="categories" style="display:none;">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                categories
                	<span class="sec-head-flash">
                        <img src="<?php bloginfo('template_url'); ?>/img/flash_h1_top.png" alt="top">
                        <img src="<?php bloginfo('template_url'); ?>/img/flash_h1_bottom.png" alt="bottom">
                    </span>
            </h1>










        <ul>
			<?php foreach (get_categories() as $cat) : ?>
                <li>
                	<img class="fix" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($cat->term_id); ?>" alt="CatImage" >
                    
           		    <a class="opacity" href="<?php echo get_category_link($cat->term_id); ?>">
						<i class=" fa <?php echo str_replace("</p>","",str_replace("<p>","",category_description($cat->term_id))); ?>"> </i>
                        <br>
						<?php echo $cat->cat_name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        
        
 			


        </div><!--categories-->
        
        
        
<script type="text/javascript">
	$(document).ready(function(){
		$("#categories").clone().prependTo(".first_container");
		$(".right-side  .categories").detach();
		$(".categories").fadeIn("slow");
				
				
		
		$("#recent_post_section").clone().appendTo(".left-side");
		$("#recent_post_section:first,.rp_i h4").detach();

		
		
		$(".home .rp .rp_outer").owlCarousel({
		 
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

		

	});
</script>
