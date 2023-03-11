<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dashti_theme
 */

get_header();
?>

<main class="grid grid-cols-1 md:grid-cols-[auto,250px] gap-5 pt-20 px-3">
 <!-- ======================= main content area starts ===============  -->
 <div class="w-full md:w-auto"> <!-- content wrapper --->		




		<?php
		while ( have_posts() ) :
			the_post();
?>



<nav class="inline-block my-4" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-2">
    <li class="inline-flex items-center">
      <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center mx-2">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center ">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
      </div>
    </li>
  </ol>
</nav>





		<!-- breadcrum -->
<?php		



			get_template_part( 'template-parts/content','single' );



the_tag_list(array(
  'before'=>'
  <h3 class="font-semibold whitespace-nowrap block pt-2">Related Topic: </h3>
  <div class="flex flex-wrap gap-2 my-4 rounded px-2 py-1" id="related-tags">
  
  ',
  'sep'=>'',
  'after'=>'</div>',
));



// if there is next or prev post get it 
if(get_next_post() || get_previous_post()):

	dashti_theme_the_post_navigation();

endif;



	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

		endwhile; // End of the loop.









		?>



	</div>


<?php get_sidebar();?>

	</main><!-- #main -->

<?php
get_footer();
