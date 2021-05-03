<?php 

/* Breadcrumbs  */
function hotel_galaxy_breadcrums() {
    $delimiter = '';
    $home = __('Home', 'hotel-galaxy' ); // text for the 'Home' link
    $before = __('<li class="active">','hotel-galaxy'); // tag before the current crumb
    $after = __('</li>','hotel-galaxy'); // tag after the current crumb
    
    global $post;
    $homeLink = home_url();
    
    echo '<li><a href="' .esc_url( $homeLink) . '">' . esc_attr($home) . '</a></li>' . esc_attr($delimiter) . ' ';
    
    if (is_day()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo $before .'<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('d'))) . '">'. esc_attr(get_the_time('d')) .'</a>'. $after;
    } elseif (is_month()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y')) . '">' . esc_attr(get_the_time('Y'))) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo $before.'<a href="' .  esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a>' .$after;
    } elseif (is_year()) {
        echo $before . esc_attr(get_the_time('Y')) . $after;
    } elseif (is_single() && !is_attachment()) {
       if (get_post_type() == 'package') {
            $venues =  wp_get_post_terms(get_the_ID(), 'parent_venue');
            foreach($venues as $things) {
                $venue_id = $things->name;
            }
            $venue_name = get_the_title($venue_id);
            $venue_link = get_the_permalink($venue_id);
            echo '<li><a href="' . $venue_link . '/">' . $venue_name . '</a></li> ' . esc_attr($delimiter) . ' ';
            echo $before . get_the_title() . $after;
	   } elseif (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . esc_attr($post_type->labels->singular_name) . '</a></li> ' . esc_attr($delimiter) . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];            
            echo $before.'<a href="'.esc_url(get_post_permalink()).'">' . esc_attr(get_the_title()) .'</a>' . $after;
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . esc_attr($post_type->labels->singular_name) . $after;
    
    } elseif (is_attachment()) {
        
        $parent = get_post($post->post_parent);       

        echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_attr($parent->post_title) . ' /&nbsp;</a></li></a></li> ' . esc_attr($delimiter) . ' ';
        echo $before . esc_attr(get_the_title()) . $after;
    } 

    elseif (is_page() && !$post->post_parent)
    {
        echo $before . '<a href="">'.esc_attr(get_the_title()).'</a>' . $after;
    } 

    elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_attr(get_the_title($page->ID)) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . esc_attr($delimiter) . ' ';
        echo $before . esc_attr(get_the_title()) . $after;
    } elseif (is_search()) {
        echo $before .'<a href="' . esc_url(get_permalink($page->ID)) . '">'. esc_attr(get_search_query()) . '</a>'. $after;

    }elseif (is_404()) {
        echo $before . '<a href="' . esc_url(get_permalink($page->ID)) . '">'._e("Error 404",'hotel-galaxy').'</a>' . $after;
    }


}

function hotel_galaxy_breadcrums_style(){
    $hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
    $hotel_galaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 
    ?>
    <style type="text/css">
    .page-title-section {
        background: url(<?php if($hotel_galaxy_settings['page_title_bg']){ echo esc_url($hotel_galaxy_settings['page_title_bg']);} ?>) no-repeat fixed 0 0 / cover rgba(0, 0, 0, 0);
    }
    </style>
    <?php 
}

function hotel_galaxy_custom_breadcrums($id_get){
    hotel_galaxy_breadcrums_style();
    if($id_get=='author'){
        $id=get_the_author();
        $title=__('Author Archives :','hotel-galaxy');
    }elseif($id_get=='tag'){
     $id=single_tag_title( '', false );
     $title=__('Tag :','hotel-galaxy');
 }
 elseif($id_get=='category'){
     $id=single_cat_title( '', false );
     $title=__('Category Archives :','hotel-galaxy');
 }elseif($id_get=='404'){
     $id=__('404 Error','hotel-galaxy');
     $title=__('Search Results Not Found !!!','hotel-galaxy');    
 }
 
 elseif($id_get=='search'){
     $id=get_search_query();
     $title=__('Search Results for:','hotel-galaxy');
     $search_error=__('Search Results Not Found !!!','hotel-galaxy');
 }
 ?>
 <!-- Page Heading Collout -->
 <div class="page-title-section">        
    <div class="overlay">
        <div class="container">
            <div class="row" id="trapezoid">
             <div class="col-md-12 text-center pageinfo page-title-align-center">
                <?php if($id_get=='404' ||$id_get=='tag' || $id_get=='author' || $id_get=='category'){
                    ?>
                    <h1 class="pagetitle white animate" data-anim-type="fadeInLeft"><?php echo esc_html($id);  ?></h1>
                    <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
                        <li><?php  printf(  __( '%1$s  %2$s', 'hotel-galaxy' ), $title, $id ); ?></li>
                        
                    </ul>    
                    <?php
                }elseif($id_get=='search'){
                    ?>
                    <h1 class="pagetitle white animate" data-anim-type="fadeInLeft"><?php echo esc_attr($id);  ?></h1>
                    <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
                        <li><?php if(have_posts()) {                            
                            printf(  __( '%1$s  %2$s', 'hotel-galaxy' ), $title, $id );
                        }else{                          
                           echo esc_attr($search_error); 
                        }
                        ?>
                        <?php rewind_posts(); ?>
                    </li>

                </ul>  
                <?php
            } ?>

        </div>
    </div>
</div>  
</div>
</div>
<!-- /Page Heading Collout -->
<?php
}
?>