<?php

//isotop ShortCode
function industry_isotop_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title' => ''
        
    ), $atts));
    
    $isotop_categories = get_terms('isotop_cat');

    $dynamic_isotop = rand(630439, 630440);
    
    $industry_isotop_markup = '
    
        <script>
        jQuery(document).ready(function($) {

            $(".isotop-filter li").click(function() {

                $(".isotop-filter li").removeClass("active");
                $(this).addClass("active");

                var selector = jQuery(this).attr("data-filter");
                $(".isotop-list-'.$dynamic_isotop.'").isotope({
                    filter: selector,
                });

            });
        });

        jQuery(window).load(function() {

            jQuery(".isotop-list-'.$dynamic_isotop.'").isotope();

        });
        </script>

        <div class="row">
            <div class="col-md-12">
            <div class="iso">
            <ul class="isotop-filter">
                <li class="active" data-filter="*">All Work</li>';
    
    if (!empty($isotop_categories) && !is_wp_error($isotop_categories)) {
        foreach ($isotop_categories as $isotop_category) {
            
            $industry_isotop_markup .= '<li data-filter=".'.$isotop_category->slug.'">' . $isotop_category->name . '</li>';
        }
    }
    
    
    $industry_isotop_markup .= ' 

        </ul>
            </div>                
        </div>
        <div class="col-md-12">
        <div class="row isotop-list-'.$dynamic_isotop.'">';

        $isotop_query = new WP_Query(array(
            'post_type' => 'industry-isotop',
            'posts_per_page' => -1));

        while ($isotop_query->have_posts()):
        $isotop_query->the_post();

        $isotop_category = get_the_terms(get_the_ID(), 'isotop_cat' );

        if (!empty($isotop_category) && !is_wp_error($isotop_category)) {

            $project_cat_list = array();

             foreach ($isotop_category as $Single_isotop_category) {
                $project_cat_list[] = $Single_isotop_category->slug;
             }
             $isotop_assigned_cat = join(" ", $project_cat_list);
        }else {
            $isotop_assigned_cat = '';
        }

         $industry_isotop_markup .= ' 
         <div class="col-md-4 '.$isotop_assigned_cat.'">         
            <a href="'.get_permalink().'" class="isotop-box">
               <div style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(),'large').')" class="isotop-box-bg"><i class="fa fa-plus" aria-hidden="true"></i></div>
                <p>'.get_the_title().'</p>
            </a>            
        </div>';

        endwhile;
        wp_reset_query();

        $industry_isotop_markup .= '
                 </div>
            </div>
        </div>';
    
    return $industry_isotop_markup;
    
}
add_shortcode('industry_isotop', 'industry_isotop_shortcode');