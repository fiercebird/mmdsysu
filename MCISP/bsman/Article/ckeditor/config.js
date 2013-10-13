/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 界面语言，默认为 'en''zh-cn'
    config.language = 'zh-cn'; 
	config.width = 750;     // 850 pixels wide.
	config.resize_maxWidth = 750;
	config.height = 500;        // 500 pixels.
	config.resize_maxHeight = 530;
	config.toolbarCanCollapse = true;//工具栏是否可以被收缩
	config.toolbarStartupExpanded = true;   //工具栏默认是否展开
	//config.image_previewText = CKEDITOR.tools.repeat( '___ ', 100 );//图片预览框预置内容
	config.toolbar= [
		['Source','-','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		'/',
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor']
	];
	config.filebrowserUploadUrl = './ckeditor/upload.php?type=File';
	config.filebrowserImageUploadUrl = './ckeditor/upload.php?type=Images';
	config.filebrowserFlashUploadUrl = './ckeditor/upload.php?type=Flash';
	config.linkShowAdvancedTab=false;  //禁用advaced子菜单选项
	config.removeDialogTabs = 'flash:advanced;image:Link;image:advanced;'; //禁用子菜单选项,也可以在此禁用link等tab选项
};
