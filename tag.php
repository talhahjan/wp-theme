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
    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 rounded-lg border border-gray-200 dark:border-indigo-500/20 bg-white dark:bg-opacity-5 mb-10" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="#" class="inline-flex items-center text-sm font-medium">
        <svg aria-hidden="true" class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium">Tags</span>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium "><?php echo single_cat_title();?></span>
      </div>
    </li>
  </ol>
</nav>
<!-- breadcrum -->

<section id="posts">

<?php

if(have_posts()):
?>

<div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-y-8 gap-x-4 text-center">
<?php

while(have_posts()):
the_post();
get_template_part( 'template-parts/content');

endwhile;
?>
</div>

<?php
else:

  get_template_part( 'template-parts/content');

endif;


?>



</section>

<?php dashti_theme_the_posts_pagination();?>

</div>

<?php get_sidebar();?>



	</main><!-- #main -->

<?php

get_footer();
