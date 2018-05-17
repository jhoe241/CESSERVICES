<?php
/*
Template Name: Projects
*/
?>
<?php get_header(); ?>


<div class="content-sidebar-wrap">
	<main id="genesis-content" class="content">
		<article class="post-2 page type-page status-publish entry" itemscope="" itemtype="https://schema.org/CreativeWork">
			<div class="entry-content" itemprop="text">
			
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<p>CES Services (Australia) has a portfolio of projects that span a variety of industries and a diversity of technical scope. </p>

				<p>We understand confidentiality & the mission critical nature of designing & deploying your telecommunications network. We work closely with your team to minimise risk & maximise network availability.</p>

				<p>Our client base consists of licenced carriers, system integrators, private network operators, developers & government. Projects include design, supply & installation of structured cabling solutions for:</p>

				<p><strong>** References can be forwarded if required.</strong></p>
				
				<hr />
				
					<div id="projects">

					<?php
					global $paged;
					$curpage = $paged ? $paged : 1;
					$args = array(
						'post_type' => 'project',
						'orderby' => 'post_date',
						'posts_per_page' => 10,
						'paged' => $paged
					);
					
					$query = new WP_Query($args);
					if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					?>

					<li>
						<div class="row">	
							<div class="col-sm-4 col-md-3 col-lg-3">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
									} else { ?>
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
								<?php } ?>
							</div>
						
							<div class="col-sm-8 col-md-9 col-lg-9">
								<div class="title"><?php the_title();?></div>
								<?php the_excerpt();?>
							</div> 
						</div>
					</li>

					<?php

					endwhile;
						echo '
						<div style="clear:both"></div>
						<div id="wp_pagination">
							<a class="first page" href="'.get_pagenum_link(1).'">&laquo;</a>
							<a class="previous page" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
							for($i=1;$i<=$query->max_num_pages;$i++)
								echo '<a class="'.($i == $curpage ? 'active ' : '').'page" href="'.get_pagenum_link($i).'">'.$i.'</a>';
							echo '
							<a class="next page" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">&rsaquo;</a>
							<a class="last page" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>
						</div>
						';
						wp_reset_postdata();
					endif;
					?>
					</div>
			</div>
		</article>
	</main>
	
	<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="https://schema.org/WPSideBar" id="genesis-sidebar-primary">
		<?php if (!dynamic_sidebar('sidebar')) : ?><?php endif; ?>
	</aside>
	
</div><!-- content-sidebar-wrap -->

<?php get_footer(); ?>