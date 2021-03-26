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
</article>

<a href="javascript:void(0)" class="btn btn--options"> + </a>


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

<?php get_footer(); ?>