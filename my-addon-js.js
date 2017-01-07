define( [ 'core/theme-app', 'core/addons' ], function( App, Addons ) {

	App.filter( 'template-args', function ( template_args, view_type, view_template ) {
		
		//Pass custom param 'test' to head.html template:
		if ( view_template === 'head' ) {
			
			template_args.test = 'Here you go!';
			
			//Also pass the addon module, so that we can test if
			//the addon is activated before using the "test" param
			//in head.html:
			template_args.Addons = Addons;
		}
		
		return template_args;
	} );
	
	/**
	Then in head.html template, use the "test" param like so:
	<% 
		//Check that our addon is active, then use our addon's "test" param:
		if( typeof Addons !== 'undefined' && Addons.isActive('wpak-addon-starter') ) {
			console.log( 'My "test" param passed to head.html: ', test ); 
		}
	%>
	*/

} );


