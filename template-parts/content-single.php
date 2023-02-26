<article class="prose 
prose-img:rounded-lg 
prose-img:shadow-md prose-headings:text-color-base-alt text-color-base dark:text-color-base dark:prose-invert">

<h1><?php the_title();?></h1>
<div class="my-4 flex space-x-6">
<span>Published <?php the_time();?></span>
<span>By  <?php echo get_author_name($post->post_author);?></span>
<span>in <?php echo get_the_category()[0]->cat_name;?></span>
</div>

<?php the_excerpt();?>

<div>
<img src="<?php echo get_the_post_thumbnail_url();?>"  class="rounded-md w-full" alt="">
</div>

<?php the_content();?>

</article>
