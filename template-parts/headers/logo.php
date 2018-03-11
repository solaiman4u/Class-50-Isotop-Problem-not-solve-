<?php
$logo_text = cs_get_option('logo_text');
if(has_custom_logo()){

	the_custom_logo();
}else{?>

	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php if(!empty($logo_text)){ echo esc_html($logo_text); } else{ bloginfo( 'name' );} ?></a></h1>
<?php }
	
	
?>

<div class="responsive-menu-wrap"></div>