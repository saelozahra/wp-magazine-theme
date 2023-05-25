jQuery(document).ready(function(){


jQuery("#btn_style1").click(function(){
	jQuery("#id_mag_color").val("ef7d81");
	jQuery("#id_mag_color").val("#ef7d81");
	jQuery("#id_mag_l_n_n").val("3");
	jQuery("#id_mag_r_p_n").val("3");
	jQuery("#id_mag_d_icon").val("fa-spinner fa-spin");
	jQuery("#mag_l_n_c").val("latest-news");
	jQuery("#mag_slider1_cat").val("slider");
	jQuery("#id_mag_ads1").val("http://wp-wordpress-themes.com/mag3/wp-content/themes/mag1/img/content/banner1.png");
	jQuery("#id_mag_ads2").val("http://wp-wordpress-themes.com/mag3/wp-content/themes/mag1/img/content/banner1.png");
	jQuery("#id_mag_ads3").val("http://wp-wordpress-themes.com/mag1/wp-content/themes/mag1/img/content/ads2.png");
	jQuery("#id_mag_r_ph_t").val("Recent Photo");
	jQuery("#id_mag_r_ph_n").val("12");
	jQuery("#id_mag_sld_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/City_Wallpaper_1080p_12.jpg");
	jQuery("#id_mag_footer_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/Beach_javi_Sempere_Sildeer.jpg");
	jQuery("#id_mag_dl_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/HNCK7388.jpg");
	jQuery("#mag_r_p_c").val("latest-news");
	jQuery("#form_option_1").submit();
});

jQuery("#btn_style2").click(function(){
	jQuery("#id_mag_color").val("ef7d81");
	jQuery("#id_mag_color").val("#ef7d81");
	jQuery("#id_mag_l_n_n").val("3");
	jQuery("#id_mag_r_p_n").val("0");
	jQuery("#id_mag_d_icon").val("fa-spinner fa-spin");
	jQuery("#mag_l_n_c").val("latest-news");
	jQuery("#mag_slider1_cat").val("slider");
	jQuery("#id_mag_ads1").val("http://wp-wordpress-themes.com/mag3/wp-content/themes/mag1/img/content/banner1.png");
	jQuery("#id_mag_ads2").val("http://wp-wordpress-themes.com/mag3/wp-content/themes/mag1/img/content/banner1.png");
	jQuery("#id_mag_ads3").val("http://wp-wordpress-themes.com/mag1/wp-content/themes/mag1/img/content/ads2.png");
	jQuery("#id_mag_r_ph_t").val("Photo Gallery");
	jQuery("#id_mag_r_ph_n").val("6");
	jQuery("#id_mag_sld_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/City_Wallpaper_1080p_12.jpg");
	jQuery("#id_mag_footer_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/Beach_javi_Sempere_Sildeer.jpg");
	jQuery("#id_mag_dl_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/HNCK7388.jpg");
	jQuery("#mag_r_p_c").val("latest-news");
	
	
	jQuery("#form_option_1").submit();
});

jQuery("#btn_style3").click(function(){
	jQuery("#id_mag_color").val("ffffff");
	jQuery("#id_mag_color").val("#ffffff");
	jQuery("#id_mag_l_n_n").val("3");
	jQuery("#id_mag_r_p_n").val("3");
	jQuery("#id_mag_d_icon").val("fa-spinner fa-spin");
	jQuery("#mag_l_n_c").val("latest-news");
	jQuery("#mag_slider1_cat").val("slider");
	jQuery("#id_mag_ads1").val("http://wp-wordpress-themes.com/mag3/wp-content/themes/mag1/img/content/ads3.png");
	jQuery("#id_mag_ads2").val("");
	jQuery("#id_mag_ads3").val("http://wp-wordpress-themes.com/mag1/wp-content/themes/mag1/img/content/ads2.png");
	jQuery("#id_mag_r_ph_t").val("Photo Gallery");
	jQuery("#id_mag_r_ph_n").val("6");
	jQuery("#id_mag_sld_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/City_Wallpaper_1080p_12.jpg");
	jQuery("#id_mag_footer_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/Beach_javi_Sempere_Sildeer.jpg");
	jQuery("#id_mag_dl_bg_default").val("http://wp-wordpress-themes.com/mag1/wp-content/uploads/2015/08/HNCK7388.jpg");
	jQuery("#mag_r_p_c").val("latest-news");	
	
	jQuery("#form_option_1").submit();
});



jQuery("#reset_form").click(function(){
	jQuery("#reset_form_footer").submit();
});


jQuery('.all_options').slideUp();

jQuery('.input_title h3').click(function(){

if(jQuery(this).parent().next('.all_options').css('display')=='none')
	{    
		jQuery(this).removeClass('inactive');
		jQuery(this).addClass('active');
		jQuery(this).children('img').removeClass('inactive');
		jQuery(this).children('img').addClass('active');
	}
else
	{    
	
		jQuery(this).removeClass('active');
		jQuery(this).addClass('inactive');
		jQuery(this).children('img').removeClass('active');
		jQuery(this).children('img').addClass('inactive');
	
	}

jQuery(this).parent().next('.all_options').slideToggle('slow');

});

});