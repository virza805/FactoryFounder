<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Factory-Founder
 */

get_header();

?>

	<!--Start Slider area-->  
	<section class="pag-wrapper" style ="background-image: url(<?php the_post_thumbnail_url(); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="pag-home text-center">
                        <h2>
							<?php 
							if(get_post_type() == 'project') { 
                                echo esc_html__('Project Detail','factory-founder'); 
                            } else { 
								echo esc_html__('Blog Detail','factory-founder');
							} 
							?>
						</h2>
                        <ul class="list-inline">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li><a class="pl-3" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php 
                                    if(get_post_type() == 'project') { 
                                        echo esc_html__('Project','factory-founder'); 
                                    } else { 
                                        echo esc_html__('Blog','factory-founder');
                                    } 
                                ?>
                        </a></li>
                            <li class="active"> 
                                <?php 
                                    if(get_post_type() == 'project') { 
                                        echo esc_html__('Project Detail','factory-founder'); 
                                    } else { 
                                        echo esc_html__('Blog Detail','factory-founder');
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
        
        <!--Start blog-content area-->
<section class="inner-project sec-pdd-90">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 ">
                <div class="">
					<!--Start single  item-->
				    <?php if (have_posts()) : while (have_posts()) :the_post(); ?>

                    <div class="blog_post">
                        <div class="blog-image"><?php factory_founder_post_thumbnail(); ?></div>
                        <div class="blog-text  post_text_list">
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <h5><?php esc_html_e('Posted:','factory-founder') ?>  <?php the_time('j M Y'); ?></h5>
                        </div>
							
                        <?php the_content(); ?>
                        
                        
                    </div>

                    <h6 class="tag">Tages:<span> <?php the_tags( ' ', ', '); ?></span></h6>
                    
                    <!--End single  item-->
                        <?php endwhile; endif; ?>
                        
                        
                        <!-- This is pagenation previous -> next StartNow -->
                        <div class="blog_post">
                            <div class="row justify-content-center">
                                <div class="col-md-10 text-center">
                                    <div class="page_list">
                                    <?php  next_post_link( '%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>' ); ?>
                                        <div class="list_icon">
                                            <?php  next_post_link(); ?>
                                            <?php  previous_post_link(); ?>
                                        </div>
                                        <?php  previous_post_link( '%link', '<i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                        <!-- This is pagenation previous -> next EndNow -->


                        <?php 

							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}


						?><!-- .comments-area -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="side_bar blog_side_bar">
                    <?php
                        if(get_post_type() == 'project' && is_active_sidebar('factory_project_sidebar')) {
                            dynamic_sidebar('factory_project_sidebar');
                        }else{
                            get_sidebar();

                        }

                    ?>
                </div>
            </div>

        </div> 
    </div>
</section>       
 
<?php

get_footer();
