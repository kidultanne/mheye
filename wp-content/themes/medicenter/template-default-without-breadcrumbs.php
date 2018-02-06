<?php
/*
Template Name: 默认无面包屑导航
*/
get_header();
?>
<div class="theme_page relative">
	<div class="clearfix">
		<?php
		if(have_posts()) : while (have_posts()) : the_post();
			the_content();
		endwhile; endif;
		?>
	</div>
</div>
<?php
get_footer(); 
?>