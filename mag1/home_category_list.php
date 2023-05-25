    	<div class="categories">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                    <?php _e('Categories','Magazin1'); ?>
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
        
        
        