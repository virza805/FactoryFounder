<?php 

add_filter('cs_metabox_options','factory_metabox_option');

function factory_metabox_option($metabox){

	$metabox = array();
	$metabox[]  = array(
				'id' => '_pagetitle',
				
				'title' => esc_html__( 'Inner Page Title Option','factory-founder'),
				'post_type' => 'page', // or post or CPT or array ('page','post')
				'context' => 'normal',
				'priority' => 'default',
				'sections'  => array(

					// begin section
					array(
						'name' => 'Title breadcrumb',
						'icon' => 'fa fa-wifi',
						'fields' => array(
							array(
								'id' => 'banner_swi',
								'type' => 'switcher',
								'title' =>  esc_html__('Baner On/Off','factory-founder')
							),
							array(
								'id' => 'banner',
								'type' => 'image',
								'title' =>  esc_html__('Baner Upload','factory-founder'),
								'dependency'=> array('banner_swi','==','true')
							),
							array(
								'id' => 'custom_title',
								'type' => 'text',
								'title' =>  esc_html__('Baner Custom Title','factory-founder'),
                                'dependency'=> array('banner_swi','==','true'),
                                'desc'     =>  esc_html__('If you want to show custom title ', 'factory-founder'), 
							),






							),
						),
				),
			);

				return $metabox;

}

 ?>