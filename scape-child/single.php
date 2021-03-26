<?php get_header();
$wtbx_layout = wtbx_layout_settings();
$layout_js_styles = '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) ? '#sidebar{width:' . (!empty($wtbx_layout['sidebar_width']) && $wtbx_layout['sidebar_width'] !== -1 ? esc_html($wtbx_layout['sidebar_width']) : '340') . 'px}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) ? '#content{width:calc(100% - ' . (!empty($wtbx_layout['sidebar_width']) && $wtbx_layout['sidebar_width'] !== -1 ? esc_html($wtbx_layout['sidebar_width']) : '340') . 'px)}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) && !empty($wtbx_layout['sidebar_font']) ? '#sidebar{'.esc_html(wtbx_font_styling($wtbx_layout['sidebar_font'])).'}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) && !empty($wtbx_layout['sidebar_padding']) ? '#sidebar .page-sidebar{padding-top:' . esc_html($wtbx_layout['sidebar_padding']) . 'px}' : '';
$layout_js_styles .= $wtbx_layout['content_limit'] !== '' ? '#container {max-width:'.esc_html(intval($wtbx_layout['content_limit'])).'px}' : '';
if ( !empty($layout_js_styles) ) {
	wtbx_js_styles($layout_js_styles);
}
?>

<?php include(locate_template('templates/section-pagination-single-top.php')); ?>

<article class="bulk-apparel-blog-detail" itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class(get_post_type().'-entry clearfix'); ?>>
	<div id="container" class="bulk-apparel-blog-detail__container row-inner <?php echo (is_active_sidebar($wtbx_layout['sidebar_widgetarea']) || $wtbx_layout['sidebar'] === 'no_sidebar' ? esc_attr($wtbx_layout['sidebar']) : '') .  $wtbx_layout['fullwidth']; ?>">

        <div class="wtbx-content-body bulk-apparel-blog-detail__block wtbx-<?php echo get_post_type(); ?>-body clearfix">
            <div id="content" class="bulk-apparel-blog-detail__left bulk-apparel-blog-detail__item">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    if ( 'post' === get_post_type() ) { ?>
                        <div class="wtbx-width wtbx-large-12 wtbx-medium-12 wtbx-small-12"><?php
                            get_template_part( 'templates/section-blog-post' );
                        ?></div><?php
                    } elseif( 'content_block' === get_post_type() ) {
                        the_content();
                    } else {
                        get_template_part( 'templates/section-content' );
                    }
                    ?>

                <?php endwhile; ?>

            </div><!-- #content -->

            <?php if ( in_array( $wtbx_layout['sidebar'], array('sidebar_left', 'sidebar_left_sticky', 'sidebar_right', 'sidebar_right_sticky') ) && $wtbx_layout['sidebar_widgetarea'] !== 'none' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) )  : ?>

                <div id="sidebar" class="bulk-apparel-blog-detail__right bulk-apparel-blog-detail__item" <?php echo esc_attr($wtbx_layout['sidebar_skin']), esc_attr($wtbx_layout['sidebar_sticky']); ?>">
                    <div class="page-sidebar">
                        <div class="widget-area">
                            <?php dynamic_sidebar($wtbx_layout['sidebar_widgetarea']); ?>
                        </div>
                    </div>
                </div><!-- #sidebar -->

            <?php endif; ?>
            </div>

            <!-- <div class="wtbx-width wtbx-large-7 wtbx-medium-8 wtbx-small-9"> -->
            <div class="wtbx-width wtbx-large-12 wtbx-medium-12 wtbx-small-12">
                <div class="bulk-apparel-blog-detail__next-prev">
                    <?php
                include(locate_template('templates/section-pagination-single-bottom.php')); ?>
                </div>

            </div>

	</div><!-- #container -->

    <div class="desktop-sidebar-option">
        <div class="not-open">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17 9H16.5 17M7 15H10C10.08 14.32 10.23 13.64 10.5 13H7V15M11.9 10.9C13.17 9.64 14.84 9 16.5 9H7V11H11.82C11.85 10.97 11.87 10.94 11.9 10.9M11.9 20.1C12.26 20.45 12.65 20.74 13.06 21H5C3.9 21 3 20.11 3 19V5C3 3.9 3.9 3 5 3H9.18C9.5 2.16 10.14 1.5 11 1.2C12.53 .64 14.25 1.44 14.82 3H19C20.11 3 21 3.9 21 5V10.82C20.4 10.24 19.72 9.8 19 9.5V5H17V7H7V5H5V19H11.03C11.27 19.39 11.57 19.76 11.9 20.1M11 4C11 4.55 11.45 5 12 5S13 4.55 13 4 12.55 3 12 3 11 3.45 11 4M23.39 21L22 22.39L18.88 19.32C18.19 19.75 17.37 20 16.5 20C14 20 12 18 12 15.5S14 11 16.5 11 21 13 21 15.5C21 16.38 20.75 17.21 20.31 17.9L23.39 21M19 15.5C19 14.12 17.88 13 16.5 13S14 14.12 14 15.5 15.12 18 16.5 18 19 16.88 19 15.5Z"/></svg>
        </div>

        <div class="hide">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z"/></svg>
        </div>
    </div>

