<?php

load_theme_textdomain('Magazin1', get_template_directory() . '/languages');
		
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Top Site Menu' ));
}
add_action( 'init', 'register_my_menu' );








function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Navigation Widget',
		'id'            => 'nav_widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );





if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );


//set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
add_image_size( 'category-thumb', 300, 180 );
add_image_size( 'blog-thumb', 600, 200, true );
}




if ( function_exists('register_sidebar') ) {
	register_sidebar();
}


 function wp_admin_dashboard_add_news_feed_widget() {
 global $wp_meta_boxes;

 wp_add_dashboard_widget( 'dashboard_mw_feed', 'Theme Forest', 'dashboard_mw_feed_output' );
 }
 add_action('wp_dashboard_setup', 'wp_admin_dashboard_add_news_feed_widget');

 function dashboard_mw_feed_output() {
	 echo '<div class="darali">';
	 wp_widget_rss_output(array(
	 'url' => 'http://themeforest.net/feeds/new-themeforest-items.atom',
	 'title' => __('Latest News From darali Blog', 'darali'),
	 'items' => 5,
	 'show_summary' => 0,
	 'show_author' => 0,
	 'show_date' => 0
	 ));
	 echo '<p>' . __('Last Theme Forest News','darali') . '</p>';
	 echo "</div>";
 }














/* ----------------------------------------------------------
کد نمایش دسته های سایت
------------------------------------------------------------- */
$themename = "MAG1"; // نام قالب
$shortname = "mag";
$def_cat =  get_the_category_by_ID( get_option('default_category') ); 
$categories = get_categories('hide_empty=0&orderby=count');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->slug;
}
array_unshift($all_cats, "");


$all_cats_name = array();
foreach ($categories as $category_item ) {
$all_cats_name[$category_item->cat_ID] = $category_item->name;
}
array_unshift($all_cats_name, "");



/*---------------------------------------------------
ساخت تنظیمات
----------------------------------------------------*/
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
wp_enqueue_style("panel_style", get_template_directory_uri()."/panel.css", false, "1.0", "all");
wp_enqueue_script("panel_script", get_template_directory_uri()."/panel_script.js", false, "1.0");
}


/*---------------------------------------------------
افزودن تنظیمات به منو پیشخوان
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'Setting ' , 'Magazin1' ), __( 'Setting ' , 'Magazin1' ), 'manage_options', 'settings', 'theme_settings_page');
}



add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );






add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {
	$args = array(
		'id'    => 'my_page',
		'title' => __( 'Theme Setting' , 'Magazin1' ),
		'href'  => get_bloginfo('url').'/wp-admin/admin.php?page=settings',
		'meta'  => array( 'class' => 'my-toolbar-page' )
	);
	$wp_admin_bar->add_node( $args );
}












/* ---------------------------------------------------------
Dim Setting Array
----------------------------------------------------------- */

