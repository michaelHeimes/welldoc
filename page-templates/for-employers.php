<?php
/*
Template Name: For Employers
Template Post Type: page
*/

get_header(); ?>

<div class="body">
	<div class="page-head big">
		<div class="bg non-retina" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_started.jpg);"></div>
		<div class="bg retina" style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg_started@2x.jpg);"></div>
		<div class="container">
<!--
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div class="breadcrumbs">','</div>');
				}
			?>
-->
			<h1>Delivering clarity,<br>
			efficiency, and results</h1>
			<p>This is not a solo flight. We’re here to help you experience BlueStar’s outcomes in your organization.</p>
		</div>
	</div>
	<div class="sub-cat full">
		<div class="container">
			<ul>
				<li class="current">
					<a href="#">For Employers</a>
				</li>
				<li>
					<a href="#">For Health Plans/Systems</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="healt-cost">
		<div class="container">
			<div class="text">
				<h2>Healthier Employees.<br>
				Lower Costs. <strong>Simple.</strong></h2>
				<section>
					<article>
						<div class="ico"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/gs3.svg"></div>
						<p>Good<br>
						Habits</p>
					</article>
					<article>
						<div class="ico"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/gs1.svg"></div>
						<p>Better<br>
						Health</p>
					</article>
					<article>
						<div class="ico"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/gs2.svg"></div>
						<p><a href="#">Big<br>
						Savings <i aria-hidden="true" class="fa fa-arrow-right"></i></a></p>
					</article>
				</section><a class="btn btn-outline blue" href="#">READ MORE OUTCOMES</a>
			</div>
		</div>
	</div>
	<div class="steps-row">
		<div class="container">
			<h2>Implementation that Works Because We Do</h2>
			<ul>
				<li><img alt="" src="<?php bloginfo('template_directory'); ?>/images/s1.png" srcset="<?php bloginfo('template_directory'); ?>/images/s1@2x.png 2x"></li>
				<li><img alt="" src="<?php bloginfo('template_directory'); ?>/images/s2.png" srcset="<?php bloginfo('template_directory'); ?>/images/s2@2x.png 2x"></li>
				<li><img alt="" src="<?php bloginfo('template_directory'); ?>/images/s3.png" srcset="<?php bloginfo('template_directory'); ?>/images/s3@2x.png 2x"></li>
			</ul>
		</div>
	</div>
	<div class="demo-request right custom">
		<div class="container">
			<div class="text">
				<h2>Billing by Volume and Value</h2>
				<p>Our billing is flexible to suit your needs. We bill based on your employee outcomes, or based on PEPM.</p>
			</div>
			<div class="cols">
				<div class="form">
					<h2 class="title">Request a Demo</h2>
					<form action="#">
						<p>First Name* <input placeholder="" type="text"></p>
						<p>Last Name* <input placeholder="" type="text"></p>
						<p>Email* <input placeholder="" type="text"></p>
						<p>Phone <input placeholder="" type="text"></p>
						<p>Company Name* <input placeholder="" type="text"></p>
						<p>Message 
						<textarea></textarea></p>
						<p class="req">* Required Field</p><button class="btn btn-outline blue lg" type="submit">GET A DEMO</button>
					</form>
				</div>
			</div>
		</div>
		<div class="video">
			<a class="play" data-fancybox="" href="https://vimeo.com/253672548"><img alt="" src="<?php bloginfo('template_directory'); ?>/images/bg_v_1.jpg"></a>
		</div>
	</div>
</div>

<?php get_footer(); ?>