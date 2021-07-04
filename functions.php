<?php
/**
 * Factory-Founder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Factory-Founder
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'factory_founder_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function factory_founder_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Factory-Founder, use a find and replace
		 * to change 'factory-founder' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'factory-founder', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'factory-founder' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'factory_founder_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support('woocommerce');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'factory_founder_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function factory_founder_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'factory_founder_content_width', 640 );
}
add_action( 'after_setup_theme', 'factory_founder_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function factory_founder_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'factory-founder' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'factory-founder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="blog_side_bar_latest">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title pt-0">',
			'after_title'   => '</h2>',
			// 'before_title'  => '<div class="widget-title"><h2>',
			// 'after_title'   => '</h2><div class="title-border"></div></div>',
		)
	);

	// Project Sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Project Sidebar', 'factory-founder' ),
			'id'            => 'factory_project_sidebar',
			'description'   => esc_html__( 'Add Project sidebar widgets here.', 'factory-founder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="side_bar">
			<div class="project-info">',
			'after_widget'  => '</div></div></section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	// SearchOption Shopping
	register_sidebar(
		array(
			'name'          => esc_html__( 'Search Option Top Menu', 'factory-founder' ),
			'id'            => 'factory_search_top_menu',
			'description'   => esc_html__( 'Add Search Option Top Menu widgets here.', 'factory-founder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="side_bar">
			<div class="project-info">',
			'after_widget'  => '</div></div></section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets => 1', 'factory-founder' ),
			'id'            => 'factory_footer_1',
			'description'   => esc_html__( 'Add footer widgets here.', 'factory-founder' ),
			'before_widget' => '<div class="col-md-3"> <div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2><div class="title-border"></div></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets => 2', 'factory-founder' ),
			'id'            => 'factory_footer_2',
			'description'   => esc_html__( 'Add footer widgets here.', 'factory-founder' ),
			'before_widget' => '<div class="col-md-3"> <div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2><div class="title-border"></div></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets => 3', 'factory-founder' ),
			'id'            => 'factory_footer_3',
			'description'   => esc_html__( 'Add footer widgets here.', 'factory-founder' ),
			'before_widget' => '<div class="col-md-3"> <div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2><div class="title-border"></div></div>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets => 4', 'factory-founder' ),
			'id'            => 'factory_footer_4',
			'description'   => esc_html__( 'Add footer widgets here.', 'factory-founder' ),
			'before_widget' => '<div class="col-md-3"> <div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2><div class="title-border"></div></div>',
		)
	);

	// Register Custom widget Now
	register_widget('footer_recent_post');
	register_widget('sidbar_latest_post');
	register_widget('project_info');

}

//footer_recent_post widget start ////////
class  footer_recent_post extends WP_Widget{
	public function __construct(){
		parent ::__construct('footer_recent_post','Factory -> Footer Recent Blog Post');
	}

	// For Show wp input system 
	public function form($instant){
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo $instant['title'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_count') ?>">Page Count</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('page_count') ?>" name="<?php echo $this->get_field_name('page_count') ?>" value="<?php echo $instant['page_count'] ?>">
		</p>


		<?php
	}

	// For Show Out put
	public function widget($one,$two){
		?>

	<div class="footer-widget">
       <?php echo $one['before_title']; ?> <?php echo $two['title'] ?> <?php echo $one['after_title']; ?>


	   <div class="widget-content">
	   	<div class="img-thumb r_p_img margin-bot-25 ">
            
			
	   <?php 
	            $query = new WP_Query(
					array(
	            	'post_type' => 'post',
	            	'posts_per_page' => $two['page_count'],
					)
				);
	         ?>
        <?php while ($query->have_posts()):$query->the_post(); ?>

			<div class="img-thumb margin-bot-25">
				<div class="f_p_w_img">
					<?php the_post_thumbnail(); ?>
				</div>
            	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <h5>By <?php  echo the_author();?></h5>
                <p class="date"><span class="icon flaticon-calendar"></span><?php the_time('j M Y'); ?></p>
            </div>  

        <?php endwhile; ?>
             					
        </div>
        </div>

	</div>

		<?php
	}

}

//sidbar_latest_post widget start ////////
class  sidbar_latest_post extends WP_Widget{
	public function __construct(){
		parent ::__construct('sidbar_latest_post','Factory -> Sidebar latest Post');
	}

	// For Show wp input system 
	public function form($instant){
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo $instant['title'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_count') ?>">Page Count</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('page_count') ?>" name="<?php echo $this->get_field_name('page_count') ?>" value="<?php echo $instant['page_count'] ?>">
		</p>


		<?php
	}

	// For Show Out put
	public function widget($one,$two){
		?>
<div class="blog_side_bar_latest">
       <?php echo $one['before_title']; ?> <?php echo $two['title'] ?> <?php echo $one['after_title']; ?>
	   <?php 
	            $query = new WP_Query(
					array(
	            	'post_type' => 'post',
	            	'posts_per_page' => $two['page_count'],
					)
				);
	         ?>
        <?php while ($query->have_posts()):$query->the_post(); ?>
	   <div class="sidebar_latest">
	   		<?php the_post_thumbnail(); ?>
        	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
			<p class="mb-0">On : <?php the_time('j M Y'); ?> </p>
        	<p>Posted by<span> <?php  echo the_author();?></span></p>
        </div>
        <?php endwhile; ?>
</div>
	   
		<?php
	}

}

// Project Information widget start ////////
class  project_info extends WP_Widget{
	public function __construct(){
		parent ::__construct('project_info','Factory -> Project Info.');
	}

	// For Show wp input system 
	public function form($instant){
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo $instant['title'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('categories') ?>">Categories:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('categories') ?>" name="<?php echo $this->get_field_name('categories') ?>" value="<?php echo $instant['categories'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('start') ?>">Start:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('start') ?>" name="<?php echo $this->get_field_name('start') ?>" value="<?php echo $instant['start'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_count') ?>">Engineer:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('page_count') ?>" name="<?php echo $this->get_field_name('page_count') ?>" value="<?php echo $instant['page_count'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('worker') ?>">Worker:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('worker') ?>" name="<?php echo $this->get_field_name('worker') ?>" value="<?php echo $instant['worker'] ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('location') ?>">Location:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('location') ?>" name="<?php echo $this->get_field_name('location') ?>" value="<?php echo $instant['location'] ?>">
		</p>


		<?php
	}

	// For Show Out put
	public function widget($one,$two){
		?>
<div class="project-info">
	   <?php echo $one['before_title']; ?> <?php echo $two['title'] ?> <?php echo $one['after_title']; ?>
	   
	<div class="short-info">
        <i class="flaticon-drawing-architecture-project-of-a-house"></i>
        <a href="<?php the_permalink(); ?>"><span>Categories : </span><?php  echo $two['categories'];?></a>
	</div>
	
	<div class="short-info">
        <i class="flaticon-calendar"></i>
        <a href="<?php the_permalink(); ?>"><span>Start : </span><?php  echo $two['start'];?></a>
	</div>
	<div class="short-info">
        <i class="flaticon-engineer"></i>
        <a href="<?php the_permalink(); ?>"><span>Engineer : </span><?php  echo $two['page_count'];?></a>
	</div>
	<div class="short-info">
        <i class="flaticon-mechanic"></i>
        <a href="<?php the_permalink(); ?>"><span>Worker : </span><?php  echo $two['worker'];?></a>
	</div>
	<div class="short-info">
        <i class="flaticon-signs"></i>
        <a href="<?php the_permalink(); ?>"><span>Location : </span><?php  echo $two['location'];?></a>
	</div>
								
	   
</div>
	   
		<?php
	}

}






add_action( 'widgets_init', 'factory_founder_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function factory_founder_scripts() {
	
	wp_enqueue_style( 'factory-default', get_template_directory_uri() . '/assets/css/default.css', array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0');
	wp_enqueue_style( 'factory-founder-style', get_stylesheet_uri() );
	wp_enqueue_style( 'factory-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.1');

	wp_enqueue_script( 'popper-bootstrap', get_template_directory_uri() . '/assets/js/jquery-1.12.5.js', array('jquery'), '1.12.5', true );

	wp_enqueue_script( 'popper-bootstrap', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true );


	wp_enqueue_script( 'factory-bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-countTo', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-validate', get_template_directory_uri() . '/assets/js/validate.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-mCustomScrollbar-concat', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-mixitup', get_template_directory_uri() . '/assets/js/jquery.mixitup.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-menuzord', get_template_directory_uri() . '/assets/js/menuzord.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-themepunch-tools', get_template_directory_uri() . '/assets/js/jquery.themepunch.tools.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-themepunch-revolution', get_template_directory_uri() . '/assets/js/jquery.themepunch.revolution.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-actions', get_template_directory_uri() . '/assets/js/revolution.extension.actions.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-carousel', get_template_directory_uri() . '/assets/js/revolution.extension.carousel.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension.kenburn', get_template_directory_uri() . '/assets/js/revolution.extension.kenburn.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-layeranimation', get_template_directory_uri() . '/assets/js/revolution.extension.layeranimation.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-migration', get_template_directory_uri() . '/assets/js/revolution.extension.migration.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-navigation', get_template_directory_uri() . '/assets/js/revolution.extension.navigation.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-parallax', get_template_directory_uri() . '/assets/js/revolution.extension.parallax.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-slideanims', get_template_directory_uri() . '/assets/js/revolution.extension.slideanims.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-revolution-extension-video', get_template_directory_uri() . '/assets/js/revolution.extension.video.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'factory-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.1', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// CSS & Script of Theme Option 

	$head_scripts = cs_get_option('head_scripts');
	wp_add_inline_script('factory-custom', $head_scripts);

	$stock_custom_css = cs_get_option('stock_custom_css');
	wp_add_inline_style('factory-founder-style', $stock_custom_css);

	$body_end_scripts = cs_get_option('body_end_scripts');
	wp_add_inline_script('factory-custom', $body_end_scripts);

}
add_action( 'wp_enqueue_scripts', 'factory_founder_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * metabox-and-options.
 */