</article>




<?php
// Related posts
if ( wtbx_option('post-related-enable') && get_post_type() === 'post' ) {
	include(locate_template('templates/blog-post/blog-entry-related.php'));
}
// Comments
if ( ( comments_open() || get_comments_number() ) && wtbx_option('post-comments') === '1' ) : ?>
    <div class="row-inner bulk-apparel-blog-detail__comment">
        <div class="wtbx-width wtbx-large-7 wtbx-medium-8 wtbx-small-9">
            <?php comments_template(); ?>
        </div>
    </div>
<?php endif; ?>




        <a href="javascript:void(0)" class="btn btn--options">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17 9H16.5 17M7 15H10C10.08 14.32 10.23 13.64 10.5 13H7V15M11.9 10.9C13.17 9.64 14.84 9 16.5 9H7V11H11.82C11.85 10.97 11.87 10.94 11.9 10.9M11.9 20.1C12.26 20.45 12.65 20.74 13.06 21H5C3.9 21 3 20.11 3 19V5C3 3.9 3.9 3 5 3H9.18C9.5 2.16 10.14 1.5 11 1.2C12.53 .64 14.25 1.44 14.82 3H19C20.11 3 21 3.9 21 5V10.82C20.4 10.24 19.72 9.8 19 9.5V5H17V7H7V5H5V19H11.03C11.27 19.39 11.57 19.76 11.9 20.1M11 4C11 4.55 11.45 5 12 5S13 4.55 13 4 12.55 3 12 3 11 3.45 11 4M23.39 21L22 22.39L18.88 19.32C18.19 19.75 17.37 20 16.5 20C14 20 12 18 12 15.5S14 11 16.5 11 21 13 21 15.5C21 16.38 20.75 17.21 20.31 17.9L23.39 21M19 15.5C19 14.12 17.88 13 16.5 13S14 14.12 14 15.5 15.12 18 16.5 18 19 16.88 19 15.5Z"/></svg>
        </a>
        <div class="mobile-sidebar-option__modal">
            <div class="mobile-sidebar-option__closebox"> </div>

            <!-- mobile-sidebar-option__sidebar -->
            <div class="mobile-sidebar-option__sidebar">
                <div class="mobile-sidebar-option__closebox--icon">
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z"/></svg>
                </div>

                <?php if ( in_array( $wtbx_layout['sidebar'], array('sidebar_left', 'sidebar_left_sticky', 'sidebar_right', 'sidebar_right_sticky') ) && $wtbx_layout['sidebar_widgetarea'] !== 'none' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) )  : ?>
                    <div id="sidebar" class="mobile-sidebar-option__sidebar-holder" <?php echo esc_attr($wtbx_layout['sidebar_skin']), esc_attr($wtbx_layout['sidebar_sticky']); ?>">
                        <div class="page-sidebar">
                            <div class="widget-area">
                                <?php dynamic_sidebar($wtbx_layout['sidebar_widgetarea']); ?>
                            </div>
                        </div>
                    </div><!-- #sidebar -->
                <?php endif; ?>
            </div>
             <!-- mobile-sidebar-option__sidebar -->

        </div>




<?php get_footer(); ?>