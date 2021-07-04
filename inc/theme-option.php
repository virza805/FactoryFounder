<?php 

define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true 
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME', false ); // default false
//setting theme option
add_filter('cs_framework_settings','factory_theme_options_setting');

function factory_theme_options_setting(){
	$settings = array(
		'menu_title'=>'Factory Theme Options',
		'menu_slug' =>'theme-options',
		'menu_type'	=>'menu',
		'framework_title'=>'Factory-Founder Theme Option' 
	);

	return $settings;
}
add_filter('cs_framework_options','factory_theme_logo_options');

function factory_theme_logo_options($options){
	 $options = array();

	// Factory Logo Setting ... .. .
	$options[]=array(
		'name' => 'factory-logo',
		'title' => 'Factory Logo',
		'icon' => 'fa fa-bars',
		'fields' => array(
			array(
				'id' => 'title_swi',
				'type' => 'switcher',
				'title' => esc_html__( 'Site Title On/Off','factory-founder'),
				'dependency'=> array('logo_swi','==','false')
			),
			array(
				'id' => 'site_title',
				'type' => 'text',
				'title' =>  esc_html__('Site Title','factory-founder'),
				'dependency'=> array('title_swi','==','true')
			),

			array(
				'id' => 'logo_swi',
				'type' => 'switcher',
				'title' =>  esc_html__('Site logo On/Off','factory-founder'),
				'dependency'=> array('title_swi','==','false')
			),
			array(
				'id' => 'logo',
				'type' => 'image',
				'title' =>  esc_html__('Logo Upload','factory-founder'),
				'dependency'=> array('logo_swi','==','true')
			),

			array(
				'id' => 'img_swi',
				'type' => 'switcher',
			//	'dependency'=> array('title_swi','==','false'),
				'title' =>  esc_html__('Search/Error image On/Off','factory-founder')
			),
			array(
				'id' => 's_e_img',
				'type' => 'image',
				'title' =>  esc_html__('Slid image Upload','factory-founder'),
				'dependency'=> array('img_swi','==','true')
			),
		)
	);

	// Factory Header Settings ... .. .

	$options[] = array(
        'name'   => 'stock_crazycafe_header_settings',
        'title'       => esc_html__( 'Header Settings', 'factory-founder'),
        'description' => 'This system create to teach RRF',
        'icon' => 'fa fa-header', //  fa-diamond
        'fields'      => array(
	
			array(
				'id'    => 'opening_hours',
				'type'  => 'text',
				'title' => esc_html__( 'Opening Hours :', 'factory-founder'),
				'default'   => esc_html__('Monday to Saturday - 8am to 9pm', 'factory-founder'),
			),
            array(
                'id'        => 'header_top_menu',
                'type'      => 'group',
                'title'     => esc_html__( 'Header Right Menu', 'factory-founder'),
                'desc'   => esc_html__('Now, you can set right side menu after opneing area...', 'factory-founder'),
                
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New Footer Menu item',
                'fields'    => array(
                  
                  
                    array(
                        'id'    => 'last_menu_title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Header right Menu item', 'factory-founder'),
                        'default'   => esc_html__('Privacy policy     |     Terms & Conditions', 'factory-founder'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Header Menu Link', 'factory-founder'),
                        'desc' => 'Leave blank if you do not want a link',
                    ),
                ),
			),
			
			array(
				'id'    => 'main_menu_right_heading',
				'type'  => 'text',
				'title' => esc_html__( 'Main Menu right side Heading', 'factory-founder'),
				'default'   => esc_html__('GET FREE CONSULTATION', 'factory-founder'),
			),
			array(
				'id'    => 'main_menu_right_heading_link',
				'type'  => 'text',
				'title' => esc_html__( 'Main Menu right side Heading Link', 'factory-founder'),
			),

			
			array(
				'id' => 'name_img_swi',
				'type' => 'switcher',
			//	'dependency'=> array('title_swi','==','false'),
				'default'   => 'false',
				'title' =>  esc_html__('Company Name image On/Off','factory-founder')
			),
			array(
				'id' => 'name_img',
				'type' => 'image',
				'title' =>  esc_html__('Name image Upload','factory-founder'),
				'dependency'=> array('name_img_swi','==','true')
			),

			
            array(
                'id'        => 'header_iconic_boxes',
                'type'      => 'group',
                'title'     => esc_html__( 'Iconic Boxes', 'factory-founder'),
                'desc'     => 'If you want to show Iconic Box on header. Add those here',
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New Box',
				'dependency'=> array('name_img_swi','==','false'),
                'fields'    => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Title', 'factory-founder'),
                    ),
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__( 'Box icon', 'factory-founder'),
                    ),
                    array(
                        'id'    => 'big_title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Big Title', 'factory-founder'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Box Link', 'factory-founder'),
                        'desc' => 'Leave blank if you do not want a link',
                    ),
                ),
			),  
			
			array(
                'id'        => 'social_links',
                'type'      => 'group',
                'title'     => esc_html__( 'Social Links', 'factory-founder'),
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New link',
                'fields'    => array(
                  
                  array(
                    'id'    => 'icon',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Box icon', 'factory-founder'),
                  ),
                  array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Link', 'factory-founder'),
                  ),
                ),
			), 
			
        )
	  );
	
 // Factory Founder Font family / Typography  >----->
 $options[] = array(
	'name'      => 'stock_crazycafe_typography_settings',
	'title'   => esc_html__( 'Typography Settings', 'factory-founder'),
	'icon' => 'fa fa-font',
	'fields' => array(
		array(
		'id'       => 'body_font',
		'type' => 'typography',
		'title'   => esc_html__( 'Body font', 'factory-founder'),
		'desc'   => esc_html__('Default font "Hind, sans-serif". If you want to show different font family, you can change now . From Google', 'factory-founder'),
		'default' => array(
			'font-family' => 'Hind',
			'variant'        => 'regular',
			'type'        => 'google', 
			'font'        => 'google', // this is helper for output
			
			),
		),
		array(
			'id'         => 'body_font_variant',
			'type'       => 'checkbox',
			'title'      => esc_html__( 'Body font types', 'factory-founder'),
			'options'    => array(
			  '100' => '100',
			  '100i' => '100i',
			  '200' => '200',
			  '200i' => '200i',
			  '300' => '300',
			  '300i' => '300i',
			  '400' => '400',
			  '400i' => '400i',
			  '500' => '500',
			  '500i' => '500i',
			  '700' => '700',
			  '700i' => '700i',
			  '900' => '900',
			  '900i' => '900i',
			),
			'default'    => array( '400', '400i', '700i', '700i' )
		),
		array(
		'id'       => 'heading_font',
		'type' => 'typography',
		'title'   => esc_html__( 'Heading font', 'factory-founder'),
		'desc'   => esc_html__('Default font "Hind & 700" .If you want to change heading font family, you can do... From Google', 'factory-founder'),
		'default' => array(
			'font-family' => 'Hind',
			'variant'        => '700', 
			'type'        => 'google',
			'font'        => 'google', // this is helper for output
			
			),
		),
		array(
			'id'         => 'heading_font_variant',
			'type'       => 'checkbox',
			'title'      => esc_html__( 'Body font types', 'factory-founder'),
			'options'    => array(
			  '100' => '100',
			  '100i' => '100i',
			  '200' => '200',
			  '200i' => '200i',
			  '300' => '300',
			  '300i' => '300i',
			  '400' => '400',
			  '400i' => '400i',
			  '500' => '500',
			  '500i' => '500i',
			  '700' => '700',
			  '700i' => '700i',
			  '900' => '900',
			  '900i' => '900i',
			),
			'default'    => array( '400', '400i', '700i', '700i' )
		),
		  
	)
);

