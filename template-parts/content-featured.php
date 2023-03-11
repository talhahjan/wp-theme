<?php
// If on the homepage, show featured post from all categories
if ( is_home() ) {
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => 1,
    'post__in' => get_option( 'sticky_posts' )
  );
}
// If on a category or tag archive, show featured post from that category or tag
elseif ( is_category() || is_tag() ) {
  $term = get_queried_object();
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => 1,
    'tax_query' => array(
      array(
        'taxonomy' => $term->taxonomy,
        'field' => 'slug',
        'terms' => $term->slug
      )
    )
  );
}
// If on any other archive or search page, do not show featured post
else {
  return;
}

$the_query = new WP_Query( $args );


?>

<!-- =============  featured blog starts =============== -->

<?php  if ( $the_query->have_posts() ) : ?>
<!-- the loop -->

<?php while ($the_query->have_posts()) : $the_query->the_post(); ?> 

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white dark:bg-opacity-5 rounded-lg shadow-lg p-6 mb-10 border border-indigo-500/20">



<div
class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg bg-primary h-72 w-full"
>

<img
      src="<?php dashti_theme_post_thumbnail_url();?>"
      class="w-full h-full bg-primary"
      alt=""
    >
    <div class="absolute bottom-2 left-4">
<?php 
the_tag_list(array(
'before'=>'<div class="bg-black text-white text-xs rounded-md px-2 py-1" >',
'sep'=>'',
'after'=>'</div>',
));

?> 

</div>

</div>







<div>





<div class="flex flex-col">

<h2 class="text-lg font-bold dark:text-color-base-alt hover:underline duration-150 leading-7"> 
<a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

<?php if(!is_category()):?>
<span class="text-sm text-primary my-2"><?php echo get_the_category()[0]->cat_name;?></span>
<?php endif;?>



 <div class="-order-1 md:order-none inline-flex space-x-4 text-xs items-center dark:text-color-base-alt my-4">
    <div class="inline-flex items-center space-x-2">
    <img src="<?php echo get_avatar_url(get_the_author_ID());?>" alt="" class="h-4 w-4 rounded-full shadow-md"> <h5 class="font-semibold"><?php the_author();?></h5>
</div>

     <div class="inline-flex space-x-2">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
</svg>
    <span><?php the_time();?></span> 
    
    
    </div>





    <div class="inline-flex space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
  <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
</svg>
    <span><?php echo get_comments_number();?></span> 
    
    
    </div>




    </div>

    <p class=""><?php dashti_theme_the_excerpt(500);?></p>
</div>


</div>



 <!-- =============  featured blog ends =============== -->
 <?php 
$stikcy_post_id=get_the_ID(); 
save_featured_sticky_post_id($stikcy_post_id);
 wp_reset_postdata(); 
 
 ?>
 </div>

            <?php endwhile;?>
           <?php endif;?>


