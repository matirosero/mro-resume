<?php
/*
	Template Name: Home Page With Slides
*/
?>
<?php
$locations = get_registered_nav_menus();
$menus = wp_get_nav_menus();
$menu_locations = get_nav_menu_locations();

$location_id = 'home_page';

if (isset($menu_locations[ $location_id ])) {
	foreach ($menus as $menu) {
		// If the ID of this menu is the ID associated with the location we're searching for
		if ($menu->term_id == $menu_locations[ $location_id ]) {
			// This is the correct menu

			// Get the items for this menu
			$menu_items = wp_get_nav_menu_items($menu);
			// Now do something with them here.
			break;
		}
	}
};

if(!isset($menu_items)) {
	echo __('Please provide a menu for Home Page. Go to Dashboard -> Appearance -> Menus and set a menu for Home Page', 'resume');
	return;
}

$nr_slides = count($menu_items);
$slugs = array();
$slides = array();
$normal_scroll = '';
$logo_b = array();
$logo_d = array();
$page_type = 'slider';
$posts_per_page = get_option( 'posts_per_page', 6 );
$i = 0;
$n = 0;?>


<?php get_header() ?>
<div id="fullpage" class="content">
<?php foreach($menu_items as $slide): ?>
	<?php 	
	$page_id = $slide->object_id;
	$slug = sanitize_title($slide->title) . '-' . $page_id;
	$slugs[] = $slug;
	$slide = 'single-' . $slug;
	$slides[] = $slide;
	$i++;
	$logo_b_src = _go('logo_image_b');
	$logo_d_src = _go('logo_image_d');
	$bg_color = get_post_meta( $page_id, THEME_NAME . '_bg_color', true );
	$bg_img = get_post_meta( $page_id, THEME_NAME . '_bg_img', true );
	$bg_size = get_post_meta( $page_id,  THEME_NAME . '_bg_size', true);
	$bg_filter = get_post_meta( $page_id, THEME_NAME . '_bg_filter', true );
	$layout = get_post_meta( $page_id , THEME_NAME . '_pg_type', true);
	$portfolio_category = get_post_meta( $page_id ,  THEME_NAME . '_pt_cat', true);
	$portfolio_nr = get_post_meta( $page_id ,  THEME_NAME . '_pt_nr', true);
	$logo_type = get_post_meta( $page_id, THEME_NAME . '_pg_tone', true );
	if($logo_type == 'dark_logo') { $logo_d[] = 'fp-viewing-'. $slug; } else { if($layout != 'default' ){$logo_b[] = 'fp-viewing-' . $slug . '-portfolio-container';} else {$logo_b[] = 'fp-viewing-' . $slug;} } ?>
		<!-- ========================= START CONTENT ======================== -->
		<section class="section" data-anchor="<?php tt_print( $slug )  ?>">
			<?php if(!empty($bg_img['url'])||!empty($bg_color)||!empty($bg_filter)): ?>
				<style type="text/css" scoped>
					.section-content-<?php tt_print( $page_id )?> {
						<?php if(!empty($bg_img)): ;?>
						background-image: url("<?php tt_print($bg_img['url']) ?>");	
							<?php if($bg_size == 'on'):  ?>
								background-size: cover;
							<?php endif; ?>
						<?php elseif(!empty($bg_color)): ;?>
						background: <?php tt_print($bg_color) ?>;
						<?php else: ;?>
						background: #f3f3f3;
						<?php endif; ?>
					}
					.bg-wrapper-<?php tt_print($page_id)?> {
						<?php if(!empty($bg_filter)): ?>
							background: <?php tt_print($bg_filter) ?>;
							height: 100%;
						<?php endif; ?>
					};
				</style>
			<?php endif; ?>
			<div class="section-content section-content-<?php tt_print( $page_id )?>">
				<?php if($layout == 'portfolio'|| $layout == 'blog'): ?>
					<!-- ================ Start Slide ================ --> 
					<div id="<?php echo esc_attr( $layout . '--' . $page_id ); ?>" class="slide <?php tt_print($layout) ?>-slide" data-anchor="portfolio-container">
				<?php endif; ?>
					<?php if($logo_type == 'dark_logo'):
						if(_go('logo_image_d')): ?>
							<img class="mobile-brand" src="<?php _eo('logo_image_d'); ?>" alt="<?php echo THEME_PRETTY_NAME ?>">
						<?php elseif(_go('logo_text_d')):
							$logo_d_html = '<h3 class="logo-text">'._go('logo_text_d') . '</h3>';
							echo html_entity_decode($logo_d_html);
						else:
							$logo_d_html = '<h3 class="logo-text">' . THEME_PRETTY_NAME.'</h3>';
							echo html_entity_decode($logo_d_html);
						endif;
					else:
						if(_go('logo_image_b')):?>
							<img class="mobile-brand" src="<?php _eo('logo_image_b'); ?>" alt="<?php echo THEME_PRETTY_NAME ?>">
						<?php elseif(_go('logo_text_b')):
							$logo_b_html = '<h3 class="logo-text">'._go('logo_text_b').'</h3>';
							echo html_entity_decode($logo_b_html);
						else:
							$logo_b_html = '<h3 class="logo-text">' . THEME_PRETTY_NAME.'</h3>';
							echo html_entity_decode($logo_b_html);
						endif;			            
					endif;?>
						<div class="bg-wrapper bg-wrapper-<?php tt_print($page_id)?>">
							<div class="container <?php echo 'blog' == $layout? 'latest-posts-slide' : '' ?>">
								<?php $args = array('page_id'=>$page_id);
								$slide_query = new WP_Query($args);
								if ($slide_query->have_posts()) : 
									while($slide_query->have_posts()) : $slide_query->the_post();
										if($layout == 'blog'):
											get_template_part( 'content','latest-blog' );
										elseif($layout == 'portfolio'):
											echo Tesla_slider::get_slider_html('portfolio',$portfolio_category, 'main', $post_id = null, array('nr' => $portfolio_nr));
										else:
											the_content();
										endif;
									endwhile;
								endif;
								wp_reset_postdata(); ?>
							</div>
						</div>
				<?php if($layout == 'portfolio' || $layout == 'blog'): ?>
					<?php global $slides_data ?>
					</div>
				<?php foreach($slides_data as $slide_id => $slide_slug): 
					$normal_scroll[] = 'single-' . $slide_slug ?>
					<!-- ================ Start Single Slide ================ -->
					<div class="slide <?php echo 'single-' . $slide_slug  ?>" data-anchor="single-<?php tt_print( $slide_slug ) ?>">
						<div class="container">
							<?php if($layout == 'portfolio'):
								echo Tesla_slider::get_slider_html('portfolio',$portfolio_category, 'single', $slide_id);
							else:
								$query_l = new WP_Query( array('p' => $slide_id,'pagination' => false,'ignore_sticky_posts'    => false, ));
								if ($query_l->have_posts()):
									while($query_l->have_posts()): $query_l->the_post(); 
										get_template_part('content','single' );
									endwhile;
								endif;
							endif;?>
						</div>
					</div>
				<?php endforeach; ?>

				<?php endif; ?>				
			<?php if($i < $nr_slides):?>
				<!-- ======= Start scroll down toggle ======= -->
				<div class="scroll-toggle down">
					<i class="fa fa-angle-down"></i>
					<span><?php _e('Scroll down','resume') ?></span>
				</div>
			<?php else: ?>
				<!-- ======= Start scroll up toggle ======= --> 
				<div class="scroll-toggle up">
					<i class="fa fa-angle-down"></i>
					<span><?php _e('Scroll up','resume') ?></span>
				</div>
			<?php endif; ?>
			</div>
		</section>
	<!-- ========================= END CONTENT ======================== -->	
<?php endforeach; ?>
	</div>
	<!-- ========================= START FP NAVIGATION ======================== --> 
	<div id="fp-nav">
		<ul>
			<?php foreach($menu_items as $nav): $n++ ;
					$slug = sanitize_title($nav->title) . '-' . $nav->object_id ?>

				<li data-menuanchor="<?php tt_print($slug) ?>" <?php echo 1 == $n? 'class="active"' : ''; ?>>
					<a href="#<?php tt_print($slug) ?>">
						<span></span>
					</a>
					<div class="fp-tooltip"><?php tt_print( $nav->title ) ?></div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php $normal_scroll = !empty($normal_scroll)? implode(', ',$normal_scroll) : ''; ?>
<?php js_data_anchors( $slugs, $slides, $normal_scroll, $page_type, $posts_per_page, $logo_b, $logo_d, $logo_b_src, $logo_d_src);  ?>
<?php get_footer(); ?>