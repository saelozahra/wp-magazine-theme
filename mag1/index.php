
	<?php get_header();?>

    
  <div class="container first_container">  
    
    <?php include('sidebar4.php'); ?>
      
    
      
    
    
    <aside class="left-side side">
    
    <?php if(get_option('mag_l_n_n')) { ?>
    	<section class="ln">
        	<h1 class="sec_head"><span class="red_border"></span><?php 
            if (get_option('mag_l_n_t') > ""):
               echo  get_option('mag_l_n_t') ;
			else:
				echo "latest news" ;
            endif
			?></h1>

			    
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => get_option('mag_l_n_n') ,
			'category_name' => get_option('mag_l_n_c')
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
            
            <?php if (get_post_custom_values('icon')) :
					foreach (get_post_custom_values('icon') as $sourcename) {$ficon = $sourcename; }
				else :
					if (get_option('mag_d_icon') > ""):
						$ficon = get_option('mag_d_icon');
					else:
						$ficon = "ico2";
					endif;
				endif;
			?>
            
            <figure class="ln_i">
            	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(320, 180)); }?>
                <a href="<?php the_permalink(); ?>" class="ln_icon fa <?php echo $ficon ; ?>"></a><!--ln_icon-->
                <h6><span class="fl">By : <?php the_author(); ?></span><span class="fr time"><?php the_time('M j/Y') ?></span></h6>
                <figcaption><h2><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2></figcaption>
            </figure>
            

			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        

            
            
            
        </section><!--ln-->
        
       <?php } ?>

          	<section class="rp rp99" id="recent_post_section" >
        	<h1 class="sec_head"><span class="red_border"></span><?php 
            if (get_option('mag_r_p_t') > ""):
               echo  get_option('mag_r_p_t') ;
			else:
				echo "Recent Post" ;
            endif
			?></h1>
            



<?php

$op_content_cat_one = get_option('mag_r_p_c');
$cat_name = get_category_by_slug($op_content_cat_one);
$cat_name = ($cat_name) ? $cat_name->term_id : $op_content_cat_one;

    $category_link = get_category_link( $cat_name );
	
?>


		<div class="rp_outer">
		    
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => 20 ,
			'category_name' => get_option('mag_r_p_c')
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
            
            <?php if (get_post_custom_values('view')) :
					foreach (get_post_custom_values('view') as $sourcename) {$view = $sourcename; }
				else :
					$view = "0" ;
				endif;
			?>
                
                
                
            <figure class="rp_i">
            	<div class="img"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(300, 180)); }?>
</div><!--img-->                
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
                
                <h4> <?php echo str_replace("</p>","",str_replace("<p>","",get_the_excerpt())); ?> <a class="rm" href="<?php the_permalink(); ?>" title="<?php the_author(); ?>"> <?php _e('Read more','Magazin1'); ?>... </a>
                </h4>
                
            </figure>
                    

			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        

            </div><!--rp_outer-->
           
        
       

            
            
            <br class="clear">
            <h5 class="rmh5" data-href="<?php echo $category_link ;?>" data-number="1" ><?php _e('See more posts','Magazin1'); ?> <img src="<?php bloginfo('template_url'); ?>/img/flash_right.png" alt="flash"></h5>
            
            
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
      
        
        
        
        
        
        
        
        
        
        
        
            
        
      
      	<section class="rp">
            <h1 class="sec_head">
            	<span class="green_border"></span>
                <?php 
            if (get_option('mag_r_ph_t') > ""):
               echo  get_option('mag_r_ph_t') ;
			else:
				echo "Recent Photo" ;
            endif
			?>
                
                	<span class="sec-head-flash">
                    
                    </span>
            </h1>
            
            <div id="rp<?php if (get_current_theme()=="Magazin3"){echo "3";} ?><?php if (get_current_theme()=="Magazin2"){echo "2";} ?>
