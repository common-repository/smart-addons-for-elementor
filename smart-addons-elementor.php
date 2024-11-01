<?php
/**
 * Plugin Name: Smart Addons for Elementor
 * Plugin URI: http://themebeer.com/wp/plugins/smart-addons/
 * Description: Packed with a bunch of Smart designed widget for Elementor.
 * Version: 1.0.3
 * Author: themebeer
 * Author URI: http://themebeer.com/
 * Text Domain: smart-addons-elementor
 * Domain Path: /languages
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
 
namespace ThemeBeer;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} 

if ( ! class_exists( 'Smart_Addons_Elementor' ) ) {
    /**
     * Smart Addons core class.
     *
     * Register plugin and make instances of core classes
     *
     * @package Smart Addons for Elementor
     * @version 1.0.0
     * @since   1.0.0
     */
    class Smart_Addons_Elementor {

        /**
         * Holds class instance
         *
         * @access private
         *
         * @var SmartAddons
         */
        private static $instance;

    	/**
         * Default constructor.
         *
         * Initialize plugin core and build environment
         *
         * @since   1.0.0
         */
        public function __construct() {
            $this->define_constants();
            $this->add_actions(); 
        }

        /**
         * Get class instance
         *
         * @return SmartAddons
         */
        public static function get_instance(){
            if( null === self::$instance ){
                self::$instance = new self();
            }
            return self::$instance;
        }

 
        /**
         * Definition wrapper.
         *
         * Creates some useful def's in environment to handle
         * plugin paths
         *
         * @since   1.0.0
         */
        public function define_constants() {

            // Some Constants for ease of use   
            if ( ! defined( 'SMARTAD_ELEMENTS' ) )
                define( 'SMARTAD_ELEMENTS', plugin_dir_path( __FILE__ ) . 'elements/' );

    		if ( ! defined( 'SMARTAD_URL' ) )
    		    define( 'SMARTAD_URL', plugins_url( '/', __FILE__ ) );

    		if ( ! defined( 'SMARTAD_ASSETS_URL' ) )
    			define( 'SMARTAD_ASSETS_URL', SMARTAD_URL . 'assets/' );
        }

        /**
         * Portfolio Post Types for this plugins. Applicable for filter
         *
         * @since   1.0.0
         */
        public function post_type_portfolio(){ 

            // Expert post type
            $portfolio_labels = array(
                'name'                  => _x( 'Portfolios', 'Post Type General Name', 'smart-addons-elementor' ),
                'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'smart-addons-elementor' ),
                'menu_name'             => esc_html__( 'Portfolios', 'smart-addons-elementor' ),
                'name_admin_bar'        => esc_html__( 'Portfolio', 'smart-addons-elementor' ),
                'archives'              => esc_html__( 'Portfolios Archives', 'smart-addons-elementor' ),
                'parent_item_colon'     => esc_html__( 'Parent Portfolio:', 'smart-addons-elementor' ),
                'all_items'             => esc_html__( 'All Portfolios', 'smart-addons-elementor' ),
                'add_new_item'          => esc_html__( 'Add New Portfolio', 'smart-addons-elementor' ),
                'add_new'               => esc_html__( 'Add New', 'smart-addons-elementor' ),
                'new_item'              => esc_html__( 'New Portfolio', 'smart-addons-elementor' ),
                'edit_item'             => esc_html__( 'Edit Portfolio', 'smart-addons-elementor' ),
                'update_item'           => esc_html__( 'Update Portfolio', 'smart-addons-elementor' ),
                'view_item'             => esc_html__( 'View Portfolio', 'smart-addons-elementor' ),
                'search_items'          => esc_html__( 'Search Portfolio', 'smart-addons-elementor' ),
                'not_found'             => esc_html__( 'Not found', 'smart-addons-elementor' ),
                'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'smart-addons-elementor' ),
                'featured_image'        => esc_html__( 'Featured Image', 'smart-addons-elementor' ),
                'set_featured_image'    => esc_html__( 'Set featured image', 'smart-addons-elementor' ),
                'remove_featured_image' => esc_html__( 'Remove featured image', 'smart-addons-elementor' ),
                'use_featured_image'    => esc_html__( 'Use as featured image', 'smart-addons-elementor' ),
                'insert_into_item'      => esc_html__( 'Insert into Portfolio', 'smart-addons-elementor' ),
                'uploaded_to_this_item' => esc_html__( 'Uploaded to this Portfolio', 'smart-addons-elementor' ),
                'items_list'            => esc_html__( 'Portfolios list', 'smart-addons-elementor' ),
                'items_list_navigation' => esc_html__( 'Portfolios list navigation', 'smart-addons-elementor' ),
                'filter_items_list'     => esc_html__( 'Filter Portfolios list', 'smart-addons-elementor' ),
            );

            $portfolio_args = array(
                'label'                 => esc_html__( 'Portfolio', 'smart-addons-elementor' ),
                'description'           => esc_html__( 'Portfolios Description', 'smart-addons-elementor' ),
                'labels'                => $portfolio_labels,
                'supports'              => array( 'title', 'author', 'thumbnail', 'page-attributes', ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-grid-view',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'smartad_portfolios', $portfolio_args );

                // Portfolio category
                $portfolio_cat_labels = array(
                    'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'smart-addons-elementor' ),
                    'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'smart-addons-elementor' ),
                    'menu_name'                  => esc_html__( 'Portfolio Category', 'smart-addons-elementor' ),
                    'all_items'                  => esc_html__( 'All Portfolio Categories', 'smart-addons-elementor' ),
                    'parent_item'                => esc_html__( 'Parent Portfolio Category', 'smart-addons-elementor' ),
                    'parent_item_colon'          => esc_html__( 'Parent Portfolio Category:', 'smart-addons-elementor' ),
                    'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'smart-addons-elementor' ),
                    'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'smart-addons-elementor' ),
                    'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'smart-addons-elementor' ),
                    'update_item'                => esc_html__( 'Update Portfolio Category', 'smart-addons-elementor' ),
                    'view_item'                  => esc_html__( 'View Portfolio Category', 'smart-addons-elementor' ),
                    'separate_items_with_commas' => esc_html__( 'Separate Portfolio Categories with commas', 'smart-addons-elementor' ),
                    'add_or_remove_items'        => esc_html__( 'Add or remove Portfolio Categories', 'smart-addons-elementor' ),
                    'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'smart-addons-elementor' ),
                    'popular_items'              => esc_html__( 'Popular Portfolio Categories', 'smart-addons-elementor' ),
                    'search_items'               => esc_html__( 'Search C', 'smart-addons-elementor' ),
                    'not_found'                  => esc_html__( 'Not Found', 'smart-addons-elementor' ),
                    'no_terms'                   => esc_html__( 'No V', 'smart-addons-elementor' ),
                    'items_list'                 => esc_html__( 'V list', 'smart-addons-elementor' ),
                    'items_list_navigation'      => esc_html__( 'V list navigation', 'smart-addons-elementor' ),
                );

                $portfolio_cat_args = array(
                    'labels'                     => $portfolio_cat_labels,
                    'hierarchical'               => true,
                    'public'                     => true,
                    'show_ui'                    => true,
                    'show_admin_column'          => true,
                    'show_in_nav_menus'          => true,
                    'show_tagcloud'              => true,
                );
                register_taxonomy( 'smartad_portfolios_cat', array( 'smartad_portfolios' ), $portfolio_cat_args ); 
        }
 
        /**
         * Adds action hooks.
         *
         * @since   1.0.0
         */
        private function add_actions() { 
            // Init portfolio post types
            add_action( 'init', array($this, 'post_type_portfolio'), 0 );
            // Enqueue Styles and Scripts
            add_action( 'wp_enqueue_scripts', array( $this, 'smartad_enqueue_scripts' ), 100 );
            // Registering Elementor Widget Category
            add_action( 'elementor/elements/categories_registered', array( $this, 'smartad_register_category' ) );
        	// Registering custom widgets
            add_action( 'elementor/widgets/widgets_registered', array( $this, 'smartad_add_elements' ) );
            // Plugin Loaded Action
            add_action( 'plugins_loaded', array( $this, 'smartad_element_pack_load_plugin' ) );
            // Add Body Class 
            add_filter( 'body_class', array( $this, 'smartad_add_body_classes' ) );


            add_action( 'add_meta_boxes', array( $this, 'smartad_add_custom_box' ) );
            add_action( 'save_post', array( $this, 'smartad_save_postdata' ) ); 
        }

        public function smartad_add_custom_box() {
            $screens = ['smartad_portfolios'];
            foreach ($screens as $screen) {
                add_meta_box(
                    'smartad_box_id',           // Unique ID
                    esc_html__('Portfolio Meta Box','smart-addons-elementor'),  // Box title
                    array( $this, 'smartad_custom_box_html' ), // Content callback, must be of type callable
                    $screen                   // Post type
                );
            }
        }

        public function smartad_custom_box_html($post) {
            $value = get_post_meta($post->ID, '_smartad_portfolio_meta_key', true);
            ?>
            <label for="smartad_field"><?php echo esc_html('Subtitle','smart-addons-elementor'); ?></label> 
            <input type="text" name="smartad_field" value="<?php echo esc_attr($value ? $value : ''); ?>">
            <?php
        }

        public function smartad_save_postdata($post_id){
            if (array_key_exists('smartad_field', $_POST)) {
                $smartad_field = sanitize_text_field($_POST['smartad_field']);
                update_post_meta(
                    $post_id,
                    '_smartad_portfolio_meta_key',
                    $smartad_field
                );
            }
        }

        /*
        *
        * Add Body Class smart-addons-elmentor
        */
        public function smartad_add_body_classes( $classes ) {
            $classes[] = 'smart-addons-elementor';

            return $classes;
        }
 

        /**
         * Plugin load here correctly
         * Also loaded the language file from here
         */
        public function smartad_element_pack_load_plugin() {
            load_plugin_textdomain( 'smart-addons-elementor', false, basename( dirname( __FILE__ ) ) . '/languages' );

            if ( ! did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', array( $this, 'smartad_element_pack_fail_load' ) );
                return;
            }
            
        }


        /**
         * Register custom fonts.
         */
        public function smartad_fonts_url() {
            $fonts_url = '';

            /*
             * Translators: If there are characters in your language that are not
             * supported by Libre Franklin, translate this to 'off'. Do not translate
             * into your own language.
             */
            $libre_franklin = _x( 'on', 'Roboto font: on or off', 'twentyseventeen' );

            if ( 'off' !== $libre_franklin ) {
                $font_families = array();

                $font_families[] = 'Roboto:300,400,500,700';

                $query_args = array(
                    'family' => urlencode( implode( '|', $font_families ) ),
                    'subset' => urlencode( 'latin,latin-ext' ),
                );

                $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
            }

            return esc_url_raw( $fonts_url );
        }


        /**
        * Enqueue Plugin Styles and Scripts
        *
        */
        public function smartad_enqueue_scripts() {

            // Add custom fonts, used in the main stylesheet.
            wp_enqueue_style( 'smartad-fonts', $this->smartad_fonts_url());
 
            wp_enqueue_style( 'font-awesome', plugins_url( '/assets/css/font-awesome.css', __FILE__ ) ); 
            wp_enqueue_style( 'bootstrap', plugins_url( '/assets/css/bootstrap.css', __FILE__ ) ); 
            wp_enqueue_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) ); 
            wp_enqueue_style( 'owl-theme-default', plugins_url( '/assets/css/owl.theme.default.min.css', __FILE__ ) ); 
            wp_enqueue_style( 'smartad-icomoon-font', plugins_url( '/assets/css/icomoon-font.css', __FILE__ ) );
            wp_enqueue_style( 'twentytwenty', plugins_url( '/assets/css/twentytwenty.css', __FILE__ ) );
            wp_enqueue_style( 'smartad-main-style', plugins_url( '/assets/css/smartad-style.css', __FILE__ ) );


            wp_enqueue_script( 'bootstrap', plugins_url( '/assets/js/bootstrap.js', __FILE__ ), array( 'jquery' ), false, true );  
            wp_enqueue_script( 'jquery-waypoints', plugins_url( '/assets/js/jquery.waypoints.min.js', __FILE__ ), array(), false, true );  
            wp_enqueue_script( 'jquery-counterup', plugins_url( '/assets/js/jquery.counterup.js', __FILE__ ), array(), false, true );  
            wp_enqueue_script( 'owl-carousel', plugins_url( '/assets/js/owl.carousel.js', __FILE__ ), array(), false, true );  
            wp_enqueue_script( 'jquery-event-move', plugins_url( '/assets/js/jquery.event.move.js', __FILE__ ), array(), false, true );  
            wp_enqueue_script( 'jquery-twentytwenty', plugins_url( '/assets/js/jquery.twentytwenty.js', __FILE__ ), array(), false, true );  
            
            wp_enqueue_script( 'jquery.mixitup.min', plugins_url( '/assets/js/jquery.mixitup.min.js', __FILE__ ), array(), false, true );
            wp_enqueue_script( 'smartad-main-script', plugins_url( '/assets/js/smartad-script.js', __FILE__ ), array(), false, true );
        }

        /**
        * Register Exclusive Elementor Addons category
        *
        */
        public function smartad_register_category( $elements_manager ) {

            $elements_manager->add_category(
                'smart-addons-elementor',
                [
                    'title' => esc_html__( 'Smart Addons', 'smart-addons-elementor' ),
                    'icon' => 'fa fa-plug',
                ]
            );

        }

	
		/**
		 * Check to see if Elementor is Activated
		 * 
		 * @since 1.0.0
		 */
		public function is_elementor_activated( $plugin_path = 'elementor/elementor.php' ){
			$installed_plugins_list = get_plugins();
			return isset( $installed_plugins_list[ $plugin_path ] );
		}


        /**
         * Check Elementor installed and activated correctly
         */
        function smartad_element_pack_fail_load() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$elementor_path = 'elementor/elementor.php';

			if ( $this->is_elementor_activated() ) {
				if( ! current_user_can( 'activate_plugins' ) ) {
					return;
				}
				$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor_path . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor_path );
				$message = __( '<strong>Smart Addons for Elementor</strong> won\'t work without the help of <strong>Elementor</strong> plugin. Please activate Elementor.', 'smart-addons-elementor' );
				$button_text = __( 'Activate Elementor', 'smart-addons-elementor' );
				} else {
				if( ! current_user_can( 'install_plugins' ) ) {
					return;
				}
				$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
				$message = sprintf( __( '<strong>Smart Addons for Elementor</strong> won\'t work without the help of <strong>Elementor</strong> plugin. Please install Elementor.', 'smart-addons-elementor' ), '<strong>', '</strong>' );
				$button_text = __( 'Install Elementor', 'smart-addons-elementor' );
				}

			$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p>%2$s</div>', __( $message ), $button );
        }

        /**
        * Include Addons
        *
        */
        public function smartad_add_elements() {

        	require_once SMARTAD_ELEMENTS . 'smart-heading/smart-heading.php';
            require_once SMARTAD_ELEMENTS . 'smart-service/smart-service.php';
            require_once SMARTAD_ELEMENTS . 'smart-accordion/smart-accordion.php';
            require_once SMARTAD_ELEMENTS . 'smart-content-block/smart-content-block.php'; 
            require_once SMARTAD_ELEMENTS . 'smart-count-down/smart-count-down.php'; 
            require_once SMARTAD_ELEMENTS . 'smart-testimonial/smart-testimonial.php'; 
            require_once SMARTAD_ELEMENTS . 'smart-team/smart-team.php';  
            require_once SMARTAD_ELEMENTS . 'smart-portfolio/smart-portfolio.php';  
            require_once SMARTAD_ELEMENTS . 'smart-tab/smart-tab.php';  
            require_once SMARTAD_ELEMENTS . 'smart-before-after/smart-before-after.php';  
            
        } 


    }

// Instance of the Smart_Addons_Core class 
\ThemeBeer\Smart_Addons_Elementor::get_instance();

}