<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Started\Controller;
	
	use Zend\Config\Config;
	use Zend\Config\Processor\Constant;
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class ConfigController extends AbstractActionController{
		public function indexAction(){
			
			$arrayConfig = [
				'website' => 'zend.vn' ,
				'account' => [
					'email'    => 'zend2@gmail.com' ,
					'password' => '1111234' ,
					'title'    => 'zendConfig' ,
					'content'  => 'tranining Zend config' ,
					'port'     => 23 ,
				] ,
			
			];
			// 01 chuyển mạng config thành mạng đối tượng config
			$config = new Config($arrayConfig);
			echo "<pre style='font-size: 17px;'>";
			print_r($config);
			echo "</pre>";
			echo "<br/>".$config -> website;
			echo "<br/>".$config -> account -> port;
			echo "<br/>".$config -> account -> get('port1' , 500);
			echo "<br/>".$config -> account -> get('port' , 500);
			// 02  Convernt file config thành 1 đối tượng đối tượng config
			$config = new Config(include __DIR__.'/../../../Started/config/module.config.php');
			// 03
			define('MYCONST' , 'this is a const');
			
			$config     = new Config([ 'const' => 'MYCONST' ],true);
			$proccessor = new Constant();
			$proccessor -> process($config);
			echo "<pre style='font-size: 17px;'>";
			print_r($config);
			echo "</pre>";
			
			return new ViewModel();
		}
		
	}
