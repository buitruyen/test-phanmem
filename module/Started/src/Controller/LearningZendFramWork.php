<?php
	
	namespace Started\Controller;
	
	use Database\ChucVu\Worker;
	use Database\Student;
	use Database\Teacher;
	use Zend\Filter\BaseName;
	use Zend\Loader\AutoloaderFactory;
	use Zend\Loader\ClassMapAutoloader;
	use Zend\Loader\StandardAutoloader;
	use Zend\Mvc\Controller\AbstractActionController;
	
	class LearningZendFramWork extends AbstractActionController{
		
		// \Zend\I18n\Filter\Alnum()	trích xuất các giá trị chuỗi từ a->z A->Z và các giá trị số
		public function index01Action()
		{
			$filter	= new BaseName();
			$input	= 'www.zend.vn/public/test.html';
			$output	= $filter->filter($input);
			
			echo '<h3 style="color:red;font-weight:bold;margin-left:50px">\Zend\Filter\BaseName</h3>';
			echo '<h3 style="color:red;font-weight:bold;margin-left:50px">Input: '.$input.'</h3>';
			echo '<h3 style="color:red;font-weight:bold;margin-left:50px">Output: '.$output.'</h3>';
			
			
			return false;
		}
		
		
		
		
	}