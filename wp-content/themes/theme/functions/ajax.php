<?php




function my_filters(){
    $args = array(
        'orderby' => 'date',
    );

    if( isset( $_POST['categoryfilter'] ) )
        $args = array(
            'post_type' => 'project',
	'post_status' => array('publish'),
            'nopaging' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'expertise',
                    'field' => 'id',
                    'terms' => $_POST['categoryfilter']
                )
            ),
        );


    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            $subsectors = get_the_terms($post->ID, 'subsector');
            $classes = array();
            if($subsectors){
                $classes = array_column($subsectors, 'slug');
            }

            echo '<div class="column js-project-wrapper ';
            foreach($classes as $class){echo 'subsector-'.$class.' ';};
            echo '" data-subsectors="';
            echo implode('+',$classes);
            echo '"><div class="column-inner">';
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
            echo '</div></div>';
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}


add_action('wp_ajax_customfilter', 'my_filters');
add_action('wp_ajax_nopriv_customfilter', 'my_filters');


function sr_dash_redirect() {
    if( is_admin() && !current_user_can('administrator') && !DOING_AJAX) {
        wp_redirect( home_url() );
    }
}
add_action('init', 'sr_dash_redirect' );