$theme_options = array (

    array( "name" =>"Setting" . $themename,
    "type" => "title"),

    /* ---------------------------------------------------------
    Public Setting
    ----------------------------------------------------------- */
    array( "name" => "General",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Site Logo",
    "desc" => "Insert Your Logo Link",
    "id" => $shortname."_logo",
    "type" => "text",
    "std" => get_bloginfo('template_url') ."/img/logo.png"),


    array( "name" => "Primary Color",
    "desc" => "Select Your Primary Color ( Default = '#ef7d81')",
    "id" => $shortname."_color",
    "type" => "color",
    "std" => "#ef7d81"),


					
    array( "name" => "ADS3",
    "desc" => "Insert Your ADS3 Image Link",
    "id" => $shortname."_ads3",
    "type" => "text",
    "std" => get_bloginfo('template_url')."/img/content/ads2.png"),
	
			
						
    array( "name" => "FavIcon",
    "desc" => "The FavIcon Size Should be 16*16 PX",
    "id" => $shortname."_favicon",
	"type" => "text",
    "std" => get_bloginfo('template_url') ."/img/favicon.ico"),









					
    array( "name" => "Text Widget",
    "desc" => "Insert Text Widget In Right Side Content",
    "id" => $shortname."_text_widget",
    "type" => "textarea",
    "std" => "As diplomats from around the world sought a global strategyAs diplomats from around the world sought a global  strategy mats from around the world sought a global sought a global  strategy"),
	
			
			
		  	              
	
    array( "name" => "Navigation Widget Area",
    "desc" => "Select Area To Build Navigation Widget",
    "id" => $shortname."_widget_area",
    "type" => "select",
    "options" => $all_cats_name,
    "std" => "Select Category"),
	

							
						
						
						
    array( "type" => "close"),


    /* ---------------------------------------------------------
    Home Page Setting
    ----------------------------------------------------------- */
    array( "name" => "Home Page",
    "type" => "section"),
    array( "type" => "open"),

	
	
    array( "name" => "Default Slider BG",
    "desc" => "Select Default Background Image For Slider",
    "id" => $shortname."_sld_bg_default",
    "type" => "text",
    "options" => $all_cats,
    "std" => ""),
	
	
	
    array( "name" => "Default FontIcon",
    "desc" => "Copy Name Of  Your Default Font Icon From <a href='http://fortawesome.github.io/Font-Awesome/icons/' > Awesome Font </a>",
    "id" => $shortname."_d_icon",
    "type" => "text",
    "std" => ""),
		
	
    array( "name" => "MAG Download Link",
    "desc" => "Insert Your Mag Download Link",
    "id" => $shortname."_dllink",
    "type" => "text",
    "std" => ""),
	
			
    array( "name" => " Mag Download BG Image",
    "desc" => "Insert Your Mag Download BG Image Link",
    "id" => $shortname."_dl_bg_default",
    "type" => "text",
    "std" => ""),
	
		
		
		
		
		
    array( "name" => "ADS1",
    "desc" => "Insert Your ADS1 Image Link",
    "id" => $shortname."_ads1",
    "type" => "text",
    "std" => get_bloginfo('template_url') ."/img/content/banner1.png"),
	
			
    array( "name" => "ADS2",
    "desc" => "Insert Your ADS2 Image Link",
    "id" => $shortname."_ads2",
    "type" => "text",
    "std" => get_bloginfo('template_url') ."/img/content/banner1.png"),
	


	
	 
        
    array( "type" => "close"),






















    /* ---------------------------------------------------------
    Home Page Categoty Setting
    ----------------------------------------------------------- */
    array( "name" => "Home Page Categoty",
    "type" => "section"),
    array( "type" => "open"),



	
    array( "name" => "Default Slider Content Load",
    "desc" => "Select number of Slider Content Load",
    "id" => $shortname."_sld_c_l",
    "type" => "number",
    "max" => $max,
    "std" => ""),
	
	
    array( "name" => "First Slider Categoty",
    "desc" => "Select First Slider Categoty",
    "id" => $shortname."_slider1_cat",
    "type" => "select",
    "options" => $all_cats,
    "std" => "Select Category"),
	

	
	
	
	
	
    array( "name" => "hr",
    "type" => "hr"),

	
	
	
	
	
	
    array( "name" => "first box ( latest news ) Title",
    "desc" => "Type first box ( latest news ) Title",
    "id" => $shortname."_l_n_t",
    "type" => "text",
    "std" => "latest news"),

	
    array( "name" => "Default first box ( latest news ) Content Load",
    "desc" => "Select number of Content to Load",
    "id" => $shortname."_l_n_n",
    "type" => "number",
    "max" => $max,
    "std" => ""),
	
	
    array( "name" => " first box ( latest news )  Categoty",
    "desc" => "Select  first box ( latest news )  Categoty",
    "id" => $shortname."_l_n_c",
    "type" => "select",
    "options" => $all_cats,
    "std" => "Select Category"),
	





	
	
	
    array( "name" => "hr",
    "type" => "hr"),

	
	
	
	
	
	
    array( "name" => "Secend box ( Recent Post ) Title",
    "desc" => "Type Secend box ( Recent Post ) Title",
    "id" => $shortname."_r_p_t",
    "type" => "text",
    "std" => "Recent Post"),

	
    array( "name" => "Default Secend box ( Recent Post ) Content Load",
    "desc" => "Select number of Content to Load",
    "id" => $shortname."_r_p_n",
    "type" => "number",
    "max" => $max,
    "std" => ""),
	
	
    array( "name" => " Secend box ( Recent Post )  Categoty",
    "desc" => "Select  Secend box ( Recent Post )  Categoty",
    "id" => $shortname."_r_p_c",
    "type" => "select",
    "options" => $all_cats,
    "std" => "Select Category"),
	

	
	
    array( "name" => "hr",
    "type" => "hr"),

	
	
	
	
	
	
		
	
	
	
    array( "name" => "Third box ( New Videos ) Title",
    "desc" => "Type Third box ( New Videos ) Title",
    "id" => $shortname."_n_v_t",
    "type" => "text",
    "std" => "New Videos"),

	
    array( "name" => "Default Third box ( New Videos ) Content Load",
    "desc" => "Select number of Content to Load",
    "id" => $shortname."_n_v_n",
    "type" => "number",
    "max" => $max,
    "std" => ""),
	
	
    array( "name" => " Third box ( New Videos )  Categoty",
    "desc" => "Select  Third box ( New Videos )  Categoty",
    "id" => $shortname."_n_v_c",
    "type" => "select",
    "options" => $all_cats,
    "std" => "Select Category"),
	

	
	
    array( "name" => "hr",
    "type" => "hr"),

	
		
	 	
	
	
	
	
		
	
	
	
    array( "name" => "Fourth box ( Recent Photo ) Title",
    "desc" => "Type Fourth box ( Recent Photo ) Title",
    "id" => $shortname."_r_ph_t",
    "type" => "text",
    "std" => "Recent Photo"),

	
    array( "name" => "Default Fourth box ( Recent Photo ) Content Load",
    "desc" => "Select number of Content to Load",
    "id" => $shortname."_r_ph_n",
    "type" => "number",
    "max" => $max,
    "std" => ""),
	
	
    array( "name" => " Fourth box ( Recent Photo )  Categoty",
    "desc" => "Select  Fourth box ( Recent Photo )  Categoty",
    "id" => $shortname."_r_ph_c",
    "type" => "select",
    "options" => $all_cats,
    "std" => "Select Category"),
	

	
	
    array( "name" => "hr",
    "type" => "hr"),

	
		
		
		
		
		
		
		
		 
    array( "type" => "close"),







    /* ---------------------------------------------------------
    Social Network
    ----------------------------------------------------------- */
    array( "name" => "Social Network",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Google Plus",
    "desc" => "Insert Google Plus Page Link",
    "id" => $shortname."_Google_plus",
    "type" => "text",
    "std" => ""),
	
	
    array( "name" => "FaceBook Page",
    "desc" => "Insert FaceBook Page Link",
    "id" => $shortname."_FB",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Dribble ID",
    "desc" => "Insert Your Dribble Link",
    "id" => $shortname."_Dribble",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Pintrest",
    "desc" => "Insert Your Pintrest Link",
    "id" => $shortname."_Pintrest",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Linked In Page",
    "desc" => "Insert Your Linked In Page Link",
    "id" => $shortname."_Linked",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Stumbleupon",
    "desc" => "Insert Your Stumbleupon Link",
    "id" => $shortname."_Stumbleupon",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Vimeo",
    "desc" => "Insert Your Vimeo Link",
    "id" => $shortname."_vimeo",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Tumblr",
    "desc" => "Insert Your Tumblr Link",
    "id" => $shortname."_tumblr",    "type" => "text",
    "std" => ""),
	
	
	
    array( "name" => "Twitter",
    "desc" => "Insert Your Twitter Full Link",
    "id" => $shortname."_twitter",    "type" => "text",
    "std" => ""),
	
	

    array( "type" => "close"),
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    /* ---------------------------------------------------------
    Social Network
    ----------------------------------------------------------- */
    array( "name" => "Install Plugins",
    "type" => "section"),
    array( "type" => "open"),
	
    array( "name" => "megamenu",
    "desc" => "Professional Navigation Menu",
    "type" => "link",
    "std" => ""),
	
	
	
    array( "name" => "categories-images",
    "desc" => "This Plugin View Your Categories With Image",
    "type" => "link",
    "std" => ""),
		
	
    array( "name" => "wp-user-avatar",
    "desc" => "Add Avatar Image To Your User (gravatar)",
    "type" => "link",
    "std" => ""),
		
	
    array( "name" => "accesspress-social-counter",
    "desc" => "View Count Of Your Social Network Page",
    "type" => "link",
    "std" => ""),
	
	

    array( "type" => "close"),
	
	
	
	    /* ---------------------------------------------------------
    Footer Setting
    ----------------------------------------------------------- */
    array( "name" => "Footer",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Footer Copy Right",
    "desc" => "Paste HTML Of YouR Own Footer",
    "id" => $shortname."_footer_text",
    "type" => "textarea",
    "std" => ""),
	

	 
			
    array( "name" => " Footer BG Image ",
    "desc" => "Insert Your Mag Download BG Image Link",
    "id" => $shortname."_footer_bg_default",
    "type" => "text",
    "std" => ""),
	
		

    array( "type" => "close")




);







