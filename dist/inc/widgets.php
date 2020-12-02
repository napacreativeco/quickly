<?php

 /**
 * Register Widget Areas & Sidebars
 *
 */
function ncc_widget_areas_init() {

	register_sidebar( array(
		'name'          => 'Dekstop Flyout (Left)',
		'id'            => 'desktop_flyout_left',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
  register_sidebar( array(
		'name'          => 'Dekstop Flyout (Center)',
		'id'            => 'desktop_flyout_center',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
  register_sidebar( array(
    'name'          => 'Dekstop Flyout (Right)',
    'id'            => 'desktop_flyout_right',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Sidebar (Pages)',
    'id'            => 'sidebar_pages',
    'before_widget' => '<div class="widget-class__blog">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Sidebar (Blog)',
    'id'            => 'sidebar_blog',
    'before_widget' => '<div class="widget-class__blog">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
}
add_action( 'widgets_init', 'ncc_widget_areas_init' );





/* =====================
 * Custom Divider Widgets
 * =======================
 */
 
class NCC_Dividers extends WP_Widget {
 
  public function __construct() {
      $widget_ops = array('classname' => 'NCC_Dividers', 'description' => 'A set of Dividers for Widget Areas' );
      $this->WP_Widget('NCC_Dividers', 'NCC Dividers', $widget_ops);
  }
  
  function widget($args, $instance) {
    // PART 1: Extracting the arguments + getting the values
    extract($args, EXTR_SKIP);

    $divider = empty($instance['divider']) ? '' : $instance['divider'];
    // Before widget code, if any
    echo (isset($before_widget)?$before_widget:'');
   
    // PART 2: The title and the text output
    if ($divider == 'Solid') {
      echo '<div class="widget__divider" id="widget__divider-solid"><span></span></div>';
    } elseif ($divider == 'Dotted') {
      echo '<div class="widget__divider" id="widget__divider-dotted"><span></span></div>';
    } elseif ($divider == 'Dashed') {
      echo '<div class="widget__divider" id="widget__divider-dashed"><span></span></div>';
    } 
      
   
    // KEEP: After widget code, if any  
    echo (isset($after_widget)?$after_widget:'');
  }
 
  public function form( $instance ) {
   
     // PART 1: Extract the data from the instance variable
     $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
     $divider = $instance['divider'];   
   
     // PART 2-3: Display the fields
     ?>
   
     <!-- PART 3: Widget City field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text'); ?>">Divider Type: 
        <select class='widefat' id="<?php echo $this->get_field_id('divider'); ?>"
                name="<?php echo $this->get_field_name('divider'); ?>" type="text">
          <option value='Solid'<?php echo ($divider=='Solid')?'selected':''; ?>>
            Solid
          </option>
          <option value='Dotted'<?php echo ($divider=='Dotted')?'selected':''; ?>>
            Dotted
          </option> 
          <option value='Dashed'<?php echo ($divider=='Dashed')?'selected':''; ?>>
            Dashed
          </option> 
        </select>                
      </label>
     </p>
     <!-- Widget City field END -->
     
     <?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['divider'] = $new_instance['divider'];
    return $instance;
  }
  
}
 
add_action( 'widgets_init', create_function('', 'return register_widget("NCC_Dividers");') );
?>