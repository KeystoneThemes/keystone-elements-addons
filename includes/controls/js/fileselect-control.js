var fileselectItemView = elementor.modules.controls.BaseData.extend({
	
    onReady: function () {
		"use strict";
    	var file_input_id = this.$el.find( '.kea-selected-fle-url' ).attr('id');

    	this.$el.find( '.kea-select-file' ).click( function() {
	   	  	var kea_file_uploader = wp.media({
	            title: 'Upload File',
	            button: {
	                text: 'Get Link'
	            },
	            multiple: false
	        })
	        .on('select', function() {
	            var attachment = kea_file_uploader.state().get('selection').first().toJSON();
	            jQuery( "#" + file_input_id ).val( attachment.url );
	            jQuery( "#" + file_input_id ).trigger( "input" );
	        })
	        .open();
	   	} );
	},
});

elementor.addControlView('kea-file-select', fileselectItemView);