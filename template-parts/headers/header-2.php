
<header class="site-header header-style-2">
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
					<div class="col-md-8 text-right">
						<?php 
							$header_top_2 = cs_get_option('header_top_2');
							if(!empty($header_top_2)) :
						?>
						<div class="header-right-style-2">
							<?php foreach ($header_top_2 as $header_style_2 ) :
							 ?>
								<a href="<?php echo $header_style_2['header_link']; ?>" target="<?php echo $header_style_2['header_link_tab']; ?>">
									<i style="color:<?php echo $header_style_2['icon_color']; ?>" class="<?php echo $header_style_2['header_icon']; ?>"></i> <?php echo $header_style_2['header_sub_title']; ?> <br />
									<span><?php echo $header_style_2['header_title']; ?></span>
								</a>
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
					<div class="col-md-8">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</div>
					<div class="col-md-4">
						<div class="header-search-form">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>