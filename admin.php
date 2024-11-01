<?php
/*
Plugin Name: Special Promotion and Support
Plugin URI: https://store.devilhunter.net/wordpress-plugin/special-promotion-and-support/
Description: Only Plugin activation is enough! No need to use any short-code or to edit settings. See the change in your website.
Version: 1.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com/
Text Domain: specialpromotionandsupport-by-tawhidurrahmandear
License: GPLv2 or later
*/

// Prevent direct file access
if ( ! defined('ABSPATH') ) {
    exit;
}

// Define the main class
class DSspecialpromotionandsupportByTawhidurRahmanDear extends WP_Widget {

    // Construct method to set up hooks and register the widget
    public function __construct() {
        parent::__construct(
            'specialpromotionandsupport_by_tawhidurrahmandear', // Widget ID
            __('Special Promotion and Support', 'specialpromotionandsupport-by-tawhidurrahmandear'), // Widget name
            array('description' => __('Displays a special promotion image.', 'specialpromotionandsupport-by-tawhidurrahmandear'))
        );

        // Hook to display the promotion image and add CSS globally
        add_action('wp_footer', array($this, 'display_promotion_image'));
        add_action('wp_head', array($this, 'add_promotion_css'));
    }

    // Function to display the promotion image in the footer
    public function display_promotion_image() {
        echo '
        <img id="specialpromotionandsupport_by_tawhidurrahmandear_ad" src="' . plugins_url('/animated.gif', __FILE__) . '" alt="Special Promotion" />
        ';
    }

    // Function to add the CSS for the promotion image
    public function add_promotion_css() {
        echo '
        <style type="text/css">
            #specialpromotionandsupport_by_tawhidurrahmandear_ad {
                width: 150px;
                height: 150px;
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 100000;
                border-radius: 10px;
            }
            @media screen and (min-width: 600px) {
                #specialpromotionandsupport_by_tawhidurrahmandear_ad {
                    position: fixed;
                }
            }
        </style>
        ';
    }

    // Function to output the widget form in the admin dashboard
    public function form($instance) {
        ?>
        <p>
            <?php _e('This widget displays a special promotion image in your sidebar.', 'specialpromotionandsupport-by-tawhidurrahmandear'); ?>
        </p>
        <?php
    }

    // Function to display the content of the widget in the front-end
    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>
        <div class="specialpromotionandsupport-widget">
            <img src="<?php echo plugins_url('/animated.gif', __FILE__); ?>" alt="Special Promotion" style="width:150px; height:150px; border-radius:10px;" />
        </div>
        <?php
        echo $args['after_widget'];
    }
}

// Register the widget
function register_specialpromotionandsupport_widget() {
    register_widget('DSspecialpromotionandsupportByTawhidurRahmanDear');
}
add_action('widgets_init', 'register_specialpromotionandsupport_widget');
