<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Started\Controller;
	
	use Zend\Config\Config;
	use Zend\Config\Processor\Filter;
	use Zend\Config\Processor\Queue;
	use Zend\Filter\StringToUpper;
	use Zend\Filter\StripTags;
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class ConfigController extends AbstractActionController{
		public function indexAction(){
			
			$arrayConfig = [
				'website' => 'zend.vn' ,
				'account' => [
					'email'    => '<h3>email : </h3>zend2@gmail.com' ,
					'password' => '1111234' ,
					'title'    => 'zendConfig' ,
					'content'  => 'tranining Zend config' ,
					'port'     => 23 ,
				] ,
			
			];
			
			$config     = new Config($arrayConfig , TRUE);
			$filter     = new StringToUpper();
			$proccessor = new Filter($filter);
			$proccessor -> process($config);
			
			// ===============================
			
			$config          = new Config($arrayConfig , TRUE);
			$filterUpper     = new StringToUpper();
			$filterStripTags = new StripTags();
			
			$proccessorUpper = new Filter($filterUpper);
			$proccessorTags  = new Filter($filterStripTags);
			$queu            = new Queue();
			$queu -> insert($proccessorUpper);
			$queu -> insert($proccessorTags);
			$queu -> process($config);
			
			// ==================================
			
			$config     = new Config([ 'token' => 'Value token : token' ] , TRUE);
			$proccessor = new \Zend\Config\Processor\Token();
			$proccessor -> addToken('token' , 'hello');
			$proccessor -> process($config);
			echo "<pre style='font-size: 17px;'>";
			print_r($config);
			echo "</pre>";
			
			return new ViewModel();
		}
		
	}
