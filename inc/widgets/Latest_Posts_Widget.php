<?php
class Recent_Posts_With_Thumbnail_Widget extends WP_Widget {

public function __construct() {
    $widget_options = array(
        'classname' => 'Recent_Posts_With_Thumbnail_Widget',
        'description' => 'Displays the five most recent posts with thumbnails'
    );
    parent::__construct( 'Recent_Posts_With_Thumbnail_Widget', 'Recent Posts with Thumbnail', $widget_options );
}

public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
        echo $args['before_title'] . $title . $args['after_title'];
    }

    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $recent_posts = new WP_Query( $query_args );
    if ( $recent_posts->have_posts() ) {
       echo '<ul class="ul flex flex-col gap-y-4">';

        while ( $recent_posts->have_posts() ) {
            $recent_posts->the_post();

            echo '<li class="flex justify-start gap-2">
            <span class="w-24 h-24 md:w-16 md:h-16 bg-red-500/10"
              ><img
                src="'.(get_post_thumbnail_id() ? wp_get_attachment_image_src(get_post_thumbnail_id(),'medium')[0] : get_template_directory_uri().'/assets/images/no-thumb.jpg').'"
                class="rounded-md h-full w-full ring-white/10"
                alt=""
            ></span>
    
    
            <div class="grow flex flex-col justify-between w-full">
             <a href="'.get_the_permalink().'" class="block text-color-base-alt hover:text-color-base hover:underline"> '.get_the_title().'</a>
              <small class="text-sm md:text-xs">'.get_the_date().'</small>
            </div>
          </li>';
        }
        echo '</ul>';
    }
    wp_reset_postdata();

    echo $args['after_widget'];
}

public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
}

public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    return $instance;
}

}

function register_recenter_posts_widget() {
register_widget( 'Recent_Posts_With_Thumbnail_Widget' );
}
add_action( 'widgets_init', 'register_recenter_posts_widget' );



the_widget( 'Recent_Posts_With_Thumbnail_Widget' );



