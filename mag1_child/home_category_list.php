    	<div class="categories2">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                categories
                	<span class="sec-head-flash">
                        <img src="<?php bloginfo('template_url'); ?>/img/flash_h1_top.png" alt="top">
                        <img src="<?php bloginfo('template_url'); ?>/img/flash_h1_bottom.png" alt="bottom">
                    </span>
            </h1>










        <ul class="container">
			<?php foreach (get_categories() as $cat) : ?>
                <li>
                	
                    
           		    <a href="<?php echo get_category_link($cat->term_id); ?>">
						<?php echo $cat->cat_name; ?>
                    </a>
                    <div class="fr"> (<?php echo $cat->category_count; ?>)</div>
                </li>
               
            <?php endforeach; ?>
        </ul>
        
        
        
 			


        </div><!--categories-->

<style>
	.filter_hover{background-color:<?php echo get_option('mag_color'); ?>;}
	
	
.mega-menu {
  border-bottom: 0px solid transparent !important;
  border-top: 2px solid #ef7d81 !important;
}
</style>



       
<script type="text/javascript">
	$(document).ready(function(){

		
		$("#recent_post_section").clone().prependTo(".left-side");
		$(".rp99:last").detach();
		
		
		
		$("#undefined-sticky-wrapper").detach().prependTo(".sld_header");
		
	});
</script>
