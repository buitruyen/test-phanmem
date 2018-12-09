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
			$configRouter = $reader -> fromFile(__DIR__.'/../config/ini/router.ini');
			$configCV     = include __DIR__.'/../config/controller-view.php';
			$configArray = array_merge($configRouter , $configCV);
			echo "<pre style='font-ize: 17px;'>";
			print_r($configArray);
			echo "</pre>";
			
			return $configArray;
			
		}
	}
