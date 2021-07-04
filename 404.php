<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Factory-Founder
 */

get_header();

if(function_exists('cs_get_option')){
    
    $s_e_img = cs_get_option('s_e_img');
    $img = wp_get_attachment_image_src($s_e_img,'full');
   // print_r($img); 
    $img_show = cs_get_option('img_swi'); 
    
}else{
 $site = 'Default';
}

?>
    
<!--Start Slider area-->  
<section class="pag-wrapper bg" style="background-image: url(<?php
if($img_show == true ) { echo $img[0]; } ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="pag-home text-center bg">
                    <h2>Error</h2>
                    <ul class="list-inline">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            
                        <li class="active"> 
                        <?php 
                                    
                        echo esc_html__('Error','factory-founder');
                                    
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Slider area-->
<!--Start not_found_area area-->  
<section class="not_found_area sec-pdd-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12col-xs-12">
                <div class="not_found_404">
					<div class="sad_icon_s">
				<i class="fa fa-frown-o" aria-hidden="true"></i>
				</div>
                        <h2><?php esc_html_e( 'Oops! Page Not Found!', 'factory-founder' ); ?></h2>
                        <p><?php esc_html_e( 'Try to Search for the Best Match or Visit our Home Page', 'factory-founder' ); ?></p>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><span><i class="fa fa-home" aria-hidden="true"></i></span><?php esc_html_e( 'go to home', 'factory-founder' ); ?></a>
                </div>
            </div>
        </div>  
    </div>
</section>
<!--End not_found_area area-->


<?php
get_footer();
