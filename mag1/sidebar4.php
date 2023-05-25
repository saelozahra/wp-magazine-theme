<aside class="right-side side">

		
		
		
		<?php require_once( get_stylesheet_directory() . '/home_category_list.php' ); ?>


		
        
        
        <div class="advertise">
           <?php 
            if (get_option('mag_ads1') > ""):
               echo "<img src='" . get_option('mag_ads1') . "'>" ;
            endif
			?>
            
           <?php 
            if (get_option('mag_ads2') > ""):
               echo "<img src='" . get_option('mag_ads2') . "'>" ;
            endif
			?>
        	
        </div><!--advertise-->

  		
        
        
        
        <?php require_once( get_stylesheet_directory() . '/popular.php' ); ?>
        
        
        
        
        
        
        
        
        <?php if (get_option('mag_text_widget'))
			{
			?>
            
        <div class="tw">
    		<h1 class="sec_head">
            	<span class="gray_border"></span>
                <?php _e('text widget','Magazin1');?>
            </h1>
            
            
            <div class="text">
 	            <?php echo get_option('mag_text_widget') ; ?>
                <br class="clear">

                <?php echo do_shortcode( ' [aps-counter]  ' ); ?>
            </div>
        </div><!--tw-->
        <?php } ?>
        
        
        
        
        
        
        
               
        
        <div class="subscript">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                <?php _e('Subscribe newsletter','Magazin1');?>
            </h1>
            
            <h4><?php _e('Subscribe to receive latest  news and our 
magazine in your inbox. 	','Magazin1');?></h4>
            <form>
            	<input type="text" placeholder="<?php _e('Your Email','Magazin1'); ?>" >
                <input type="submit" value="<?php _e('SEND','Magazin1');?>">
                <br class="clear">
            </form>
            <br class="clear">
        </div><!--subscript-->
        
        
                
        
               
               
               
               
               
        
        <div class="tag">
    		<h1 class="sec_head">
            	<span class="red_border"></span>
                <?php _e('Tags','Magazin1');?>
            </h1>
            <div>
                <?php wp_tag_cloud( $args ); ?>
            </div>
            <br class="clear">
        </div><!--tag-->
        
        
        
        
    </aside><!--left-side-->
    
    
    