/*---------------------------------------------------
Exported Codes
----------------------------------------------------*/
function theme_settings_page() {
    global $themename,$theme_options;
    $i=0;
    $message=''; 
    if ( 'save' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

        foreach ($theme_options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
        $message='saved';
    }
    else if( 'reset' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            delete_option( $value['id'] ); }
        $message='reset';        
    }

    ?>
    <div class="wrap options_wrap">
        <div id="icon-options-general"></div>
        <h2><?php _e( ' Template Setting' ) //your admin panel title ?></h2>
        <?php
        if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>Template Setting '.$themename.' Saved</strong></p></div>';
        if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>'.$themename.' settings reset.</strong></p></div>';
        ?>

        <div class="content_options">
            <form method="post" id="form_option_1">

            <?php foreach ($theme_options as $value) {

                switch ( $value['type'] ) {

                    case "open": ?>
						<?php break;

                    case "close": ?>
                        </div>
                        </div><br />
                        <?php break;

                    case "title": ?>
                        <link rel="stylesheet" href="http://www.lokeshdhakar.com/projects/lightbox2/css/lightbox.css">
                        <script src="http://www.lokeshdhakar.com/projects/lightbox2/js/lightbox-plus-jquery.min.js"></script>
                   
                   
 <script type='text/javascript'>
/* <![CDATA[ */
var commonL10n = {"warnDelete":"\u0634\u0645\u0627 \u0645\u06cc\u200c\u062e\u0648\u0627\u0647\u06cc\u062f \u0645\u0648\u0627\u0631\u062f \u0627\u0646\u062a\u062e\u0627\u0628\u200c\u0634\u062f\u0647 \u0631\u0627 \u0628\u0631\u0627\u06cc \u0647\u0645\u06cc\u0634\u0647 \u067e\u0627\u06a9 \u06a9\u0646\u06cc\u062f\n  'Cancel' \u0628\u0631\u0627\u06cc \u0627\u0646\u0635\u0631\u0627\u0641\u060c 'OK' \u0628\u0631\u0627\u06cc \u067e\u0627\u06a9 \u06a9\u0631\u062f\u0646.","dismiss":"\u0628\u0633\u062a\u0646 \u0627\u06cc\u0646 \u0627\u0639\u0644\u0627\u0646."};var thickboxL10n = {"next":"\u0628\u0639\u062f\u06cc >","prev":"< \u0642\u0628\u0644\u06cc","image":"\u062a\u0635\u0648\u06cc\u0631","of":"\u0627\u0632","close":"\u0628\u0633\u062a\u0646","noiframes":"\u0627\u0633\u062a\u0641\u0627\u062f\u0647 \u0627\u0632 \u0627\u06cc\u0646 \u0642\u0627\u0628\u0644\u06cc\u062a \u0628\u0647 \u0642\u0627\u0628\u200c\u0647\u0627\u06cc \u062a\u0648\u06a9\u0627\u0631 (iframes) \u0646\u06cc\u0627\u0632 \u062f\u0627\u0631\u062f. \u0634\u0645\u0627 \u0642\u0627\u0628\u200c\u0647\u0627\u06cc \u062a\u0648\u06a9\u0627\u0631 \u0631\u0627 \u063a\u06cc\u0631\u0641\u0639\u0627\u0644 \u06a9\u0631\u062f\u0647\u200c\u0627\u06cc\u062f \u06cc\u0627 \u0645\u0631\u0648\u0631\u06af\u0631\u062a\u0627\u0646 \u0627\u0632 \u0627\u06cc\u0646 \u0642\u0627\u0628\u200c\u0647\u0627 \u067e\u0634\u062a\u06cc\u0628\u0627\u0646\u06cc \u0646\u0645\u06cc\u200c\u06a9\u0646\u062f.","loadingAnimation":"http:\/\/wp-wordpress-themes.com\/mag_rtl\/wp-includes\/js\/thickbox\/loadingAnimation.gif"};var plugininstallL10n = {"plugin_information":"\u0627\u0637\u0644\u0627\u0639\u0627\u062a \u0627\u0641\u0632\u0648\u0646\u0647:","ays":"\u0648\u0627\u0642\u0639\u0627\u064b \u0645\u06cc\u200c\u062e\u0648\u0627\u0647\u06cc\u062f \u200c\u0627\u06cc\u0646 \u0627\u0641\u0632\u0648\u0646\u0647 \u0631\u0627 \u0646\u0635\u0628 \u06a9\u0646\u06cc\u062f\u061f"};var heartbeatSettings = {"nonce":"4fcffba7e1"};var authcheckL10n = {"beforeunload":"\u0646\u0634\u0633\u062a \u0634\u0645\u0627 \u0628\u0627\u0637\u0644 \u0634\u062f\u0647 \u0627\u0633\u062a. \u0645\u06cc\u200c\u062a\u0648\u0627\u0646\u06cc\u062f \u0627\u0632 \u0627\u06cc\u0646 \u0635\u0641\u062d\u0647 \u062f\u0648\u0628\u0627\u0631\u0647 \u0648\u0627\u0631\u062f \u0634\u0648\u06cc\u062f \u0648 \u06cc\u0627 \u0628\u0647 \u0635\u0641\u062d\u0647 \u0648\u0631\u0648\u062f \u0628\u0631\u0648\u06cc\u062f.","interval":"180"};/* ]]> */
</script>
<script type='text/javascript' src='http://wp-wordpress-themes.com/mag_rtl/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,thickbox,plugin-install,svg-painter,heartbeat,wp-auth-check&amp;ver=4.3.1'></script>

<link rel='stylesheet' id='thickbox-css'  href='<?php echo get_bloginfo('url')?>/wp-includes/js/thickbox/thickbox.css?ver=4.3.1' type='text/css' media='all' />                  
                   
                        

                        
                        <div class="message">
                            <div id="btn_style1" class="btn btn-default active">Demo1</div>
                            <div id="btn_style2" class="btn btn-info active">Demo2</div>
                            <div id="btn_style3" class="btn btn-success active">Demo3</div>
								<br class="clearfix">
                            
                            
                            <a data-title="Like This Demo 1<br>to Liken Your Site to This Demo Click On Demo1 Button" data-lightbox="example-2" href="<?php echo get_bloginfo('template_url')?>/img/content/03_home_2.jpg" class="example-image-link">
                            	<img  src="<?php echo get_bloginfo('template_url')?>/img/content/03_home_2-150x150.jpg" class="example-image">
                            </a>                       
                            <a data-title="Like This Demo 2<br>to Liken Your Site to This Demo Click On Demo2 Button" data-lightbox="example-2" href="<?php echo get_bloginfo('template_url')?>/img/content/02_home_1.jpg" class="example-image-link">
                            	<img  src="<?php echo get_bloginfo('template_url')?>/img/content/02_home_1-150x150.jpg" class="example-image">
                            </a>
                            
                            <a data-title="Like This Demo 3<br>to Liken Your Site to This Demo Click On Demo3 Button" data-lightbox="example-2" href="<?php echo get_bloginfo('template_url')?>/img/content/04_home_3.jpg" class="example-image-link">
                            	<img  src="<?php echo get_bloginfo('template_url')?>/img/content/04_home_3-150x150.jpg" class="example-image">
                            </a>

                        </div>
                        <?php break;

                    case "hr": ?>
                        <hr>
                        <?php break;

                    case 'text': ?>
                        <div class="option_input option_text">
                        <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                        <input id="id_<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;

                    case 'color': ?>
                        <div class="option_input option_text">
                        <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                        <input id="id_<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;



                    case 'link': ?>
                    
        
                        <div class="option_input option_text">
                        <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                        <a class="thickbox" href="<?php echo get_bloginfo('url')?>/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=<?php echo $value['name']; ?>&amp;TB_iframe=true&amp;width=772&amp;height=300"><?php echo $value['name']; ?></a>
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;




                    case 'number': ?>
                        <div class="option_input option_text">
                        <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                        <input id="id_<?php echo $value['id']; ?>" min="0" max="<?php echo $value['max']; ?>" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;


                    case 'file': ?>
                        <div class="option_input option_text">
                        <label for="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></label>
                        <input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;

                    case 'textarea': ?>
                        <div class="option_input option_textarea">
                        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                        <textarea id="id_<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;

                    case 'select': ?>
                        <div class="option_input option_select">
                        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                        <?php foreach ($value['options'] as $option) { ?>
                                <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                        <?php } ?>
                        </select>
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;

                    case "checkbox": ?>
                        <div class="option_input option_checkbox">
                        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                        <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
                        <input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
                        <small><?php echo $value['desc']; ?></small>
                        <div class="clearfix"></div>
                        </div>
                        <?php break;

                    case "section": 
						$i++; ?>
						<div class="input_section">
						<div class="input_title">
	
							<h3><img src="<?php echo get_template_directory_uri();?>/img/options.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
							<span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="Save" /></span>
							<div class="clearfix"></div>
						</div>
						<div class="all_options">
						<?php break;

                }
            }?>
          <input type="hidden" name="action" value="save" />
          </form>

        </div>
        
        
        <form method="post" id="reset_form_footer">
            <p class="submit">
            <input name="reset" type="submit" value="Reset" class="btn btn-warning" />
            <input type="hidden" name="action" value="reset" />
            </p>
        </form>
        
        
        <div class="footer-credit">
            <p>Template By :  <a title="ٌWordpress Theme" href="http://wp-wordpress-themes.com/" target="_blank" >WP Theme </a> .</p>
        </div>
    </div>
    <?php
}

































