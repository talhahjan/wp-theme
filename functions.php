<?php
/**
 * dashti functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dashti
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// load theme configuration setting from inc/theme_config.php

require get_template_directory() . '/inc/theme-config.php';





/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dashti_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dashti, use a find and replace
		* to change 'dashti_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dashti_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );


	add_post_type_support('page','excerpt');


	// This theme uses wp_nav_menu() in one location.
register_nav_menus( 
   array(
      'serivices-menu'=>'services',
      'legal-menu'=>'legal',
      'resources-menu'=>'resources',
      'social-links'=>'social links',
      'navbar-menu'=>'Navbar Menu'
      )
   );
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.

	// add_theme_support(
	// 	'custom-background',
	// 	apply_filters(
	// 		'dashti_theme_custom_background_args',
	// 		array(
	// 			'default-color' => 'ffffff',
	// 			'default-image' => '',
	// 		)
	// 	)
	// );

	// Add theme support for selective refresh for widgets.

	// add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */

	//  add_theme_support(
	// 	'custom-logo',
	// 	array(
	// 		'height'      => 250,
	// 		'width'       => 250,
	// 		'flex-width'  => true,
	// 		'flex-height' => true,
	// 	)
	// );
}

add_action( 'after_setup_theme', 'dashti_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

//  function dashti_theme_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'dashti_theme_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'dashti_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

// function dashti_theme_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'dashti_theme' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'dashti_theme' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'dashti_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */





function dashti_theme_scripts() {


	wp_enqueue_style( 'dashti-theme-style', get_stylesheet_directory_uri().'/assets/css/tailwind.css', array(), _S_VERSION );
  wp_enqueue_script( 'dashti-theme-script', get_template_directory_uri() . '/assets/js/custom-script.js', array(), '1.0', true );

  wp_localize_script( 'dashti-theme-script', 'wpConfig', array(
    'homeUrl' => esc_url( home_url( '/' ) ),
    'adminUrl' => esc_url(admin_url('/')),
));

	wp_enqueue_script( 'dasht-theme-tailwind-elements',get_template_directory_uri().'/assets/js/tailwind-elements/index.min.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
}
add_action( 'wp_enqueue_scripts', 'dashti_theme_scripts');






/**
 * Implement the Custom Header feature.
 */


/**
 * Custom template tags for this theme.
 */

 require get_template_directory() . '/inc/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//  require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }


/*
 
instead of mentioning date and time of the post, we want display
  
how long ago was post the was published (i.e 1 hours ago , 1 week ago etc ) 

the same thing we will apply bellow  for the comment/reply 

*/


function dashti_theme_post_time_ago() {
  return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
  }
  add_filter( 'the_time', 'dashti_theme_post_time_ago' );

/*
 
instead of mentioning date and time of the comment, we want display
  
how long ago the  comment/reply was published (i.e 1 hours ago , 1 week ago etc ) 

the same thing was just applied above for the post 

*/



  function dashti_theme_comment_time_ago() {
    return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_comment_time ( 'U' ), current_time( 'timestamp' ) ) );
    }
    add_filter( 'get_comment_date', 'dashti_theme_comment_time_ago' );

// add class to li tag in footer menu





function dashti_theme_add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
 add_filter('nav_menu_css_class', 'dashti_theme_add_additional_class_on_li', 1, 3);


 // add li and a tag classes to navbar menu
 function dashti_theme_add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}



add_filter('nav_menu_link_attributes', 'dashti_theme_add_additional_class_on_a', 1, 3);





/*

to retirive class on comment wrapper div

*/


function dashti_theme_comment_class( $css_class = '', $comment = null, $post = null, $display = true ) {
	// Separates classes with a single space, collates classes for comment DIV.
	$css_class = 'class="' . $css_class . '"';

	if ( $display ) {
		echo $css_class;
	} else {
		return $css_class;
	}
}

/*

this function is for comment list 

*/



