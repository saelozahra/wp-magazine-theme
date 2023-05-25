      
        
        <div class="popular">
    		<h1 class="sec_head">
            	<span class="green_border"></span>
                <?php _e('Popular Post','Magazin1'); ?>
            </h1>
            
            <ul>
            
            
                          
        
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => 3 ,
			'orderby' => 'comment_count',
			'category_name' => ''
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
        
            	<li>
                	<div class="by"> <?php _e('By','Magazin1'); ?>: <?php the_author(); ?> </div>
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
                
        