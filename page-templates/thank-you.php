<?php
/*
Template Name: Thank You
Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="body">
	

	
	<div class="grid-container">
		<div class="contact-wrap grid-x grid-padding-x">
		
			<div class="left cell small-12 xmedium-6 xmedium-offset-1">
				
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
		
			<div class="right plane-wrap cell small-12 xmedium-5">
				<i class="far fa-paper-plane"></i>
				<button class="btn btn blue" onclick="goBack()">Go Back</button>
				<script>
				function goBack() {
				  window.history.go(-2);
				}
				</script>
			</div>
	
		</div>
	</div>
	
	
</div>

<?php get_footer(); ?>