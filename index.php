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

<main class="grid grid-cols-1 md:grid-cols-[auto,250px] gap-5 pt-20 px-3">
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
              Recent Blogs
            </h2>
<?php
endif;

?>


<div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-y-8 gap-x-4 text-center">
<?php


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content');
			endwhile;

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


<?php get_sidebar();
?>
	</main><!-- #main -->

<?php
get_footer();
