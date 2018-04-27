<?php 
$j = 0;
$nr_slides = !empty($shortcode['nr'])? $shortcode['nr'] : count($slides);
global $slides_data;
$slides_data = array();
 ?>
<h2 class="section-title"><?php tt_print($shortcode['title']) ?></h2>
<!-- ====== Start Main Portfolio Wrapper ====== --> 
<div class="portfolio-wrapper">

	<!-- === Start Portfolio Filters === -->
	<?php /*
	<div class="filter-box">
		<div class="portfolio-filters">
			<ul>
				<li><a href="#" data-filter="all" class="current"><?php _e('All','resume') ?></a></li>
				<?php foreach($all_categories as $category_slug => $category_name): ?>
					<li><a href="#" data-filter="<?php echo esc_attr($category_slug ); ?>"><?php echo esc_attr($category_name); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	*/ ?>

	<!-- === Start Portfolio Container === -->
	<div class="portfolio-container">
		<div class="row row-fit-20">
			<!-- === Start Portfolio Items === -->
			<div class="portfolio-items-wrapper">
				<?php foreach($slides as $i => $slide):
				if($i >= $nr_slides) { break; };
				global $post;
				$post = $slide['post'];
				setup_postdata( $post );
				$class = !empty($slide['options']['embeded_video'])? 'portfolio-item portfolio-video' :'portfolio-item';
				if(!empty($slide['options']['url']))
					$permalink =$slide['options']['url'];
				elseif(is_page_template('template-slides.php'))
					$permalink = '#';
				else
					$permalink = get_permalink($slide['post']->ID );
					$slides_data[$slide['post']->ID] = sanitize_title($slide['post']->post_title)?>
					<div class="col-xs-12 col-sm-6 col-md-4 all <?php echo implode(' ', array_keys($slide['categories'])); ?> ">
						<div <?php post_class($class); ?> id="<?php echo sanitize_title($slide['post']->post_title)?>">
							<?php if(!empty($slide['options']['embeded_video'])): ?>
								<div class="slide-details <?php echo !empty($slide['options']['url'])? 'external' : 'internal' ?>">
									<h3><a href="<?php tt_print($permalink) ?>" target="_blank"><?php echo get_the_title($slide['post']->ID ); ?></a></h3>
								</div>
							<?php else: ?>
								<div class="details slide-details <?php echo !empty($slide['options']['url'])? 'external' : 'internal' ?>">
									<h3><a href="<?php tt_print($permalink) ?>" <?php echo !empty($slide['options']['url'])? 'target="_blank"' : '' ?>><?php echo get_the_title($slide['post']->ID ); ?></a></h3>
									<hr />
									<p><?php echo implode(', ', array_keys($slide['categories'])); ?></p>
								</div>
							 <?php endif; ?>
							<?php if(!empty($slide['options']['embeded_video'])): ?>
								<?php echo apply_filters('the_content', $slide['options']['embeded_video']); ?>                 
							<?php elseif(empty($slide['options']['embeded_video'])): ?>
								<img src="<?php echo !empty($slide['options']['cover_image'])? esc_attr( $slide['options']['cover_image'] ) : esc_attr( $slide['options']['full_image']->url ); ?>" alt="<?php the_title( ) ?>" />
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php if($nr_slides / 6 > 1): ?>
<!-- ====== Start Main Pagination ====== --> 
<div class="pagination">
	<ul>
		<?php while ( $j < $nr_slides / 6 ) { $j ++; ?>
			<li><a href="#" class="<?php print 1 == $j ? 'current' : ''; ?>"><?php tt_print($j) ?></a></li>
		<?php }; ?>
	</ul>
</div>
<?php endif; ?>