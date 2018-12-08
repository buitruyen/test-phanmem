<?php
	
	namespace Started\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	
	class UserController extends AbstractActionController{
		public function loginAction(){
			$checkMethod = $this -> getRequest();
			
			if($checkMethod -> isGet()){
				$action = $this -> params() -> fromRoute('page' , 'abc');
				$id     = $this -> params() -> fromRoute('id' , '1');
				
				echo "<br/>";
				echo $action;
				
				echo "<br/>";
				echo $id;
				
			}else{
				$var =$this->params() ->fromPost('name','TruyenPro');
				echo $var ."<br/>";
				echo "Not method get";
			}
			
			return FALSE;
		}
		
		public function logoutAction(){
			echo 'Logout Page';
			return FALSE;
		}
	}