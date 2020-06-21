<div class="blog-pag pagination pagination-full">
	<?php
		global $wp_query;
		$args = array(
			'base'               => get_pagenum_link(1) . '%_%',
			'format'             => 'page/%#%',
			'total'              => $wp_query->max_num_pages,
			'current'            => $paged,
			'show_all'           => false,
			'end_size'           => 2,
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			'next_text'          => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
			'type'               => 'plain',
			'add_args'           => false,
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		); 
		echo paginate_links( $args );	
	?>
</div>