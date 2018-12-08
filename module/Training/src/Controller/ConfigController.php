<?php
	/**
	 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
	 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
	 * @license   http://framework.zend.com/license/new-bsd New BSD License
	 */
	
	namespace Training\Controller;
	
	use PHPUnit\Util\Xml;
	use Zend\Config\Config;
	use Zend\Config\Processor\Constant;
	use Zend\Config\Processor\Filter;
	use Zend\Config\Processor\Queue;
	use Zend\Config\Processor\Token;
	use Zend\Config\Reader\Ini;
	use Zend\Config\ReaderPluginManager;
	use Zend\Db\Sql\Predicate\In;
	use Zend\Filter\StringToUpper;
	use Zend\Filter\StripTags;
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class ConfigController extends AbstractActionController{
		public function indexAction(){
			echo '<h3 style="color:red;font-weight:bold">'.__METHOD__.'</h3>';
			$configArray = [
				'website' => "www.zend.vn" ,
				'account' => [
					'email'    => '<h3>namtruyenpro95@gmail.com</h3>' ,
					'password' => '123456' ,
					'title'    => 'ZendConfig' ,
					'content'  => 'training zendConfig' ,
					'port'     => 456 ,
				
				] ,
			];
			// 01 chuyển mảng config thành một đối tượng config
//			$config = new Config($configArray);
//			echo "<br/>".$config -> account -> get('port4' , 599);
			
			// 02 chuyển 1 file config thành một đối tượng config
			$config = include __DIR__.'/../../../Training/config/module.config.php';
			echo "<pre style='font-size: 17px;'>";
			print_r($config);
			echo "</pre>";
			// Thực hiện một số hành động trên zendConfig

//			define('MYCONST' , 'This is a const');
//			$config    = new Config([ 'const' => 'MYCONST' ],true);
//			$prossesor = new Constant();
//			$prossesor -> process($config);
//			echo "<pre style='font-size: 17px;'>";
//			print_r($config);
//			echo "</pre>";
			
			// filter
//			$config    = new Config($configArray , TRUE);
//			$filter    = new StringToUpper();
//			$prossesor = new Filter($filter);
//			$prossesor -> process($config);
			
			// queue FIFO

//			$config          = new Config($configArray , TRUE);
//			$filterUpper     = new StringToUpper();
//			$filterStripTags = new StripTags();
//
//			$prossesorUpper     = new Filter($filterUpper);
//			$prossesorStripTags = new Filter($filterStripTags);
//
//			$queue = new Queue();
//			$queue -> insert($prossesorUpper);
//			$queue -> insert($prossesorStripTags);
//
//			$queue -> process($config);
			
			// Token
//			$config    = new Config([ 'token' => 'Token value :TOKEN' ] , TRUE);
//			$proccesor = new Token();
//			$proccesor -> addToken('TOKE' , 'Hello 123');
//			$proccesor -> process($config);
//			echo "<pre style='font-size: 17px;'>";
//			print_r($config);
//			echo "</pre>";
			
			return FALSE;
		}
		
		public function index2Action(){
//			echo '<h3>'.__FILE__.'</h3>';
//			$reader = new Ini();
//			$reader ->setNestSeparator('-');
//			$data   = $reader -> fromFile(__DIR__.'/../../config/ini/module.config.ini');
//
//
			
			$config                                     = new Config([] , TRUE);
			$config -> production                       = [];
			$config -> production -> website            = 'www.zend.vn';
			$config -> production -> accout             = [];
			$config -> production -> accout -> email    = 'namtruyenpro95@gmail.com';
			$config -> production -> accout -> password = '123456';
			
			$writer = new \Zend\Config\Writer\Ini();
			$writer -> setNestSeparator('-');
			$writer -> toFile(__DIR__.'/../../config/ini/config.ini' , $config);
			return FALSE;
			
		}
		
		public function index3Action(){
//
//			$reader = new \Zend\Config\Reader\Xml();
//			$data   = $reader -> fromFile(__DIR__.'/../../config/xml/config.xml');
//
//			echo "<pre style='font-size: 17px;'>";
//			print_r($data);
//			echo "</pre>";
			echo '<h3>'.__FILE__.'</h3>';
			$config                                     = new Config([] , TRUE);
			$config -> production                       = [];
			$config -> production -> website            = 'www.zend.vn';
			$config -> production -> accout             = [];
			$config -> production -> accout -> email    = 'namtruyenpro95@gmail.com';
			$config -> production -> accout -> password = '123456';
			
			$writer = new \Zend\Config\Writer\Xml();
			$writer -> toFile(__DIR__.'/../../config/xml/config2.xml' , $config);
			return FALSE;
		}
		
	}
