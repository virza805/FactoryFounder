<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Factory-Founder
 */

$blogsite = cs_get_option('blog_title');

get_header();
?>



        
        <!--Start Slider area-->  
        <section class="pag-wrapper bg" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="pag-home text-center bg">
                            <h2><?php echo esc_html($blogsite); ?></h2>
                            <ul class="list-inline">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            
                            <li class="active"> 
                                <?php 
                                    if(get_post_type() == 'project') { 
                                        echo esc_html__('Project','factory-founder'); 
                                    } else { 
                                        echo esc_html($blogsite);
                                    } 
                                ?>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Slider area-->
<!-- <img src="http://placehold.it/400x450" alt="Tanvir imag"> -->

        <!--Start blog section-->
        <section class="inner-project sec-pdd-90-110">
            <div class="container">
                <div class="row">
                <?php while(have_posts()):the_post();?>


                    <div class="col-md-4 col-sm-6 col-xs-12 item-margin-bot-60">
                        <!--Start single  item-->
                        <div class="blog-content">
                            <div class="blog-image">

                                <?php the_post_thumbnail(); ?>
								
                                <div class="date"><h6><?php echo the_time('d')?><br><span><?php echo the_time('M')?></span></h6></div>
                            </div>
                            <div class="blog-text">
                                <div class="title">
                                    <h2><?php  echo the_title();?></h2>
                                    <div class="blog-post"> 
                                        <h5>post : <?php  echo the_author();?></h5>
                                        <ul>
                                            <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>112</li>
                                            <li><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo get_comments_number(); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text"><p><?php echo //the_index(10);
                                        wp_trim_words(get_the_content(),'20','');
                                    ?> </p></div>
                            </div>
                            <div class="blog-button">
                                <a href="<?php the_permalink();?>" class="theme-btn skew-btn"><span class="btn-text"><?php echo esc_html('View Details');?></span></a>
                            </div>
                            
                        </div>
                        <!--End single  item-->
					</div><!-- .col -->
                <?php endwhile;?>
                

        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <?php 
                    $pagination= get_the_posts_pagination(
                        array(
                        'show_all'=> false,
                        
                        'prev_text'=>__('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'factory-founder'),
                        'next_text'=>__('<i class="fa fa-angle-right sm-margin-bot" aria-hidden="true"></i>','factory-founder'),
                            )
                        );

                    $pagination = str_replace('navigation pagination', 'page_list', $pagination);
                    $pagination = str_replace('nav-links', 'list_icon', $pagination);
                
                    $pagination =str_replace('current', 'active-post', $pagination);
                    $pagination =str_replace('span', 'a', $pagination);

                    echo $pagination;       
			        ?>
            
                </div>
            </div>
        </div>

    </div>
	</div>	
</section>       
        <!--End news section-->

<!-- The Custom Text Example:
<?php // previous_post_link( '%link', 'Previous Post' ); ?>
<?php // next_post_link( '%link', 'Next Post' ); ?>
🦍 -->
<?php
// get_sidebar();
get_footer();
