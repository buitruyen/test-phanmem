<?php
	
	namespace Training\Controller;
	
	use Database\ChucVu\Worker;
	use Database\Student;
	use Database\Teacher;
	use File\Upload;
	use Zend\Loader\AutoloaderFactory;
	use Zend\Loader\ClassMapAutoloader;
	use Zend\Loader\StandardAutoloader;
	use Zend\Mvc\Controller\AbstractActionController;
	
	class AutoloaderController extends AbstractActionController{
		
		public function index01Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			$loader = new StandardAutoloader([ 'autoregister_zf' => TRUE ]);
			$loader -> registerNamespace('Database' , LIBARY_PATH.'/Database');
			$loader -> registerPrefix('Mail' , LIBARY_PATH.'/Mail');
			$loader -> register();
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			
			$sender  = new \Mail_Sender();
			$attache = new \Mail_Attache();
			$sender2 = new \Mail_Abc_Sender();
			
			return FALSE;
		}
		
		public function index02Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			$loader = new StandardAutoloader(
				[
					'autoregister_zf' => TRUE ,
					'namespaces'      => [
						'Database' => LIBARY_PATH.'/Database' ,
						'File\Abc' => LIBARY_PATH.'/File' ,
					] ,
					
					'prefixes' => [
						'Mail' => LIBARY_PATH.'/Mail' ,
					] ,
				
				]
			
			);
			
			$loader -> register();
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			
			$sender  = new \Mail_Sender();
			$attache = new \Mail_Attache();
			$sender2 = new \Mail_Abc_Sender();
			$upload  = new \File\Abc\Upload();
			
			return FALSE;
		}
		
		public function index03Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			AutoloaderFactory ::factory(
				[
					'Zend\Loader\StandardAutoloader' => [
						'autoregister_zf' => TRUE ,
						'namespaces'      => [
							'Database' => LIBARY_PATH.'/Database' ,
							'File\Abc' => LIBARY_PATH.'/File' ,
						] ,
						
						'prefixes' => [
							'Mail' => LIBARY_PATH.'/Mail' ,
						] ,
					] ,
				]
			
			);
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			
			$sender  = new \Mail_Sender();
			$attache = new \Mail_Attache();
			$sender2 = new \Mail_Abc_Sender();
			$upload  = new \File\Abc\Upload();
			
			return FALSE;
		}
		
		public function index04Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			$loader = new ClassMapAutoloader();
			// Register the class map:
			$loader -> registerAutoloadMap(LIBARY_PATH.'/Autoload/autoload_classmap.php');
			$loader -> register();
			
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			$sender2 = new \Mail_Abc_Sender();
			return FALSE;
			
		}
		
		public function index05Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			$loader = new ClassMapAutoloader(
				[
					LIBARY_PATH.'/Autoload/autoload_classmap.php' ,
					LIBARY_PATH.'/Autoload/classmap.php',
				]
			);
			
			$loader -> register();
			
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			$sender2 = new \Mail_Abc_Sender();
			$upload  = new \File\Abc\Upload();
			return FALSE;
			
		}
		
		public function index06Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			AutoloaderFactory ::factory(
				[
					'Zend\Loader\ClassMapAutoloader' => [
						LIBARY_PATH.'/Autoload/autoload_classmap.php' ,
						LIBARY_PATH.'/Autoload/classmap.php',
					] ,
				]
			
			);
			
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			$sender2 = new \Mail_Abc_Sender();
			$upload  = new \File\Abc\Upload();
			return FALSE;
			
		}
		
		public function index07Action(){
			echo '<h3 style="color: #0000CC;font-weight: bold">'.__METHOD__.'</h3>';
			
			AutoloaderFactory ::factory(
				[
					'Zend\Loader\ClassMapAutoloader' => [
						LIBARY_PATH.'/Autoload/autoload_classmap.php' ,
						LIBARY_PATH.'/Autoload/classmap.php',
					] ,
					'Zend\Loader\StandardAutoloader' => [
						'autoregister_zf' => TRUE ,
						'namespaces'      => [
							'Database' => LIBARY_PATH.'/Database' ,
							'File\Abc' => LIBARY_PATH.'/File' ,
						] ,
						
						'prefixes' => [
							'Mail' => LIBARY_PATH.'/Mail' ,
						] ,
					] ,
				]
			
			);
			
			$student = new Student();
			$teacher = new Teacher();
			$worker  = new Worker();
			$sender2 = new \Mail_Abc_Sender();
			$upload  = new \File\Abc\Upload();
			return FALSE;
			
		}
	}