function dashti_theme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $commenter     = wp_get_current_commenter();
    $show_pending_links = isset( $commenter['comment_author'] ) && $commenter['comment_author'];
    if ( $commenter['comment_author_email'] ) {
        $moderation_note = __( 'Your comment is awaiting moderation.' );
    } else {
        $moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.' );
    }
    ?>





  <<?php echo $tag; ?> 
    <?php dashti_theme_comment_class($args['has_children'] ? 'parent' : 'child' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
   <!-- comments list starts -->
   <div
            class="grid grid-flow-col grid-cols-[max-content,1fr] place-content-start place-items-start grid-rows-1 gap-x-4"
          >
          <div class="h-14 w-14">
          <img
          class="block h-full w-full rounded-full shadow-lg"
          src="<?php echo get_avatar_url($comment->comment_author_email);?>" alt="">
          
      </div>
            <div
              class="flex flex-col justify-start items-start space-y-1 relative w-full"
            >
            <?php 
            if(current_user_can( 'edit_comment', (int) get_comment_ID() )):
edit_comment_link( '<span
class="absolute top-5 right-4 h-8 w-8 rounded-full hover:bg-slate-500/20 flex justify-center items-center cursor-pointer"
>
<svg
xmlns="http://www.w3.org/2000/svg"
width="16"
height="16"
fill="currentColor"
class="bi bi-pencil-square"
viewBox="0 0 16 16"
>
<path
d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
/>
<path
fill-rule="evenodd"
d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
/>
</svg>

</span>');
endif;?>

              <div
                class="bg-white dark:bg-opacity-5 w-full px-4 py-2 rounded-md flex flex-col border border-gray-200 border-indigo-500/20 shadow-lg"
              >
                <div class="flex justify-start flex-col space-x-2">
                  <h4 class="text-lg font-semibold capitalize text-color-base-alt"><?php echo get_comment_author();?></h4>
                  <?php 
             if ( '0' == $comment->comment_approved ) :?>
            <em class="comment-awaiting-moderation text-xs text-red-500"><?php echo $moderation_note; ?></em>
            <?php 
             endif;
             ?>
                </div>
                <div class="py-1">
<?php comment_text();?>
</div>
                <span class="self-end text-xs text-color-base-alt"> <?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s'), 
                    get_comment_date(),  
                ); ?>
          
</span>
              </div>
    
           <div class="flex justify-center items-center space-x-2 text-xs">
           <?php
if($args['has_children']):
  ?>
              <span class="flex justify-start items-center space-x-1">
                 <button class="replyBtn font-bold text-color-base-alt hover:text-color-base duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
</svg>
                  </button>
                  <span>Show/Hide Replies</span>
                </span>
                <?php
                endif;
if($args['max_depth']>$depth):
  ?>       
              <span class="flex justify-start items-center space-x-1">
                 <span>
                   <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-reply-fill"
                    viewBox="0 0 16 15"
                  >
                    <path
                      d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"
                    />
                  </svg>
</span>
                  <span class="replyBtn duration-300 transition-transform"
                    >
                    <?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
                    </span
                  >
                </span>
<?php
endif;?>
              </div>
            </div>
          </div>
          <!-- comments list ends -->

    <?php if ( 'div' !== $args['style'] ) : ?>
    </div><!-- div if -->
    <?php endif; ?>
    <?php
}


/*

this section is for comment form designing 

*/





add_action('comment_form_top', 'dashti_theme_comment_form_top');
function dashti_theme_comment_form_top() {
  echo '<!-- comment form top starts --><div class="grid grid-flow-row grid-cols-2 gap-2 mx-auto w-4/5">';

}






add_filter( 'comment_form_fields', 'dashti_theme_custom_form_fields' );



function dashti_theme_custom_form_fields( $fields ) 
{
  $commenter     = wp_get_current_commenter();
  $user          = wp_get_current_user();
  $user_identity = $user->exists() ? $user->display_name : '';
  $req   = get_option( 'require_name_email' );
  $html5 = 'html5' === 'html5';
  
  // Define attributes in HTML5 or XHTML syntax.
  $required_attribute = ' required';
  $checked_attribute  = ' checked';
  // Identify required fields visually and create a message about the indicator.
  $required_indicator = ' ' . wp_required_field_indicator();
  $required_text      = ' ' . wp_required_field_message();
  
  
 
  $fields=array(
    'comment' => sprintf(
        '<div class="comment-form-author col-span-full">%s %s</div>' ,
        sprintf(
        '<label for="comment">%s%s</label>',
        __( 'Comment' ),
        ( $req ? $required_indicator : '' )
        ),
        sprintf(
        '<textarea id="comment" name="comment" cols="45" rows="2" aria-required="true" required></textarea>',
        ( $req ? $required_attribute : 'required' ),
        ),
      ),
      'author' => sprintf(
       '<div class="comment-form-author col-span-full md:col-span-1">%s %s</div>',
       sprintf(
       '<label for="author">%s%s</label>',
       __( 'Name' ),
       ( $req ? $required_indicator : '' )
       ),
       sprintf(
       '<input type="email" id="author" name="author" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
       esc_attr( $commenter['comment_author'] ),
       ( $req ? $required_attribute : '' )
       )
     ),
     
     'email'  => sprintf(
       '<div class="comment-form-email col-span-full md:col-span-1">%s %s</div>',
       sprintf(
       '<label for="email">%s%s</label>',
       __( 'Email' ),
       ( $req ? $required_indicator : '' )
       ),
       sprintf(
       '<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
       ( $html5 ? 'type="email"' : 'type="text"' ),
       esc_attr( $commenter['comment_author_email'] ),
       ( $req ? $required_attribute : '' )
       )
       ),
    // 'author'=>'<!-- email field -->',
    'cookies'=> sprintf(
      '<div class="comment-form-cookies-consent col-span-full flex justify-start items-center">%s %s</div>',
      sprintf(
        '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
    ''
      ),
      sprintf(
        '
        <label for="wp-comment-cookies-consent" class="ml-2 block text-sm">%s</label>
        ',
        __( 'Save my details for next time i comment !' )
      )
      ),
    
    
    );

  return $fields;  
}









