<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Training;
	
	use Zend\Config\Reader\Ini;
	use Zend\Config\Reader\Xml;
	use Zend\Filter\StaticFilter;
	use Zend\Mvc\MvcEvent;
	use Zend\Mvc\ModuleRouteListener;
	
	class Module{
		const VERSION = '3.0.3-dev';
		
//		public function init(ModuleManager $moduleManager){
//			$event = $moduleManager -> getEventManager();
//			$event -> attach(ModuleEvent::EVENT_MERGE_CONFIG , [ $this , 'onMergeconfig' ]);
//
//		}
//
//		public function onMergeconfig(ModuleEvent $event){
//			$configListener = $event -> getConfigListener();
//			$config=$configListener ->getMergedConfig(FALSE);
//			    echo "<pre style='font-size: 17px;'>";
//			    	print_r($config['controllers']);
//			    	echo "</pre>";
//
//			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
//
//		}
		
		public function onBootstrap(MvcEvent $e)
		{
			$eventManager        = $e->getApplication()->getEventManager();
			$moduleRouteListener = new ModuleRouteListener();
			$moduleRouteListener->attach($eventManager);
			
			$filterPlugin	= StaticFilter::getPluginManager();
			$filterPlugin->setInvokableClass('CreateURLFriendly', '\ZendVN\Filter\CreateURLFriendly');
			$filterPlugin->setInvokableClass('RemoveCircumflex', '\ZendVN\Filter\RemoveCircumflex');
			$filterPlugin->setInvokableClass('Pufifer', '\ZendVN\Filter\Pufifer');
		}
		
		public function getConfig(){
//			$reader = new Ini();
//			$reader -> setNestSeparator('.');
//			$configArray = $reader -> fromFile(__DIR__.'/../config/module.config.ini');

//			$reader = new Ini();
//			$reader -> setNestSeparator('.');
//			$configRouter = $reader -> fromFile(__DIR__.'/../config/ini/router.ini');
//
//			$configCV = include __DIR__.'/../config/ini/controller-view.php';
//
//			$configArray = array_merge($configRouter , $configCV);
			
			$reader                                               = new Xml();
			$configArray                                          = $reader -> fromFile(__DIR__.'/../config/module.config.xml');
			$configArray['view_manager']['template_path_stack'][] = __DIR__.'/../view';
			
			foreach($configArray['controllers']['factories'] as $key => $value){
				$newKey                                             = 'Training\Controller\\'.$key;
				$configArray['controllers']['factories'][ $newKey ] = $value;
				unset($configArray['controllers']['factories'][ $key ]);
			}
			
			return include __DIR__.'/../config/module.config.php';
		}
		
		
		
		
//		public function getControllerConfig(){
//			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
//		}
//
//		public function getServiceConfig(){
//			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
//		}
	}
