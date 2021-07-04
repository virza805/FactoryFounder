<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Factory-Founder
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function factory_founder_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'factory_founder_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function factory_founder_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'factory_founder_pingback_header' );

// This is Breadcrumb Nav XT alternative function

function inner_page_banner(){
	$page_meta = get_post_meta(get_the_ID(),'_pagetitle',true);

	$page_banner = isset($page_meta['banner']) ? $page_meta['banner'] : array();
	$banner_on_of = isset($page_meta['banner_swi']) ? $page_meta['banner_swi'] : array();

	$image_url = wp_get_attachment_image_url($page_banner,'full');
	if($banner_on_of == true) {

	?>

	<!--Start Slider area-->  
	<section class="pag-wrapper" style ="background-image: url(<?php echo esc_url($image_url); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="pag-home text-center">
                        <h2>
							<?php 
							if(array_key_exists('custom_title', $page_meta)) {
								$custom_title = $page_meta['custom_title'];
							} else {
								$custom_title = '';
							}
							
							if(!empty($custom_title)) { 
								echo esc_html($custom_title); } else { 
									the_title();
								} 
							?>
						</h2>
                        <ul class="list-inline">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li class="active"> <?php the_title(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--End Slider area-->




	<?php
	}
	
}

 ?>



