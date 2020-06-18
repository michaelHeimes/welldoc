<?php
/*
Template Name: Image Card Demo
*/
?>
<?php get_header(); ?>

<div class="body">

<?php if( have_rows('image_cards') ):?>
	<?php while ( have_rows('image_cards') ) : the_row();?>	
	
	
	<section id="img-card-section">
		
		<div id="img-card-section-left" class="img-card-column">
		<?php if( have_rows('left') ):?>
			<?php while ( have_rows('left') ) : the_row();?>
			
				<div class="card-img-wrap">
				<?php 
				$image = get_sub_field('single_image');
				$size = 'full'; 
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				?>			
				</div>

			<?php endwhile;?>
		<?php endif;?>
			
		</div>
		
		<div id="center-col-text">
			<p><?php the_sub_field('copy');?></p>
			

		</div>
		
		<div id="img-card-section-right" class="img-card-column">
		<?php if( have_rows('right') ):?>
			<?php while ( have_rows('right') ) : the_row();?>	
				<div class="card-img-wrap">
				<?php 
				$image = get_sub_field('single_image');
				$size = 'full'; 
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
				?>
				</div>

			<?php endwhile;?>
		<?php endif;?>			
		</div>

		
	</section>
	
	
	<?php endwhile;?>
<?php endif;?>	

</div>

<script>
jQuery( document ).ready(function($) {
	
controller = new ScrollMagic.Controller();

$('.card-img-wrap').each(function() {
	var imgScale = TweenMax.from($(this), 1.5, {alpha: 0.5, scaleX:0.6, scaleY: 0.6, y:200, ease: Expo.easeOut});
	var imgOffSet = $(this).height() * .25;
	
	var scene = new ScrollMagic.Scene({
	triggerElement: this,
	triggerHook: "onEnter",
	offset: -10
	})
	.setTween(imgScale)
	.addTo(controller);
});

	var cardDrag1 = new TimelineMax();
	cardDrag1
	.to($('#img-card-section-left > div.card-img-wrap:nth-child(2) > img'), 1.4, {y: '35%', ease:Power1.easeOut}, '-=0.2')
	
	var dragScroll1 = new ScrollMagic.Scene({
	triggerElement: '#img-card-section-left > div.card-img-wrap:nth-child(2) > img',
	triggerHook: "onCenter",
	duration: "100%",
	offset: 0
	})
	.setTween(cardDrag1)
	.addTo(controller);
	

	var cardDrag2 = new TimelineMax();
	cardDrag2
	.to($('#img-card-section-left > div.card-img-wrap:nth-child(4) > img'), 1.4, {y: '31%', ease:Power1.easeOut}, '-=0.2')
	
	var dragScroll2 = new ScrollMagic.Scene({
	triggerElement: '#img-card-section-left > div.card-img-wrap:nth-child(4) > img',
	triggerHook: "onEnter",
	duration: "100%",
	offset: 0
	})
	.setTween(cardDrag2)
	.addTo(controller);
	
	
	var cardDrag3 = new TimelineMax();
	cardDrag3
	.to($('#img-card-section-right > div.card-img-wrap:nth-child(2) > img'), 1.4, {y: '32%', ease:Power1.easeOut}, '-=0.2')
	
	var dragScroll3 = new ScrollMagic.Scene({
	triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(2) > img',
	triggerHook: "onEnter",
	duration: "100%",
	offset: 0
	})
	.setTween(cardDrag3)
	.addTo(controller);
	
	
	var cardDrag4 = new TimelineMax();
	cardDrag4
	.to($('#img-card-section-right > div.card-img-wrap:nth-child(3) > img'), 1.4, {y: '26%', ease:Power1.easeOut}, '-=0.2')
	
	var dragScroll4 = new ScrollMagic.Scene({
	triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(3) > img',
	triggerHook: "onEnter",
	duration: "100%",
	offset: 0
	})
	.setTween(cardDrag4)
	.addTo(controller);
	
	
	var cardDrag5 = new TimelineMax();	
	cardDrag5
	.to($('#img-card-section-right > div.card-img-wrap:nth-child(4) > img'), 1.4, {y: '22%', ease:Power1.easeOut}, '-=0.2')
	
	var dragScroll5 = new ScrollMagic.Scene({
	triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(4) > img',
	triggerHook: "onEnter",
	duration: "100%",
	offset: 0
	})
	.setTween(cardDrag5)
	.addTo(controller);
	
});	
	
</script>

<?php get_footer(); ?>