require get_template_directory() . '/inc/metabox-and-options.php';

/**
 * custom_style.
 */
require get_template_directory() . '/inc/custom_style.php';

/**
 * theme-option.
 */
require get_template_directory() . '/inc/theme-option.php';
/**
 * required-plugins.php.
 */
require get_template_directory() . '/inc/required-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * WooCommerce Active.
 */

if ( class_exists( 'WooCommerce' ) ) {
	// code that requires WooCommerce
	  
	  // Handle cart in header fragment for ajax add to cart
	  add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
	  function stock_crazycafe_header_add_to_cart_fragment( $fragments ) {
		  global $woocommerce;
	  
		  ob_start();
	  
		  stock_crazycafe_woocommerce_cart_link();
	  
		  $fragments['a.cart-button'] = ob_get_clean();
	  
		  return $fragments;
	  
	  }
	  
	  function stock_crazycafe_woocommerce_cart_link() {
		  global $woocommerce;
		  ?>
  
  		<div class="factory-shopping-cart">
		  <a title="<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('in your shopping cart', 'woothemes'); ?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">

			  <i class="fa fa-shopping-cart"></i>
			  <span class="factory-cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>

		  </a>
		</div>
		  
		  <?php
	  }
  
  }
  // else {
  // 	// you don't appear to have WooCommerce activated
  //   }
  
// Import demo data =================== 

function factory_founder_import_files() {
	return array(
		array(
			'import_file_name'           	=> esc_html__('Demo Import 1', 'factory-founder'),

			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-data/factory-founder-demo-data.xml',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-data/factory-founder-export.dat',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/factory-founder-widgets.wie',
			
			'import_notice'              	=> __( 'After import demo, just set static homepage from settings > reading, check widgets & menus. You will be done! :-)', 'factory-founder' ),
		)
	);
} // industry_import_files
add_filter( 'pt-ocdi/import_files', 'factory_founder_import_files' );

