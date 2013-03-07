<?php
//Register Sidebars

// http://codex.wordpress.org/Function_Reference/register_sidebar
function cur_register_listed_sidebars() {
  $sidebars = array('Header', 'Front Page', 'Page', 'Blog', 'Publication');

  foreach($sidebars as $sidebar) {
    register_sidebar(
      array(
        'id'            => sanitize_title($sidebar),
        'name'          => $sidebar,
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
      )
    );
  }
}

add_action('widgets_init', 'cur_register_listed_sidebars');

//----------------------- [ Widget .first & .last CSS Classes ] ----------------------//
 
/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function widget_first_last_classes($params) {
 
    global $my_widget_num; // Global a counter array
    $this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
    $arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets  
 
    if(!$my_widget_num) {// If the counter array doesn't exist, create it
        $my_widget_num = array();
    }
 
    if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
        return $params; // No widgets in this sidebar... bail early.
    }
 
    if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
        $my_widget_num[$this_id] ++;
    } else { // If not, create it starting with 1
        $my_widget_num[$this_id] = 1;
    }
 
    $class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options
 
    if($my_widget_num[$this_id] == 1) { // If this is the first widget
        $class .= 'first-widget ';
    } elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
        $class .= 'last-widget ';
    }
 
    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"
 
    return $params;
 
}
add_filter('dynamic_sidebar_params','widget_first_last_classes');
