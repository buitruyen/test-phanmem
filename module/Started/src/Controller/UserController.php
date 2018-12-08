<?php
	
	namespace Started\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class UserController extends AbstractActionController
	{
		public function loginAction(){
			echo 'Login Page';
			return FALSE;
		}
		public function logoutAction(){
			echo 'Logout Page';
			return FALSE;
		}
	}