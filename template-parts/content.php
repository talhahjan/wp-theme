<div>
              <div
                class="relative block bg-white dark:bg-opacity-5 rounded-lg shadow-lg border border-indigo-500/20"
              >
                <div class="flex">
                  <div
                  class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4 bg-primary h-72 w-full"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                  >
                  <img
                        src="<?php echo get_the_post_thumbnail_url();?>"
                        class="w-full h-full bg-primary"
                        alt=""
                      >
                    <a href="<?php the_permalink();?>">
                      <div
                        class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                        style="background-color: rgba(251, 251, 251, 0.15)"
                      >
                    </div>
                    </a>
                  </div>
                </div>

<div class="flex justify-start items-center space-x-1 text-sm pl-5">
  <span>posted <?php the_time();?></span>
  <span>by <?php the_author();?></span>
  <span>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" class="inline-block px-1 " height="16" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
  <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
</svg>  
 <?php dashti_theme_comments_number();?></span>
</div>

                <div class="p-4">
                  <h2 class="font-bold text-lg mb-3 line-clamp-1"><?php the_title();?></h2>
                  <!-- <span class="[&>p]:mb-2 [&>p]:pb-2 [&>p]:line-clamp-3"> -->
               <?php dashti_theme_the_excerpt() ?>
                  <!-- </span> -->
                </div>
              </div>
            </div>