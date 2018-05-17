<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<div id="home-slider">
	<div class="wrap">
		<?php layerslider(1) ?>
	</div>
</div>

<div id="after-slider">
	<div class="wrap">
		<div class="row">
		
		<!-- maybe need this --
			<div class="col-md-6">
				<h6>We Offer Service for</h6>
				<h4>Communications</h4>
				<p>Telecommunications, Integration & Education</p>
				<p><strong>400 Billion</strong></p>

				<a class="line-button" href="/e-store">Shop Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
			<div class="col-md-6">
			
				<h6>We offer Services for</h6>
				<h4>Electricals</h4>
				<p>Energy, Minerals & Utilities</p>
				<p><strong>300 Billion</strong></p>

				<a class="line-button" href="/e-store">Shop Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				
			</div>
			
	    --->
		
		<h4><?php do_shortcode(the_field('title')); ?></h4>
			
		
		<p><a href="<?php the_field('link');?>"><?php do_shortcode(the_field('link_title')); ?></a></p>
		
		</div><!-- row -->
	</div>
</div><!-- after-slider -->

<div id="home-products">
	<div class="wrap">
		<h4>Our Products</h4>
		
		<?php echo do_shortcode("[wcps id='78']"); ?>
		
	</div>
</div>

<div id="testimonials">
	<div class="wrap">
		<h4>Testimonials</h4>
		
		<?php echo do_shortcode('[testimonial_view id=1]'); ?>
		
	</div>
</div>

<div id="suppliers">
	<div class="wrap">
		<h4>Suppliers</h4>
		<?php kw_sc_logo_carousel('default'); ?>
	</div>	
</div>

<div id="home-bottom">
	<div class="wrap">
		<div class="row">
	
			
				<h4>Blog</h4>
				
				
					<?php
						$args = array('cat' => 1, 'posts_per_page' => 2);
						$query = new WP_Query($args);
						if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					?>

					<?php 
					
						echo '<div style="width:50%; float:left;">';
					
						echo '<div class="col-sm-6 col-md-4 col-lg-2">';
							echo '<div class="news-date">'; the_time('j F');  echo '</div>';
						echo '</div>';
					
						echo '<div class="col-sm-6 col-md-8 col-lg-10">';
							echo '<div class="title">'; echo '<a href=" '. get_permalink() . ' ">';   the_title(); echo '</a>'; echo '</div>';
							the_excerpt();
						echo '</div>'; 
						
						echo '</div>';
							
					?>

					<?php
						endwhile;
							wp_reset_postdata();
						endif;
					?>
					<!-- 
					<div class="clearfix"></div>
					
					<a class="blue-button" href="/blog">View All</a>
				-->

		</div><!-- row -->
	</div>	
</div>

<div class="cleafix"></div>

<?php get_footer(); ?>