<?php
	
	define('APPLICATION_ENV' , getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production');
	// hang so duong dan den thu muc ung dung
	define('APPLICATION_PATH' , realpath(dirname(__DIR__)));
	
	// hang so duong dan den thu muc thu vien
	define('LIBARY_PATH' , APPLICATION_PATH.'/vendor');
	
	// hang so duong dan den thu muc thu vien HTMLPurifier
	define('HTMLPURIFIER_PREFIX' , APPLICATION_PATH.'/vendor');
	define('PUBLIC_PATH' , APPLICATION_PATH.'/public');


