<?php
/*
Template Name: Contact
*/?>


<?php get_header();?>


<div class="container" id="first-container" >






<article itemtype="http://www.schema.org/Contact" itemscope="" class="article" style="width:100%;padding-bottom:24px;" >

    <h3 itemtype="http://www.schema.org/BreadcrumbList" itemscope="">Home / <span class="activepage"><?php the_title(); ?></span></h3>
    <h1><?php the_title(); ?></h1>
    

 
        
        
        
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="h2"><?php the_content(); ?></div>
<?php endwhile; endif; ?>
</article>
    
    <form class="contact_form container" id="contact_page_form" >
		<div class="nesf">
            <input type="text" placeholder="<?php _e('NAME','Magazin1'); ?>" name="name">
            <input type="text" placeholder="<?php _e('EMAIL','Magazin1'); ?>" name="email">
            <input type="text" placeholder="<?php _e('SUBJECT','Magazin1'); ?>" name="subject">
         </div><!--nesf-->
         <div class="nesf">
            <textarea placeholder="<?php _e('TEXT','Magazin1'); ?>" name="text" ></textarea>
            <input type="submit" value="<?php _e('SEND','Magazin1'); ?>">
         </div><!--nesf--> 
    </form>
    
    
     
 
</div> <!--container-->





<?php get_footer();?>

