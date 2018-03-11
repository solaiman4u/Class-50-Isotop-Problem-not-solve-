<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package industry
 */

get_header(); ?>

<div class="industry-page-title-area">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-<?php echo $text_title_direction; ?>">
                <?php if(function_exists('bcn_display')){bcn_display(); } ?>
            </div>
        </div>
    </div>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php						
							woocommerce_content();					
						?>
                </div>
            </div>
        </div>
    </main>
    <!-- #main -->
</div>
<!-- #primary -->



<?php
get_footer();
