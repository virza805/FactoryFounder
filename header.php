<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Factory-Founder
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
    $enable_preloader = cs_get_option('enable_preloader'); 
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php  echo $body_start_scripts; ?>
<!-- 
    Preloader

https://codepen.io/sruthil/pen/wvMEmgj

-->

<?php if($enable_preloader == true) : ?>
	<!-- preloader -->
	<script>
            jQuery(window).load(function(){
                jQuery(".preloader-wrapper").fadeOut();

            });
    </script>
<!-- 
	<div class="preloader-wrapper">
		<div class="loader">Loading...</div>
    </div> -->
    <div class="preloader-wrapper">
        <div class=" anim-cont">
            <div class="side-1"></div>
            <div class="side-2"></div>
            <div class="side-3"></div>
            <div class="side-4"></div>
            <div class="side-5"></div>
            <div class="side-6"></div>
        </div>
    </div>

<?php endif; ?>

<?php // wp_body_open(); ?>


	    <!-- Preloader -->
        <!-- <div class="preloader"></div> -->
    
        <!-- Main Header-->
        <header class="main-header">
            <!-- Header Top -->
            <div class="header-top">
                <div class="container clearfix">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="clearfix">
                            <li><strong>Opening Hours :</strong> <?php echo cs_get_option('opening_hours'); ?></li>
                        </ul>
                    </div>
                    
                    <!-- Top Right -->
                    <div class="top-right">
                        <ul class="clearfix">
                        <?php 
						
						$footer_last_menu = cs_get_option('header_top_menu');

						if(!empty($footer_last_menu)) : ?>
							<?php foreach($footer_last_menu as $boxs) : ?>

                            <li><a href="<?php echo $boxs['link']; ?>"><?php echo esc_html($boxs['last_menu_title']); ?></a></li>
                            
                            <?php endforeach; ?>
						<?php endif; ?>
                        </ul>
                    </div>
                    
                </div>
            </div><!-- Header Top End -->
            
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container">
                    <div class="clearfix">
                        
                        <div class="pull-left logo-outer">
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php 
                                            if(function_exists('cs_get_option')){
                                            $site = cs_get_option('site_title'); 
                                            $logo = cs_get_option('logo');
                                            $img = wp_get_attachment_image_src($logo,'full');
                                            // print_r($img); 
                                            $img_show = cs_get_option('logo_swi'); 
                                            $tit_show = cs_get_option('title_swi');
                                            }else{
                                                $site = 'Default';
                                            }
                                        ?>

                                        <?php if($img_show == true ) {?>
                                    <img src="<?php echo $img[0]; ?>" alt="" class="custom-logo">
                                        <?php }  ?>
                                        
                                        <?php if($tit_show == true ) {?>
                                        <h2><?php echo esc_html($site); ?></h2>
                                        <?php }  ?>
                                </a>
                            </div>
                        </div>
                       
                        <div class="pull-right upper-right clearfix">
                           
                            <?php
                                $name_img_swi = cs_get_option('name_img_swi');
                                $c_name_img = cs_get_option('name_img');
                                $n_img = wp_get_attachment_image_src($c_name_img,'full');
                                if(!empty($c_name_img) && $name_img_swi == true ){
                                    echo '
                                        <div class="upper-column info-box sbgs-img">
                                            <img src="'.$n_img[0].'">
                                        </div>
                                    ';
                                }
                            ?>
                            
                         <!-- SearchOption Shopping Start Now -->
                         <div class="upper-column info-box hsearch">
                                <?php dynamic_sidebar('factory_search_top_menu'); ?>
                         </div>
                         <!-- SearchOption Shopping The End -->



                            <?php 
                        
                                $name_img_swi = cs_get_option('name_img_swi');
                                $header_iconic_boxes = cs_get_option('header_iconic_boxes');

                        if(!empty($header_iconic_boxes) && $name_img_swi == false ) : ?>
							<?php foreach($header_iconic_boxes as $box) : ?>
                             
                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box">
                                    <span class="<?php echo esc_attr($box['icon']); ?>"></span>
                                </div>
                                <ul>
                                    <li><strong><?php echo esc_html($box['big_title']); ?></strong></li>
                                    <li><a href="<?php echo $box['link']; ?>"><?php echo esc_html($box['title']); ?></a></li>
                                </ul>
                            </div> 

							<?php endforeach; ?>
						<?php endif; ?>
                            









                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <?php 
                                    $social_links = cs_get_option('social_links');

                                    if(!empty($social_links)) : 
                                ?>

                                <div class="social-links-one">
                                    <?php foreach($social_links as $link) : ?>

                                        <a href="<?php echo esc_url($link['link']); ?>"><span class="<?php echo esc_attr($link['icon']); ?>"></span></a>

                                    <?php endforeach; ?>
                                </div>
                                    <?php endif; ?>
                                <!-- Shopping Cart Start Now -->
                                        <?php 
                                            if ( class_exists( 'WooCommerce' ) ) {
                                                stock_crazycafe_woocommerce_cart_link();
                                            }
                                        ?>
                                <!-- Shopping Cart Start Now -->
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
           
            <!--Header-Lower-->
            
            <button class="hamburger" id="hamburger">
                <i class="fa fa-bars"></i>
            </button>

            <div class="header-lower nav-bar" id="nav-ul">
                <div class="container">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>

                            
                            <div class="navbar-collapse collapse clearfix show mainmenu vir-ul">

                                <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                        )
                                    );
                                ?>
                            </div>
                        </nav><!-- Main Menu End-->
                        <?php 
						
                        $menu_heading = cs_get_option('main_menu_right_heading');
                        $menu_heading_link = cs_get_option('main_menu_right_heading_link');
                         ?>
                         
                        <div class="get-btn"><a href="<?php echo $menu_heading_link ?>" class="theme-btn appt-btn"><?php echo $menu_heading ?></a></div>
                        
                    </div>
                </div>
            </div>
            
            <script>
                const hamburger = document.getElementById('hamburger');
                const navUL = document.getElementById('nav-ul');

                hamburger.addEventListener('click', () => {
                    navUL.classList.toggle('show');
                });
            </script>
            
            
            <!--Bounce In Header-->
            <div class="bounce-in-header">
                <div class="container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="img-responsive">
                        <?php 
                    if(function_exists('cs_get_option')){
                       $site = cs_get_option('site_title'); 
                       $logo = cs_get_option('logo');
                       $img = wp_get_attachment_image_src($logo,'full');
                      // print_r($img); 
                       $img_show = cs_get_option('logo_swi'); 
                       $tit_show = cs_get_option('title_swi');
                   }else{
                    $site = 'Default';
                   }
                     ?>

                     <?php if($img_show == true ) {?>
                      <img src="<?php echo $img[0]; ?>" alt="" class="custom-logo">
                      <?php }  ?>
                      
                      <?php if($tit_show == true ) {?>
                    <h2><?php echo esc_html($site); ?></h2>
                    <?php }  ?>
                            <!-- <img src="img/logo-2.jpg" alt=""> -->
                        </a>
                    </div>
                    
                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix show">
                                <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                        )
                                    );
                                ?>

                            </div>
                        </nav><!-- Main Menu End-->
                    </div>
                    
                </div>
            </div>
        </header>
        <!--End Main Header -->