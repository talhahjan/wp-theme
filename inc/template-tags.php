<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dashti
 */




if ( ! function_exists( 'dashti_theme_the_post_navigation' ) ) :
	/**
	 * Prints HTML for post navigation next previous .
	 */
	function dashti_theme_the_post_navigation(){
		

		
		return the_post_navigation(array(
		'prev_text'=>_('
		<div class="flex items-center">

	<div>
	<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
	<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
	</svg>
    </div>

		<div class="flex flex-col gap-x-2">
		<h2 class="text-lg font-bold font-Courgette">'.__('Previous', 'dahsti').'</h2>
		<span class="text-sm hidden md:block">%title</span>
		</div>
		</div>
		'),	



		'next_text'=>_('<!-- next text --!>
		<div class="flex items-center">

		<div class="flex flex-col text-right gap-x-2">
		<h2 class="text-lg font-bold font-Courgette">'.__('Next', 'dahsti').'</h2>
		<span class="text-sm hidden md:block">%title</span>
		</div>


		<div>
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary rotate-180" viewBox="0 0 16 16">
		<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
	    </svg>
        </div>
		
		</div>'),	
		'in_same_term'=>true,
		'taxonomy'=>'category',
		'screen_reader_text'=>__('continue reading ..','dashti'),
		'class'=>'post-navigation',
		));
	}
endif;


if ( ! function_exists( 'dashti_theme_the_categories' ) ) :

function dashti_theme_the_categories(){
	if(is_category()):
		return null;
	endif;
	$categories = get_the_category();
  
  if ( ! empty( $categories ) ) {
	  $output = '<ul class="inline-flex space-x-2 items-center">';
	  foreach ( $categories as $category ) {
		  $output .= '<li class="text-primary font-bold"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="category">' . esc_html( $category->name ) . '</a></li> ';
	  }
  
	  $output .='</ul>'; 
  
	  echo trim( $output, ', ' );
  }
   }




endif;






if ( ! function_exists( 'dashti_theme_comments_number' ) ) :
	/**
	 * Prints HTML with for the comments numbers
	 */

function dashti_theme_comments_number(){
	echo  get_comments_number();
}

endif;

if ( ! function_exists( 'dashti_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */

endif;






	if(!function_exists('dashti_theme_the_excerpt')):
		/**
		 * Filter the "read more" excerpt string link to the post.
		 *
		 * @param string $more "Read more" excerpt string.
		 * @return string (Maybe) modified "read more" excerpt string.
		 */
		
		
		
		
		function dashti_theme_the_excerpt($max_words=100) {
			$excerpt = get_the_excerpt(); 
		
		
		if(is_single()){
		echo $eccerpt;
		}
		else{
			$data = str_replace( '<p>', '', $excerpt );
			$data = str_replace( '</p>', '', $excerpt );
				
			if(strlen($data)<=$max_words){
				echo $data;
				}
				else{
				echo substr($data,0, $max_words).' ...';		
				}	
		
	
		
		
		}
		
		
		
		
		
		}
		
		
		
		
		
		
		
		
		
		
		endif;
		
		







?>