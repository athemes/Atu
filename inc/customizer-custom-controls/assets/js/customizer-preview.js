jQuery( document ).ready(function($) {

	// Change the font-size of body
	wp.customize('typography_font_size_body', function(control) {
		control.bind(function( controlValue ) {
			$('body').css('font-size', controlValue + 'px');
		});
	});


	// Change the font-size of site title
	wp.customize('typography_font_size_site_title', function(control) {
		control.bind(function( controlValue ) {
			$('.site-title').css('font-size', controlValue + 'px');
		});
	});

	// Change the font-size of site description
	wp.customize('typography_font_size_site_desc', function(control) {
		control.bind(function( controlValue ) {
			$('.site-description').css('font-size', controlValue + 'px');
		});
	});

	// Change the font-size of Top level menu items
	wp.customize('typography_font_size_menu_top_items', function(control) {
		control.bind(function( controlValue ) {
			$('.main-navigation li').css('font-size', controlValue + 'px');
		});
	});

	// Change the font-size of Submenu items
	wp.customize('typography_font_size_menu_sub_items', function(control) {
		control.bind(function( controlValue ) {
			$('.main-navigation ul ul li').css('font-size', controlValue + 'px');
		});
	});

	// Change the font-size of Post titles (archives)
	wp.customize('typography_font_size_index_title', function(control) {
		control.bind(function( controlValue ) {
			$('.blog-loop .entry-title').css('font-size', controlValue + 'px');
		});
	});	


	// Change the font-size of Post titles (singles)
	wp.customize('typography_font_size_single_title', function(control) {
		control.bind(function( controlValue ) {
			$('.single-post .entry-title').css('font-size', controlValue + 'px');
		});
	});	


	// Change the font-size of Widget titles
	wp.customize('typography_font_size_widget_title', function(control) {
		control.bind(function( controlValue ) {
			$('.widget-area .widget-title').css('font-size', controlValue + 'px');
		});
	});	


	// Change the font-size of Widget text
	wp.customize('typography_font_size_widgets', function(control) {
		control.bind(function( controlValue ) {
			$('.widget-area .widget').css('font-size', controlValue + 'px');
		});
	});	

	// Change the font-size of Footer widget titles
	wp.customize('typography_font_size_footer_widget_titles', function(control) {
		control.bind(function( controlValue ) {
			$('.sidebar-column .widget-title').css('font-size', controlValue + 'px');
		});
	});	

	// Change the font-size of Footer widget text
	wp.customize('typography_font_size_footer_widgets', function(control) {
		control.bind(function( controlValue ) {
			$('.sidebar-column .widget').css('font-size', controlValue + 'px');
		});
	});	

	// Change the font-size of Footer credits
	wp.customize('typography_font_size_footer_credits', function(control) {
		control.bind(function( controlValue ) {
			$('.site-info').css('font-size', controlValue + 'px');
		});
	});	

});