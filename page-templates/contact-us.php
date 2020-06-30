<?php
/*
Template Name: Contact Us
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	
	<div class="grid-container container">
		<div class="contact-wrap grid-x grid-padding-x">
	
				<div class="left cell small-12 xmedium-6">
					
					<h1><?php the_field('heading');?></h1>
					<p><?php the_field('instructions');?></p>
					<div class="customer-support">
						<?php the_field('custom_care_message');?>
					</div>
					
					<div class="headquarters">
						<h2><?php the_field('headquarters_heading');?></h2>
						<p><?php the_field('headquarters_address');?></p>
					</div>
		
					<div class="phone-numbers">
						<?php the_field('phone_numbers');?>
					</div>
				
				</div>
			
				<div id="tabs" class="right cell small-12 xmedium-6">
					<ul id="tab-nav">
						<li><a href="#tabs-1">For Organizations</a></li>
						<li><a href="#tabs-2">For Individuals</a></li>
					</ul>
					<div class="inner">
						<div id="tabs-1" class="tabs_content" style="display: none;">
							<?php gravity_form( 8, false, false, false, '', false );?>
						</div>
						<div id="tabs-2" class="tabs_content" style="display: none;">
							<?php gravity_form( 10, false, false, false, '', false );?>
						</div>
					</div>
				</div>
			
		</div>
	</div>
	
	
</div>

<?php get_footer(); ?>