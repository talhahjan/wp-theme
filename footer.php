<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dashti
 */

?>

 <!-- ============== footer section start ============== -->

 <footer
        class="bg-gradient-to-l from-primary to-primary-alt rounded-t-md px-3 text-inverted"
      >
        <div
          class="grid grid-cols-[repeat(auto-fit,minmax(150px,1fr))] justify-between md:justify-end gap-5 [&>*_h2]:text-lg [&>*_h2]:mb-2 [&>*_h2]:text-inverted [&>*_h2]:font-semibold [&>*_h2]:font-Courgette [&_ul_li]:my-2 p-4 footer-menu"
        >



<?php
wp_nav_menu( array(
  'menu'            => 'Quik Links', // The menu to display. Accepts a menu name, slug, ID, or object.
  'menu_class'      => '', // The CSS class for the menu
  'menu_id'         => 'quick-links', // The ID attribute for the menu
  'container'       => 'ul', // The HTML container element for the menu
  'container_id'    => 'footer-menu', // The ID attribute for the container element
  'fallback_cb'     => 'wp_page_menu', // The callback function to use if no menu is found
  'items_wrap'      => '<div><h2>'.__('Quick Links', 'dashti').'</h2><ul id="%1$s" class="%2$s">%3$s</ul></div>', // The HTML template for the menu
  'depth'           => 0, // The maximum depth of the menu
  'add_li_class'  => '',
  'add_a_class' => 'hover:underline duration-300',
  'echo'            => true // Whether to echo the menu or return it as a string
) );










wp_nav_menu( array(
  'menu'            => 'Legal', // The menu to display. Accepts a menu name, slug, ID, or object.
  'menu_class'      => '', // The CSS class for the menu
  'menu_id'         => 'legal', // The ID attribute for the menu
  'container'       => 'ul', // The HTML container element for the menu
  'container_id'    => 'footer-menu', // The ID attribute for the container element
  'fallback_cb'     => 'wp_page_menu', // The callback function to use if no menu is found
  'items_wrap'      => '<div><h2>'.__('Lefal', 'dashti').'</h2><ul id="%1$s" class="%2$s">%3$s</ul></div>', // The HTML template for the menu
  'depth'           => 0, // The maximum depth of the menu
  'add_li_class'  => '',
  'add_a_class' => 'hover:underline duration-300',
  'echo'            => true // Whether to echo the menu or return it as a string
) );


wp_nav_menu( array(
  'menu'            => 'Social Links', // The menu to display. Accepts a menu name, slug, ID, or object.
  'menu_class'      => '', // The CSS class for the menu
  'menu_id'         => 'legal', // The ID attribute for the menu
  'container'       => 'ul', // The HTML container element for the menu
  'container_id'    => 'footer-menu', // The ID attribute for the container element
  'fallback_cb'     => 'wp_page_menu', // The callback function to use if no menu is found
  'items_wrap'      => '<div><h2>'.__('Social Links', 'dashti').'</h2><ul id="%1$s" class="%2$s">%3$s</ul></div>', // The HTML template for the menu
  'depth'           => 0, // The maximum depth of the menu
  'add_li_class'  => '',
  'add_a_class' => 'hover:underline duration-300',
  'echo'            => true // Whether to echo the menu or return it as a string
) );

?>



 </div>
        <hr class="my-2 h-[1px] bg-slate-200 sm:mx-auto lg:my-4" />

        <div class="text-center md:text-left my-2">
<?php echo __('© Copyright', 'dashti');?>
          <script>
            var date = new Date();
            document.write(`${date.getFullYear()}-${date.getFullYear() + 5}`);
          </script>
          <?php echo __('All Rights Reserved', 'dashti');?>

        </div>
      </footer>
</div><!-- wrapper  -->
<?php  wp_footer();?>
</body>
</html>

