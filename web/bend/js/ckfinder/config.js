/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckfinder.com/license
*/

CKFinder.customConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.skin = 'v1';
	// config.language = 'fr';
    config.extraPlugins = 'geckospellchecker';
};

config.extraPlugins = 'addseparator,syntaxhighlight,geckospellchecker';


//CKEDITOR.plugins.addExternal('geckospellchecker', '/inc/ckeditor/plugins/geckospellchecker/');
