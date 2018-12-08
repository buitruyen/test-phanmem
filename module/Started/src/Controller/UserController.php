<?php
	
	namespace Started\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class UserController extends AbstractActionController{
		public function loginAction(){
			$checkMethod = $this -> getRequest();
			// isget ->true:get
			// isPost ->true:post
//			if($checkMethod -> isGet()){
//				echo "using method get";
//
//			}else{
//				echo "Not method get";
//			}
			if($checkMethod -> isPost()){
				echo "using method Post";
				
			}else{
				echo "Not method Post";
			}
			echo $checkMethod ->getMethod();
			echo '"<br/>"';
			echo $checkMethod ->getUriString();
			return FALSE;
		}
		
		public function logoutAction(){
			echo 'Logout Page';
			return FALSE;
		}
	}