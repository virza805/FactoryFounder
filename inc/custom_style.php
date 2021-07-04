<?php 

if ( ! function_exists( 'factory_google_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function factory_google_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $body_font_variant = cs_get_option('body_font_variant');
        $body_font_variant_processed = implode(',', $body_font_variant);
        $body_subsets   = ':'.$body_font_variant_processed.'';

        $heading_font_variant = cs_get_option('heading_font_variant');
        $heading_font_variant_processed = implode(',', $heading_font_variant);
        $heading_subsets   = ':'.$heading_font_variant_processed.'';

        $body_font = cs_get_option('body_font')['family'];
        $body_font .=  $body_subsets;

        $heading_font = cs_get_option('heading_font')['family'];
        $heading_font .=  $heading_subsets;
    
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'factory-founder' ) ) {
            $fonts[] = $body_font;
        }
    
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'factory-founder' ) ) {
            $fonts[] = $heading_font;
        }
    
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }
    
        return $fonts_url;
    }
    endif;
    
    
    /**
     * Enqueue scripts and styles.
     */
    function factory_prefix_scripts() {
    
        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'factory_google_fonts', factory_google_fonts_url(), array(), null );
    }
    add_action( 'wp_enqueue_scripts', 'factory_prefix_scripts' );


    /**
 * Add color styling from theme
 */
