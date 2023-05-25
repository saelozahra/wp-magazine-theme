    
        <div class="advertise">
        	<img src="<?php echo get_option('mag_ads3') ?>">
        </div><!--advertise-->

        
        
        <div class="popular">
    		<h1 class="sec_head">
            	<span class="green_border"></span>
                <?_e('Popular Post','Magazin1');?>
            </h1>
            
            <ul>
            
            
                          
        
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => 12 ,
			'orderby' => 'comment_count',
			'category_name' => ''
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
        
            	<li>
                	<div class="by"> By: <?php the_author(); ?> </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="cap"> <?php the_title(); ?> </a>
                    <div class="date"><?php the_time('M j/Y') ?> </div>
                </li>
                          
			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        
        
        

                
               
                
            </ul>
            
            
        </div><!--popular-->
                
        
        
        
        
        
        
        
          
        
        <div class="tag">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                <?_e('Tags','Magazin1');?>
            </h1>
            <div>
                <?php wp_tag_cloud( $args ); ?>
            </div>
            <br class="clear">
        </div><!--tag-->
        
        