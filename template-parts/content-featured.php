<?php
$args = array(
  'p'=>27,
	'posts_per_page'      => 1,
	// 'post__in'            => get_option( 'sticky_posts' ),
	// 'ignore_sticky_posts' => 1,

);
$the_query = new WP_Query( $args );



?>

<!-- =============  featured blog starts =============== -->

<?php  if ( $the_query->have_posts() ) : ?>
<!-- the loop -->
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

  <section
            class="p-5 bg-white dark:bg-opacity-5 text-center md:text-left rounded-lg shadow-l"
          >
            <div class="grid md:grid-cols-2 gap-x-6 xl:gap-x-12 items-center">
              <div class="mb-6 md:mb-0">
                <div
                  class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg w-[320px]"
                  data-mdb-ripple="true"
                  data-mdb-ripple-color="light"
                >
                    <img
                      src="<?php echo get_the_post_thumbnail_url();?>"
                      class="w-full"
                      alt="Louvre"
                    />
                  <div class="absolute bottom-2 left-4 flex gap-1">
                    
<?php
$post_tags = get_the_tags();

if ( $post_tags ) :
	foreach( $post_tags as $tag ) :
    $tag_link = get_tag_link( $tag->term_id );

  
?>

<a href="<?php echo $tag_link;?>">
                      <span
                        class="bg-black/60 rounded-md text-xs py-1 px-1.5 text-white"
                        ><?php echo $tag->name;?></span
                      ></a
                    >

<?php
  endforeach;
endif;

?>

                </div>
                </div>
              </div>

              <div class="mb-6 md:mb-0 self-start">
                <h3 class="text-lg font-bold mb-3 text-color-base-alt">
                <?php the_title();?>
                </h3>
                <p class="text-color-base-alt text-sm mb-4">
                  <span
                    >Published <?php the_time();?> by
                    <a href="#"><?php the_author();?></a></span
                  >
                </p>

                <span class="[&>p]:mb-2 [&>p]:pb-2 [&>p]:line-clamp-5">
               <?php the_excerpt()  ?>
                  </span>
              </div>
            </div>
          </section>
          <!-- =============  featured blog ends =============== -->
          <?php wp_reset_postdata(); ?>

            <?php endwhile;?>
           <?php endif;?>