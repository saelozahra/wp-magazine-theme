
	<?php get_header(); ?>



<div class="u-full-width bread_crumb_full" >    
    <nav class="container" >
        <?php custom_breadcrumbs(); ?>
    </nav>
</div><!--u-full-width-->

<div class="container first_container" >
    
    
    <!--<aside id="side_right">-->
    	<?php include('sidebar4.php'); ?>
    	<?php //get_sidebar();?>
    <!--</aside>side_right-->
    
    <article id="article1" itemtype="http://schema.org/Article" itemscope="" role="article">
    
	  <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
       
       
       
       
<figure itemtype="http://schema.org/ImageObject" itemscope="" itemprop="associatedMedia" class="post-thumbnail pt-zoom">

            <div class='matn'>
            <h1 class="entry-title" itemprop="name"> <?php echo "<a href='".get_the_permalink()."'>" .get_the_title()." </a>"; ?> </h1>
            	<?php
            
                the_content();
            
            echo "</div>" ;
			
			
			
			
			the_tags( "<div class='tag'>", " " , " </div>" );			
			?>
            
   
<div class="share-box ">
                    <h1 class="sec_head"><span class="red_border"></span> <?php _e('Share This Post','Magazin1'); ?>  </h1>
					<div class="fusion-social-networks container">
                    <a title="Facebook" data-title="Facebook" href="http://www.facebook.com/sharer.php?m2w&amp;s=100&amp;p[url]=<?php the_permalink() ?> &amp;p[images][0]=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>&amp;p[title]=<?php the_title(); ?>" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-facebook fusion-icon-facebook" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                    
                    <a title="twitter" href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=http%3A%2F%2Flocalhost%2Fpooyesh%2F%3Fp%3D1" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-twitter fusion-icon-twitter" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a title="Linkedin" data-toggle="tooltip" data-title="Linkedin" data-placement="top" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?> &amp;title=<?php the_title(); ?>" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-linkedin fusion-icon-linkedin" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a>
                    
                    <a title="Reddit" data-toggle="tooltip" data-title="Reddit" data-placement="top" href="http://reddit.com/submit?url=<?php the_permalink() ?> &amp;title=<?php the_title(); ?>" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-reddit fusion-icon-reddit" data-original-title="Reddit"><i class="fa fa-reddit"></i></a>
                    <a title="Tumblr" data-toggle="tooltip" data-title="Tumblr" data-placement="top" href="http://www.tumblr.com/share/link?url=http%3A%2F%2Flocalhost%2Fpooyesh%2F%3Fp%3D1&amp;name=<?php the_title(); ?>&amp;description=<?php the_title(); ?>" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-tumblr fusion-icon-tumblr" data-original-title="Tumblr"><i class="fa fa-tumblr"></i></a>
                    <a title="Google+" data-toggle="tooltip" data-title="Google+" data-placement="top" href="https://plus.google.com/share?url=<?php the_permalink() ?> &quot; onclick=&quot;javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-googleplus fusion-icon-googleplus" data-original-title="Google+"><i class="fa fa-google-plus"></i></a>
                    <a title="Pinterest" data-toggle="tooltip" data-title="Pinterest" data-placement="top" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Flocalhost%2Fpooyesh%2F%3Fp%3D1&amp;description=<?php the_title(); ?>&amp;media=http%3A%2F%2Flocalhost%2Fpooyesh%2Fwp-content%2Fuploads%2F2015%2F07%2Fbg.jpg" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-pinterest fusion-icon-pinterest" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a>
                    <a title="Vk" data-toggle="tooltip" data-title="Vk" data-placement="top" href="http://vkontakte.ru/share.php?url=http%3A%2F%2Flocalhost%2Fpooyesh%2F%3Fp%3D1&amp;title=<?php the_title(); ?>&amp;description=<?php the_title(); ?>" target="_blank" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-vk fusion-icon-vk" data-original-title="Vk"><i class="fa fa-vk"></i></a>
                    <a title="Mail" data-toggle="tooltip" data-title="Mail" data-placement="top" href="mailto:?subject=Hello World&amp;body=<?php the_permalink() ?> " target="_self" style="color:#bebdbd;" class="fusion-social-network-icon fusion-tooltip fusion-mail fusion-icon-mail" data-original-title="Mail"></a><div class="fusion-clearfix"></div></div>				</div>      
                    
    </figure>
    
    
	<hr class="clearfix">
      

      <?php endwhile; ?>
      <?php endif; ?>
      
      
       <?php comments_template(); ?>
       
       
       
     </article>
	
</div>


<?php get_footer();?>



</body>
</html>
