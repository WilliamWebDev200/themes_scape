<?php
// define image size
$src_size       = 'full';
$srcset_size    = 'full';

$post_format = get_post_format();
$format = $post_format ?  '-' . $post_format : '';

wtbx_script_queue('sticky-kit');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry wtbx-default-entry clearfix' . (is_sticky() ? ' sticky' : '')); ?>>



	<div class="bulk-apparel-blog post-default-inner wtbx-entry-inner<?php echo esc_attr($meta_class); ?>">

		<?php if ( !in_array('date', $meta_array) ) : ?>
			<div class="side-meta wtbx-sticky bulk-apparel-blog__dates">
				<div class="meta meta-date wtbx-text"><span class="d"><?php echo get_the_date('d'); ?></span><span class="m"><?php echo get_the_date('M'); ?></span></div>
			</div>
		<?php endif; ?>

		<div class="bulk-apparel-blog__media bulk-apparel-blog__column">
			<?php // Media
			if ( $preview === 'post_media' ) {
				if ( file_exists(locate_template('templates/blog-post/formats/blog-format' . $format . '.php')) ) {
					include(locate_template('templates/blog-post/formats/blog-format' . $format . '.php'));
				}
			} elseif ( $preview === 'featured_image' ) {
				include(locate_template('templates/blog-post/blog-entry-thumbnail.php'));
			} ?>


		</div>

		<div class="bulk-apparel-blog__content bulk-apparel-blog__column">

				<div class="bulk-apparel-blog__title">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Continue reading: %s', 'scape' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="bulk-apparel-blog__mobile-category">category: <?php the_category( ' ' ); ?></div>

					<div class="bulk-apparel-blog__mobile-date">
						<?php if ( !in_array('date', $meta_array) ) : ?>
							    Published Date:
								<div class="meta meta-date wtbx-text">
								<span class="m"><?php echo get_the_date('M'); ?></span>
								<span class="d"><?php echo get_the_date('d'); ?></span>,
								<span class="m"><?php echo get_the_date('Y'); ?></span>
								</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="bulk-apparel-blog__author">
					<?php if (  !in_array('author-name', $meta_array) || !in_array('categories', $meta_array) ) : ?>

				</div>

				<?php endif;
				// Content ?>

				<div class="bulk-apparel-blog__author-block">
						<?php if (  !in_array('comments', $meta_array) || !in_array('like', $meta_array) || $reading_time === '1' ) : ?>
					<div class="post-entry-footer clearfix bulk-apparel-blog__holder">

						<?php if ( !in_array('author-name', $meta_array) || !in_array('author-image', $meta_array) ) : ?>
							<div class="meta-author bulk-apparel-blog__author-block--image-author">
								<a class="meta-author-link"
								href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"
								title="<?php echo sprintf( esc_attr__( 'View all posts by %s', 'scape' ), get_the_author() ); ?>">
									<?php if ( !in_array('author-image', $meta_array) ) : ?>
										<div class="author-image">
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
										</div>
									<?php endif; ?>
									<?php if ( !in_array('author-name', $meta_array) ) : ?>
										<div class="bulk-apparel-blog__author-titles">

												<span><?php echo esc_html__( 'By', 'scape' ) . ' ' . get_the_author(); ?></span>

												<div class="bulk-apparel-blog__information">
												<?php if ( $reading_time === '1' ) : ?>
													<div class="post-entry-footer-section wtbx-text bulk-apparel-blog__information--read-times">
														<i class="scape-ui-clock" aria-hidden="true"></i><?php echo wtbx_reading_time($postID, false); ?>
													</div>
												<?php endif; ?>

												<?php if ( !in_array('like', $meta_array) && class_exists('SCAPE_Core_Extend') && wtbx_has_consent('like-system') ) : ?>
													<div class="post-entry-footer-section bulk-apparel-blog__information--likes">
														<div class="post-like">
															<?php echo wtbx_get_simple_likes_button( get_the_ID() ); ?>
														</div>
													</div>
												<?php endif; ?>

												<?php if ( !in_array('comments', $meta_array) ) : ?>
													<div class="post-entry-footer-section bulk-apparel-blog__information--comment">
														<a href="<?php comments_link(); ?>" title="<?php echo esc_attr__( 'View comments for: ', 'scape' ) . get_the_title( get_the_id() ); ?>" class="post-sbs-comments">
															<i class="scape-ui-comment"></i><?php echo get_comments_number(); ?></a>
													</div>
												<?php endif; ?>


												<?php if ( !in_array('categories', $meta_array) ) : ?>
													<span class="meta meta-category bulk-apparel-blog__information--categories">
														<span class="category-list"><?php the_category( ' ' ); ?></span>
													</span>
												<?php endif; ?>
												</div>

										</div>

									<?php endif; ?>
								</a>
							</div>
						<?php endif; ?>

					</div>




				<?php endif; ?>



				</div>

		</div>



	</div>
</article>