      
        
        <div class="popular">
    		<h1 class="sec_head">
            	<span class="green_border"></span>
                popular post
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
                	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(thumbnail); }?>
                    <div class="date"><?php the_time('M j/Y') ?> </div>
                	<div class="by"><?php the_author(); ?> </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="cap"> <?php the_title(); ?> </a>
                </li>
                          
			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        
        
        

                
               
                
            </ul>
            
            
        </div><!--popular-->
                










<div class="nv">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                featured Video
            </h1>






		    
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => 1 ,
			'category_name' => get_option('mag_n_v_c')
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
            	<div class="nvi">
                	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(202, 202)); }?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    	<?php the_title(); ?>
                    </a>
                </div><!--nvi-->

							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        

            



        </div>