<?php
/*
Template Name: about me
*/?>


<?php get_header();?>


<div class="container" id="first-container" >






<article itemtype="http://www.schema.org/Contact" itemscope="" class="article" style="width:100%;padding-bottom:24px;" >

    <h3 itemtype="http://www.schema.org/BreadcrumbList" itemscope=""><?php _e('Home','Magazin1'); ?> / <span class="activepage"><?php the_title(); ?></span></h3>
    <h1><?php the_title(); ?></h1>
    

 
        
        
        
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="h2"><?php the_content(); ?></div>
<?php endwhile; endif; ?>
</article>


  <?php wp_mail( get_option('admin_email'), __('New Contact Form Submit','Magazin1') , __('The message','Magazin1') ); ?>
  
  
</div> <!--container-->





<?php get_footer();?>
