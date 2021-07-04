

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
	<section class="pag-wrapper" style="background-image: url(<?php if($img_show == true ) { echo $img[0]; }?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="pag-home text-center">
                        <h2>
						<?php echo esc_html__('Archive','factory-founder') ?>
						</h2>
                        <ul class="list-inline">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            
                            <li class="active"> 
								<?php echo esc_html__('Archive','factory-founder') ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--End Slider area-->
        <!--Start blog-content area-->
<section class="inner-project sec-pdd-90">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 ">
                <div class="">
						<!--Start single  item-->
					<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

						
            	</div>
        	</div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="side_bar blog_side_bar">
                    <?php  get_sidebar(); ?>
                </div>
			</div>
			
        </div> 
    </div>
</section>       
 



<?php

get_footer();