function factory_custom_css() {
    wp_enqueue_style(
        'factory-custom-style',
        get_template_directory_uri() . '/assets/css/custom-style.css'
    );
        $body_font = cs_get_option('body_font')['family'];
        $body_font_variant = cs_get_option('body_font')['variant'];
        $heading_font = cs_get_option('heading_font')['family'];
        $heading_font_variant = cs_get_option('heading_font')['variant'];
        
        $enable_boxed_layout = cs_get_option('enable_boxed_layout');
        $body_bg_color = cs_get_option('body_bg_color');
        $body_bg = cs_get_option('body_bg');
        $body_bg_img_array = wp_get_attachment_image_src( $body_bg, 'large', false);
        $body_bg_repeat = cs_get_option('body_bg_repeat');
        $body_bg_attachment = cs_get_option('body_bg_attachment');

        // // Stock CrazyCafe Footer Settings >-----> css3
        $footer_bg = cs_get_option('footer_bg');
        $footer_text_color = cs_get_option('footer_text_color');
        $footer_heading_color = cs_get_option('footer_heading_color');

         // Stock CrazyCafe Theme Color Settings >-----> css3
        $theme_color = cs_get_option('theme_color');
        $theme_seconday_color = cs_get_option('theme_seconday_color');

        $custom_css = '
            body {font-family: '.esc_html($body_font).'; font-weight: '.esc_attr($body_font_variant).'}
            h1, h2, h3, h4, h5, h6 {font-family: '.esc_html($heading_font).'; font-weight: '.esc_attr($heading_font_variant).'}
        ';
        if($enable_boxed_layout == true){
            if(!empty($body_bg_color)) {
                $custom_css .= '
                    body {background-color: '.esc_attr($body_bg_color).'}
                ';
            }
            if(!empty($body_bg)) {
                $custom_css .= '
                    body {background-image:url('.esc_url($body_bg_img_array[0]).')}
                ';
            }
            if(!empty($body_bg_repeat)) {
                $custom_css .= '
                    body {background-repeat: '.esc_attr($body_bg_repeat).'}
                ';
            }
            if(!empty($body_bg_attachment)) {
                $custom_css .= '
                    body {background-attachment: '.esc_attr($body_bg_attachment).'}
                ';
            }
        }


        if(!empty($footer_bg_color)) {
            $custom_css .= '
                .site-footer {background: '.esc_attr($footer_bg_color).'}
            ';
        }
        if(!empty($footer_text_color)) {
            $custom_css .= '
            .footer-widget p {color: '.esc_attr($footer_text_color).'}
            ';
        }
        if(!empty($footer_heading_color)) {
            $custom_css .= '
            .footer-widget h2, .footer-widget .bold-text p {color: '.esc_attr($footer_heading_color).'}
            ';
        }
        if(!empty($theme_color)) {
            $custom_css .= '
            input[type="submit"], button[type="submit"], .stock-readmore-btn, .entry-content .page-links a, td#today, .preloader-wrapper, .stock-slides .owl-nav button:hover i.fa, .vc_wp_custommenu li a:before, ul.stock-project-shorting li:before, .work-box-bg:after, .stock-project-shorting-2 li.active:after, .comments-area table th, .comment-reply-link, li.current_page_item, .list-box ul, .stock-logo-carousel button.owl-dot.active, .social-link.social-icon ul li:hover i, .list_icon a.page-numbers.active-post, .list_icon a:hover, .entry-content .page-links a, .skew-btn::before, .button-1, .button-2:hover, .contact-us .donate:hover, .about-us .donate, .about-us .join:hover, .faq-section .accordion .skew-btn::before, .helping_img_holder img:hover, .fragile_img_holder_right:hover, .fragile_img_holder:hover, .inner-project .blog-image .date, .team-mamber .social-link ul li i:hover, .owl-theme .owl-dots .owl-dot span, .recycling_system:hover .recycling_img_holder, .recycling_text .btn, .border_services, .newsletter_donate_Now:hover, .subscribe_Now, .title-border, .title-border, .widget-service li::after, .recet_project_portfolio .overlay, .project-section .owl-controls .owl-next, .project-section .owl-controls .owl-prev, .testimonials_about_area .owl-controls .owl-next, .testimonials_about_area .owl-controls .owl-prev, .inner-project .event_img_holder .date, .project-info button, .upcomming_events .date, .contact_area .submit-btn, .gallery_filter.text-center li span:hover, .gallery_load_more button, .blog_categories ul li a::after, .contact_instagram_tages ul li a:hover, .progress-bar, .comment-post .submit-btn, .not_found_404 a, #scrollUp, .sidebar .styled-nav li.active-btn,
            .sidebar .styled-nav li.current, .progress-levels .progress-box .bar .bar-fill, .accordion-box .accordion .accord-btn.active:before, .main-header .nav-outer, .main-menu ul > li > ul, .main-menu ul > li > ul > li > ul , .main-header .get-btn:hover, .social-links-one a:hover, .engineers-details h5, .list_icon a:hover i.fa, .preloader-wrap, .service-section .service-columnbox .overlay a h4::before {background: '.esc_attr($theme_color).'}
            
            .about-content:hover .box-content h4.bk, .stock-contact-box i.fa, .widget.widget_rss .rss-date, .stock-contact-box:hover i.fa, .social-icons a i.fa, .mainemnu li:hover > a, .stock-cart i.fa, .stock-contact-box i.fa, .list-box ul, .stock-project-shorting-2 li.active, .about-content:hover .icon-box i, .about-content:hover .box-content h4, .engineers-detail td i, .footer_bottom_right a:hover, .widget.widget_rss .rss-date, .widget ul li, .widget ul > li:hover > a, .viraf .col-md-3 .footer-widget ul li , .viraf .col-md-3 .footer-widget ul li:hover a, .button-1:hover, .button-2, .rev_slider .factory-founder h2, .service-section .service-column:hover .service-icon, .service-column .overlay p a, .about-details h2 span, .fragile h2:hover, .active h2, .inner-project .blog-content .blog-button:hover .skew-btn, .inner-project .blog-text h5, .inner-project .blog-text h2:hover, .team-content h2:hover, .team-text a:hover, .social-link ul li i, .team-section .team-button:hover .skew-btn:before, .team-section .team-mamber .skew-btn:hover, .team-mamber .team-text h2:hover, .single-manager_text .manager h6, .search_email i, .contact_details a, .border_contact_details_news .follow_icon i:hover, .recycling_img_holder .flaticon-arrow, .recycling_img_holder .flaticon-technology, .recycling_img_holder .flaticon-nature, .default-title span, .default-icon-box:hover .icon, .default-icon-box:hover .content-text h2 , .default-icon-box:hover .icon, .default-icon-box:hover .flaticon-arrow, .default-icon-box:hover .flaticon-technology, .default-icon-box:hover .flaticon-nature, .content-text h2:hover, .days > h2, .hour > h2, .single_portfolio .overlay a h4, .news_letter h2 span, .widget-content .date, .footer-widget a:hover, .widget-service ul li a:hover, .contact-area > h2 span , .submit-button:hover button span, .contact-section-2 .eng-text h4 span, .slide-item:hover .info-box h3 , .project-section .owl-controls .owl-next:hover, .project-section .owl-controls .owl-prev:hover, .text_box .qoute, .single_testimonials .client-box .info-box span, .testimonials_about_area .owl-controls .owl-next:hover, .testimonials_about_area .owl-controls .owl-prev:hover, .testimoial_pag3 a, .testimoial_pag3 span, .pag-wrapper .pag-home ul li:hover a, .single-team-member .social-icons ul li a:hover, .single-team-member:hover .content h3, .project-content h4:hover, .project-content a:hover, .upcomming_border h4:hover, .project-content h5 i, .blog-text h2:hover, .blog-text a:hover, .blog_post_share a:hover, .blog_categories > ul li a:hover, .blog_side_bar_latest h2:hover, .sidebar_latest h4:hover, .sidebar_latest p  span, .blog_post_platonem .qoute, .post_platonem_perspiciatis h4:hover, .blog_post_energy a:hover, .blog_post p span, .comment-content h4 span, .comment-content a:hover, .not_found_404 h2 span, .counter-side .countdown .counter-column .count, #scrollUp:hover, .progress-levels .progress-box .percent, .accordion-box.style-two .accordion .accord-btn.active:before, .accordion-box .accordion .accord-btn.active, .scroll-to-top, .main-header .header-top ul li a:hover, .main-header .info-box .icon-box, .main-header .info-box:hover .icon-box, .engineers-details .section-content dd i, h6.tag span a, .img-thumb h4:hover, .engineers-details .Schedule h4, .service-section .service-column:hover .overlay h4  {color: '.esc_attr($theme_color).'}


            .main-header .info-box .icon-box, .accordion-box .accordion .accord-btn.active:before, #scrollUp:hover, input:focus,
            textarea:focus,
            select:focus, .gallery_load_more button, .form-control:focus, .project-info input:focus, .testimonials_about_area .owl-controls .owl-prev, .testimonials_about_area .owl-controls .owl-next, .project-section .owl-controls .owl-prev, .project-section .owl-controls .owl-next, .project-section .project-slider .info-box, .form-control:focus, .contact-area, .widget-service li::after, .recycling_img_holder, .testimonial-section .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .team-section .team-mamber:hover, .social-link ul li i, .inner-project .blog-content:hover .blog-text, .faq-section .accordion .skew-btn::before, .progress-item .progress-bar .value-holder, .service-section .service-columnbox .overlay, .button-2:hover, .button-2, .button-1:hover, .button-1, .skew-btn::before {border-color: '.esc_attr($theme_color).'}

            ';
        }
        if(!empty($theme_seconday_color)) {
            $custom_css .= '
            .site-footer h4.widget-title {color: '.esc_attr($theme_seconday_color).'}
            ';
        }

        wp_add_inline_style( 'factory-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'factory_custom_css' ); 