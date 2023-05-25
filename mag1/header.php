<!doctype html>
<html <?php language_attributes(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); wp_title(); ?></title>

<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true); 
} else {
	bloginfo('name'); echo " - "; bloginfo('description');
}
?>" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="<?php echo get_option('mag_favicon') ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="<?php bloginfo('template_url'); ?>/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/owl.transitions.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/photoswipe.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/default-skin.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/ticker-style.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/desktop.css" rel="stylesheet" type="text/css">


<?php if ( is_rtl() ) {
  //wp_enqueue_style(  'style-rtl',  plugins_url('/rtl.css', __FILE__) );
  ?>
  <link href="<?php bloginfo('template_url'); ?>/rtl.css" rel="stylesheet" type="text/css">
<?php  
}
?>


 <?php wp_head(); ?>



<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript" ></script>



 
</head>

<body <?php body_class(); ?> >
<div id="loader" style="background-repeat: no-repeat;background-position: center center;background-image:url('<?php bloginfo('template_url'); ?>/img/728.png');background-color:rgba(0,0,0,0.95);position:fixed;width:100%;height:100%;top:0;left:0;z-index:9999999999;"></div>
<header>
	<nav>
    	<div class="container">
        
        	<div class="nesf">
                <ul id="js-news" class="js-hidden">
                
                

                        
                    <?php
                    $args=array	( 
                        // 'cat' => 'id', 
                        'post_status' => 'publish', 
                        'posts_per_page' => 20 ,
                        'category_name' => ''
                    );
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) { 
                        while ($my_query->have_posts()) : $my_query->the_post();  ?>
                        
                            <li class="news-item"><a tite="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></li>
            
                                        <?php
                        endwhile;
                    }
                    wp_reset_query();  // Restore global post data stomped by the_post().
                    ?>
        
                </ul>
            </div><!--nesf-->
            	
            <div class="nesf">
            
                <div class="nesf1 social_head">
    				<a href="<?php echo get_option('mag_FB') ?>" title="1"></a>
                    <a href="<?php echo get_option('mag_Linked') ?>" title="2"></a>
                    <a href="<?php echo get_option('mag_tumblr') ?>" title="3"></a>
                    <a href="<?php echo get_option('mag_Google_plus'); ?>" title="4"></a>
                    <a href="<?php echo get_option('mag_twitter') ?>" title="5"></a>
                </div><!--nesf-->
                    
                <div class="nesf1 top_weather">
                	Paris
                    <img src="<?php bloginfo('template_url'); ?>/img/head-nav-cloud.png" alt="cloudy" >
                    +12
                </div><!--nesf-->
                
            </div><!--nesf-->
            

        </div><!--container-->



    </nav>
    
        







<?php if ( get_current_theme()=="Magazin2" and is_home() ) 
		{
			include('inner_header.php');
			//wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_id' => 'main-nav' ) );
			include('slider.php');
		}	
	
	elseif ( is_home() )
		 	include('slider.php');
	else 
		{ 
		
			include('inner_header.php'); 
			
		} 
?>


        
            
</header>











<main>

	<nav class="first-nav">
    

		    
    <?php 
//get_current_theme()!="Magazin2" and is_home()
if ( 1 ) 
		{
			wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_id' => 'main-nav' ) );
		}

		
	?>

        <form id="form_search1" class="form1" style="display:none;" method="get" role="search" action="<?php bloginfo('url'); ?>" >
            <input type="search" placeholder="<?php _e('Search','Magazin1'); ?>" name="s" id="s" >
            <input type="submit" value="">
        </form>

    </nav>




<ul class="sub-menu nav_widget_outer hidee" >
	<?php if ( is_active_sidebar( 'nav_widget' ) and  get_option('mag_widget_area') > "" ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'nav_widget' ); ?>
        </div><!-- #primary-sidebar -->
    

    <?php  endif; ?>
</ul><!--nav_widget_outer-->

<script type="text/javascript" >
	$(document).ready(function(){	
		
	   // alert($("#main-nav li:nth-child(3) a:first").text());
		$("#main-nav li a").each(function(){
			//alert( $(this).text() );
			var halghe = $(this).text() ;
			var halghe2 = "<?php echo get_option('mag_widget_area') ; ?>" ;
			//alert(halghe2);	
			if ( halghe == halghe2 ){
				var id_halghe = "#" + $(this).parent().attr("id") ;
				$.cookie('id_select_shode', id_halghe);
				$(".nav_widget_outer").clone().appendTo( "#" + $(this).parent().attr("id") );
				$(".nav_widget_outer:last").detach();
				
			}
				
		});
		
		//$($.cookie('id_select_shode')).hover(function(){
		//		$(this).find(".nav_widget_outer").fadeIn(0);
		//	}, function(){
		//		$(this).find(".nav_widget_outer").fadeOut(0);
		//});
	});
</script>
	