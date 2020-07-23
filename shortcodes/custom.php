<?php
function test() {	
		$return .= 'hello';
	return $return;
}
add_shortcode('test', 'test');

/*GalleryWithOverlay*/
function SW_Gallery($Choices = '') {
$images = get_field('gallery');
$return = '';
	if( $images ){
		$return .= '<ul class="Gallery">';
		foreach($images as $image){
				$return .= '<li>';
                                if ($Choices['link'] == true){
					$return .= '<a href="' .  $image['url'] . '" rel="lightbox" class="' . $image['title'] . '">';
                                }
					$return .=  '<img src="' . esc_url($image['sizes']['large']) .'" alt="'.  esc_attr($image['alt']) . '" /> ';
                                 if($Choices['overlay'] == true){
                                    $return .= '<div class="overlay"> </div> </a>';
                                 }elseif($Choices['caption'] == true){
                                    $return .= '<p>' . esc_html($image['caption']) .' </p>';
                                 }
				$return .= '</li>';
		}
		
		$return .= '</ul>';
	}

	return $return;
}
add_shortcode('Gallery', 'SW_Gallery');

/*FileUrls*/
function SW_FileUrls($Choices = '') {
$Documents = get_field($Choices['repeater']);
$return = '';
	if( $Documents){
	    $return .= $Choices['title'];
		$return .= '<ul class="links">';
		foreach($Documents as $file){
				$return .= '<li>';
					$return .= '<a href="' .  $file['file']['url'] . '">' .$file['file']['title'] . '</a>' ;
				$return .= '</li>';
		}
		
		$return .= '</ul>';
	}

	return $return;
}
add_shortcode('repeaterfileList', 'SW_FileUrls');


/*Adds a title and list of custom post*/
add_shortcode( 'ListPosts', 'SW_Cusom_Post' );

    function SW_Cusom_Post($category = ''){
        $args = array(
            'post_type' => $category['posttype'],
            'post_status' => 'publish',
	    'posts_per_page' => -1,
            /*'tax_query'=> array(
                    array(
                        'taxonomy' => 'servicescategories', // This is the taxonomy's slug!
                        'field' => 'slug',
                        'terms' => array($category['categoryslug']) // This is the term's slug!
                    )
            )*/
        );
        if($category['title'] = True){
            $string = '<h6>'. $category['category'].'</h6> ' ;
        }
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
            $string .= '<ul>';
            while( $query->have_posts() ){
                $query->the_post();
                $string .= '<li> <a href="'. get_the_permalink() .'">' . get_the_title() . ' </a> </li>';
            }
            $string .= '</ul>';
        }
        wp_reset_postdata();
        return $string;
    }