<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Started;
	
	use Zend\Config\Reader\Ini;
	use Zend\Feed\Reader\Reader;
	use Zend\ModuleManager\ModuleEvent;
	use Zend\ModuleManager\ModuleManager;
	
	class Module{

		public function init(ModuleManager $moduleManager){
			$event = $moduleManager -> getEventManager();
			$event -> attach(ModuleEvent::EVENT_MERGE_CONFIG , [ $this , 'onMergeconfig' ]);

		}
		
		public function onMergeconfig(ModuleEvent $event){
			$configListtener=$event ->getConfigListener();
			$config=$configListtener ->getMergedConfig(FALSE);
			echo "<pre style='font-size: 17px;'>";
			print_r($config['controllers']);
			echo "</pre>";
			
		}
		
		public function getConfig(){
			$reader = new Ini();
			$reader -> setNestSeparator('.');
			$configRouter = $reader -> fromFile(__DIR__.'/../config/ini/router.ini');
			$configCV     = include __DIR__.'/../config/controller-view.php';
			$configArray = array_merge($configRouter , $configCV);
//			return $configArray;
			return include __DIR__ . '/../config/module.config.php';
		}
		
		public function getControllerConfig(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
		}
		public function getServiceConfig(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
		}
	}