">
                
                                
                








		    
        <?php
        $args=array	( 
			// 'cat' => 'id', 
			'post_status' => 'publish', 
			'posts_per_page' => get_option('mag_r_ph_n') ,
			'category_name' => get_option('mag_r_ph_c')
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) { 
			while ($my_query->have_posts()) : $my_query->the_post();  ?>
            
            
            <?php if (get_post_custom_values('icon')) :
					foreach (get_post_custom_values('icon') as $sourcename) {$ficon = $sourcename; }
				else :
					if (get_option('mag_d_icon') > ""):
						$ficon = get_option('mag_d_icon');
					else:
						$ficon = "ico2";
					endif;
				endif;
			?>




           
				
                <div class="rpi demo-gallery">
                <?php $image = wp_get_attachment_metadata( get_post_thumbnail_id($post->ID), $unfiltered ); ?>
               
                	<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>" title="content"  data-author="<?php the_author(); ?>" data-size="<?php echo $image[width] ?>x<?php echo $image[height]; ?>" >
                    	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(202, 202)); }?>
                        <figure><?php the_title(); ?></figure>
                            <div class="hover">
                                <?php the_title(); ?>
                                <div class="rpi_ps" onClick="window.location ='<?php the_permalink(); ?>';" ></div>
                            </div>
                    </a>
                </div><!--rpi-->

			
							<?php
			endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        

            
           
        
                                    

                 
                
                
            </div>
            
        </section><!--rp-->
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <section class="rp oa">
            <h1 class="sec_head">
            	<span class="green_border"></span>
                Our Author
                	<span class="sec-head-flash"></span>
            </h1>
 

            <div id="oa">
                
                                
               
			<?php 
				
				global $wpdb;
				
				$authors = $wpdb->get_results("SELECT * from $wpdb->users ORDER BY display_name");
				
				foreach($authors as $author) {
				
				$author_url_posts = get_bloginfo('url')."/?author=".$author->ID ;
				 ?>
				<figure class='oai'>
                	
					<a class="first_oai_a" href="<?php echo $author_url_posts ?>">
						<?php echo get_avatar($author->ID,172); ?>
                        <div class="white_hover"></div>
					</a>
				<div class="hover">
                <figcaption>
					<?php the_author_meta( 'display_name',$author->ID ); ?>
                
                <a title="<?php the_author_meta('nickname',$author->ID); ?>" href="mailto:<?php echo get_the_author_meta( 'user_email',$author->ID ); ?>"><?php the_author_meta( 'description',$author->ID ); ?></a>
				
                </figcaption>
					<?php 
					
                        if (get_the_author_meta('user_url',$author->ID) > "") {
							echo "<a href='".get_the_author_meta('user_url',$author->ID)."'><i class='fa fa-home'></i></a>";
							}
				
						if (get_the_author_meta('user_email',$author->ID) > "") {
                       		echo "<a href='mailto:".get_the_author_meta('user_email',$author->ID)."'><i class='fa fa-envelope-o'></i></a>";
							}
							
                        if (get_the_author_meta('twitter',$author->ID) > "") {
							echo "<a href='".get_the_author_meta('twitter',$author->ID)."'><i class='fa fa-twitter'></i></a>";
						}
						
						if (get_the_author_meta('googleplus',$author->ID) > "") {
							echo "<a href='".get_the_author_meta('googleplus',$author->ID)."'><i class='fa fa-google-plus'></i></a>";
						}
						
						if (get_the_author_meta('yahoo',$author->ID) > "") {
							echo "<a href='".get_the_author_meta('yahoo',$author->ID)."'><i class='fa fa-yahoo'></i></a>";
						}	
											
						
						echo "<a href='".$author_url_posts."'><i class='fa fa-edit'></i></a>";
						
						
						
                    ?>
				
				</div>

				</figure>
				
							
				<?php 
				}
				?>
				
				

              
                
            </div>
            
        </section><!--rp-->
      

      
      
    </aside><!--left-side-->
    
    
    

    
</div><!--container--> 




    
<?php get_footer();?>
