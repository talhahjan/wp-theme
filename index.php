<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dashti_theme
 */





get_header();
?>

<main class="flex flex-grow flex-col md:flex-row gap-2 pt-14 px-3">
 <!-- ======================= main content area starts ===============  -->
 <div class="w-full md:w-auto"> <!-- content wrapper --->		
<?php

if(have_posts()):
if(!is_paged()) :get_template_part( 'template-parts/content', 'featured' );
endif;

?>
<!-- =================== latest articles starts ================================ -->
<section class="my-10">

<?php
if(!is_paged()):
?>
<h2
              data-heading="New Posts"
              class="before:content-[attr(data-heading)] before:block before:font-medium before:text-sm before:text-color-base-alt text-center text-xl mb-12 font-bold font-Courgette text-primary capitalize"
            >
			<?php __('Recent Blogs', 'dashti');?>
              
            </h2>
<?php
endif;

?>


<div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-y-8 gap-x-4">
<?php


$category = get_queried_object();
$exclude_post_ids = array( $sticky_featured_post_id ?? 0 ); // Add any other post IDs you want to exclude to this array
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type' => 'post',
	'paged' => $paged,
	'post__not_in' => $exclude_post_ids,
);

$query = new WP_Query( $args );



			/* Start the Loop */
			while ( $query->have_posts() ) :
				$query->the_post();
				get_template_part( 'template-parts/content','new');
			endwhile;
			wp_reset_postdata();

?>
</div>
</section>
<?php

																										
		else:
			get_template_part( 'template-parts/content','none');
endif;



?>







<?php dashti_theme_the_posts_pagination();?>




</div> <!-- end content wrapper --->

<?php get_sidebar();?>

	</main><!-- #main -->

<?php
get_footer();