function get_term_post_count( $taxonomy = 'category', $term = '', $args = [] )
{
    // Lets first validate and sanitize our parameters, on failure, just return false
    if ( !$term )
        return false;

    if ( $term !== 'all' ) {
        if ( !is_array( $term ) ) {
            $term = filter_var(       $term, FILTER_VALIDATE_INT );
        } else {
            $term = filter_var_array( $term, FILTER_VALIDATE_INT );
        }
    }

    if ( $taxonomy !== 'category' ) {
        $taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
        if ( !taxonomy_exists( $taxonomy ) )
            return false;
    }

    if ( $args ) {
        if ( !is_array ) 
            return false;
    }

    // Now that we have come this far, lets continue and wrap it up
    // Set our default args
    $defaults = [
        'posts_per_page' => 1,
        'fields'         => 'ids'
    ];

    if ( $term !== 'all' ) {
        $defaults['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'terms'    => $term
            ]
        ];
    }
    $combined_args = wp_parse_args( $args, $defaults );
    $q = new WP_Query( $combined_args );

    // Return the post count
    return $q->found_posts;
}






function dashti_theme_the_posts_pagination($args = [], $class = 'pagination'){
    global $wp_query;
    
    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

    $args =  [
       'mid_size'                   => PAGINATION_MID_SIZE,
       'end_size'                   => PAGINATION_END_SIZE,
      'prev_next'                  => false,
      'prev_text'                  => __(PAGINATION_PREV_TEXT, 'textdomain'),
      'next_text'                  => __(PAGINATION_NEXT_TEXT, 'textdomain'),
      'screen_reader_text' => __(PAGINATION_SCREEN_READER_TEXT, 'textdomain'),
];

    $links   = paginate_links($args);
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;
    $first =get_previous_posts_link()?get_previous_posts_link($args['prev_text']): '<span class="block py-1.5 px-3 rounded border-0 bg-transparent outline-none pointer-events-none">'.$args['prev_text'].'</span>';
    $last = get_next_posts_link()?get_next_posts_link($args['next_text']):printf('<span class="block py-1.5 px-3 rounded border-0 bg-transparent outline-none pointer-events-none">'.$args['next_text'].'</span>',);
 $template  = apply_filters( 'navigation_markup_template', '
 <nav aria-label="Page navigation example" class="flex justify-center space-x-1 my-4">
<div class="prev"> 
%3$s
</div>
    <div class="page-items inline-flex space-x-1">
    %4$s
        </div>
        <div class="next">
        %5$s
        </div>
    </nav>', $args, $class);
echo sprintf($template, $class, $args['screen_reader_text'], $first, $links, $last);
  }

function dashti_theme_the_tag_name(){
  global $tag_name;

echo $tag_name;

}


function dashti_theme_the_tag_link(){
 global $tag_link;

echo $tag_link;

}




function the_tag_list($args){
  echo get_the_tag_list(
    $args['before'],
    $args['sep'],
    $args['after'],
  );
    
  }



function add_dark_class_to_html_tag( $output ) {
  session_start();
  if ( isset( $_SESSION['darkMode'] ) && $_SESSION['darkMode'] ) {
    $output .= ' class="dark"';
    }
    return $output;
}
add_filter( 'language_attributes', 'add_dark_class_to_html_tag' );





  function save_theme_session() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['theme'])) {
        session_start();
        $_SESSION['darkMode'] = $_POST['theme'] =='dark' ? true: false;
        return wp_send_json_success('Session saved successfully');
      } else {
        return wp_send_json_error('No theme data received');
      }
    } else {
      return wp_send_json_error('Invalid request method');
    }
  }
  add_action( 'wp_ajax_save_theme_session', 'save_theme_session' );
  add_action( 'wp_ajax_nopriv_save_theme_session', 'save_theme_session' );
  


