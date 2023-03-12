<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( have_posts() ) : 
  if ( $wp_query->post_count == 1 ) :
    // If there is only one search result, redirect to the single post page
    the_post();
    $post_link = get_permalink();
    wp_redirect( $post_link );
    exit;
  endif;
endif;

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
        <?php echo __('Searching','dashti');?>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1"><?php echo  get_search_query();?></span>
      </div>
    </li>
  </ol>
</nav>
<!-- breadcrum -->

<div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-y-8 gap-x-4">
<?php
if ( have_posts() ) :
  if ( $wp_query->post_count > 1 ) :
    // If there are multiple search results, display them
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content');
    endwhile;
  endif;
else :
  // If there are no search results, display a message
get_template_part( 'template-parts/search','none' );
endif;
?>

</div>
</div>
<?php get_sidebar();?>

</main><!-- #main -->

<?php get_footer(); ?>
