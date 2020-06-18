<?php get_header(); ?>

<div class="body">
	<div class="page-head">
		<div class="container">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
			<h1>News &amp; Updates</h1>
		</div>
	</div>

	<div class="sub-cat">
		<div class="container">
			<ul>
				<li class="current"><a href="<?php bloginfo('url'); ?>/latest-news/">News</a></li>
				<li><a href="<?php bloginfo('url'); ?>/upcoming-events/">Events</a></li>
			</ul>
			<div class="search-r">
				<div class="trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
				<div class="form">
					<form method="get" action="<?php bloginfo('url'); ?>/">
						<input type="text" placeholder="search" name="s">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="post-row">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="left-col">
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="meta">
					<?php the_time('F j, Y'); ?>
				</div>
				<div class="share">
					<div class="label">Share</div>
					<ul>
						<li>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" target="_blank"><i aria-hidden="true" class="fab fa-linkedin-square"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank"><i aria-hidden="true" class="fab fa-twitter-square"></i></a>
						</li>
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i aria-hidden="true" class="fab fa-facebook-square"></i></a>
						</li>
						<li>
							<a href="mailto:?&body=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank"><i aria-hidden="true" class="fas fa-share-square"></i></a>
						</li>
					</ul>
				</div>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; ?>
			
			<aside class="sidebar">
				<?php dynamic_sidebar('sidebar-news-events'); ?>
			</aside>
		</div>
	</div>

</div>

<?php get_footer(); ?>