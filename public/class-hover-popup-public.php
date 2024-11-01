<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       dangngocbinh.com
 * @since      1.0.0
 *
 * @package    Hover_Popup
 * @subpackage Hover_Popup/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hover_Popup
 * @subpackage Hover_Popup/public
 * @author     Bi Do <dangngocbinh.dnb@gmail.com>
 */
class Hover_Popup_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		
		add_action('woocommerce_before_shop_loop_item_title', array($this,'woocommerce_template_loop_product_thumbnail_full'), 30);

	}

	public function woocommerce_template_loop_product_thumbnail_full(){
		global $post;		

		if ( has_post_thumbnail() ) {
			$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			
			echo '<div class="hover-popup-data" style="display: none; !important"> <img src="'.$props['url'].'" /></div>' ;
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hover_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hover_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hover-popup-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hover_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hover_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hover-popup-public.js', array( 'jquery' ), $this->version, false );

	}

}
