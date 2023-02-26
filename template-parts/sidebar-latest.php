<li class="flex justify-start gap-2">
        <span class="w-24 h-24 md:w-16 md:h-16 bg-red-500/10"
          ><img
            src="<?php echo get_post_thumbnail_id() ? wp_get_attachment_image_src(get_post_thumbnail_id(),'medium')[0] : get_template_directory_uri().'/assets/images/no-thumb.jpg';?>"
            class="rounded-md h-full w-full ring-white/10"
            alt=""
        ></span>


        <div class="grow flex flex-col justify-between w-full">
         <a href="<?php the_permalink();?>" class="block"> <?php the_title();?></a>
          <small class="text-sm md:text-xs"><?php the_date();?></small>
        </div>
      </li>
