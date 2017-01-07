<?php
/*
  Plugin Name: WP-AppKit Addon Starter
  Description: Code fundations of a WP-AppKit addon
  Version: 0.1
 */

if ( !class_exists( 'WpAppKitAddonStarter' ) ) {

	class WpAppKitAddonStarter {
		
		//Addon slug
		const slug = 'wpak-addon-starter';
		
		public static function hooks() {
			add_filter( 'wpak_addons', array( __CLASS__, 'wpak_addons' ) );
		}
		
		public static function wpak_addons( $addons ) {
			$addon = new WpakAddon( 'WP AppKit Addon Starter', self::slug );

			$addon->set_location( __FILE__ );

			//Add some js file to the app, that will be loaded at app initialization:
			$addon->add_js( 'my-addon-js.js', 'init', 'before' );
			//Possible insertion points:
			//'init', 'before' : at the very beginning of app launch
			//'theme', 'before' : just before functions.js
			//'theme', 'after' : after functions.js

			//Available methods:
			//$addon->add_html( ... ); //Insert HTML in a template (layout.html for example)
			//$addon->add_css( ... ); //Add css file
			//$addon->add_app_static_data( ... ); //Add static addon config
			//$addon->add_app_dynamic_data( ... ); //Add dynamic addon data (that are retrieve by sync webservice)
			
			$addons[] = $addon;

			return $addons;
		}
		
	}
	
	WpAppKitAddonStarter::hooks();
	
}