// Factory Founder Styling/PreLoader>----->
$options[] = array(
	'name'      => 'stock_crazycafe_styling_settings',
	'title'   => esc_html__( 'Styling Settings', 'factory-founder'),
	'icon' => 'fa fa-diamond',
	'fields' => array(
		array(
		'id'       => 'theme_color',
		'type' => 'color_picker',
		'title'   => esc_html__( 'Theme Color', 'factory-founder'),
		'default'   => esc_attr__('#ffcc00', 'factory-founder'),
		),
		array(
		'id'       => 'theme_seconday_color',
		'type' => 'color_picker',
		'title'   => esc_html__( 'Theme Secondary Color', 'factory-founder'),
		'default'   => esc_attr__('#ffffff', 'factory-founder'),
		),
		array(
		'id'       => 'enable_preloader',
		'type' => 'switcher',
		'title'   => esc_html__( 'Enable Preloader', 'factory-founder'),
		'desc'   => esc_html__( 'Enable Theme Preloader', 'factory-founder'),
		'default'   => true,
		),
		array(
		'id'       => 'enable_s_preloader',
		'type' => 'switcher',
		'title'   => esc_html__('Enable Slid Preloader', 'factory-founder'),
		'desc'   => esc_html__('Enable Slid Preloader', 'factory-founder'),
		'default'   => true,
		),
		array(
		'id'       => 'enable_boxed_layout',
		'type' => 'switcher',
		'title'   => esc_html__( 'Enable boxed_layout', 'factory-founder'),
		'default'   => false,
		),
		array(
		'id'       => 'body_bg',
		'type' => 'image',
		'title'   => esc_html__('Body background image', 'factory-founder'),
		'dependency' => array('enable_boxed_layout', '==', 'true'),
		),
		array(
		'id'       => 'body_bg_color',
		'type' => 'color_picker',
		'title'   => esc_html__('Body background color', 'factory-founder'),
		'dependency' => array('enable_boxed_layout', '==', 'true'),
		),
		array(
		'id'       => 'body_bg_repeat',
		'type' => 'select',
		'default' =>'repeat',
		'options' => array(
			'repeat' => 'Repeat',
			'no-repeat' => 'No Repeat',
			'cover' => 'Cover',
		),
		'title'   => esc_html__( 'Body Background Style', 'factory-founder'),
		'dependency' => array('enable_boxed_layout', '==', 'true'),
		),
		array(
		'id'       => 'body_bg_attachment',
		'type' => 'select',
		'default' =>'scroll',
		'options' => array(
			'scroll' => 'Scroll',
			'fixed' => 'Fixed',
			'center' => 'Center',
		),
		'title'   => esc_html__( 'Body Background Position', 'factory-founder'),
		'dependency' => array('enable_boxed_layout', '==', 'true'),
		),
	)
);

 // Factory Founder Blog / News Settings >----->
 $options[] = array(
	'name'      => 'stock_crazycafe_blog_settings',
	'title'   => esc_html__( 'Blog Settings', 'factory-founder'),
	'icon' => 'fa fa-rss',
	'fields' => array(
		array(
			'id'    => 'blog_title',
			'type'  => 'text',
			'title' => esc_html__( 'Blog Title', 'factory-founder'),
			'default'   => esc_html__('Our Blog', 'factory-founder'),
			'desc' => esc_html__('You can change blog/news title', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_by',
		'type' => 'switcher',
		'title'   => esc_html__( 'Display post by ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show blog post author name on blog index page &  single blog, Select on', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_date',
		'type' => 'switcher',
		'title'   => esc_html__( 'Display post date ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show blog post date on blog index page &  single blog, Select on', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_comment_count',
		'type' => 'switcher',
		'title'   => esc_html__( 'Display post comment count ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show blog post comment count on blog index page &  single blog, Select on', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_category',
		'type' => 'switcher',
		'title'   => esc_html__( 'Display posted ind categories ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show blog post category on blog index page &  single blog, Select on', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_tag',
		'type' => 'switcher',
		'title'   => esc_html__( 'Display posted in tags ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show tags on blog index page &  single blog, Select on', 'factory-founder'),
		),
		array(
		'id'       => 'display_post_nav',
		'type' => 'switcher',
		'title'   => esc_html__('Enable next previous link on single post ?', 'factory-founder'),
		'default'   => true,
		'desc'   => esc_html__('If you want to show next previous link on blog index page &  single blog, Select on', 'factory-founder'),
		),
	)
);

 // Factory Founder Scripts Settings >-----> 
 $options[] = array(
	'name'   => 'stock_crazycafe_scripts_settings',
	'title'       => esc_html__('Scripts Settings', 'factory-founder'),
	'icon' => 'fa fa-file-text-o',
	'fields'      => array(
		array(
			'id'    => 'head_scripts',
			'type'  => 'textarea',
			'sanitize' => false,
			'title' => esc_html__( 'Head Scripts', 'factory-founder'),
			'desc' => esc_html__('Scripts goes before closing < / head >', 'factory-founder'),
		),    
		array(
			'id'    => 'stock_custom_css',
			'type'  => 'textarea',
			'sanitize' => false,
			'title' => esc_html__( 'Custom CSS', 'factory-founder'),
			'desc' => esc_html__( 'Add your custom CSS here', 'factory-founder'),
		),    
		array(
			'id'    => 'body_end_scripts',
			'type'  => 'textarea',
			'sanitize' => false,
			'title' => esc_html__('Footer scripts', 'factory-founder'),
			'desc' => esc_html__( 'Scripts goes just before < / body >', 'factory-founder'),
		),    
			
	)
);
	// Factory Footer widget Setting ... .. .
	$options[]=array(
		'name' => 'factory-footer',
		'title' => esc_html__('Factory Footer','factory-founder'),
		'icon' => 'fa fa-spinner',
		'fields' => array(
			
			array(
				'id' => 'column_set',
				'type' => 'select',
				'title' =>  esc_html__('Column Select','factory-founder'),
				'options'=> array(
					'1' => 'Column 1',
					'2' => 'Column 2',
					'3' => 'Column 3',
					'4' => 'Column 4',
				),

			),

			array(
				'id' => 'copy_on',
				'type' => 'switcher',
				'title' =>  esc_html__('Copyright On/Off','factory-founder'),
				'default'=> true,

			),
			array(
				'id' => 'copy',
				'type' => 'textarea',
				'title' =>  esc_html__('Footer Copyright','factory-founder'),
				'dependency'=> array('copy_on','==','true'),
				'default'=> 'Copyright &copy; 2016. All Rights Reserved.',

			),
			array(
                'id'        => 'footer_bottom_menu',
                'type'      => 'group',
                'title'     => esc_html__( 'Footer Right Menu', 'factory-founder'),
                'desc'   => esc_html__('Now, you can set right side menu after Copyright...', 'factory-founder'),
                
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New Footer Menu item',
                'fields'    => array(
                  
                  
                    array(
                        'id'    => 'footer_last_menu_title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Footer right Menu item', 'factory-founder'),
                        'default'   => esc_html__('Terms Of Use | Privacy & Security Statement', 'factory-founder'),
                    ),
                    array(
                        'id'    => 'footer_menu_link',
                        'type'  => 'text',
                        'title' => esc_html__('Footer Menu Link', 'factory-founder'),
                        'desc' => 'Leave blank if you do not want a link',
                    ),
                ),
			),

			array(
				'id' => 'footer_bg_color',
				'type' => 'color_picker',
				'title' =>  esc_html__('Footer Widget Background Color','factory-founder'),
				'desc'   => esc_html__('If you want to show different footer widget background color you can change now ', 'factory-founder'),
				
				'default'=> esc_attr__('#2c343b', 'factory-founder'),

			),
			array(
				'id'       => 'footer_text_color',
				'type' => 'color_picker',
				'title'   => esc_html__('Footer text color', 'factory-founder'),
				'default'   => esc_attr__('#999999', 'factory-founder'),
				'desc'   => esc_html__('If you want to show different footer widget text color you can change now ', 'factory-founder'),
			),
			array(
				'id'       => 'footer_heading_color',
				'type' => 'color_picker',
				'title'   => esc_html__( 'Footer Heading color', 'factory-founder'),
				'default'   => esc_attr__('#ffffff', 'factory-founder'),
				'desc'   => esc_html__('If you want to show different footer widget heading color you can change now ', 'factory-founder'),
			),

		)
	);
	return $options;
}