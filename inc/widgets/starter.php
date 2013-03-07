<?php 

class Cur_### extends WP_Widget {

    /*--------------------------------------------------*/
    /* Constructor
    /*--------------------------------------------------*/

    /**
     * The widget constructor. Specifies the classname and description, instantiates
     * the widget, loads localization files, and includes necessary scripts and
     * styles.
     */
    public function __construct() {

        // TODO: update classname and description
        // TODO: replace 'widget-name-locale' to be named more plugin specific. other instances exist throughout the code, too.
        parent::__construct(
            'cur-#-#',
            '# #',
            array(
                'classname'     =>  'cur-#-#',
                'description'   =>  'Displays a Yearly archive of posts that toggles down to show the months that have posts.'
            )
        );

    } // end constructor

    /*--------------------------------------------------*/
    /* Widget API Functions
    /*--------------------------------------------------*/

    /**
     * Outputs the content of the widget.
     *
     * @args            The array of form elements
     * @instance        The current instance of the widget
     */
    public function widget( $args, $instance ) { 
    
        extract($args);
        echo $before_widget;

    ?>



    <?php 

        echo $after_widget;
    } // end widget

    /**
     * Processes the widget's options to be saved.
     *
     * @new_instance    The previous instance of values before the update.
     * @old_instance    The new instance of values to be generated via the update.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number_of_posts'] = strip_tags( $new_instance['number_of_posts'] );
    
        return $instance;

    } // end widget

    /**
     * Generates the administration form for the widget.
     *
     * @instance    The array of keys and values for the widget.
     */
    public function form( $instance ) {

        // TODO define default values for your variables
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => 'Other Suggested Videos',
                'number_of_posts' => 3,
            )
        );

        // TODO store the values of widget in a variable

        // Display the admin form
        foreach ( $instance as $field => $value ) :
        $field_id = $this->get_field_id( $field );
?>
            <p>
                <label for="<?php echo $this->get_field_id( $field ); ?>"><?php echo ucwords( str_replace('_', ' ', $field) ); ?></label>
                <input type="text" class="widefat" value="<?php esc_html_e( $value ); ?>" id="<?php echo $this->get_field_id( $field ); ?>" name="<?php echo $this->get_field_name( $field ); ?>">
           </p> 

<?php
        endforeach;
    } // end form


} // end class

add_action( 'widgets_init', create_function( '', 'register_widget("Cur_###");' ) ); 