// Breadcrumbs
function custom_breadcrumbs() {
      
    // Settings
    $separator          = ' / ';//&gt;
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = __('Homepage','Magazin1');
     
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
      
    // Get the query & post information
    global $post,$wp_query;
      
    // Do not display on the homepage
    if ( !is_front_page() ) {
      
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $class . '">';
          
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
          
        if ( is_archive() && !is_tax() && !is_category() ) {
             
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
             
        } else if ( is_archive() && is_tax() && !is_category() ) {
             
            // If post is a custom post type
            $post_type = get_post_type();
             
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                 
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
             
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
             
            }
             
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
             
        } else if ( is_single() ) {
             
            // If post is a custom post type
            $post_type = get_post_type();
             
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                 
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
             
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
             
            }
             
            // Get post category info
            $category = get_the_category();
             
            // Get last category post is in
            $last_category = end(array_values($category));
             
            // Get parent any categories and create array
            $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
            $cat_parents = explode(',',$get_cat_parents);
             
            // Loop through parent categories and store in variable $cat_display
            $cat_display = '';
            foreach($cat_parents as $parents) {
                $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
            }
             
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                  
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
              
            }
             
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                 
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                 
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
             
            } else {
                 
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                 
            }
             
        } else if ( is_category() ) {
              
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
              
        } else if ( is_page() ) {
              
            // Standard page
            if( $post->post_parent ){
                  
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                  
                // Get parents in the right order
                $anc = array_reverse($anc);
                  
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                  
                // Display parent pages
                echo $parents;
                  
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                  
            } else {
                  
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_day() ) {
              
            // Day archive
              
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
              
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
              
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
              
        } else if ( is_month() ) {
              
            // Month Archive
              
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
              
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
              
        } else if ( is_year() ) {
              
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
              
        } else if ( is_author() ) {
              
            // Auhor archive
              
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
              
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
          
        } else if ( get_query_var('paged') ) {
              
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
              
        } else if ( is_search() ) {
          
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
          
        } elseif ( is_404() ) {
              
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
      
        echo '</ul>';
          
    }
      
}








?>
