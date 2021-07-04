<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Factory-Founder
 */

if(function_exists('cs_get_option')){
    $copy_on = cs_get_option('copy_on'); 
    $copy = cs_get_option('copy'); 
    $footer_bg_color = cs_get_option('footer_bg_color');

    $column_set = cs_get_option('column_set'); 
                   
   }else{
     $copy = 'Default Copyright';
}
?>


        <!--Start footer area-->
        <section class="footer_area sec-pdd-90" style="background-color: <?php echo esc_attr($footer_bg_color); ?>">
            <div class="container">
                <div class="row">
                    
                    <!--start widget-->
                    
                    <!--end widget-->




<?php for($i = 1; $i <= $column_set; $i++) {?>
    <div class="viraf col-md-<?php echo esc_attr(12/$column_set); ?>">

        <?php  dynamic_sidebar("factory_footer_{$i}") ?>
    </div><!-- .col -->
    
<?php  } ?> 
                </div><!-- .row -->
            </div>
        </section> 
        <!--End footer area-->   

        <!--Start footer bottom area-->
        <section class="footer_bottom_area">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="footer_logo">
                            <p><?php echo esc_html($copy); ?></p>
                        </div>
                    </div>
                   

                    <div class="col-md-6 col-sm-6">
                    <div class="footer_bottom_right">
                        <?php 
						
						$footer_bottom_menu = cs_get_option('footer_bottom_menu');

						if(!empty($footer_bottom_menu)) : ?>
							<?php foreach($footer_bottom_menu as $foot) : ?>

                            <a href="<?php echo $foot['footer_menu_link']; ?>"><?php echo esc_html($foot['footer_last_menu_title']); ?></a> <span></span>
                            
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div>

                        <!-- <div class="footer_bottom_right">
                            <a href="#">Terms Of Use</a><span></span><a href="#">Privacy & Security Statement</a>
                        </div> -->
                    </div>



                </div>
            </div>
        </section> 
        <!--End footer bottom area-->      


<?php
$body_end_scripts = cs_get_option('body_end_scripts');  
echo $body_end_scripts; 
wp_footer(); ?>

</body>
</html>
