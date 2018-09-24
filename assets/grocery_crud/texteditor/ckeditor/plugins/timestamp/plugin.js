(function() {
	var o = { 
		exec: function(p) {

		}
	};
	CKEDITOR.plugins.add('timestamp', {
	init: function(editor) {
			editor.addCommand( 'timestamp', new CKEDITOR.dialogCommand( 'abbrDialog' ) );
			editor.ui.addButton('timestamp', {
				label: 'timestamp',
				command: 'timestamp',
				icon: this.path + 'icons/timestamp.png',
				toolbar: 'tools'
			});
			CKEDITOR.dialog.add( 'abbrDialog', this.path + 'dialogs/timestamp.js' );
		}
	});



})();
