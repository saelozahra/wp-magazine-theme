
	<?php get_header();

	
	
	 $key="view";
	 $view_count = get_post_meta($post->ID, $key, true);
	
	 if ( ! add_post_meta( $post->ID, $key, $view_count+1 , true ) ) { 
		update_post_meta ( $post->ID, $key, $view_count+1 );
	 }
	 
	?>



<div class="u-full-width bread_crumb_full" >    
    <nav class="container" >
        <?php custom_breadcrumbs(); ?>
    </nav>
</div><!--u-full-width-->





<main class="container archive_page main1" >

   	

    
    
    
    
        
    <?php include('sidebar4.php'); ?>
    
    
    
    
    
    
    
    
    
    
            
        
      

          	<section class="rp rp11">
            <h1 class="sec_head">
                <span class="red_border"></span>
                New Category Post
				<span class="sec-head-flash">
                    <i class="fa fa-th-large m1btn"></i>
                    <i class="fa fa-navicon m2btn"></i>
                </span>
            </h1>
            

		<div class="rp_outer mode2">
		   
                                



	  <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
       
       
           
            
            <?php if (get_post_custom_values('view')) :
					foreach (get_post_custom_values('view') as $sourcename) {$view = $sourcename; }
				else :
					$view = "0" ;
				endif;
			?>
                
                
                
            <figure class="rp_i">
            	<div class="hide_overflow_img">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); }?></div><!--hide_overflow_img-->
                
                <h6>
                    <span class="fl time"><i class="fa fa-clock-o"></i><?php the_time('M j/Y') ?></span>
                    <span class="fr like"><i class="fa fa-eye"></i><?php echo $view ?></span>
                    <span class="fr comment"><i class="fa fa-comment-o"></i><?php echo str_replace("دیدگاه","",str_replace("comment","", get_comments_number() )); ?>   </span>
                </h6>
                
                <figcaption>
                	<h2>
						 <a class="rm" href="<?php the_permalink(); ?>" title="<?php the_author(); ?>"> 
						 	<?php the_title(); ?>
                         </a>
                    </h2>
                </figcaption>
                
                <h4> <?php echo str_replace("</p>","",str_replace("<p>","",get_the_excerpt())); ?> <a class="rm" href="<?php the_permalink(); ?>" title="<?php the_author(); ?>">  Read more ... </a>
                </h4>
                
            </figure>
                    


      <?php endwhile; ?>
      <?php endif; ?>
      
      
      
       <?php comments_template(); ?>
       
 
        </div><!--rp_outer-->
           
              
       
            
        </section><!--rp-->
      
        
    
    
    
    
        
        
      
      	<section class="nv">
            <h1 class="sec_head">
            	<span class="red_border"></span>
				<?php 
					if (get_option('mag_n_v_t') > ""):
					   echo  get_option('mag_n_v_t') ;
					else:
						echo "New Videos" ;
					endif
                ?>
                	<span class="sec-head-flash">
                    
                    </span>
            </h1>
            
            <figure id="nv">
            
            
            





		    
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => get_option('mag_n_v_n') ,
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
        

            
       

            </figure>
            
        </section><!--nv-->
      
        
        
</main>

<nav class="container nav_pag_num">
	<?php
    global $wp_query;
    
    $big = 999999999; // need an unlikely integer
    
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
    ?>
</nav>




<?php get_footer();?>



</body>
</html>
