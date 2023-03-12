<?php

class Category_Widget extends WP_Widget   {
 
 function __construct() {
     parent::__construct(
         'Category_Widget', // Base ID
         __( 'Categories List', 'mytheme' ), // Name
         array( 'description' => __( 'A custom widget that displays categories and post counts.', 'mytheme' ), ) // Args
     );
 }

 public function widget( $args, $instance ) {
     $title = apply_filters( 'widget_title', $instance['title'] );
     echo $args['before_widget'];
     if ( ! empty( $title ) ) {
         echo $args['before_title'] . $title . $args['after_title'];
     }
     $categories = get_categories( array(
         'orderby' => 'name',
         'order'   => 'ASC'
     ) );
     echo '<ul class="ul flex flex-col gap-1">';



     foreach( $categories as $category ) {

         $count = $category->count;

        echo ' <li class="flex justify-between items-center">
         <span><a href="' . get_category_link( $category->term_id ) . '"
         class="text-color-base-alt hover:text-color-base hover:underline"
         >' . $category->name . ' </a> </span>
         <span>(' . $count . ')</span>
       </li>';


     }
     echo '</ul>';
     echo $args['after_widget'];
 }

 public function form( $instance ) {
     $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories', 'mytheme' );
     ?>
     <p>
     <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
     <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
     </p>
     <?php 
 }

 public function update( $new_instance, $old_instance ) {
     $instance = array();
     $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
     return $instance;
 }

}


function register_Category_Widget() {
 register_widget( 'Category_Widget' );
}

add_action( 'widgets_init', 'register_Category_Widget' );



?>