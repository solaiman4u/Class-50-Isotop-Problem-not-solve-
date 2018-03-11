<?php
$menu_width = cs_get_option('menu_width');
$enable_search = cs_get_option('enable_search');
$search_width = cs_get_option('search_width');
?>

<header class="site-header">
		<div class="header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="site-branding">
							<?php
								get_template_part( 'template-parts/headers/logo');
							?>
						</div><!-- .site-branding -->
					</div>
					<div class="col-md-8">
					<?php 
							$header_top_1 = cs_get_option('header_top_1');
							if(!empty($header_top_1)) :
						?>
						<div class="header-right-btn">
						<?php foreach ($header_top_1 as $header_style_1 ) :
							 ?>
							<a target="<?php echo $header_style_1['header_link_tab_1']; ?>" href="<?php echo esc_url($header_style_1['header_link_1']); ?>"> <?php echo esc_html($header_style_1['header_sub_title_1']); ?></a>
							<?php endforeach; ?>							
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom-area">
			<div class="container">
				<div class="row">
					<div class="<?php if(!empty($menu_width)):?><?php echo esc_attr( $menu_width );?><?php else :?>col-md-8<?php endif; ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</div>
					<?php if($enable_search != false) : ?>
					<div class="<?php if(!empty($search_width)):?><?php echo esc_attr( $search_width );?><?php else :?>col-md-8<?php endif; ?>">
						<div class="header-search-form">
							<?php get_search_form(); ?>
						</div>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</header>