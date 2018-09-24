$(function(){
	$( 'textarea.texteditor' ).ckeditor({

		/*toolbar:'Full'*/
		extraPlugins : 'timestamp',
		toolbar: [
	        ['Source','-','Save','NewPage','Preview','-','Templates'],
		  	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
			['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
			['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
			'/',
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Link','Unlink','Anchor','Youtube'],
			['Image','Flash','Table','HorizontalRule','Hhs','Smiley','SpecialChar','PageBreak'],
			'/',
			['Styles','Format','Font','FontSize'],
			['TextColor','BGColor'],
			['timestamp']
        ]


	});
	$( 'textarea.mini-texteditor' ).ckeditor({toolbar:'Basic',width:700});
});