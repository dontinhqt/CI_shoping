/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
config.filebrowserBrowseUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'http://localhost/shoping/assets/admin/js/ckeditor/kcfinder/upload.php?type=flash';
};
