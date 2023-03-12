<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dashti_theme
 */

get_header();
?>
<main class="flex flex-grow flex-col md:flex-row gap-2 pt-14 px-3">
<!-- ======================= main content area starts ===============  -->

<div class="w-full md:w-auto">



<!--  breadcrumb -->
<nav class="inline-block mb-10 text-sm text-color-base-alt font-medium capitalize" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2">
    <li class="inline-flex items-center">
	<svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
      <a href="<?php home_url( '/' );?>" class="inline-flex items-center hover:text-color-base">
		<?php echo __('Home','dashti');?>      
      </a>
    </li>
    <li>
      <div class="flex items-center mx-2 ">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <?php echo __('Category','dashti');?>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1"><?php echo  single_cat_title();?></span>
      </div>
    </li>
  </ol>
</nav>
<!-- breadcrum -->


<?php 
if(!is_paged()):
get_template_part( 'template-parts/content', 'featured' );
endif;
?>




<section id="posts">

<?php
$category = get_queried_object();
$exclude_post_ids = array( $sticky_featured_post_id ?? 0); // Add any other post IDs you want to exclude to this array
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'category_name' => $category->slug,
	'post_type' => 'post',
	'paged' => $paged,
	'post__not_in' => $exclude_post_ids,
);

$query = new WP_Query( $args );

if($query->have_posts()):
?>

<div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-y-8 gap-x-4">
<?php

while ( $query->have_posts() ) :
  $query->the_post();
get_template_part( 'template-parts/content');
endwhile;
wp_reset_postdata();

?>
</div>

<?php
else:
 get_template_part( 'template-parts/content','none');

endif;


?>



</section>

<?php dashti_theme_the_posts_pagination();?>


</div>

<?php get_sidebar();?>



	</main><!-- #main -->

<?php

get_footer();
