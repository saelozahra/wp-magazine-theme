    <section class="sld_header " >
        <div class="" id="sld1">
          
                
        
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => get_option('mag_sld_c_l') ,
			'category_name' => get_option('mag_slider1_cat')
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
        ?>
            
			    
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <div class="sld_item" style="background-image:url('<?php echo esc_url($featured_img_url); ?>')  !important ; ">
                <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title(); ?>" class="slider_img_bg" >
                <div class="filter_sld"></div><!--filter_sld-->
                	
                    <h1><?php the_title(); ?></h1>
                    <br>
                    <img class="slider_img2" src="<?php
                        if (get_post_custom_values('slider')) :
                            foreach (get_post_custom_values('slider') as $sourcename) {echo $sourcename; }
                        else :
                            echo get_option('mag_sld_bg_default');
                        endif;
                    ?>" >
                </div><!--sld_item-->
             </a>
			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        
        
        </div><!--container-->
    </section>