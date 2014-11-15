<?php

class Notifier_Admin {
	function __construct(){
		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_action( 'init', array( $this, 'load_assets' ) );
	}

	public static function load_assets(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'select2.js', plugins_url( 'notifier' ) . '/assets/vendor/select2/select2.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'fields.js', plugins_url( 'notifier' ) . '/assets/js/fields.js', array( 'jquery' ) );
		wp_enqueue_style( 'select2.css', plugins_url( 'notifier' ) . '/assets/vendor/select2/select2.css' );
	}

	public static function plugin_menu(){
		add_options_page( 'Notifier', 'Notifier', 'manage_options', 'notifier', array( 'Notifier_Admin', 'load_plugin_view' ) );
	}

	public static function load_plugin_view(){
		require_once plugin_dir_path( __NR_FILE__ ) . 'views' . DIRECTORY_SEPARATOR . 'settings.php';
	}
}

new Notifier_Admin();