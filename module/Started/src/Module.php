<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Started;
	
	use Zend\Config\Reader\Ini;
	use Zend\Feed\Reader\Reader;
	
	class Module{
		
		public function getConfig(){
			$reader = new Ini();
			$reader -> setNestSeparator('.');
			$configArray = $reader -> fromFile(__DIR__.'/../config/module.config.ini');
			return $configArray;
			
		}
	}
