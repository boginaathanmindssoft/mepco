/**
 * Copyright (c) 2014-2018, CKSource - Frederico Knabben. All rights reserved.
 * Licensed under the terms of the MIT License (see LICENSE.md).
 *
 * The abbr plugin dialog window definition.
 *
 * Created out of the CKEditor Plugin SDK:
 * http://docs.ckeditor.com/ckeditor4/docs/#!/guide/plugin_sdk_sample_1
 */

// Our dialog definition.
CKEDITOR.dialog.add( 'abbrDialog', function( editor ) {
	return {

		// Basic properties of the dialog window: title, minimum size.
		title: 'Light Box Properties',
		minWidth: 400,
		minHeight: 200,

		// Dialog window content definition.
		contents: [
			{
				// Definition of the Basic Settings dialog tab (page).
				id: 'tab-basic',
				label: 'Basic Settings',
				// The tab content.
				elements: [
					{
						// Text input field for the abbreviation text.
						type: 'text',
						id: 'link-text',
						label: 'Link Text',

						// Validation checking whether the field is not empty.
						validate: CKEDITOR.dialog.validate.notEmpty( "Link Text field cannot be empty." )
					},
					{
						// Text input field for the abbreviation text.
						type: 'text',
						id: 'link-id',
						label: 'Link ID',

						// Validation checking whether the field is not empty.
						validate: CKEDITOR.dialog.validate.notEmpty( "Link ID field cannot be empty." )
					},
					
					{
						// Text input field for the abbreviation title (explanation).
						type: 'textarea',
						id: 'light-box-content',
						label: 'Light Box Content',
						validate: CKEDITOR.dialog.validate.notEmpty( "Explanation field cannot be empty." )
					}
				]
			},


			/*// Definition of the Advanced Settings dialog tab (page).
			{
				id: 'tab-adv',
				label: 'Advanced Settings',
				elements: [
					{
						// Another text field for the abbr element id.
						type: 'text',
						id: 'id',
						label: 'Id'
					}
				]
			}*/
		],

		// This method is invoked once a user clicks the OK button, confirming the dialog.
		onOk: function() {

			// The context of this function is the dialog object itself.
			// http://docs.ckeditor.com/ckeditor4/docs/#!/api/CKEDITOR.dialog
			var dialog = this;

			// Create a new <abbr> element.
			var abbr = editor.document.createElement( 'a' );

			// Set element attribute and text by getting the defined field values.

			abbr.setAttribute( 'title', dialog.getValueOf( 'tab-basic', 'link-text' ) );
			abbr.setAttribute( 'href', 'javascript:void(0);');
			abbr.setAttribute( 'data-id', dialog.getValueOf( 'tab-basic', 'link-id' ) );
			abbr.setAttribute( 'class', "gradeLevelLightBox");

			abbr.setText( dialog.getValueOf( 'tab-basic', 'link-text' ) );
			editor.insertElement( abbr );


			var abbrContent = editor.document.createElement( 'div' );
			// Set element attribute and text by getting the defined field values.
			abbrContent.setAttribute( 'style', 'display:none' );
			abbrContent.setAttribute( 'id',  dialog.getValueOf( 'tab-basic', 'link-id' ));
			abbrContent.setText( dialog.getValueOf( 'tab-basic', 'light-box-content' ) );
			editor.insertElement( abbrContent );
			return true;


			/*var element = CKEDITOR.dom.element.createFromHtml( dialog.getValueOf( 'tab-basic', 'light-box-content' ) );
			editor.insertElement( element );*/

		}
	};
});
